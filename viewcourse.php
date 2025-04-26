<?php
session_start();
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("header.php");
include("dbconnection.php");

if(isset($_GET['delid']))
{
	$sql="DELETE FROM course WHERE course_id='{$_GET['delid']}'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Course record deleted successfully...');</script>";
	}
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>

      <div id="content" class="two_third"> 
        <h1><a href="viewcourse.php">View Course</a> | <a href="newcourse.php">Add Course</a></h1>
        <h1>View Course</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Course Name</th>
    <th scope="col">Description</th>
    <th scope="col">Action</th>
  </tr>
  <?php
  $sql="SELECT * FROM course";
  $qsql= mysqli_query($con,$sql);
  while($rs=mysqli_fetch_array($qsql))
  {
  ?>
  <tr>
    <td>&nbsp;<?php echo $rs['coursename']; ?> - <?php echo $rs['coursetype']; ?></td>
    <td>&nbsp;<?php echo $rs['description']; ?></td>
    <td>&nbsp;<a href="newcourse.php?editid=<?php echo $rs['course_id']; ?>">Edit</a> | 
    <a href="viewcourse.php?delid=<?php echo $rs['course_id']; ?>">Delete</a></td>
  </tr>
  <?php
  }
  ?>
</table>
        <div id="comments"></div>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
