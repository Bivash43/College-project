<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['hid'])) {
	header('location:login.php');
} else {
	if (isset($_POST['add'])) {
		$hid = $_SESSION['hid'];
		$bg = $_POST['bg'];
		$quantity = $_POST['quan'];
		$check_data = mysqli_query($conn, "SELECT hid FROM bloodinfo where hid='$hid' && bg='$bg'");
		if (mysqli_num_rows($check_data) > 0) {

			$count = mysqli_query($conn, "SELECT unit FROM bloodinfo where hid='$hid' && bg='$bg'");
			$num = mysqli_fetch_assoc($count);
			$total = $num['unit'] + (int) $quantity;

			$sql = "UPDATE bloodinfo SET unit = '$total' WHERE hid='$hid' && bg='$bg' ";
			if ($conn->query($sql) === TRUE) {
				$msg = "You have updated record successfully.";
				header("location:../bloodinfo.php?msg=" . $msg);
			} else {
				$error = "Error: " . $sql . "<br>" . $conn->error;
				header("location:../bloodinfo.php?error=" . $error);
			}
			$conn->close();
		} else {
			$sql = "INSERT INTO bloodinfo (bg, hid, unit) VALUES ('$bg', '$hid' , '$quantity')";
			if ($conn->query($sql) === TRUE) {
				$msg = "You have added record successfully.";
				header("location:../bloodinfo.php?msg=" . $msg);
			} else {
				$error = "Error: " . $sql . "<br>" . $conn->error;
				header("location:../bloodinfo.php?error=" . $error);
			}
			$conn->close();
		}
	}
}
