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
        
    
        <title>PSIS | Live Quiz</title>
        
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
                font-size: 65px;
                margin: 18px;
                color: white;
                cursor: pointer;
            }
            .ques1 {
                font-size: 35px;
                margin: 10px;
                color: white;
                cursor: pointer;
            }
            .vb {
                width: 100px;
                height: 100px;
                background-color: #117273;
                border-radius: 100px;
                float: left;
                margin:5px;
                cursor: pointer;
                box-shadow: 4px 3px 4px #117273;
            }

            .vb1 {
                width: 60px;
                height: 60px;
                background-color: brown;
                border-radius: 50px;
                float: left;
                margin: 5px;
                cursor: pointer;
            }
            .vb :hover{
                width: 100px;
                height: 100px;
                background-color: #117273;
                border-radius: 90px;
                float: left;
                margin: 8px;
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
            <div class="col-lg-7" style="float: right;color: red;font-size: 60px;" id="demo">
                    <img src="../assets/icons/18-512.png" class="img- animated zoomIn" height="100" style="margin: 1px;">  
                </div>
                <div class="page-title">
                
                    <h3 style="font-weight: bolder" class="animated zoomIn"><span><img src="../assets/icons/bookshelf.svg" class="img- animated zoomIn" height="60" style="margin: 16px;"></span>SM<span style="color: brown">ART KI</span>DS.</h3>
                    
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a style="font-weight: bolder" href="./">Home</a></li>
                            <li><a style="font-weight: bolder" href="group.php">Result.</a></li>
                            
                        </ol>
                           
                          



                            <div class="col-lg-4" style="float: right;">
                                <?php
                                        include '../database/config.php';
                                        $sql = mysqli_query($conn, "select * from tbl_group where status='1'");
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $nw_id = $row['exam_id'];
                                        }

                                        $user_details = mysqli_query($conn, "select * from tbl_users where groups_id='$nw_id' order by maths_quiz desc");
                                        while ($row = mysqli_fetch_array($user_details)) {
                                            $user_id = $row['user_id'];
                                            $firstname = $row['first_name'];
                                            $lastname = $row['last_name'];
                                            $score = $row['maths_quiz'];
                                            $photo = $row['avatar'];

                                            
                                            
                                            ?>
                                                <span class="img-quiz">
                                                <h6><?php echo 'score '. $score?></h6>
                                                    <?php print ' <img class="img-rounded" src="data:image/jpeg;base64,'.base64_encode($photo).'" height="70" alt=""/>' ?>
                                                    <h6><?php echo $firstname?></h6>
                                                    
                                                </span>
                                            <?php
                                        }
                                    ?>
                            </div>


                            
                    </div>  
                </div>

















  




<!-- showing un answered questions with answer -->
       <hr>        
    <div class="row">
        <center>
            <div class="col-lg-12" style="margin-right: 10px;">
                <?php
                include '../database/config.php';
                $pend1 = mysqli_query($conn, "update tbl_lives set user_answer=0, live=0, qa=0 where id='1'");

                $sql = mysqli_query($conn, "SELECT * FROM tbl_qt WHERE exam_id='$nw_id' and status='0'");

                while ($row = mysqli_fetch_array($sql)) {
                        $nw1 = $row['id'];
                        $qpostion = $row['qpostion'];
                        $qanswer = $row['answer'];
                    ?>
                        <div style="margin:20px">
                            <div class="vb animated zoomIn" data-id="<?php echo $nw1; ?>" data-g="<?php echo $nw_id;  ?>" data-an="<?php echo $qanswer; ?>"><span class="ques"><?php echo $qpostion; ?></span></div>
                        </div>
                    <?php
                }
                ?>

            </div>
        </center>
    </div>
<hr>
<!-- showing un answered questions with answer -->



<!-- showing answered questions with answer -->
<div class="row">
    <center>
        <div class="col-lg-12" style="margin-right: 10px;">
            <?php

            $sql = mysqli_query($conn, "SELECT * FROM tbl_qt WHERE exam_id='$nw_id' and status='1'");
            while ($row = mysqli_fetch_array($sql)) {
                $nw1 = $row['id'];
                $qpostion = $row['qpostion'];
                $qanswer = $row['answer'];
                ?>
                    <div style="margin:20px">
                        <div class="vb1 animated zoomIn"  data-id="<?php echo $nw1; ?>" data-g="<?php echo $nw_id;  ?>" data-an="<?php echo $qanswer; ?>"><span class="ques1"><?php echo $qpostion; ?></span></div>
                    </div>
                <?php
            }
            ?>

        </div>
    </center>
</div>
<!-- showing answered questions with answer -->





































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
    $(document).ready(function(){
        //var ee = $(this).attr("data-id");
        $('.vb').click(function () {
            var ee = $(this).attr("data-id");
            var gg = $(this).attr("data-g");
            var ans = $(this).attr("data-an");

        //    alert(gg);
        //    alert(ee);
//           alert(ans);

            $.ajax({
                url: "qul.php",
                method: "POST",
                data: {ee: ee,gg: gg,ans: ans},
                success: function (data1) {
                    // event.preventDefault();
                    window.location.href='show_quiz_live.php';

                }
            });

            $.ajax({
                url: "../pages/showq.php",
                method: "POST",
                data: {ee: ee},
                success: function (data) {
                   // event.preventDefault();
                    $('#showq').html(data);
                }
            });



            });

    });
</script>



<script>
    if(setViewBox(allow)){

    }
</script>



















        
    </body>
</html>