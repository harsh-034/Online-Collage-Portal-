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
	$sql="DELETE FROM webpage WHERE webpage_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Webpage form record deleted successfully...');</script>";
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
        <h1>View Webpage</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Page Name</th>
    <th scope="col">Page Title</th>
    <th scope="col"> Page Description</th>
    <th scope="col">image path</th>
    <th scope="col">Action</th>
  </tr>
 <?php
  $sql="SELECT * FROM webpage";
  $qsql= mysqli_query($con,$sql);
  while($rs=mysqli_fetch_array($qsql))
 {
   ?>
   <tr>
    <td>&nbsp;<?php echo $rs[pagename]; ?></td>
    <td>&nbsp;<?php echo $rs[pagetitle]; ?></td>
    <td>&nbsp;<?php echo $rs[pagediscriptipon]; ?></td>
    <td>&nbsp;<?php echo $rs[imagepath]; ?></td>
  <td>&nbsp;<a href="Webpage.php?editid=<?php echo $rs[webpage_id]; ?>">Edit</a> | <a href="viewwebpage.php?delid=<?php echo $rs[webpage_id]; ?>">Delete</a></td>
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