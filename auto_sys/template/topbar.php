<?php 
session_start();
if($_SESSION['userEmail']===null){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- bootstrap-css -->
 <link rel="stylesheet" href="../template/css/bootstrap.min.css" />
 <!-- //bootstrap-css -->
 <!-- Custom CSS -->
 <link href="../template/css/style.css" rel='stylesheet' type='text/css' />
 <link href="../template/css/style-responsive.css" rel="stylesheet" />
 <!-- font-awesome icons -->
 <link rel="stylesheet" href="../template/css/font.css" type="text/css" />
 <link href="../template/css/font-awesome.css" rel="stylesheet" /> 
 <link rel="stylesheet" href="../template/css/morris.css" type="text/css" />
 <!-- calendar -->
 <link rel="stylesheet" href="../template/css/monthly.css" />
 <script src="../template/js/jquery2.0.3.min.js"></script>
 <script src="../template/js/raphael-min.js"></script>
 <script src="../template/js/morris.js"></script>
 <script src="../template/js/jquery.min.js"></script>
 <script src="../template/js/bootstrap.js"></script>
 <style>
 thead{background: #c3d9ec;}
 th{color: #5a5757 !important;
    font-size: medium !important;}
 </style>
 </head>
 <body>
 <section id="container">
 <!--header start-->
 <header class="header fixed-top clearfix">
 <!--logo start-->
 <div class="brand">
     <a href="index.html" class="logo">
        AUTO SYS
     </a>
     <div class="sidebar-toggle-box">
         <div class="fa fa-bars"></div>
     </div>
 </div>
 <!--logo end-->
 <div class="nav notify-row" id="top_menu">
     <!--  notification start -->
     <ul class="nav top-menu">
         <!-- settings start -->
         <li class="dropdown">
             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                 <i class="fa fa-tasks"></i>
                 <span class="badge bg-success">8 </span>
             </a>
             <ul class="dropdown-menu extended tasks-bar">
                 <li>
                     <p class="">You have 8 pending _____ </p>
                 </li>
                 <li>
                     <a href="#">
                         <div class="task-info clearfix">
                             <div class="desc pull-left">
                                 <h5>Target Sell </h5>
                                 <p>25% , Deadline  12 June�13 </p>
                             </div>
                                     <span class="notification-pie-chart pull-right" data-percent="45">
                             <span class="percent"></span>
                             </span>
                         </div>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <div class="task-info clearfix">
                             <div class="desc pull-left">
                                 <h5>Product Delivery </h5>
                                 <p>45% , Deadline  12 June�13 </p>
                             </div>
                                     <span class="notification-pie-chart pull-right" data-percent="78">
                             <span class="percent"></span>
                             </span>
                         </div>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <div class="task-info clearfix">
                             <div class="desc pull-left">
                                 <h5>Payment collection </h5>
                                 <p>87% , Deadline  12 June�13 </p>
                             </div>
                                     <span class="notification-pie-chart pull-right" data-percent="60">
                             <span class="percent"></span>
                             </span>
                         </div>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <div class="task-info clearfix">
                             <div class="desc pull-left">
                                 <h5>Target Sell </h5>
                                 <p>33% , Deadline  12 June�13 </p>
                             </div>
                                     <span class="notification-pie-chart pull-right" data-percent="90">
                             <span class="percent"></span>
                             </span>
                         </div>
                     </a>
                 </li>

                 <li class="external">
                     <a href="#">See All Tasks </a>
                 </li>
             </ul>
         </li>
         <!-- settings end -->
         <!-- inbox dropdown start-->
         <li id="header_inbox_bar" class="dropdown">
             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                 <i class="fa fa-envelope-o"></i>
                 <span class="badge bg-important">4 </span>
             </a>
             <ul class="dropdown-menu extended inbox">
                 <li>
                     <p class="red">You have 4 Mails </p>
                 </li>
                 <li>
                     <a href="#">
                         <span class="photo"><img alt="avatar" src="images/3.png" /></span>
                                 <span class="subject">
                                 <span class="from">Jonathan Smith </span>
                                 <span class="time">Just now </span>
                                 </span>
                                 <span class="message">
                                    Hello, this is __ example msg.
                                 </span>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <span class="photo"><img alt="avatar" src="images/1.png" /></span>
                                 <span class="subject">
                                 <span class="from">Jane Doe </span>
                                 <span class="time">2 min ago </span>
                                 </span>
                                 <span class="message">
                                    Nice admin template
                                 </span>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <span class="photo"><img alt="avatar" src="images/3.png" /></span>
                                 <span class="subject">
                                 <span class="from">Tasi sam </span>
                                 <span class="time">2 days ago </span>
                                 </span>
                                 <span class="message">
                                    This is an _______ msg.
                                 </span>
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <span class="photo"><img alt="avatar" src="images/2.png" /></span>
                                 <span class="subject">
                                 <span class="from">Mr. Perfect </span>
                                 <span class="time">2 hour ago </span>
                                 </span>
                                 <span class="message">
                                    Hi there, its _ test
                                 </span>
                     </a>
                 </li>
                 <li>
                     <a href="#">See all messages </a>
                 </li>
             </ul>
         </li>
         <!-- inbox dropdown end -->
         <!-- notification dropdown start-->
         <li id="header_notification_bar" class="dropdown">
             <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                 <i class="fa fa-bell-o"></i>
                 <span class="badge bg-warning">3 </span>
             </a>
             <ul class="dropdown-menu extended notification">
                 <li>
                     <p>Notifications </p>
                 </li>
                 <li>
                     <div class="alert alert-info clearfix">
                         <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                         <div class="noti-info">
                             <a href="#"> Server #1 overloaded. </a>
                         </div>
                     </div>
                 </li>
                 <li>
                     <div class="alert alert-danger clearfix">
                         <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                         <div class="noti-info">
                             <a href="#"> Server #2 overloaded. </a>
                         </div>
                     </div>
                 </li>
                 <li>
                     <div class="alert alert-success clearfix">
                         <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                         <div class="noti-info">
                             <a href="#"> Server #3 overloaded. </a>
                         </div>
                     </div>
                 </li>

             </ul>
         </li>
         <!-- notification dropdown end -->
     </ul>
     <!--  notification end -->
 </div>
 <div class="top-nav clearfix">
     <!--search & user info start-->
     <ul class="nav pull-right top-menu">
         <li>
             <input type="text" class="form-control search" placeholder=" Search" />
         </li>
         <!-- user login dropdown start-->
         <li class="dropdown">
             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
			 
			 <?php 
			 $email = $_SESSION['userEmail'];
			 echo '<img src="images/profile-avater.png"/>';
                echo '<span class="username">'.$email.'</span>';
				 ?>
                 <b class="caret"></b>
             </a>
             <ul class="dropdown-menu extended logout">
                 <li><a href="userShow.php"><i class=" fa fa-suitcase"></i>Profile </a></li>
				 <li><a href="updateUserInfo.php"><i class=" fa fa-suitcase"></i>Edit Profile </a></li>
                 <li><a href="#"><i class="fa fa-cog"></i> Change Password </a></li>
                 <li><a href="logout.php"><i class="fa fa-key"></i> Log Out </a></li>
             </ul>
         </li>
         <!-- user login dropdown end -->
       
     </ul>
     <!--search & user info end-->
 </div>
 </header>
 <!--header end-->
 
 <?php 
 include "../template/sidebar.php";   
 ?>