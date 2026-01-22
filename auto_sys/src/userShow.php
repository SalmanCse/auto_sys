<?php

   //echo $_GET['id'];   //id pass in show.php
   $id = $_GET['id'];
  $conn = mysqli_connect('localhost', 'root', '', 'auto_sys');

  $sql = "SELECT * FROM tbl_user_profile WHERE id = $id";
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
          <a class="btn-btn-info" href="index.php"> Users </a>
        </div>
        <div class="col-md-9">
        <h2> User Information </h2>
        <hr> 
          <table class="table">

            
            <tr>
                <th class="text-right"> userName : </th>
                <td><?php echo $std['userName']; ?> </td>
            </tr>
            <tr>
                <th class="text-right"> userPassword:  </th>
                <td><?php echo $std['userPassword']; ?> </td>
            </tr>
            <tr>
                <th class="text-right"> userPhone: </th>
                <td><?php echo $std['userPhone']; ?> </td>
            </tr>
            <tr>
                <th class="text-right"> userEmail: </th>
                <td><?php echo $std['userEmail']; ?> </td>
            </tr>
            
            
            

          </table>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>