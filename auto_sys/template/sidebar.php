<!--sidebar start-->
<script src="../template/js/scripts.js"></script>
<script src="../template/js/jquery.scrollTo.js"></script>
<script src="../template/js/jquery.slimscroll.js"></script>
 <script src="../template/js/jquery.nicescroll.js"></script>
 <script src="../template/js/jquery.dcjqaccordion.2.7.js"></script>
 <aside>
     <div id="sidebar" class="nav-collapse">
         <!-- sidebar menu start-->
         <div class="leftside-navigation">
             <ul class="sidebar-menu" id="nav-accordion">
                 <li>
                     <a class="active" href="controlPanel.php">
                         <i class="fa fa-dashboard"></i>
                         <span>Dashboard </span>
                     </a>
                 </li>
                
                 <li class="sub-menu">
                     <a href="javascript:;">
                         <i class="fa fa-book"></i>
                         <span>Device </span>
                     </a>
                     <ul class="sub">
                     <?php
                     if($_SESSION['userRole']==='ADMIN'){
                         echo '<li><a href="../src/newDevice.php">Add Device </a></li>';
                     }
                         ?>
						 <li><a href="../src/myDevices.php">My Device </a></li>
                     </ul>
                 </li>
                
             </ul>             
			 </div>
         <!-- sidebar menu end-->
     </div>
 </aside>
 <!--sidebar end-->