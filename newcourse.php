<?php
session_start();
if(!isset($_SESSION["staffid"])) {
	header("Location: login.php");
	exit();
}

include("header.php");
include("dbconnection.php");

// Check if editid is set
$editid = isset($_GET['editid']) ? mysqli_real_escape_string($con, $_GET['editid']) : '';

if(isset($_POST['submit'])) {
    if($editid) {
        // Update existing course
        $sql = "UPDATE course SET 
                coursename='".$_POST['coursename']."', 
                coursetype='".$_POST['coursetype2']."', 
                description='".$_POST['description']."', 
                status='Active' 
                WHERE course_id='$editid'";
    } else {
        // Insert new course
        $sql="INSERT INTO course(`coursename`, `coursetype`, `description`, `status`) 
              VALUES ('".$_POST['coursename']."','".$_POST['coursetype2']."','".$_POST['description']."','Active')";
    }

    if(!$qsql = mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('Course saved successfully.'); window.location='viewcourse.php';</script>";
    }
}

// Fetch existing data if editid is set
$rs = [];
if($editid) {
    $sql ="SELECT * FROM course WHERE course_id='$editid'";
    $qsql = mysqli_query($con, $sql);
    if(mysqli_num_rows($qsql) > 0) {
        $rs= mysqli_fetch_array($qsql);
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third">
        <h1><?php echo $editid ? "Edit Course" : "New Course"; ?></h1>
        <form method="post" action="" name="newcourseform" onsubmit="return validateform()">
            <table width="100%" border="1">
                <tr>
                    <td>Course Name</td>
                    <td><input type="text" value="<?php echo isset($rs['coursename']) ? $rs['coursename'] : ''; ?>" name="coursename" id="coursename"></td>
                </tr>
                <tr>
                    <td>Course Abbrevation</td>
                    <td><input type="text" value="<?php echo isset($rs['coursetype']) ? $rs['coursetype'] : ''; ?>" name="coursetype2" id="coursetype2"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="description"><?php echo isset($rs['description']) ? $rs['description'] : ''; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" id="submit" value="Save Course"></td>
                </tr>
            </table>
        </form>
        <div id="comments"></div>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>

<script type="application/javascript">
function validateform() {
    if(document.newcourseform.coursename.value=="") {
        alert("Course name should not be empty.");
        document.newcourseform.coursename.focus();
        return false;
    }
    else if(document.newcourseform.description.value=="") {
        alert("Description should not be empty.");
        document.newcourseform.description.focus();
        return false;
    }
    else {
        return true;
    }
}
</script>
