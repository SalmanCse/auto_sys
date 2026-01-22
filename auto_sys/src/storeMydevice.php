<?php
$user_id = $_POST['user_id'];
$device_id = $_POST['device_id'];
$maping_date = $_POST['maping_date'];


$conn = mysqli_connect('localhost', 'root', '','auto_sys');

$sql = "INSERT INTO user_device_maping VALUES(NULL, '$user_id', '$device_id','$maping_date')";

//varchar gulo 'single quotation er moddhe',,int e quotation hobe na
//$sql = "INSERT INTO `students`(`id`, `class_id`, `name`, `age`, `roll`, `address`, `mobile`)";
if(mysqli_query($conn, $sql)) {
    //echo "Insert successfully";
    header("Location: myDevices.php");
} else {
    echo "Not inserted";
}

?>