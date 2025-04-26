<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}
include("header.php");
include("dbconnection.php");

if (isset($_GET["delid"])) {
    $delid = mysqli_real_escape_string($con, $_GET["delid"]);
    $sql = "DELETE FROM subject WHERE subject_id='$delid'";
    $qsql = mysqli_query($con, $sql);
    
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Subject record deleted successfully...');</script>";
    }
}
?>

<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      
      <div id="content" class="two_third"> 
        <h1><a href="viewsubject.php">View Subject</a> | <a href="Subject.php">Add Subject</a></h1>
        <h1>View Subject</h1>

        <table width="613" border="1">
          <tr>
            <th>Subject Name</th>
            <th>Course ID</th>
            <th>Semester</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php
          $sql = "SELECT * FROM subject";
          $qsql = mysqli_query($con, $sql);
          while ($rs = mysqli_fetch_array($qsql)) {
              $sqlcourse_id = "SELECT * FROM course WHERE course_id='" . $rs['course_id'] . "'";
              $qsqlcourse_id = mysqli_query($con, $sqlcourse_id);
              $rscourse_id = mysqli_fetch_array($qsqlcourse_id);
          ?>
          <tr>
            <td><?php echo $rs['subject_name']; ?></td>
            <td><?php echo $rscourse_id['coursename'] . " " . $rscourse_id['coursetype']; ?></td>
            <td><?php echo $rs['semester']; ?></td>
            <td><?php echo $rs['description']; ?></td>
            <td><?php echo $rs['status']; ?></td>
            <td>
              <a href="Subject.php?editid=<?php echo $rs['subject_id']; ?>">Edit</a> |
              <a href="viewsubject.php?delid=<?php echo $rs['subject_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
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
