<?php
$tblRowID=$_GET['tblRowID'];
$portData=$_GET['port'];
include ('config/db_connection.php');

    $updatePort="UPDATE tbl_industrial_device SET portData=$portData WHERE id='$tblRowID';";
$result=mysqli_query($conn, $updatePort);
if(!$result){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}
if($result===true){
     echo '<META HTTP-EQUIV=REFRESH CONTENT="0; dashboard.php">';
    }else{
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; dashboard.php">';
    }
    mysqli_close($conn);
?>