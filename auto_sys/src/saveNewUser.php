<?php
$userName=$_POST['Username'];
$userEmail=$_POST['Email'];
$userPhone=$_POST['Phone'];
$userPassword=$_POST['Password'];

include ('config/db_connection.php');

$inserData="INSERT INTO tbl_user (userName, userPassword, userPhone, userEmail) VALUES ('$userName', '$userPassword', '$userPhone', '$userEmail');";
$result=mysqli_query($conn,$inserData);

if($result===true){
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ../register.php?status=success">';
    }else{
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ../register.php?status=failed">';
    }
    mysqli_close($conn);
?>