<?php
$lastInsertIdOfDeviceList=$lastID;
$totalPortOfDeviceType=$devicePorts;
$sql = "";
for($port=1; $port<=$totalPortOfDeviceType; $port++){
    $sql .= "INSERT INTO tbl_environment_device (device_id, ports)
    VALUES ('$lastInsertIdOfDeviceList', '$port');";
}
$isSavedEnvrDevice="";
if ($conn->multi_query($sql) === TRUE) {
    $isSavedEnvrDevice="success";
} else {
    $isSavedEnvrDevice ="Failed to save Access Device for - ". $conn->error;
}
?>