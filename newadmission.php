<?php
include("header.php");
include("dbconnection.php");

if(isset($_POST['submit'])) 
{
    $sql = "INSERT INTO admission (course_id, start_date, end_date, admission_fee, note, status) 
            VALUES ('{$_POST['courseid']}', '{$_POST['startdate']}', '{$_POST['enddate']}', '{$_POST['admissionfee']}', '{$_POST['note']}', 'Active')";

    if(!mysqli_query($con, $sql))
    {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
    else
    {
        echo "<script>alert('Admission record inserted successfully.');</script>";
    }
}

if(isset($_GET['editid']))
{
    $sql = "SELECT * FROM admission WHERE admission_id='{$_GET['editid']}'";
    $qsql = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($qsql);
}
?>

<!-- Page Content -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1>New Admission</h1>
        <form method="post" action="">
        <table border="1">
          <tr>
            <td>Course</td>
            <td>
              <select name="courseid">
                <option value="">Select</option>
                <?php
                $sql = "SELECT * FROM course";
                $qsql = mysqli_query($con, $sql);
                while($rsCourse = mysqli_fetch_array($qsql))
                {
                    echo "<option value='{$rsCourse['course_id']}'>{$rsCourse['coursename']}</option>";
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Start Date</td>
            <td><input type="date" name="startdate" value="<?php echo isset($rs['start_date']) ? $rs['start_date'] : ''; ?>"></td>
          </tr>
          <tr>
            <td>End Date</td>
            <td><input type="date" name="enddate" value="<?php echo isset($rs['end_date']) ? $rs['end_date'] : ''; ?>"></td>
          </tr>
          <tr>
            <td>Admission Fees</td>
            <td><input type="text" name="admissionfee" value="<?php echo isset($rs['admission_fee']) ? $rs['admission_fee'] : ''; ?>"></td>
          </tr>
          <tr>
            <td>Note</td>
            <td><textarea name="note"><?php echo isset($rs['note']) ? $rs['note'] : ''; ?></textarea></td>
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
