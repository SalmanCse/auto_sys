<?php
$deviceId=$_POST['deviceId'];
$deviceType=$_POST['deviceType'];
$devicePorts=0;
$deviceTypeData=explode(",", $deviceType);;
include ('config/db_connection.php');
$selectPorts="SELECT COUNT(portno) as portno FROM tbl_portname WHERE device_type='$deviceTypeData[0]';";
$countedPorts=mysqli_query($conn,$selectPorts);
if(!$countedPorts){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
while($row=mysqli_fetch_array($countedPorts)){
    $devicePorts=$row['portno'];
}
$inserData="INSERT INTO tbl_device_list (device_id, device_type, device_ports) VALUES ('$deviceId', '$deviceTypeData[0]', '$devicePorts');";
$result=mysqli_query($conn,$inserData);

if(!$result){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
$lastID=$conn->insert_id;
$savedMessage="";
if($deviceTypeData[1]=='access'){
include ('insertNewAccessDevice.php');
$savedMessage=$isSavedAccessDevice;
}else if($deviceTypeData[1]=='environment'){
    include ('insertEnvironmentDevice.php');
    $savedMessage=$isSavedEnvrDevice;
}
else if($deviceTypeData[1]=='safety'){
    include ('insertSafetyDevice.php');
    $savedMessage=$isSavedSafetyDevice;
}else if($deviceTypeData[1]=='industrial'){
    include ('insertIndustrialDevice.php');
    $savedMessage=$isSavedIndstrlDevice;
}
// if($savedMessage!="success"){
//     echo $savedMessage;
//     $del="DELETE FROM tbl_device_list WHERE id ='$lastID';";
//     $delResult=mysqli_query($conn,$del);
// }else{
//     echo $savedMessage;
// }
if($result===true && $savedMessage=="success"){
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; newDevice.php?status=success">';
    }else{
        $del="DELETE FROM tbl_device_list WHERE id ='$lastID';";
    $delResult=mysqli_query($conn,$del);
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; newDevice.php?status=failed">';
    }
    mysqli_close($conn);
?>