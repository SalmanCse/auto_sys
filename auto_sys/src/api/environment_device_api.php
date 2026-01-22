<?php
include ('../config/db_connection.php');

    $var=json_decode(file_get_contents('php://input'),true);
    //print_r($var);
    $deviceID=$var['device_id'];
    $hum=$var['hum'];
    $tem=$var['temp'];
    $co2=$var['co'];
    $gas=$var['gas'];
    $response=array();

    $deviceCheck="SELECT * FROM tbl_environment_device where device_id = $deviceID";
    $deviceQuery=mysqli_query($conn,$deviceCheck);
    $rowdata=mysqli_fetch_array($deviceQuery);

    if (!empty($rowdata)){
        $hum=$var['hum'];
        $read_switch_state="UPDATE tbl_environment_device SET port_data=$hum WHERE device_id=$deviceID and ports=1";
        $updateQuery=mysqli_query($conn,$read_switch_state);
        if (!$updateQuery){
            die("Not updated: ".mysqli_error($conn));
            $response=array(" Not updated success fully");
        }else{
            $temp=$var['temp'];
            $update="UPDATE tbl_environment_device SET port_data=$temp WHERE device_id=$deviceID and ports=2";
            $updateQuery=mysqli_query($conn,$update);
            if (!$updateQuery){
                die("Not updated: ".mysqli_error($conn));
                $response=array(" Not updated success fully");
            }else{
                $co2=$var['co'];
                $update="UPDATE tbl_environment_device SET port_data=$co2 WHERE device_id=$deviceID and ports=3";
                $updateQuery=mysqli_query($conn,$update);
                if (!$updateQuery){
                    die("Not updated: ".mysqli_error($conn));
                    $response=array(" Not updated success fully");
                }else{
                    $gas=$var['gas'];
                    $update="UPDATE tbl_environment_device SET port_data=$gas WHERE device_id=$deviceID and ports=4";
                    $updateQuery=mysqli_query($conn,$update);
                    if (!$updateQuery){
                        die("Not updated: ".mysqli_error($conn));
                        $response=array(" Not updated success fully");
                    }else{
                        $response=array("updated success fully");
                    }
                }
            }
        }

    }else{
        $response=array(" Not updated success fully");
    }
    echo json_encode($response);
?>