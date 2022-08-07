<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['rid'])) {
	header('location:login.php');
} else {
	if (isset($_SESSION['rid'])) {
		$id = $_SESSION['rid'];
		$sql = "SELECT * FROM receivers WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<?php $title = "Receiver Profile"; ?>
<?php require 'head.php'; ?>

<body>
	<?php require 'header.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-8 mb-5">
				<div class="card">

					<div class="card-body">
						<form action="file/updateprofile.php" method="post">
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver Name</label>
							<input type="text" name="rname" value="<?php echo $row['rname']; ?>" class="form-control mb-3" required pattern="[A-Za-z]">
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver Email</label>
							<input type="email" name="remail" value="<?php echo $row['remail']; ?>" class="form-control mb-3" required>
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver Password</label>
							<input type="text" name="rpassword" value="<?php echo $row['rpassword']; ?>" class="form-control mb-3" required minlength="6">
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver Phone Number</label>
							<input type="text" name="rphone" value="<?php echo $row['rphone']; ?>" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone Number must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver City</label>
							<input type="text" name="rcity" value="<?php echo $row['rcity']; ?>" class="form-control mb-3" required>
							<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Receiver Blood Group</label>
							<select class="form-control mb-3" name="bg" required>
								<option selected><?php echo $row['rbg']; ?></option>
								<option>A-</option>
								<option>A+</option>
								<option>B-</option>
								<option>B+</option>
								<option>AB-</option>
								<option>AB+</option>
								<option>O-</option>
								<option>O+</option>
							</select>
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