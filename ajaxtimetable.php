<table width="2421" border="1" style="border:#000;">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;9.00 AM -10.00 AM</th>
    <th scope="col">&nbsp;10.05 AM -11.00 AM</th>
    <th scope="col">11.05 AM - 12.00 PM</th>
    <th scope="col">12.05 - 01.00 PM</th>
    <th rowspan="7" scope="col">&nbsp;</th>
    <th scope="col">02.00 PM- 3.00 PM</th>
    <th scope="col">03.05 PM - 04.00 PM</th>
    <th scope="col">04.05 PM to 05.00 PM</th>
  </tr>
  <tr>
    <th scope="row">Mon</th>
    <td>&nbsp;      
			<?php
			include("includecourse.php");
			?>
      </td>
    <td>&nbsp;<select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select>  </td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th scope="row">Tue</th>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th scope="row">Wed</th>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th scope="row">Thu</th>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th scope="row">Fri</th>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th height="26" scope="row">Sat</th>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
    <td>&nbsp;      <select name="subject" id="subject" style="width:100px;height:20px;" >
      <?php
      $sqlsubject = "SELECT * FROM  subject ";
	  $qsqlsubject = mysqli_query($con,$sqlsubject);
	  while($rssubject = mysqli_fetch_array($qsqlsubject))
	  {
		  echo "<option value='$rssubject[subject_id]'>$rssubject[subjectcode] - $rssubject[subject_name]</option>";
	  }
	  ?>
      </select></td>
  </tr>
</table>