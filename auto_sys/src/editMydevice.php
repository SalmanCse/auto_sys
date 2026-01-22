<?php

include "../template/topbar.php";
include ('config/db_connection.php');
$usertId=$_SESSION['user_id'];
$queryUser="SELECT * FROM user_device_maping WHERE user_id='$user_id';";
$userResult=mysqli_query($conn, $queryUser);


    
  $id = $_GET['id'];    

  $conn = mysqli_connect('localhost', 'root', '', 'auto_sys');

  $sql = "SELECT * FROM user_device_maping WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  $std = mysqli_fetch_assoc($result);

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Auto System</title>
  </head>
  <body>
  <br><br><br>
    
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a class="btn-btn-info" href="myDevices.php"> Device List</a>
        </div>
        <div class="col-md-9">
          <h2> Edit Device List</h2>

          <hr>

            <form action="updateUserInfo.php?id=<?php echo $id ?>" method="POST">
                <div class="form-group">

                <label for="user_id"> user_id: </label>
                <input required type="text" class="form-control" name="user_id" placeholder="user_id" value="<?php echo $std['user_id']?>">
                </div>

                 <div class="form-group">

                <label for="device_id"> device_id: </label>
                <input required type="text" class="form-control" device_id="device_id" placeholder="device_id" value="<?php echo $std['device_id']?>">
                </div>


                

                
                
                <div class="form-group">
                <label for="maping_date">maping_date:</label>
                <input type="text" class="form-control" maping_date="maping_date" placeholder="maping_date" value="<?php echo $std['maping_datel']?>">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>


      </div>
    </div>

  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
