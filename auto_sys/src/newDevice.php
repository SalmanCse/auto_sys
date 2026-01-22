<?php include "../template/topbar.php";
include ('findAllDeviceType.php');

?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Add New Device
					</header>
					<div class="panel-body">
						<div class="position-center">
							<form method="POST" action="saveNewDevice.php">

								<div class="form-group">
									<label for="deviceId">Device ID </label>
									<input type="text" class="form-control" name="deviceId" id="deviceId"
										placeholder="Device ID" required />
								</div>

								<div class="form-group">
									<label for="deviceType">Device Type </label>
									<select name="deviceType" id="deviceType" class="form-control" required>
										<option>Select Device Type</option>
										<?php
									 while($row=mysqli_fetch_array($allDeviceType)){
										 echo '<option value='.$row['id'].','.$row['device_types'].'>'.$row['device_types'].'</option>';
									 }
									 ?>
									</select>
								</div>

								<div class="form-group" style="text-align: center;">
									<button type="submit" class="btn btn-info">Save Device </button>
								</div>

							</form>
							<?php

	if(!empty($_GET['status'])){
				 $message=$_GET['status'];
				 if($message==='success'){
					 echo "<script type='text/javascript'>alert('Device added successfully!')</script>";
				 }else{
					 echo "<script type='text/javascript'>alert('failed!')</script>";
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