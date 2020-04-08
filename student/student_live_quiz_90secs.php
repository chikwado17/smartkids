<?php 
include '../student/includes/check_user.php'; 
include '../student/includes/check_reply.php';
include '../database/config.php';
if (isset($_GET['id'])) {




    $user_log = mysqli_real_escape_string($conn, $_GET['id']);	

    $sql = "SELECT * FROM tbl_users WHERE user_id = '$user_log'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
        $user_log =$row['user_id'];
        }
    } 	
    }

?>
<!DOCTYPE html>
<html>
    
<head>
        
    
        <title>PSIS | Live Quiz 90secs</title>
        
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
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        <style>
        .ques{
            font-size: 105px;
            margin: 24px;
            color: white;
            cursor: pointer;

        }
        .vb{
            width: 130px;
            height: 130px;
            cursor: pointer;
            border-radius: 70px;
            float: left;
            margin-right: 50px;
            margin-top: 22px;
            text-align: center;
            margin-bottom: 0px;

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
                        <a href="./" class="logo-text"><span><img width="50px" src="../admin/logo.png" alt=""></span></a>
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
                
                    <h3 style="font-weight: bolder" class="animated zoomIn"><span> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img- animated zoomIn" height="60" style="margin: 16px;">'?><?php echo $myfname ?>  <?php echo $mylname .'.' ?>
                    <?php 
                        $mysql = mysqli_query($conn, "SELECT * FROM tbl_users WHERE user_id ='$myid'");

                        while ($users_d = mysqli_fetch_array($mysql)) {
                            $maths_score = $users_d['maths_quiz'];
                            
                        }
                    
                    ?>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a style="font-weight: bolder" href="#">School : <?php echo $myschool_name ?></a></li> 
                            <li><a style="font-weight: bolder" href="#">Score : <?php echo $maths_score ?></a></li> 
                        </ol><br/>
                        <center style="float:right">    
                            <div class="vb" id="aa" data-id="1" style="background-color: #A21B67"><span class="ques">A</span></div>
                            <div class="vb" id="bb" data-id="2" style="background-color: #A21B67"><span class="ques">B</span></div>
                            <div class="vb" id="cc" data-id="3" style="background-color: #A21B67"><span class="ques">C</span></div>
                            <div class="vb" id="dd" data-id="4" style="background-color: #A21B67"><span class="ques">D</span></div>
                        </center>
                    </div>  
                </div>


                <div class="row">
                    <div class="col-lg-11">
                        <div id="showq" style="margin: 60px;">
                        </div>
                    </div>
                </div>                        


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

$(document).ready(function () {
    var timer = setInterval(function () {

        var ee=0;
        $.ajax({
            url: "../pages/showq.php",
            method: "GET",
            data: {ee: ee},
            success: function (data) {
                 //event.preventDefault();
                $('#showq').html(data);
            }
        });


    }, 1000);


    $('.vb').click(function () {
        var answer = $(this).attr("data-id");

        $.ajax({
            url: "ramquestion.php",
            method: "POST",
            data: {answer: answer},
            success: function (data) {
                // event.preventDefault();
                //$('#showq').html(data);

                var reset_q = setInterval(function () {
                    window.location.href='student_live_quiz_90secs.php';
                }, 1000);


            }
        });

    });


    $('#aa').click(function () {
        $("#aa").css("background-color","#58D0A6");
        $("#bb").hide("slow");
        $("#cc").hide("slow");
        $("#dd").hide("slow");

    });

    $('#bb').click(function () {
        $("#bb").css("background-color","#58D0A6");
        $("#aa").hide("slow");
        $("#cc").hide("slow");
        $("#dd").hide("slow");

    });

    $('#cc').click(function () {
        $("#cc").css("background-color","#58D0A6");
        $("#aa").hide("slow");
        $("#bb").hide("slow");
        $("#dd").hide("slow");

    });

    $('#dd').click(function () {
        $("#dd").css("background-color","#58D0A6");
        $("#aa").hide("slow");
        $("#bb").hide("slow");
        $("#cc").hide("slow");

    });



});


</script>





























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
    </body>
</html>