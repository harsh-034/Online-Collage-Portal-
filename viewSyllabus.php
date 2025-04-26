<?php
session_start();
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
	exit();
}

include("header.php");
include("dbconnection.php");

if(isset($_GET["delid"])) // ✅ Fixed: Correct $_GET syntax
{
    $delid = mysqli_real_escape_string($con, $_GET["delid"]);
	$sql="DELETE FROM syllabus WHERE syllabus_id='$delid'";
	$qsql = mysqli_query($con, $sql);	

	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Syllabus form record deleted successfully...');</script>";
	}
}
?>

<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      
      <div id="content" class="two_third"> 
        <h1><a href="viewSyllabus.php">View Syllabus</a> | <a href="Syllabus.php">Add Syllabus</a></h1>
        <h1>View Syllabus</h1>

        <table width="703" border="1">
          <tr>
            <th>Syllabus Title</th>
            <th>Syllabus Contents</th>
            <th>Status</th>
            <th>Action</th>
          </tr>

          <?php
          $sql="SELECT * FROM syllabus";
          $qsql= mysqli_query($con,$sql);
          while($rs=mysqli_fetch_array($qsql))
          {
          ?>
          <tr>
            <td><?php echo $rs["syllabustitle"]; ?></td>  <!-- ✅ Fixed syntax -->
            <td><?php echo $rs["syllabuscontents"]; ?></td>  <!-- ✅ Fixed syntax -->
            <td><?php echo $rs["status"]; ?></td>  <!-- ✅ Fixed syntax -->
            <td>
              <a href="Syllabus.php?editid=<?php echo $rs["syllabus_id"]; ?>">Edit</a> |
              <a href="viewSyllabus.php?delid=<?php echo $rs["syllabus_id"]; ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
            </td>
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
