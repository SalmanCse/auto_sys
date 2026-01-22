<?php
$lastInsertIdOfDeviceList=$lastID;
$totalPortOfDeviceType=$devicePorts;
$sql = "";
for($port=1; $port<=$totalPortOfDeviceType; $port++){
    $sql .= "INSERT INTO tbl_access_device (device_id, port_no)
    VALUES ('$lastInsertIdOfDeviceList', '$port');";
}
$isSavedAccessDevice="";
if ($conn->multi_query($sql) === TRUE) {
    $isSavedAccessDevice="success";
} else {
    $isSavedAccessDevice ="Failed to save Access Device for - ". $conn->error;
}
?>