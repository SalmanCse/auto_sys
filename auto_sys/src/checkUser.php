<?php
session_start();
$userName=$_POST['Username'];
$userPassword=$_POST['Password'];

include ('config/db_connection.php');

$str="SELECT * FROM tbl_user Where userName='$userName' AND userPassword='$userPassword';";
$result=mysqli_query($conn, $str);
if(!$result){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
if ($result->num_rows < 1) {
	echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ../index.php?login=failed">';
	exit;
}
$isValidUser=false;
 while($row=mysqli_fetch_array($result)) {
		if($row['userName']===$userName){
		$isValidUser=true;
	$_SESSION['userEmail'] = $row['userEmail'];
	$_SESSION['userId'] = $row['id'];
	$_SESSION['userName'] = $row['userName'];
	$_SESSION['userPhone'] = $row['userPhone'];
	$_SESSION['userRole'] = $row['userRole'];
	}
 }

if($isValidUser===true){
	header("Location: dashboard.php");
}else{
	echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ../index.php?login=failed">';
}
?>