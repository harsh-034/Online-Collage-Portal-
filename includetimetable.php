<?php
if (!isset($_GET['course']) || !isset($_GET['semester'])) {
    echo "Error: Course and Semester parameters are missing.";
    return; // Stop execution
}

include("dbconnection.php"); // Ensure the database connection is included

$course = mysqli_real_escape_string($con, $_GET['course']);
$semester = mysqli_real_escape_string($con, $_GET['semester']);

// Fetch timetable entry
$sqltime_table = "SELECT * FROM time_table 
                  WHERE status='Active' 
                  AND course_id='$course' 
                  AND semister='$semester' 
                  AND week_day='" . mysqli_real_escape_string($con, $day) . "' 
                  AND time='" . mysqli_real_escape_string($con, $time) . "'";
$qsqltime_table = mysqli_query($con, $sqltime_table);

if (!$qsqltime_table || mysqli_num_rows($qsqltime_table) == 0) {
    echo "No Data";
    return;
}

$rstime_table = mysqli_fetch_array($qsqltime_table);

// Fetch subject details
$sqltime_tablesubject = "SELECT * FROM subject WHERE subject_id='" . mysqli_real_escape_string($con, $rstime_table['subject_id']) . "'";
$qsqltime_tablesubject = mysqli_query($con, $sqltime_tablesubject);

if ($qsqltime_tablesubject && mysqli_num_rows($qsqltime_tablesubject) > 0) {
    $rstime_tablesubject = mysqli_fetch_array($qsqltime_tablesubject);
    echo $rstime_tablesubject['subjectcode'] . " - " . $rstime_tablesubject['subject_name'];
} else {
    echo "No Subject Assigned";
}

// Delete link (Only for staff)
if (isset($_SESSION["staffid"]) && !empty($rstime_table['subject_id'])) {
    echo "<br /><a href='timetable.php?delid=" . $rstime_table['timetable_id'] . 
         "&course=$course&btnsearch=Search+Time+Table&semester=$semester' 
         onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
}
?>
