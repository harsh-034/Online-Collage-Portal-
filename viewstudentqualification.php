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
	$sql="DELETE FROM student_qualification WHERE student_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Qualification form record deleted successfully...');</script>";
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
        <h1>View Student Qualification</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Application no</th>
    <th scope="col">Course</th>
    <th scope="col">Subject</th>
    <th scope="col">Max marks</th>
    <th scope="col">Mark Obt</th>
    <th scope="col">No of Attempts</th>
    <th scope="col">Action</th>
  </tr>
   <?php
  $sql="SELECT * FROM student_qualification";
  $qsql= mysqli_query($con,$sql);
while($rs=mysqli_fetch_array($qsql))
 {
     ?>
  <tr>
    <td>&nbsp;<?php echo $rs[application_no]; ?></td>
    <td>&nbsp;<?php echo $rs[course]; ?></td>
    <td>&nbsp;<?php echo $rs[subject]; ?></td>
    <td>&nbsp;<?php echo $rs[max_mark]; ?></td>
    <td>&nbsp;<?php echo $rs[marks_obt]; ?></td>
    <td>&nbsp;<?php echo $rs[no_of_attempts]; ?></td>
      <td>&nbsp;<a href="newadmission.php?editid=<?php echo $rs[student_id]; ?>">Edit</a> | <a href="viewstudentqualification.php?delid=<?php echo $rs[student_id]; ?>">Delete</a></td>
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