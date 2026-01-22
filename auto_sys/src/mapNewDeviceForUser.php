<?php
session_start();
$usertId=$_SESSION['userId'];
$deviceId=$_POST['deviceId'];

include ('config/db_connection.php');
$selectDevc="SELECT * FROM tbl_device_list WHERE device_id='$deviceId';";
$devic=mysqli_query($conn,$selectDevc);
if($devic->num_rows<1){
    $erorM= 'This Device ID ('.$deviceId.') is not found';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; myDevices.php?status='.$erorM.'">';
    die();
}
$deviRowID=0;
while($row=mysqli_fetch_array($devic)){
        $deviRowID=$row['id'];
    }
$selectMapDevi="SELECT * FROM user_device_maping WHERE user_id='$usertId' and device_id='$deviRowID';";
$mappedDevic=mysqli_query($conn,$selectMapDevi);
if($mappedDevic->num_rows>0){
    $erorM= 'This Device ID ('.$deviceId.') is already Mapped';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; myDevices.php?status='.$erorM.'">';
    die();
}
$currntDat=date("Y/m/d");
$inserNewMap="INSERT INTO user_device_maping (user_id, device_id, maping_date) VALUES ('$usertId', '$deviRowID', '$currntDat');";

$result=mysqli_query($conn,$inserNewMap);
if(!$result){
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; myDevices.php?status='.mysqli_error($conn).'">';

    }else{
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; myDevices.php?status=success">';
    }

    mysqli_close($conn);
?>