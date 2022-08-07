<?php
require 'connection.php';
if (isset($_POST['hregister'])) {
	$name = $_POST['hname'];
	$email = $_POST['hemail'];
	$password = $_POST['hpassword'];
	$phone = $_POST['hphone'];
	$address = $_POST['hcity'];

	$filename = $_FILES["file"]["name"];
	$tempname = $_FILES["file"]["tmp_name"];
	$folder = "../imageVerf/" . $filename;

	$check_email = mysqli_query($conn, "SELECT bemail FROM hospitals where bemail = '$hemail' ");
	if (mysqli_num_rows($check_email) > 0) {
		$error = 'Email Already exists. Please try another Email.';
		header("location:../register.php?error=" . $error);
	} else {
		$sql = "INSERT INTO hospitals (bname, bemail, bpassword, bphone, baddress, bfile)
	VALUES ('$name','$email', '$password', '$phone', '$address' ,'$filename')";

		move_uploaded_file($tempname, $folder);

		if ($conn->query($sql) === TRUE) {
			$msg = 'You have successfully registered. Please, login to continue.';
			header("location:../login.php?msg=" . $msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
			header("location:../register.php?error=" . $error);
		}
		$conn->close();
	}
}
