<?php
include "connection.php";
$bid = $_GET['bid'];
$quan = $_GET['quan'];

$count = mysqli_query($conn, "SELECT unit FROM bloodinfo where bid='$bid'");
$num = mysqli_fetch_assoc($count);
$total =  $num['unit'] - (int) $quan;

if ($num['unit'] >= (int) $quan) {
    $sql = "UPDATE bloodinfo SET unit = '$total' where bid='$bid' ";
    if ($conn->query($sql) === TRUE) {
        $msg = "You have updated record successfully.";
        header("location:../bloodinfo.php?msg=" . $msg);
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        header("location:../bloodinfo.php?error=" . $error);
    }
} else {
    $error = "Entered quantity is more than available quantity";
    header("location:../bloodinfo.php?error=" . $error);
}

$conn->close();
