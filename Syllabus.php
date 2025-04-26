<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Handle form submission
if (isset($_POST["submit"])) { 
    $syllabustitle = mysqli_real_escape_string($con, $_POST["syllabustitle"]);
    $syllabuscontents = mysqli_real_escape_string($con, $_POST["syllabuscontent"]);
    $subject_id = mysqli_real_escape_string($con, $_POST["subject"]);

    $sql = "INSERT INTO syllabus (subject_id, syllabustitle, syllabuscontents, status) 
            VALUES ('$subject_id', '$syllabustitle', '$syllabuscontents', 'Active')";
    
    if (!mysqli_query($con, $sql)) {
        echo "Error: " . mysqli_error($con);
    } else {
        echo "<script>alert('New syllabus record inserted successfully.');</script>";
    }
}

// Fetch syllabus data if editing
$rs = [];
if (isset($_GET["editid"])) {
    $editid = mysqli_real_escape_string($con, $_GET["editid"]);
    $sql = "SELECT * FROM syllabus WHERE syllabus_id='$editid'";
    $qsql = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($qsql, MYSQLI_ASSOC);
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1><a href="viewSyllabus.php">View Syllabus</a> | <a href="Syllabus.php">Add Syllabus</a></h1>
        <h1>Syllabus</h1>
        <form method="post" action="" onsubmit="return validateForm()">
          <table width="100%" border="1">
            <tr>
              <td width="24%">Subject</td>
              <td width="76%">
                <select name="subject" id="subject" required>
                  <option value="">Select</option>
                  <?php
                  $sql = "SELECT * FROM subject";
                  $qsql = mysqli_query($con, $sql);
                  while ($subject = mysqli_fetch_array($qsql, MYSQLI_ASSOC)) {
                      $selected = isset($rs["subject_id"]) && $rs["subject_id"] == $subject["subject_id"] ? "selected" : "";
                      echo "<option value='{$subject["subject_id"]}' $selected>{$subject["subjectcode"]} - {$subject["subject_name"]}</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Syllabus Title</td>
              <td><input type="text" name="syllabustitle" id="syllabustitle" value="<?php echo $rs["syllabustitle"] ?? ''; ?>" style="width:100%;height:20px;" required></td>
            </tr>
            <tr>
              <td>Syllabus Content</td>
              <td><textarea name="syllabuscontent" id="syllabuscontent" style="width:100%;height:60px;" required><?php echo $rs["syllabuscontents"] ?? ''; ?></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="submit" id="submit" value="Submit"></td>
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

<script>
function validateForm() {
    if (document.getElementById("syllabustitle").value.trim() == "") {
        alert("Syllabus title should not be empty.");
        document.getElementById("syllabustitle").focus();
        return false;
    }
    if (document.getElementById("syllabuscontent").value.trim() == "") {
        alert("Syllabus content should not be empty.");
        document.getElementById("syllabuscontent").focus();
        return false;
    }
    return true;
}
</script>
