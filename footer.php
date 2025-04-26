<?php
include("dbconnection.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center">
        <a href="#" title="Free Student Projects" rel="home"></a>  </figure>
      </div>
      <div class="one_third">
      <strong>&nbsp;Available course details:</strong><br />
      
      <?php
      $sql = "SELECT * FROM course WHERE status='Active' LIMIT 0, 10";
      $qsql = mysqli_query($con, $sql);

      if ($qsql) {
          while ($rs = mysqli_fetch_array($qsql)) {
              echo $rs['coursename'] . " - " . $rs['coursetype'] . "<br />";
          }
      } else {
          echo "Error: " . mysqli_error($con); // Debugging MySQL errors
      }
      ?>
      </div>
      <div class="one_third">
         <address>
        SRS College, Mumbai<br>
        <i class="fa fa-phone pright-10"></i>
        </address>
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy;  All Rights Reserved</p>
    <p class="fl_right"></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>
