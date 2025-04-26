<?php
include("header.php");
include("slider.php");
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
     <?php
        // Fetch the "About Us" page details from the database
        $sql = "SELECT * FROM webpage WHERE pagename='About Us'";
        $qsql = mysqli_query($con, $sql);
        $rs = mysqli_fetch_array($qsql);
     ?> 
      <!-- main body --> 
      <h1><?php echo $rs['pagetitle']; ?></h1>
      <img src="webpage/<?php echo $rs['imagepath']; ?>" width="100" height="100">
      <p><?php echo $rs['pagediscriptipon']; ?></p>

      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>
