<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';

date_default_timezone_set("Africa/Lagos");
 date_default_timezone_get();
$duration=60;
$get_t = date("h:i:sa");
$get_d = date("Y-m-d");
$by_time = $duration/60;

$new_times = (round($by_time));

$newtimestamp = strtotime($get_d . $get_t . ' + ' . $new_times . ' minute');
 $new_time = date('Y-m-d H:i:s', $newtimestamp);



?>
<!DOCTYPE html>
<html>
    
<head>
        
    
        <title>PSIS | Show Live Quiz</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <style>
            .ques {
            font-size: 35px;
            margin: 18px;
            color: white;
            cursor: pointer;
        }

        .vb {
            width: 65px;
            height: 65px;
            background-color: #999c9e;
            border-radius: 50px;
            float: left;
            margin: 5px;
            border: thin;
            border: solid;
            border-bottom-color: #0a568c;
            cursor: pointer;
        }

        .vb :hover {
            width: 65px;
            height: 65px;
            background-color: #1b6d85;
            border-radius: 50px;
            float: left;
            margin: 5px;
            border: thin;
            border: solid;
            border-bottom-color: #0a568c;
            cursor: pointer;
        }

        .img-quiz {
                margin:1px;
                float:left;
            }
        </style>
    </head>
	<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>   class="page-header-fixed page-horizontal-bar" >
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile">
				<?php 
				if ($myavatar == NULL) {
				print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div>
        </form>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="./" class="logo-text"><span><img width="50px" src="./logo.png" alt=""></span></a>
                    </div>
                    <div class="search-button">
					
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
						 <ul class="nav navbar-nav navbar-left">
                          <li>		
 

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
							
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i class="fa fa-angle-down"></i></span>
										<?php 
						                if ($myavatar == NULL) {
						                print' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						                }else{
						                echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>';	
						                }
						
						                ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner">
                
                <div class="page-title">
                
                    <h3 style="font-weight: bolder" class="animated zoomIn"><span><img src="../assets/icons/bookshelf.svg" class="img- animated zoomIn" height="60" style="margin: 16px;"></span>SM<span style="color: brown">ART KI</span>DS.</h3>
                    
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a style="font-weight: bolder" href="./">Home</a></li>
                            <li><a style="font-weight: bolder" href="quiz_result.php">Result.</a></li>  
                        </ol>
                        <div class="col-lg-2" style="float: right;margin-top: 40px">
                            <a href="live_quiz.php">
                                <img src="../assets/icons/148766.svg" class="img- animated zoomIn" height="50"> 
                            </a> 
                        </div>
                        <div class="col-lg-2" style="float: right;color:#151B54;font-size: 100px;" id="demo">
                            <img src="../assets/icons/18-512.png" class="img-" height="100"
                                style="margin: 16px;">
                        </div>



                        <!-- begging -->
            <div class="col-lg-4" style="float: right;margin-top: 25px">
                <?php
                include '../database/config.php';
                $cgroups = mysqli_query($conn, "select * from tbl_group where status='1'");
                while ($lives = mysqli_fetch_array($cgroups)) {
                    $nw = $lives['exam_id'];
                }

                $user_details = mysqli_query($conn, "select * from tbl_users where groups_id='$nw' order by maths_quiz desc");
                while ($users_details = mysqli_fetch_array($user_details)) {
                    $user_id = $users_details['id'];
                    $firstname = $users_details['first_name'];
                    $lastname = $users_details['last_name'];
                    $score = $users_details['maths_quiz'];
                    $photo = $users_details['avatar'];

                    ?>
                   
                        <span class="img-quiz">
                            <h6><?php echo $score?></h6>
                            <?php print ' <img class="img-rounded" src="data:image/jpeg;base64,'.base64_encode($photo).'" height="80" alt=""/>' ?>
                            <h6><?php echo $firstname?></h6>
                        </span>
                    <?php
                }
                ?>
            </div>
<!-- begging -->
                    </div>
                </div>





             



<!-- showing selected questions -->

<div class="row">

                <div class="col-lg-11 center-block" id="">
                    <div id="kll"></div>

                    <center><h1 id="tim" style="display: none;font-weight: bolder"><img src="../assets/icons/question.svg" height="100"> Time out ...</h1></center>
                    <div class="timeoutq" style="display: none">
                        <center><img src="../assets/icons/1814975.svg" height="300"></center>
                    </div>





                    <div id="showq" style="margin: 25px;">
                        <?php
                       include '../database/config.php';
                       include 'includes/check_user.php'; 
                        //$route = $_POST['ee'];
                        $livesx = mysqli_query($conn, "SELECT * FROM tbl_lives");

                        while ($users_d = mysqli_fetch_array($livesx)) {
                            $question_id = $users_d['live'];
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
                          
                          <div style="margin:20px;">     
                            <h2><span style="font-weight: bolder;color: #000;"><?php echo $question; ?></h2>
                            <h2><span style="font-weight: bolder;color: #800517">A.</span> <?php echo "<span color='red'><b>"   . $option1 . "</b></span>"?></h2>
                            <h2><span style="font-weight: bolder;color: #800517">B.</span> <?php echo "<span color='red'><b>"   . $option2 . "</b></span>" ?></h2>
                            <h2><span style="font-weight: bolder;color: #800517">C.</span> <?php echo "<span color='red'><b>"   . $option3 . "</b></span>" ?></h2>
                            <h2><span style="font-weight: bolder;color: #800517">D.</span> <?php echo "<span color='red'><b>"   . $option4 . "</b></span>" ?></h2>
                          </div>

                            <input type="hidden" value="<?php echo $user_ide ?>" id="bvn">

                            <?php
                        }
                        ?>
                    </div>

                </div>

        </div>




<!-- showing selected questions -->





   








































                </div>   
            </div>
        </main>
		<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>
<div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <div class="cd-overlay"></div>
	

        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        
				<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<script>
            $(window).on("load",function(){
                $(".loader-wrapper").fadeOut("slow");
            });
        </script>









<script>
    $(".timeoutq").hide();
    $(document).ready(function () {


        var ee = $(this).attr("data-id");
        $('.vb').click(function () {
            var ee = $(this).attr("data-id");
            var gg = $(this).attr("data-g");

            //alert(gg);
            // alert(ee);
//
//            $.ajax({
//                url: "../inc/qul.php",
//                method: "POST",
//                data: {ee: ee, gg: gg},
//                success: function (data1) {
//                    event.preventDefault();
//
//                }
//            });

            $.ajax({
                url: "../pages/showq.php",
                method: "POST",
                data: {ee: ee},
                success: function (data) {
                    // event.preventDefault();
                    $('#showq').html(data);
                }
            });


        })

    });

    $(document).ready(function () {

        //javascript time increment
        var d1 = new Date(),
            d2 = new Date(d1);
        d2.setMinutes(d1.getMinutes() + 1);

        var d;
        d = new Date();
        (d.getMinutes() + ':' + d.getSeconds()); //11:55
        d.setSeconds(d.getSeconds() + 42);
        //alert(d.getMinutes() + ':0' + d.getSeconds()); //12:05


        var bvn = $('#bvn').val();
        // Set the date we're counting down to
        //var countDownDate = new Date("2019-02-23 00:21:48").getTime();
        var countDownDate = new Date(d).getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = seconds + "s";

            // If the count down is over, write some text
            if (distance < 0) {
                //clearInterval(x);
                document.getElementById("demo").innerHTML = "";
                $("#showq").remove();
                $(".timeoutq").show("slow");
                $("#tim").show("slow");
                $("#kll").hide("slow");


                $.ajax({
                    url: "removeq.php",
                    method: "POST",
                    success: function (data) {
                        event.preventDefault();
                        $('#showq').html(data);
                    }
                });


            }
        }, 1000);

    });


    //check position
    var answer_check = setInterval(function () {

        $.ajax({
            url: 'answer_c.php',
            method: "GET",
            success: function (data) {
                $('#kll').html(data);

            }
        });
        //clearInterval(score_test);

    }, 2000);


</script>











        
    </body>
</html>