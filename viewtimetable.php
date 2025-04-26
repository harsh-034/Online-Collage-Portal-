<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// ✅ Fix: Corrected undefined constant error
if (isset($_GET['delid'])) {
    $delid = mysqli_real_escape_string($con, $_GET['delid']);
    $sql = "DELETE FROM time_table WHERE timetable_id='$delid'";
    $qsql = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Timetable form record deleted successfully...');</script>";
    }
}

// ✅ Fix: Corrected undefined constant error
if (isset($_GET['btnadd'])) {
    $courseid = mysqli_real_escape_string($con, $_GET['courseid']);
    $subject = mysqli_real_escape_string($con, $_GET['subject']);
    $semester = mysqli_real_escape_string($con, $_GET['semester']);
    $day = mysqli_real_escape_string($con, $_GET['day']);
    $time = mysqli_real_escape_string($con, $_GET['time']);

    $sql = "INSERT INTO time_table (course_id, subject_id, semister, week_day, time, status) 
            VALUES ('$courseid', '$subject', '$semester', '$day', '$time', 'Active')";

    if (!$qsql = mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('New timetable record inserted successfully.');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third">
        <h1>View Time Table</h1>
        <form method="get" action="">
          <table width="200" border="1">
            <tr>
              <th scope="row">Course :</th>
              <td>
                <select name="courseid">
                  <option value="">Select</option>
                  <?php
                  $sqlsubject = "SELECT * FROM course";
                  $qsqlsubject = mysqli_query($con, $sqlsubject);
                  while ($rssubject = mysqli_fetch_array($qsqlsubject)) {
                      $selected = ($_GET['courseid'] ?? '') == $rssubject['course_id'] ? 'selected' : '';
                      echo "<option value='{$rssubject['course_id']}' $selected>{$rssubject['coursename']}</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Semester :</th>
              <td>
                <select name="semester" onchange="loadform(courseid.value,semester.value)">
                  <?php
                  $arr = ["Select", "1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester"];
                  foreach ($arr as $val) {
                      $selected = ($_GET['semester'] ?? '') == $val ? 'selected' : '';
                      echo "<option value='$val' $selected>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>

          <table width="200" border="1">
            <tr>
              <th scope="row">Day</th>
              <td>
                <select name="day">
                  <option value="">Select</option>
                  <?php
                  $arrdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                  foreach ($arrdays as $val) {
                      echo "<option value='$val'>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Subject</th>
              <td>
                <select name="subject">
                  <option value="">Select</option>
                  <?php
                  $sqlcourse = "SELECT * FROM subject WHERE status='Active'";
                  $qsqlcourse = mysqli_query($con, $sqlcourse);
                  while ($rs = mysqli_fetch_array($qsqlcourse)) {
                      echo "<option value='{$rs['subject_id']}'>{$rs['subjectcode']} - {$rs['subject_name']}</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Time</th>
              <td>
                <select name="time">
                  <option value="">Select</option>
                  <?php
                  $arrtime = [
                      "9.00 AM - 10.00 AM", "10.05 AM - 11.00 AM", "11.05 AM - 12.00 PM",
                      "12.05 PM - 01.00 PM", "02.05 PM - 03.00 PM", "03.05 PM - 04.00 PM", "04.05 PM - 05.00 PM"
                  ];
                  foreach ($arrtime as $val) {
                      echo "<option value='$val'>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row"></th>
              <td>
                <input type="submit" value="Add Time Table" name="btnadd" />
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

<script>
function loadform(course, semester) {
    var lnk = "viewtimetable.php?course=" + course + "&semester=" + semester;
    window.location.assign(lnk);
}
</script>
