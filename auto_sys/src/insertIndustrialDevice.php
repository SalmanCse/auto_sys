<?php
$lastInsertIdOfDeviceList=$lastID;
$totalPortOfDeviceType=$devicePorts;
$sql = "";
for($port=1; $port<=$totalPortOfDeviceType; $port++){
    $sql .= "INSERT INTO tbl_industrial_device (deviceID, ports)
    VALUES ('$lastInsertIdOfDeviceList', '$port');";
}
$isSavedIndstrlDevice="";
if ($conn->multi_query($sql) === TRUE) {
    $isSavedIndstrlDevice="success";
} else {
    $isSavedIndstrlDevice ="Failed to save Access Device for - ". $conn->error;
}
?>