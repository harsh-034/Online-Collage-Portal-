<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if (isset($_GET['editid'])) {
    $editid = mysqli_real_escape_string($con, $_GET['editid']);
    $sql = "SELECT * FROM applicationform WHERE applicationnumber='$editid'";
    $qsql = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($qsql);
}

if (isset($_POST['submit'])) {
    $sql = "UPDATE applicationform SET 
        admissionnumber='$_POST[admissionnumber]',
        admissiondate='$_POST[admissiondate]',
        course_id='$_POST[course_id]',
        semester='$_POST[semester]',
        firstname='$_POST[firstname]',
        lastname='$_POST[lastname]',
        dob='$_POST[dob]',
        bloodgroup='$_POST[bloodgroup]',
        gender='$_POST[gender]',
        placeofbirth='$_POST[placeofbirth]',
        cont_address='$_POST[cont_address]',
        mobileno='$_POST[mobileno]',
        emailid='$_POST[emailid]',
        paidfee='$_POST[paidfee]',
        status='$_POST[status]'
        WHERE applicationnumber='$editid'";
    
    $qsql = mysqli_query($con, $sql);
    if ($qsql) {
        echo "<script>alert('Application updated successfully!'); window.location='viewapplication.php';</script>";
    } else {
        echo "<script>alert('Error updating application.');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third">
        <h1>Edit Application Form</h1>
        <form method="post" action="">
          <table width="100%" border="1" cellpadding="10" cellspacing="0">
            <tr>
              <td><strong>Admission Number:</strong></td>
              <td><input type="text" name="admissionnumber" value="<?php echo $rs['admissionnumber']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Admission Date:</strong></td>
              <td><input type="date" name="admissiondate" value="<?php echo $rs['admissiondate']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Course ID:</strong></td>
              <td><input type="text" name="course_id" value="<?php echo $rs['course_id']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Semester:</strong></td>
              <td><input type="text" name="semester" value="<?php echo $rs['semester']; ?>"></td>
            </tr>
            <tr>
              <td><strong>First Name:</strong></td>
              <td><input type="text" name="firstname" value="<?php echo $rs['firstname']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Last Name:</strong></td>
              <td><input type="text" name="lastname" value="<?php echo $rs['lastname']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Date of Birth:</strong></td>
              <td><input type="date" name="dob" value="<?php echo $rs['dob']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Blood Group:</strong></td>
              <td><input type="text" name="bloodgroup" value="<?php echo $rs['bloodgroup']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Gender:</strong></td>
              <td>
                <select name="gender">
                  <option value="Male" <?php if ($rs['gender'] == "Male") echo "selected"; ?>>Male</option>
                  <option value="Female" <?php if ($rs['gender'] == "Female") echo "selected"; ?>>Female</option>
                  <option value="Other" <?php if ($rs['gender'] == "Other") echo "selected"; ?>>Other</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><strong>Place of Birth:</strong></td>
              <td><input type="text" name="placeofbirth" value="<?php echo $rs['placeofbirth']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Contact Address:</strong></td>
              <td><textarea name="cont_address"><?php echo $rs['cont_address']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Mobile No:</strong></td>
              <td><input type="text" name="mobileno" value="<?php echo $rs['mobileno']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Email:</strong></td>
              <td><input type="email" name="emailid" value="<?php echo $rs['emailid']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Paid Fee:</strong></td>
              <td><input type="text" name="paidfee" value="<?php echo $rs['paidfee']; ?>"></td>
            </tr>
            <tr>
              <td><strong>Status:</strong></td>
              <td>
                <select name="status">
                  <option value="Active" <?php if ($rs['status'] == "Active") echo "selected"; ?>>Active</option>
                  <option value="Inactive" <?php if ($rs['status'] == "Inactive") echo "selected"; ?>>Inactive</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="submit" value="Update Application">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
