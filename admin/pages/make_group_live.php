<?php
include '../../database/config.php';
$depid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_group SET status='1' WHERE id='$depid'";

if ($conn->query($sql) === TRUE) {
    header("location:../group.php?rp=7823");
} else {
    header("location:../group.php?rp=1298");
}

$conn->close();
?>
