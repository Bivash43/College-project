<?php
session_start();
require 'connection.php';
if (isset($_SESSION['rid'])) {
    if (isset($_POST['update'])) {
        $id = $_SESSION['rid'];
        $rname = $_POST['rname'];
        $remail = $_POST['remail'];
        $rphone = $_POST['rphone'];
        $bg = $_POST['bg'];
        $rcity = $_POST['rcity'];
        $rpassword = $_POST['rpassword'];

        $check_email = mysqli_query($conn, "SELECT remail FROM receivers where remail = '$remail' ");
        if (mysqli_num_rows($check_email) > 0) {
            $error = 'Email Already exists. Please try another Email.';
            header("location:../register.php?error=" . $error);
        } else {
            $update = "UPDATE receivers SET rname='$rname', remail='$remail', rpassword='$rpassword', rphone='$rphone', rbg='$bg',rcity='$rcity' WHERE id='$id'";
            if ($conn->query($update) === TRUE) {
                $msg = "Your profile is updated successfully.";
                header("location:../rprofile.php?msg=" . $msg);
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
                header("location:../rprofile.php?error=" . $error);
            }
            $conn->close();
        }
    }
} elseif (isset($_SESSION['hid'])) {
    if (isset($_POST['update'])) {
        $id = $_SESSION['hid'];
        $hname = $_POST['hname'];
        $hemail = $_POST['hemail'];
        $hphone = $_POST['hphone'];
        $hcity = $_POST['hcity'];
        $hpassword = $_POST['hpassword'];

        $check_email = mysqli_query($conn, "SELECT bemail FROM hospitals where bemail = '$hemail' ");
        if (mysqli_num_rows($check_email) > 0) {
            $error = 'Email Already exists. Please try another Email.';
            header("location:../register.php?error=" . $error);
        } else {
            $update = "UPDATE hospitals SET bname='$hname', bemail='$hemail', bpassword='$hpassword', bphone='$hphone', baddress='$hcity' WHERE id='$id'";
            if ($conn->query($update) === TRUE) {
                $msg = "Your profile is updated successfully.";
                header("location:../hprofile.php?msg=" . $msg);
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
                header("location:../hprofile.php?error=" . $error);
            }
            $conn->close();
        }
    }
} else {
    header("location:../login.php");
}
