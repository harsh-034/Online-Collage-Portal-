<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Check if the edit ID is provided
if (!isset($_GET['editid'])) {
    echo "<script>alert('Invalid request.'); window.location='viewadmission.php';</script>";
    exit();
}

$editid = mysqli_real_escape_string($con, $_GET['editid']);

// Fetch admission record
$sql = "SELECT * FROM admission WHERE admission_id='$editid'";
$qsql = mysqli_query($con, $sql);
$rs = mysqli_fetch_array($qsql);

if (!$rs) {
    echo "<script>alert('Record not found.'); window.location='viewadmission.php';</script>";
    exit();
}

// Update record if form is submitted
if (isset($_POST['update'])) {
    $start_date = mysqli_real_escape_string($con, $_POST['startdate']);
    $end_date = mysqli_real_escape_string($con, $_POST['enddate']);
    $admission_fee = mysqli_real_escape_string($con, $_POST['admissionfee']);
    $note = mysqli_real_escape_string($con, $_POST['note']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $update_sql = "UPDATE admission SET 
        start_date='$start_date', 
        end_date='$end_date', 
        admission_fee='$admission_fee', 
        note='$note', 
        status='$status'
        WHERE admission_id='$editid'";

    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Admission record updated successfully.'); window.location='viewadmission.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($con) . "');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <h1>Edit Admission Record</h1>
      <form method="post" action="">
        <table width="100%" border="1">
          <tr>
            <td>Start Date</td>
            <td><input type="date" name="startdate" value="<?php echo $rs['start_date']; ?>" required></td>
          </tr>
          <tr>
            <td>End Date</td>
            <td><input type="date" name="enddate" value="<?php echo $rs['end_date']; ?>" required></td>
          </tr>
          <tr>
            <td>Admission Fee</td>
            <td><input type="text" name="admissionfee" value="<?php echo $rs['admission_fee']; ?>" required></td>
          </tr>
          <tr>
            <td>Note</td>
            <td><textarea name="note" required><?php echo $rs['note']; ?></textarea></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <select name="status">
                <option value="Active" <?php if ($rs['status'] == 'Active') echo 'selected'; ?>>Active</option>
                <option value="Pending" <?php if ($rs['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Completed" <?php if ($rs['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <button type="submit" name="update" style="background-color: black; color: white; padding: 10px; border: none; cursor: pointer;">Save Changes</button>
              <a href="viewadmission.php" style="margin-left: 10px;">Cancel</a>
            </td>
          </tr>
        </table>
      </form>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
