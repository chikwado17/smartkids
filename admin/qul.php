<?php
 include '../database/config.php';
include 'includes/check_user.php'; 

$route= $_POST['ee'];
$gg= $_POST['gg'];
$ans= $_POST['ans'];

 //update the user account
$pend = mysqli_query($conn, "update tbl_users set current_q='$route' where groups_id='$gg'");

$pend1 = mysqli_query($conn, "update tbl_lives set live='$route',user_answer=0, qa='$ans' where id='1'");

$pend2 = mysqli_query($conn, "update tbl_qt set status='1' where id='$route'");

?>