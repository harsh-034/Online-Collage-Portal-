<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Delete Admission Record
if (isset($_GET['delid'])) {  
    $delid = mysqli_real_escape_string($con, $_GET['delid']); 
    $sql = "DELETE FROM admission WHERE admission_id='$delid'";
    $qsql = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Admission form record deleted successfully...');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>

      <div id="content" class="two_third"> 
        <h1>View Admission Records</h1>

        <!-- Add Student Button -->
        <div style="margin-bottom: 15px;">
            <a href="addstudent.php">
                <button style="padding: 10px 15px; font-size: 16px; cursor: pointer;">Add Student Record</button>
            </a>
        </div>

        <table width="613" border="1">
          <tr>
            <th>Roll No</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Admission Fee</th>
            <th>Note</th>
            <th>Status</th>
            <th>Action</th>
          </tr>

          <?php
          $sql = "SELECT * FROM admission";
          $qsql = mysqli_query($con, $sql);

          while ($rs = mysqli_fetch_array($qsql)) {
              // Fetch Course Name
              $coursename = "N/A";
              $sqlcourse = "SELECT * FROM course WHERE course_id='" . $rs['course_id'] . "'";
              $qsqlcourse = mysqli_query($con, $sqlcourse);
              if ($rscourse = mysqli_fetch_array($qsqlcourse)) {
                  $coursename = $rscourse['coursename'];
              }

              // Fetch Student Name
              $studentname = "N/A";
              $sqladmission = "SELECT * FROM applicationform WHERE applicationnumber='" . $rs['admission_id'] . "'";
              $qsqladmission = mysqli_query($con, $sqladmission);
              if ($rsadmission = mysqli_fetch_array($qsqladmission)) {
                  $studentname = $rsadmission['firstname'] . " " . $rsadmission['lastname'];
              }
          ?>
            <tr>
              <td><?php echo htmlspecialchars($rs['admission_id']); ?></td>
              <td><?php echo htmlspecialchars($studentname); ?></td>
              <td><?php echo htmlspecialchars($coursename); ?></td>
              <td><?php echo htmlspecialchars($rs['start_date']); ?></td>
              <td><?php echo htmlspecialchars($rs['end_date']); ?></td>
              <td><?php echo htmlspecialchars($rs['admission_fee']); ?></td>
              <td><?php echo htmlspecialchars($rs['note']); ?></td>
              <td><?php echo htmlspecialchars($rs['status']); ?></td>
              <td>
                <a href="editadmission.php?editid=<?php echo $rs['admission_id']; ?>">Edit</a> | 
                <a href="viewadmission.php?delid=<?php echo $rs['admission_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>

      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
