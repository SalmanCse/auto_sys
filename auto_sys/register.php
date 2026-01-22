<!DOCTYPE html>
<html>

<head>
    <title>Registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="template/css/bootstrap.min.css" />
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="template/css/style.css" rel='stylesheet' type='text/css' />
    <link href="template/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='../../../../../../../fonts.googleapis.com/css_8db574ae.css' rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="template/css/font.css" type="text/css" />
    <link href="template/css/font-awesome.css" rel="stylesheet" />
    <!-- //font-awesome icons -->
    <script src="template/js/jquery2.0.3.min.js"></script>
</head>

<body>
    <div class="reg-w3">

        <div class="w3layouts-main">
            <h2>Register Now </h2>
            <form action="src/saveNewUser.php" method="post">
                <input type="text" class="ggg" name="Username" placeholder="USERNAME" required="" />
                <input type="email" class="ggg" name="Email" placeholder="E-MAIL" required="" />
                <input type="text" class="ggg" name="Phone" placeholder="PHONE" required="" />
                <input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="" />

                <div class="clearfix"></div>
                <input type="submit" value="submit" name="register" />
            </form>
            <p>Already Registered. <a href="index.php">Login </a></p>

            <?php

	if(!empty($_GET['status'])){
				 $message=$_GET['status'];
				 if($message==='success'){
					 echo "<script type='text/javascript'>alert('Registration Successful!')</script>";
				 }else{
					 echo "<script type='text/javascript'>alert('Failed!')</script>";
				 }
				 }
   
  ?>
        </div>

    </div>
    <script src="template/js/bootstrap.js"></script>
    <script src="template/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="template/js/scripts.js"></script>
    <script src="template/js/jquery.slimscroll.js"></script>
    <script src="template/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="template/js/jquery.scrollTo.js"></script>
</body>

</html>