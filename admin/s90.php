<?php
include "db.php";
include "session.php";

$livesx1 = mysqli_query($con, "SELECT * FROM groups where status='1'");
$livesx = mysqli_query($con, "SELECT * FROM lives");

while ($users_d1 = mysqli_fetch_array($livesx1)) {
    $q_id = $users_d1['id'];
}

while ($users_d = mysqli_fetch_array($livesx)) {
    $question_id = $users_d['live'];
}
//$ty = mysqli_query($con, "SELECT * FROM qt_data1 where group_id='19' and status=0  limit 1");
$ty = mysqli_query($con, "SELECT * FROM qt_data1 where group_id='$q_id' and status=0  limit 1");


while ($users_details1 = mysqli_fetch_array($ty)) {

    $user_ide = $users_details1['id'];
    $question = $users_details1['question'];
    $option1 = $users_details1['option1'];
    $option2 = $users_details1['option2'];
    $option3 = $users_details1['option3'];
    $option4 = $users_details1['option4'];
    $answer = $users_details1['answer'];
    $photo_path = $users_details1['photo_path'];

    $pend1 = mysqli_query($con, "update lives set live='$user_ide',user_anser=0, qa='$answer' where id='1'");

    ?>
    <h3 style="font-size:30px; "><?php echo $question; ?> </h3>
    <h2><span style="font-weight: bold;color: #0a568c">A.</span> <?php echo $option1; ?></h2>
    <h2><span style="font-weight: bold;color: #843534">B.</span> <?php echo $option2; ?></h2>
    <h2><span style="font-weight: bold;color: #1c2d3f">C.</span> <?php echo $option3; ?></h2>
    <h2><span style="font-weight: bold;color: #8a1f11">D.</span> <?php echo $option4; ?></h2>

    <input type="hidden" value="<?php echo $user_ide ?>" id="bvn">

    <?php
}
?>