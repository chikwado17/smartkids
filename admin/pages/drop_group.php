<?php
include '../../database/config.php';
$depid = mysqli_real_escape_string($conn, $_GET['eid']);

$sql = "DELETE FROM tbl_group WHERE exam_id='$depid'";

if ($conn->query($sql) === TRUE) {
    header("location:../group.php?rp=7823");
} else {
    header("location:../group.php?rp=1298");
}

$conn->close();
?>
