<?php
 include '../database/config.php';
 include '../student/includes/check_user.php'; 
//  include '../admin/includes/check_user.php'; 
 include '../student/includes/check_reply.php';

 //$route= $_POST['ee'];
$livesx = mysqli_query($conn, "SELECT * FROM tbl_lives");
//$cv = mysqli_num_rows($livesx);

while ($users_d = mysqli_fetch_array($livesx)) {
     $question_id = $users_d['live'];
}
if($question_id == 0){
    echo "<center><img src='../assets/icons/translator.svg' height='320'></center>";
}
$ty = mysqli_query($conn, "SELECT * FROM tbl_qt WHERE id='$question_id'");

while ($users_details1 = mysqli_fetch_array($ty)) {

    $user_ide = $users_details1['id'];
    $question = $users_details1['question'];
    $option1 = $users_details1['option1'];
    $option2 = $users_details1['option2'];
    $option3 = $users_details1['option3'];
    $option4 = $users_details1['option4'];
    $answer = $users_details1['answer'];
    $photo_path = $users_details1['avatar'];
    ?>
    <h3 style="font-size:30px; "><?php echo $question; ?> </h3>
    <h2><span style="font-weight: bold;color: #0a568c">A.</span> <?php echo $option1;  ?></h2>
    <h2><span style="font-weight: bold;color: #0a568c">B.</span> <?php echo $option2;  ?></h2>
    <h2><span style="font-weight: bold;color: #0a568c">C.</span> <?php echo $option3;  ?></h2>
    <h2><span style="font-weight: bold;color: #0a568c">D.</span> <?php echo $option4;  ?></h2>

    <input type="hidden" value="<?php echo $user_ide ?>" id="bvn">

    <?php

}
