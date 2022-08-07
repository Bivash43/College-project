<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['hid'])) {
	header('location:login.php');
} else {
	if (isset($_SESSION['hid'])) {
		$id = $_SESSION['hid'];
		$sql = "SELECT * FROM hospitals WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<?php $title = "Hospital's Profile"; ?>
<?php require 'head.php'; ?>

<body>
	<?php require 'header.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-4 col-sm-6 mb-5">
				<div class="card">

					<div class="card-body">
						<form action="file/updateprofile.php" method="post">
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Blood Bank Name</label>
							<input type="text" name="hname" value="<?php echo $row['bname']; ?>" class="form-control mb-3" required pattern="[A-Za-z]">
							<label class="text-muted font-weight-bold">Email</label>
							<input type="email" name="hemail" value="<?php echo $row['bemail']; ?>" class="form-control mb-3" required>
							<label class="text-muted font-weight-bold">Password</label>
							<input type="text" name="hpassword" value="<?php echo $row['bpassword']; ?>" class="form-control mb-3" required minlength="6">
							<label class="text-muted font-weight-bold">Phone Number</label>
							<input type="text" name="hphone" value="<?php echo $row['bphone']; ?>" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone Number must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
							<label class="text-muted font-weight-bold">Address</label>
							<input type="text" name="hcity" value="<?php echo $row['baddress']; ?>" class="form-control mb-3" required>
							<input type="submit" name="update" class="btn btn-block btn-primary" value="Update">
						</form>
					</div>
					<a href="index.php" class="text-center">Cancel</a><br>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>