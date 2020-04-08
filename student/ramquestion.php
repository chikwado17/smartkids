<?php
include '../database/config.php';
include '../student/includes/check_user.php'; 


$mysql = mysqli_query($conn, "SELECT * FROM tbl_users WHERE user_id ='$myid'");

while ($users_d = mysqli_fetch_array($mysql)) {
    $maths_score = $users_d['maths_quiz'];
    
}


$r = $_POST['answer'];
$new_score = $maths_score + 5;



$pend1 = mysqli_query($conn, "update tbl_lives set user_answer='$r' where id='1'");


$livesx = mysqli_query($conn, "SELECT * FROM tbl_lives");

while ($users_d = mysqli_fetch_array($livesx)) {
    $question_id = $users_d['live'];
    $user_anser = $users_d['user_answer'];
    $qa = $users_d['qa'];
}

//storing student scores
if($user_anser == $qa){
    $pend = mysqli_query($conn, "update tbl_users set maths_quiz='$new_score' where user_id='$myid'");

}


?>

