<?php
session_start();
include("header.php");
include("dbconnection.php");

// Fix: Ensure array keys are properly quoted
if (isset($_GET['delid'])) {
    $delid = mysqli_real_escape_string($con, $_GET['delid']); // Prevent SQL injection
    $sqltime_table = "DELETE FROM time_table WHERE timetable_id='$delid'";
    $qsqltime_table = mysqli_query($con, $sqltime_table);
    
    if ($qsqltime_table) {
        echo "<script>alert('Time table record deleted successfully...');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
    }
}
?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <div class="group btmspace-30"> 
        <h1>View Time Table</h1>        
        <form id="form1" name="form1" method="get" action="">
          <table width="239" border="1">
            <tr>
              <th width="72">Course</th>
              <td width="73">
                <select name="course">
                  <option value="">Select</option>
                  <?php
                  $sql = "SELECT * FROM course WHERE status='Active'";
                  $qsql = mysqli_query($con, $sql);
                  while ($rs = mysqli_fetch_array($qsql)) {
                      $selected = ($rs['course_id'] == $_GET['course']) ? "selected" : "";
                      echo "<option $selected value='{$rs['course_id']}'>{$rs['coursename']} - {$rs['coursetype']}</option>";
                  }
                  ?>
                </select>
              </td>
              <td width="72" rowspan="2">
                <input type="submit" name="btnsearch" id="btnsearch" value="Search Time Table" />
              </td>
            </tr>
            <tr>
              <th>Semester</th>
              <td>
                <select name="semester">
                  <?php
                  $arr = ["Select", "1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester"];
                  foreach ($arr as $val) {
                      $selected = ($val == $_GET['semester']) ? "selected" : "";
                      echo "<option $selected value='$val'>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </form>

        <?php if (isset($_GET['btnsearch'])) { ?>
          <table width="100%" border="1" style="border:#000;">
            <tr>
              <th></th>
              <th>9.00 AM - 10.00 AM</th>
              <th>10.05 AM - 11.00 AM</th>
              <th>11.05 AM - 12.00 PM</th>
              <th>12.05 PM - 01.00 PM</th>
              <th>02.00 PM - 3.00 PM</th>
              <th>03.05 PM - 04.00 PM</th>
              <th>04.05 PM - 05.00 PM</th>
            </tr>
            <?php
            $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            $times = [
                "9.00 AM - 10.00 AM", "10.05 AM - 11.00 AM", "11.05 AM - 12.00 PM",
                "12.05 PM - 01.00 PM", "02.05 PM - 03.00 PM", "03.05 PM - 04.00 PM",
                "04.05 PM - 05.00 PM"
            ];
            
            foreach ($days as $day) {
                echo "<tr><th>$day</th>";
                foreach ($times as $time) {
                    echo "<td>";
                    include("includetimetable.php");
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
          </table>
        <?php } ?>
      </div>
    </main>
  </div>
</div>
<?php include("footer.php"); ?>
