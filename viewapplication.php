<?php
session_start();
if(!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit(); // Stop further execution
}

include("header.php");
include("dbconnection.php");

// Fix: Correct syntax for GET parameter
if(isset($_GET['delid'])) {
    $delid = mysqli_real_escape_string($con, $_GET['delid']); // Prevent SQL Injection
    $sql = "DELETE FROM applicationform WHERE applicationnumber='$delid'";
    $qsql = mysqli_query($con, $sql);
    if(mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Application form record deleted successfully...');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third">
        <h1>View Application</h1>
        <div style='overflow:auto; width:700px;height:400px;'>
          <table width="613" border="1">
            <tr>
              <th>Registration date</th>
              <th>Admission number</th>
              <th>Admission date</th>
              <th>Course ID</th>
              <th>Semester</th>
              <th>Name</th>
              <th>DOB</th>
              <th>Blood Group</th>
              <th>Gender</th>
              <th>Place of Birth</th>
              <th>Parents Info</th>
              <th>Father</th>
              <th>Mother</th>
              <th>Father's Occupation</th>
              <th>Mother's Occupation</th>
              <th>Contact Address</th>
              <th>State</th>
              <th>District</th>
              <th>Taluk</th>
              <th>City/Town</th>
              <th>Country</th>
              <th>Pincode</th>
              <th>Mobile No</th>
              <th>Email ID</th>
              <th>Alternate Contact</th>
              <th>Religion</th>
              <th>Student Category</th>
              <th>Mother Tongue</th>
              <th>Nationality</th>
              <th>Paid Fee</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php
            $sql="SELECT * FROM applicationform";
            $qsql= mysqli_query($con,$sql);
            while($rs=mysqli_fetch_array($qsql)) {
            ?>
            <tr>
              <td><?php echo $rs['regndate']; ?></td>
              <td><?php echo $rs['applicationnumber']; ?></td>
              <td><?php echo $rs['admissiondate']; ?></td>
              <td><?php echo $rs['course_id']; ?></td>
              <td><?php echo $rs['semester']; ?></td>
              <td><?php echo $rs['firstname'] . " " . $rs['lastname']; ?></td>
              <td><?php echo $rs['dob']; ?></td>
              <td><?php echo $rs['bloodgroup']; ?></td>
              <td><?php echo $rs['gender']; ?></td>
              <td><?php echo $rs['placeofbirth']; ?></td>
              <td><?php echo $rs['parentsinfo']; ?></td>
              <td><?php echo $rs['father']; ?></td>
              <td><?php echo $rs['mother']; ?></td>
              <td><?php echo $rs['fathersoccupation']; ?></td>
              <td><?php echo $rs['mothersoccupation']; ?></td>
              <td><?php echo $rs['cont_address']; ?></td>
              <td><?php echo $rs['state']; ?></td>
              <td><?php echo $rs['district']; ?></td>
              <td><?php echo $rs['taluk']; ?></td>
              <td><?php echo $rs['citytown']; ?></td>
              <td><?php echo $rs['country']; ?></td>
              <td><?php echo $rs['pincode']; ?></td>
              <td><?php echo $rs['mobileno']; ?></td>
              <td><?php echo $rs['emailid']; ?></td>
              <td><?php echo $rs['alternatecontact']; ?></td>
              <td><?php echo $rs['religion']; ?></td>
              <td><?php echo $rs['studcategory']; ?></td>
              <td><?php echo $rs['mothertongue']; ?></td>
              <td><?php echo $rs['nationality']; ?></td>
              <td><?php echo $rs['paidfee']; ?></td>
              <td><?php echo $rs['status']; ?></td>
              <td>
                <a href="editapplication.php?editid=<?php echo $rs['applicationnumber']; ?>">Edit</a> | 
                <a href="viewapplication.php?delid=<?php echo $rs['applicationnumber']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
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
