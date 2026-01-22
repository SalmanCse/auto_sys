<?php
$lastInsertIdOfDeviceList=$lastID;
$totalPortOfDeviceType=$devicePorts;
$sql = "";
for($port=1; $port<=$totalPortOfDeviceType; $port++){
    $sql .= "INSERT INTO tbl_safety_device (device_id, ports)
    VALUES ('$lastInsertIdOfDeviceList', '$port');";
}
$isSavedSafetyDevice="";
if ($conn->multi_query($sql) === TRUE) {
    $isSavedSafetyDevice="success";
} else {
    $isSavedSafetyDevice ="Failed to save Access Device for - ". $conn->error;
}
?>