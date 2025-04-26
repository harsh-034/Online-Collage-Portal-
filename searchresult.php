<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <div class="group btmspace-30"> 
        <div id="content" class="two_third first"> 
          <h1>Search Result</h1>
          <strong>Enter Roll Number to Search Result</strong><br />

<?php
if(isset($_POST['submit']))  // ✅ Fixed: Used quotes around 'submit'
{
    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);  // ✅ Prevent SQL Injection

    $sqlresult = "SELECT * FROM result WHERE applicationnumber='$rollno'";
    $qsqlresult = mysqli_query($con, $sqlresult);
    $rsresult = mysqli_fetch_array($qsqlresult);

    $sqlapplicationform = "SELECT * FROM applicationform WHERE applicationnumber='$rollno'";
    $qsqlapplicationform = mysqli_query($con, $sqlapplicationform);
    $rsapplicationform = mysqli_fetch_array($qsqlapplicationform);

    if ($rsapplicationform) {  // ✅ Check if student exists
?>
    <table width="100%" border="1">
      <tr>
        <th>Roll Number:</th>
        <td><?php echo htmlspecialchars($rollno); ?></td>  <!-- ✅ Fixed undefined index -->
      </tr>
      <tr>
        <th>Student Name:</th>
        <td><?php echo htmlspecialchars($rsapplicationform['firstname']) . " " . htmlspecialchars($rsapplicationform['lastname']); ?></td>  <!-- ✅ Fixed undefined index -->
      </tr>
      <tr>
        <th>Result:</th>
        <td><?php echo htmlspecialchars($rsresult['result']); ?></td>  <!-- ✅ Fixed undefined index -->
      </tr>
    </table>
<?php
    } else {
        echo "<p style='color:red;'>No result found for Roll Number: $rollno</p>";  // ✅ Show error if student doesn't exist
    }
}
else
{
?>
    <form method="post" action="" name="form1" onsubmit="return validateform()">
    <table width="100%" border="1">
      <tr>
        <th>Roll Number:</th>
        <td><input name="rollno" type="text" required /></td>  <!-- ✅ Used 'required' attribute -->
      </tr>
      <tr>
        <th></th>
        <td><input name="submit" type="submit" value="Search" /></td>
      </tr>
    </table>
    </form>
<?php
}
?>
        </div>

        <!-- Right Column -->
        <div class="sidebar one_third"> 
          <div class="sdb_holder">
            <h6>Quick Information</h6>
            <ul class="nospace quickinfo">
              <li class="clear"><a href="applicationform.php"><img src="images/onlineadmission.jpg" style="width:80px;height:80px;" > Online Admission Form</a></li>
              <li class="clear"><a href="gallery.php"><img src="images/gallery.jpg" alt="" style="width:80px;height:80px;"> View Photo Gallery</a></li>
              <li class="clear"><a href="news.php"><img src="images/newsevents.jpg" alt="" style="width:80px;height:80px;"> View News and events</a></li>
              <li class="clear"><a href="courselist.php"><img src="images/course.jpg" alt="" style="width:80px;height:80px;"> View course details</a></li>
              <li class="clear"><a href="searchresult.php"><img src="images/result.jpg" alt="" style="width:80px;height:80px;"> Result</a></li>
              <li class="clear"><a href="contact.php"><img src="images/contact.jpg" alt="" style="width:80px;height:80px;"> Contact us</a></li>
            </ul>
          </div>                             
        </div>
      </div>
    </main>
  </div>
</div>

<?php
include("footer.php");
?>

<script type="application/javascript">
function validateform()
{
    if(document.form1.rollno.value.trim() == "")  // ✅ Fixed JS validation
    {
        alert("Roll Number should not be empty.");
        return false;
    }
    return true;
}
</script>
