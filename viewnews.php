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
	$sql="DELETE FROM news WHERE news_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('News form record deleted successfully...');</script>";
	}
}
?>
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
        <h1>View Syllabus</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Subject name</th>
    <th scope="col">Courseid</th>
    <th scope="col">Start date</th>
     <th scope="col">End date</th>   
    <th scope="col">Admission fee</th>
       <th scope="col">Note</th>
    <th scope="col">Stauts</th>
    <th scope="col">Action</th>
  </tr>
  <?php
  $sql="SELECT * FROM admission";
  $qsql= mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
  ?>
  <tr>
  <td>&nbsp;</td>
    <td>&nbsp;<?php echo $rs[course_id]; ?></td>
    <td>&nbsp;<?php echo $rs[start_date]; ?></td>
    <td>&nbsp;<?php echo $rs[end_date]; ?></td>
    <td>&nbsp;<?php echo $rs[admission_fee]; ?></td>
    <td>&nbsp;<?php echo $rs[note]; ?></td>
    <td>&nbsp;<?php echo $rs[status]; ?></td>
    <td>&nbsp;<a href="viewadmission.php?delid=<?php echo $rs[admission_id]; ?>">Delete</a></td>
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