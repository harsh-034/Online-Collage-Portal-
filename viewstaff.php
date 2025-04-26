<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();  // Prevents further execution
}

include("header.php");
include("dbconnection.php");

// Fix: Ensure `delid` is set before using and prevent SQL injection
if (isset($_GET["delid"])) {
    $delid = mysqli_real_escape_string($con, $_GET["delid"]);
    $sql = "DELETE FROM staff WHERE staff_id='$delid'";
    $qsql = mysqli_query($con, $sql);
    
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Staff record deleted successfully.'); window.location='viewstaff.php';</script>";
    } else {
        // Log error to debug if needed
        $error = mysqli_error($con);
        echo "<script>alert('Error: Unable to delete record. $error');</script>";
    }
}
?>

<!-- HTML Output -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1><a href="staff.php"><strong>Add Staff</strong></a> | <strong><a href="viewstaff.php">View Staff</a></strong></h1>
        <h1>View Staff</h1>
        <div style='overflow:auto; width:700px;height:400px;'>
          <table width="1190" border="1">
            <tr>
              <th>Name</th>
              <th>Login ID</th>
              <th>Password</th>
              <th>Staff Type</th>
              <th>Designation</th>
              <th>Address</th>
              <th>Contact No</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM staff";
            $qsql = mysqli_query($con, $sql);
            while ($rs = mysqli_fetch_array($qsql)) {
            ?>
            <tr>
              <td><?php echo htmlspecialchars($rs["name"]); ?></td>
              <td><?php echo htmlspecialchars($rs["login_id"]); ?></td>
              <td><?php echo htmlspecialchars($rs["password"]); ?></td>
              <td><?php echo htmlspecialchars($rs["staff_type"]); ?></td>
              <td><?php echo htmlspecialchars($rs["designtion"]); ?></td>  <!-- Fixed typo -->
              <td><?php echo htmlspecialchars($rs["address"]); ?></td>
              <td><?php echo htmlspecialchars($rs["contact_no"]); ?></td>
              <td><?php echo htmlspecialchars($rs["status"]); ?></td>
              <td>
                <a href="staff.php?editid=<?php echo urlencode($rs["staff_id"]); ?>">Edit</a> | 
                <a href="viewstaff.php?delid=<?php echo urlencode($rs["staff_id"]); ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
              </td>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
