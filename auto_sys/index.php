<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Home</title>
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
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="template/css/font.css" type="text/css" />
	<link href="template/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="template/css/morris.css" type="text/css" />
	<!-- calendar -->
	<link rel="stylesheet" href="css/monthly.css" />
	<script src="template/js/jquery2.0.3.min.js"></script>
	<script src="template/js/raphael-min.js"></script>
	<script src="template/js/morris.js"></script>
	<script src="template/js/jquery.min.js"></script>
	<script src="template/js/bootstrap.js"></script>
</head>

<body>
	<div class="log-w3">
		<!---728x90--->
		<div class="w3layouts-main">
			<h2>Sign In Now </h2>
			<form action="src/checkUser.php" method="post">
				<input type="text" class="ggg" name="Username" placeholder="USERNAME" required="" />
				<input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="" />
				<span><input type="checkbox" />Remember Me </span>
				<h6><a href="#">Forgot Password? </a></h6>
				<div class="clearfix"></div>
				<span style="width:  100%;color: #940808;font-size:  1.3em;">
					<?php
				 if(!empty($_GET['login'])){
				 $message=$_GET['login'];
				 if($message==='failed'){
					 echo 'Username and password mismatch';
				 }
				 }
				 ?>
				</span>
				<input type="submit" value="Sign In" name="login" />
				<h6><a href="register.php">Register Now </a></h6>
			</form>
		</div>
		<!---728x90--->
	</div>
</body>

</html>