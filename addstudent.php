<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Add selected student records from viewapplication.php
if (isset($_POST['add_student'])) {
    if (!empty($_POST['selected_students'])) {
        foreach ($_POST['selected_students'] as $application_id) {
            $application_id = mysqli_real_escape_string($con, $application_id);

            // Check if the student is already added
            $check_sql = "SELECT * FROM admission WHERE admission_id='$application_id'";
            $check_result = mysqli_query($con, $check_sql);

            if (mysqli_num_rows($check_result) == 0) {
                // Insert into admission table without setting status
                $sql = "INSERT INTO admission (admission_id, course_id, status)
                        SELECT applicationnumber, course_id, ''  -- Keeping status empty
                        FROM applicationform WHERE applicationnumber='$application_id'";

                if (!mysqli_query($con, $sql)) {
                    echo "<script>alert('Error adding student: " . mysqli_error($con) . "');</script>";
                }
            }
        }
        echo "<script>alert('Selected students added successfully.');</script>";
    } else {
        echo "<script>alert('Please select at least one student.');</script>";
    }
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <h1 style="color: black;">Add Students to Admission</h1>

      <form method="post" action="">
        <label style="color: black;">Select Students:</label>
        <br>
        <table border="1" width="100%">
          <tr style="background-color: black; color: white;">
            <th>Select</th>
            <th>Student Name</th>
            <th>Application ID</th>
          </tr>
          <?php
          $sql = "SELECT * FROM applicationform WHERE applicationnumber NOT IN (SELECT admission_id FROM admission)";
          $qsql = mysqli_query($con, $sql);
          while ($rs = mysqli_fetch_array($qsql)) {
              echo "<tr>
                      <td style='text-align: center;'><input type='checkbox' name='selected_students[]' value='{$rs['applicationnumber']}'></td>
                      <td>{$rs['firstname']} {$rs['lastname']}</td>
                      <td>{$rs['applicationnumber']}</td>
                    </tr>";
          }
          ?>
        </table>
        <br>
        <button type="submit" name="add_student" style="background-color: black; color: white; padding: 10px; border: none; cursor: pointer; font-size: 16px;">
          Add Selected Students
        </button>
      </form>

      <br>

      <!-- Button to View Admission -->
      <a href="viewadmission.php">
        <button style="background-color: black; color: white; padding: 10px; border: none; cursor: pointer; font-size: 16px;">
          Go to View Admission
        </button>
      </a>

    </main>
  </div>
</div>

<?php include("footer.php"); ?>
