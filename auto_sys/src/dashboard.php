<?php include "../template/topbar.php";
include ('config/db_connection.php');
$userID=$_SESSION['userId'];
$queryIndustrial="SELECT tid.id, tdl.device_id, tid.ports, tid.portData 
FROM tbl_industrial_device as tid
INNER JOIN user_device_maping as udm ON udm.device_id=tid.deviceID
INNER JOIN tbl_device_list as tdl ON tdl.id=udm.device_id
WHERE udm.user_id='$userID'";
$storedeviceStatus = mysqli_query($conn,$queryIndustrial);

$queryEnvirnmntal="SELECT ted.id, tdl.device_id, tdt.device_types, tp.device_portname, ted.ports, ted.port_data
FROM tbl_environment_device as ted
INNER JOIN user_device_maping as udm ON udm.device_id=ted.device_id
INNER JOIN tbl_device_list as tdl ON tdl.id=udm.device_id
INNER JOIN tbl_device_type as tdt ON tdt.id=tdl.device_type
INNER JOIN tbl_portname as tp ON tp.device_type=tdt.id AND tp.portno=ted.ports
WHERE udm.user_id='$userID'";

$envrnmntalData = mysqli_query($conn,$queryEnvirnmntal);

?>
<!--main content start-->
<style>
	.market-updates h4 a {
		color: white !important;
	}

	.market-updates h4 a:hover {
		color: blue !important;
	}
</style>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-12 w3ls-graph">
				<div class="agileinfo-grap">
					<div class="agileits-box" style="text-align: center;">
						<div class="toolbar">
							Hello,
							<?php echo $_SESSION['userName']; ?>
						</div>
						<header class="agileits-box-header clearfix">
							<h3>Welcome to Auto Sys </h3>
						</header>
						<div class="agileits-box-body clearfix">
							<div id="hero-area">
								You are logged as <?php echo $_SESSION['userRole']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="agil-info-calendar" style="margin-right: -15px; margin-left: -15px; margin-top: 10px;">
		 <!-- calendar -->
		 <div class="col-md-6 agile-calendar">
			 <div class="calendar-widget" style="padding: 1em;">
                 <div class="panel-heading ui-sortable-handle">
					 <span class="panel-icon">
                       <i class="fa fa-cloud"></i>
                     </span>
                     <span class="panel-title"> Environmental Device</span>
                 </div>
				 <!-- grids -->
				 <?php
							 while ($envRow= mysqli_fetch_array($envrnmntalData)) {
							 ?>
				 <div class="alert alert-info clearfix">
							 
							 <div class="col-md-9">
								 <span><?php echo $envRow['device_portname']?></span>
							 </div>
							 <div class="col-md-3" style="text-align: center;">
							 <span class="alert-icon" style="width: 50px; height: 50px; font-size: 30px;color: white;">
							 <?php echo $envRow['port_data']?>
							</span>
							 </div>
						 </div>
						 <?php } ?>
			 </div>
		 </div>
		 <!-- //calendar -->
		 <div class="col-md-6 w3agile-notifications">
			 <div class="notifications" style="padding: 1em;">
				 <!--notification start-->
				
					 <header class="panel-heading">
					 
					 <span class="panel-icon">
                       <i class="fa fa-cogs"></i>
                     </span>
                     <span class="panel-title">Device Control </span>
					 </header>
					 <div class="notify-w3ls">
					 <table class="table" style=" color: #fff;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Device ID</th>
                        <th>Port No.</th>
                        <th>Status</th>
                        <th>Switch</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- Devices -->
                    <?php
                    
                    $indexCounter=0;

                        while ($realDeviceStatus= mysqli_fetch_array($storedeviceStatus)) {
                            $indexCounter++;
                            ?>
                            <tr>
                                <td><?php echo $indexCounter; ?></td>
                                <td><?php echo $realDeviceStatus['device_id'];?></td>
                                <td><?php echo $realDeviceStatus['ports'];?></td>
                                <td><?php if ($realDeviceStatus['portData']==0) {
                                                echo "Inactive";
                                            }
                                            if ($realDeviceStatus['portData']==1) {
                                                echo "Active";
                                            }?></td>
                                <td>
                                    <a href="industrialSwitch.php?tblRowID=
                                    <?php echo $realDeviceStatus['id']; ?>&port=
                                    <?php if ($realDeviceStatus['portData']==0) {
                                                echo "1";
                                            }
                                            if ($realDeviceStatus['portData']==1) {
                                                echo "0";
                                            } ?>">
                                        <h5 style="border-left:2px solid red;">
                                            <?php
                                            if ($realDeviceStatus['portData']==0) {
                                                echo "ON";
                                            }
                                            if ($realDeviceStatus['portData']==1) {
                                                echo "OFF";
                                            }
                                            ?></h5></a>
                                </td>
                            </tr>
                            <?php
                        }
                    $indexCounter=0;
                    ?>
                    </tbody>
                </table>
					 </div>
				
				 <!--notification end-->
				 </div>
			 </div>
			 <div class="clearfix">  </div>
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