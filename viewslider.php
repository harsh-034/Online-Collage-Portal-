<?php
session_start();
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("header.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM slider WHERE slider_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Slider form record deleted successfully...');</script>";
	}
}
?>

<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
            <?php
	  include("leftsidebar.php");
	  ?>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="two_third"> 
        <!-- ################################################################################################ -->
        <h1>View Slider</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Slider title</th>
    <th scope="col">Description</th>
    <th scope="col">Slider Image</th>
    <th scope="col">Status</th>
     <th scope="col">Action</th>
  </tr>
   <?php
  $sql="SELECT * FROM slider";
  $qsql= mysqli_query($con,$sql);
  while($rs=mysqli_fetch_array($qsql))
 {
   ?>
  <tr>
    <td>&nbsp;<?php echo $rs[slidertitle]; ?></td>
    <td>&nbsp;<?php echo $rs[description]; ?></td>
    <td>&nbsp;<?php echo $rs[sliderimage]; ?></td>
    <td>&nbsp;<?php echo $rs[status]; ?></td>
    <td>&nbsp;<a href="Sliderimage.php?editid=<?php echo $rs[slider_id]; ?>">Edit</a> | <a href="viewslider.php?delid=<?php echo $rs[slider_id]; ?>">Delete</a></td>
  </tr>
  <?php
 }
 ?>
</table>
        <div id="comments"></div>
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php
include("footer.php");
?>