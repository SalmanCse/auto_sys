<?php
session_start();
$profileId=$_POST['profileId'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$address=$_POST['address'];
$nid=$_POST['nid'];
$usertId=$_SESSION['userId'];
include ('config/db_connection.php');

$insertOrUpdate="";
if($profileId==0){
    $insertOrUpdate="INSERT INTO tbl_user_profile (firstname, lastname, address, latitude, longitude, nid_number, userId) 
    VALUES ('$firstName', '$lastName', '$address', 0, 0, '$nid', '$usertId');";
}else{
    $insertOrUpdate="UPDATE tbl_user_profile SET firstname='$firstName', lastname='$lastName', address='$address', nid_number='$nid' 
    WHERE id='$profileId' AND userId='$usertId';";
}
$result=mysqli_query($conn, $insertOrUpdate);
if(!$result){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
if($result===true){
     echo '<META HTTP-EQUIV=REFRESH CONTENT="0; updateUserInfo.php?status=success">';
    }else{
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; updateUserInfo.php?status=failed">';
    }
    mysqli_close($conn);
?>