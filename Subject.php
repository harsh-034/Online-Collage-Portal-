<?php
session_start();
if(!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if(isset($_POST['submit'])) {  // 🔹 FIXED: Quotes added
    $sql="INSERT INTO subject (subject_name, subjectcode, course_id, semester, description, status) 
          VALUES('$_POST[subject]', '$_POST[subjectcode]', '$_POST[course]', '$_POST[semister]', '$_POST[description]', 'Active')";

    if(!$qsql=mysqli_query($con,$sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('Subject inserted successfully.');</script>";
    }
}

if(isset($_GET['editid'])) {  // 🔹 FIXED: Quotes added
    $sql ="SELECT * FROM subject WHERE subject_id='$_GET[editid]'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <?php include("leftsidebar.php"); ?>

      <div id="content" class="two_third"> 
        <h1><a href="viewsubject.php">View Subject</a> | <a href="Subject.php">Add Subject</a></h1>
        <h1>Subject</h1>

        <form method="post" action="" onsubmit="return validateform()">
          <table width="100%" border="1">
            <tr>
              <td>Course</td>
              <td>
                <select name="course" id="course">
                  <option value="">Select</option>
                  <?php
                  $sql = "SELECT * FROM course";
                  $qsql = mysqli_query($con,$sql);
                  while($rs_course = mysqli_fetch_array($qsql)) {
                      echo "<option value='{$rs_course['course_id']}'>{$rs_course['coursename']}</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Subject</td>
              <td><input type="text" value="<?php echo isset($rs['subject_name']) ? $rs['subject_name'] : ''; ?>" name="subject" id="subject"></td>
            </tr>
            <tr>
              <td>Subject Code</td>
              <td><input type="text" value="<?php echo isset($rs['subjectcode']) ? $rs['subjectcode'] : ''; ?>" name="subjectcode" id="subjectcode"></td>
            </tr>
            <tr>
              <td>Semester</td>
              <td>
                <select name="semister" id="semister">
                  <option value="">Select</option>
                  <?php
                  $arr = ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester"];
                  foreach($arr as $val) {
                      echo "<option value='$val'>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Description</td>
              <td><textarea name="description" id="description"><?php echo isset($rs['description']) ? $rs['description'] : ''; ?></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>

<script>
function validateform() {
    if(document.getElementById('subject').value == "") {
        alert("Subject should not be empty.");
        return false;
    }
    if(document.getElementById('semister').value == "") {
        alert("Semester should not be empty.");
        return false;
    }
    if(document.getElementById('description').value == "") {
        alert("Description should not be empty.");
        return false;
    }
    return true;
}
</script>
