
<?php
    include ('../config/db_connection.php');
    $deviceID=$_GET['id'];
    $read_switch_state="SELECT * FROM `tbl_industrial_device` where deviceID = $deviceID";
    $readQuery=mysqli_query($conn,$read_switch_state);
    $response=array();
    $count=0;
    while ($rowdata=mysqli_fetch_array($readQuery)) {
        $response[$count]=array("deviceId"=>$rowdata['deviceID'],"port_no"=>$rowdata['ports'],"status"=>$rowdata['portData']);
        $count++;
    }
    echo json_encode($response);
?>