<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['rid'])) {
	header('location:../login.php');
} else {
	if (isset($_POST['request'])) {
		$hid = $_POST['hid'];
		$rid = $_SESSION['rid'];
		$bg = $_POST['bg'];
		$quan = $_POST['quan'];

		$check_quan = mysqli_query($conn, "SELECT unit FROM bloodinfo where hid='$hid' and bg='$bg'");
		$row = mysqli_fetch_assoc($check_quan);
		if ($row['unit'] >= $quan) {

			$check_data = mysqli_query($conn, "SELECT * FROM bloodrequest where hid='$hid' and rid='$rid' and bg ='$bg'");
			if (mysqli_num_rows($check_data) === 0) {

				$sql = "INSERT INTO bloodrequest (bg, hid, rid, runit) VALUES ('$bg', '$hid', '$rid' , '$quan')";
				if ($conn->query($sql) === TRUE) {
					$msg = 'You have requested for blood group ' . $bg . '. Our team will contact you soon.';
					header("location:../sentrequest.php?msg=" . $msg);
				} else {
					$error = "Error: " . $sql . "<br>" . $conn->error;
					header("location:../abs.php?error=" . $error);
				}
				$conn->close();
			} else {

				$error = 'You have already requested for blood sample from this Blood Bank.';
				header("location:../abs.php?error=" . $error);
			}
		} else {
			$error = 'Not Enough Quantity Available.';
			header("location:../abs.php?error=" . $error);
		}
	}
}
