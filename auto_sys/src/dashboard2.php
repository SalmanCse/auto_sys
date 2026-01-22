<?php include "../template/topbar.php";
include ('config/db_connection.php');
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
            <div class="col-md-1 col-sm-1 col-xs-0 left-col ">

            </div><!--  right col end  -->

            <div class="col-md-10 col-sm-10 col-xs-12 mid-col">
                <h2 style="color: #fff; border-bottom: 2px solid red; ">Device Control pannel</h2>

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
                    $userID=$_SESSION['userId'];
                    $UserToDevice="SELECT * FROM `user_device_maping`WHERE  `user_id`='$userID'";
                    $storeUserToDevice = mysqli_query($conn,$UserToDevice);
                    $indexCounter=0;

                    while($realdevice= mysqli_fetch_array($storeUserToDevice)){

                        $deviceID = $realdevice['device_id'];
                        $deviceStatus="SELECT * FROM `tbl_industrial_device`WHERE `deviceID`='$deviceID'";
                        $storedeviceStatus = mysqli_query($conn,$deviceStatus);
                        while ($realDeviceStatus= mysqli_fetch_array($storedeviceStatus)) {
                            $indexCounter++;
                            ?>
                            <tr>
                                <td><?php echo $indexCounter; ?></td>
                                <td><?php echo $realDeviceStatus['deviceID'];?></td>
                                <td><?php echo $realDeviceStatus['ports'];?></td>
                                <td><?php echo $realDeviceStatus['portData'];?></td>
                                <td>
                                    <a href="industrialSwitch.php?deviceID=
                                    <?php echo $realDeviceStatus['deviceID']; ?>,port=
                                    <?php echo $realDeviceStatus['port']; ?>">
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
                    }
                    $indexCounter=0;
                    ?>
                    </tbody>
                </table>
            </div><!--  mid col end  -->

            <div class="col-md-1 col-sm-1 col-xs-0 right-col"></div><!--  left col end  -->
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