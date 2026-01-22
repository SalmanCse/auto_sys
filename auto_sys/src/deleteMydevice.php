<?php

$id = $_GET['id'];


$conn = mysqli_connect('localhost', 'root', '', 'auto_sys');

$sql = "DELETE FROM user_device_maping WHERE id = $id";
    if(mysqli_query($conn, $sql)) {
        header("Location: myDevices.php");

    } else {
        echo "No Deleted";
    }