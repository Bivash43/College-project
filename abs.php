<?php
session_start();
require 'file/connection.php';
if (isset($_GET['search'])) {
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
} else {
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title = "Available Blood Samples"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>
    <div class="container cont">

        <?php require 'message.php'; ?>

        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
                <label class="font-weight-bolder">Select Blood Group:</label>
                <select name="search" class="form-control">
                    <option><?php echo @$_GET['search']; ?></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select><br>
                <a href="abs.php" class="btn btn-info mr-4"> Reset</a>
                <input type="submit" name="submit" class="btn btn-info" value="search">
            </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr>
                <th colspan="8" class="title">Available Blood Samples</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Blood Bank Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Blood Group</th>
                <th>Quantity in Pound</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row = mysqli_num_rows($result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                    } else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
                }
                ?>
            </div>

            <?php while ($row = mysqli_fetch_array($result)) { ?>

                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['bname']; ?></td>
                    <td><?php echo ($row['baddress']); ?></td>
                    <td><?php echo ($row['bemail']); ?></td>
                    <td><?php echo ($row['bphone']); ?></td>
                    <td><?php echo ($row['bg']); ?></td>
                    <td><?php echo ($row['unit']); ?></td>

                    <?php $bid = $row['bid']; ?>
                    <?php $hid = $row['hid']; ?>
                    <?php $bg = $row['bg']; ?>

                    <form action="file/request.php" method="post">
                        <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                        <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                        <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                        <?php if (isset($_SESSION['hid'])) { ?>
                            <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Blood</a></td>
                        <?php } else {
                            (isset($_SESSION['rid']))  ?>
                            <td><input type="number" name="quan" placeholder="Quantity in Pound" class="form-control mb-3"> <input type="submit" name="request" class="btn btn-info" value="Request Blood"></td>
                        <?php } ?>

                    </form>
                </tr>

            <?php } ?>
        </table>
    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function() {
        alert("Blood Bank cannot request for blood.");
    });
</script>