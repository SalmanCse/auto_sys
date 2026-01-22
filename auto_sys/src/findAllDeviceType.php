<?php
include ('config/db_connection.php');

$str="SELECT * FROM tbl_device_type;";
$allDeviceType=mysqli_query($conn, $str);
if(!$allDeviceType){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}

?>