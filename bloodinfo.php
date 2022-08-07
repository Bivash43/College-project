<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['hid'])) {
  header('location:login.php');
} else {
?>
  <!DOCTYPE html>
  <html>
  <?php $title = "Add blood samples"; ?>
  <?php require 'head.php'; ?>

  <body>
    <?php require 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">

        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card">
            <div class="card-header title">Add blood group available in Blood Bank</div>
            <div class="card-body">
              <form action="file/infoAdd.php" method="post">
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" title="click to see">Term & conditions. </a><br>
                <div class="collapse" id="collapseExample">
                  Make sure that the blood you have entered here is actually available in your bank. If not available, please make sure to
                  remove the data within 15 minutes.
                  <br> If the blood is collected by the receiver, make sure to deduct the collected blood within 15 minutes.
                  <br> Spreading false information may lead you to face legal consequences. <br><br>
                </div>
                <input type="checkbox" name="condition" value="agree" required> Agree<br><br>
                <select class="form-control" name="bg" required="">
                  <option disabled selected>Blood Group</option>
                  <option>A-</option>
                  <option>A+</option>
                  <option>B-</option>
                  <option>B+</option>
                  <option>AB-</option>
                  <option>AB+</option>
                  <option>O-</option>
                  <option>O+</option>
                </select><br>
                <input type="number" name="quan" class="form-control mb-4" placeholder="Enter Quantity in Pound">
                <input type="submit" name="add" value="Add" class="btn btn-primary btn-block"><br>
                <a href="index.php" class="float-right" title="click here">Cancel</a>
              </form>
            </div>
          </div>
        </div>

        <?php if (isset($_SESSION['hid'])) {
          $hid = $_SESSION['hid'];
          $sql = "select * from bloodinfo where hid='$hid'";
          $result = mysqli_query($conn, $sql);
        }
        ?>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-7 mb-5">
          <table class="table table-striped table-responsive">
            <th colspan="5" class="title">Blood Bank</th>
            <tr>
              <th>#</th>

              <th>Blood Samples</th>
              <th>Quantity in Pound</th>
              <th colspan="2">Action</th>
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

                <td><?php echo $row['bg']; ?></td>
                <td><?php echo $row['unit']; ?></td>
                <td><a href="file/delete.php?bid=<?php echo $row['bid']; ?>" class="btn btn-danger">Delete</a> </td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Deduct
                  </button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-body">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="file/deduct.php">
                            <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>" />
                            <input type="text" name="quan" class="form-control mt-4" placeholder="Enter Quantity in Pound"><br>
                            <input class="btn btn-danger" type="submit" name="deduct" value="Deduct">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>

      </div>
    </div>
    <?php require 'footer.php' ?>
  </body>
<?php } ?>