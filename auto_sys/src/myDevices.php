<?php include "../template/topbar.php";
include ('config/db_connection.php');
$usertId=$_SESSION['userId'];
$queryDevices="SELECT m.id, m.maping_date, dl.device_id, dt.device_types 
FROM user_device_maping as m 
INNER JOIN tbl_device_list as dl ON dl.id=m.device_id 
INNER JOIN tbl_device_type as dt ON dt.id=dl.device_type 
WHERE m.user_id='$usertId';";
// $queryDevices="SELECT * FROM user_device_maping WHERE user_id='$usertId';";
$userDevices=mysqli_query($conn, $queryDevices);
if(!$queryDevices){
	die("Could not connect: " . mysqli_error($conn));
	exit;
}

?>
<style>
.w3-res-tb {
    padding: 1em 0em 0 !important;
}
</style>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            My Device List
          </header>
          <div class="row w3-res-tb">
       <div class="col-sm-9 m-b-xs">          
       </div>
       <div class="col-sm-3">
         <a href="#mapNewDeviceModal" data-toggle="modal" class="btn btn-success" style="width: 100%">
                New Add
              </a>
       </div>
     </div>
          
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>Device ID </th>
                  <th>Device Type </th>
                  <th>Mapping Date </th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
             <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]" /><i></i></label></td>
             <td>Idrawfast </td>
             <td><span class="text-ellipsis">{item.PrHelpText1} </span></td>
             <td><span class="text-ellipsis">{item.PrHelpText1} </span></td>
             <td>
               <a href="responsive_table.html" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
             </td>
           </tr> -->
                <?php
           while($row=mysqli_fetch_array($userDevices)) {
            echo '<tr><td>'.$row['device_id'].'</td>';
            echo '<td>'.$row['device_types'].'</td>';
            echo '<td>'.$row['maping_date'].'</td></tr>';
        }
           ?>
              </tbody>
            </table>
          </div>
         
        </section>

      </div>
    </div>

  </section>
  <!-- footer -->
  <?php include "../template/footer.php";   ?>
  <!-- / footer -->
</section>

</section>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mapNewDeviceModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">× </button>
        <h4 class="modal-title">Map New Device</h4>
      </div>
      <div class="modal-body">

        <form method="POST" action="mapNewDeviceForUser.php">
          <div class="form-group">
            <label>Device ID </label>
            <input type="text" class="form-control" name="deviceId" id="deviceId" required />
          </div>
          <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-info">Map For Me</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php

	if(!empty($_GET['status'])){
				 $message=$_GET['status'];
				 if($message==='success'){
					 echo "<script type='text/javascript'>alert('New Device Map successfully done!')</script>";
				 }else{
					 echo "<script type='text/javascript'>alert('$message')</script>";
				 }
				 }
   
  ?>
</body>

</html>