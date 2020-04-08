<?php
include '../database/config.php';
include 'includes/check_user.php';

 //$route= $_POST['ee'];
$livesx = mysqli_query($conn, "SELECT * FROM tbl_lives");
//$cv = mysqli_num_rows($livesx);

while ($users_d = mysqli_fetch_array($livesx)) {
     $question_id = $users_d['live'];
     $user_anser = $users_d['user_answer'];
     $qa = $users_d['qa'];

}



if($user_anser == 0){
    echo '<center style="margin-top:20px"><img src="../assets/icons/brainstorm.svg" height="70"><span style="font-size: 30px;"> Waiting for answer ...</span></center>';
}elseif ($user_anser == $qa){

  

    echo '<center style="margin-top:20px"><img src="../assets/icons/alcohol.svg" height="70"><span style="font-size: 30px;"> Congratulations +5 points </span></center>';

    if($qa == 1){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>A</span></h1></center>";
    }elseif($qa == 2){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>B</span></h1></center>";
    }elseif($qa == 3){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>C</span></h1></center>";
    }elseif($qa == 4){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>D</span></h1></center>";
    };

    //echo '<center><img src="../'.$photo.'" height="200" class="img-rounded"></center>';


}elseif ($user_anser != $qa){

  

    echo '<center style="margin-top:20px"><img src="../assets/icons/1814975.svg" height="70"><span style="font-size: 30px;"> Incorrect answer 0 points </span></center>';

    if($qa == 1){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>A</span></h1></center>";
    }elseif($qa == 2){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>B</span></h1></center>";
    }elseif($qa == 3){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>C</span></h1></center>";
    }elseif($qa == 4){
        echo "<center><h1>The Correct Option is <span style='font-weight: bolder;color: green'>D</span></h1></center>";
    };


}

?>

