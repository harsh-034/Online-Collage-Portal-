<select name="subject" id="subject" style="width:100px;height:20px;" >
<option value="">Select</option>
<?php
include("dbconnection.php");
$sqlsubject = "SELECT * FROM  subject ";
$qsqlsubject = mysqli_query($con,$sqlsubject);
while($rssubject = mysqli_fetch_array($qsqlsubject))
{
  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
}
?>
</select>