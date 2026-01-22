<?php include "../template/topbar.php";
include ('config/db_connection.php');
$usertId=$_SESSION['userId'];
$queryUser="SELECT * FROM tbl_user_profile WHERE userId='$usertId';";
$userResult=mysqli_query($conn, $queryUser);
if(!$userResult){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
$profileId=0;
$firstName="";
$lastName="";
$address="";
$nid="";
while($row=mysqli_fetch_array($userResult)) {
	$profileId=$row['id'];
	$firstName=$row['firstname'];
	$lastName=$row['lastname'];
	$address=$row['address'];
	$nid=$row['nid_number'];
}
?>

<!--main content start-->
 <section id="main-content">
	 <section class="wrapper">
	 <div class="row">
             <div class="col-lg-12">
			 <section class="panel">
                         <header class="panel-heading">
							Update Your Info
                         </header>
                         <div class="panel-body">
                             <div class="position-center">
                                 <form method="POST" action="saveUpdatedUserInfo.php">
								 <input type="hidden" name="profileId" id="profileId" value='<?php echo $profileId; ?>'/>
								 <div class="form-group">
                                     <label >Username </label>
                                     <input type="text" class="form-control" name="userName" id="userName" value='<?php echo $_SESSION['userName']; ?>'
									 required disabled/>
                                 </div>
								 <div class="form-group">
                                     <label >Email </label>
                                     <input type="text" class="form-control" name="email" id="email" value='<?php echo $_SESSION['userEmail']; ?>'
									 required disabled/>
                                 </div>
								 <div class="form-group">
                                     <label >Phone </label>
                                     <input type="text" class="form-control" name="phone" id="phone" value='<?php echo $_SESSION['userPhone']; ?>'
									 required disabled/>
                                 </div>
								 <div class="form-group">
                                     <label for="firstName">First Name </label>
                                     <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" 
									 value='<?php echo $firstName; ?>'
									 required/>
                                 </div>
								
                                 <div class="form-group">
                                     <label for="lastName">Last Name </label>
                                     <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter First Name" 
									 value='<?php echo $lastName; ?>' required/>
                                 </div>
								 <div class="form-group">
                                     <label for="address">Address</label>
                                     <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" 
									 value='<?php echo $address; ?>' required/>
                                 </div>
								 <div class="form-group">
                                     <label for="nid">NID</label>
                                     <input type="text" class="form-control" name="nid" id="nid" placeholder="Enter NID" 
									 value='<?php echo $nid; ?>' required/>
                                 </div>
								
								 <div class="form-group" style="text-align: center;">
                                     <button type="submit" class="btn btn-info">Update</button>
                                 </div>
                                 
                             </form>
							 <?php

	if(!empty($_GET['status'])){
				 $message=$_GET['status'];
				 if($message==='success'){
					 echo "<script type='text/javascript'>alert('Profile Update successfully done!')</script>";
				 }else{
					 echo "<script type='text/javascript'>alert('Failed!')</script>";
				 }
				 }
   
  ?>

                             </div>

                         </div>
                     </section>

			 </div>
			 </div>
             </section>
	<!-- footer -->
	<?php include "../template/footer.php";   ?>
	<!-- / footer -->
</section>
<!--main content end-->

</section>
</body>

</html>