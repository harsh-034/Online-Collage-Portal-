<?php
include("header.php");
include("dbconnection.php");

if(isset($_POST["Submit"])) {
    $dt = date("Y-m-d");

    // Securely get all form inputs
    function get_post_value($con, $key) {
        return isset($_POST[$key]) ? mysqli_real_escape_string($con, $_POST[$key]) : "";
    }

    $sql = "INSERT INTO applicationform (
        regndate, admissionnumber, admissiondate, course_id, semester, firstname, lastname, dob, bloodgroup, gender, placeofbirth, 
        parentsinfo, father, mother, fathersoccupation, mothersoccupation, cont_address, state, district, taluk, citytown, country, 
        pincode, mobileno, emailid, alternatecontact, religion, studcategory, studentcaste, mothertongue, nationality, paidfee, 
        othlangx, othlangxii, othvaccourse, othphysicchallenge, othexservice, othtenant, othsports, othnccnss, othschoolastst, 
        othhostelacc, othinsmendium, place, status
    ) VALUES (
        '$dt',
        '".get_post_value($con, "admissionnumber")."',
        '".get_post_value($con, "admissiondate")."',
        '".get_post_value($con, "course")."',
        '".get_post_value($con, "semester")."',
        '".get_post_value($con, "firstname")."',
        '".get_post_value($con, "lastname")."',
        '".get_post_value($con, "dob")."',
        '".get_post_value($con, "bloodgroup")."',
        '".get_post_value($con, "gender")."',
        '".get_post_value($con, "placeofbirth")."',
        '".get_post_value($con, "parentsinfo")."',
        '".get_post_value($con, "fathername")."',
        '".get_post_value($con, "mothername")."',
        '".get_post_value($con, "fathersoccupation")."',
        '".get_post_value($con, "mothersoccupation")."',
        '".get_post_value($con, "contactaddress")."',
        '".get_post_value($con, "state")."',
        '".get_post_value($con, "district")."',
        '".get_post_value($con, "taluk")."',
        '".get_post_value($con, "citytownsuburb")."',
        '".get_post_value($con, "country")."',
        '".get_post_value($con, "postalzipcode")."',
        '".get_post_value($con, "mobilenumber")."',
        '".get_post_value($con, "email")."',
        '".get_post_value($con, "alternatecontactnumber")."',
        '".get_post_value($con, "studentreligion")."',
        '".get_post_value($con, "studentcategory")."',
        '".get_post_value($con, "studentcaste")."',
        '".get_post_value($con, "mothertoungue")."',
        '".get_post_value($con, "nationality")."',
        '".get_post_value($con, "paidfee")."',
        '".get_post_value($con, "langstudiedxeng")."',
        '".get_post_value($con, "langstudiedxiieng")."',
        '".get_post_value($con, "vaccourse")."',
        '".get_post_value($con, "phychal")."',
        '".get_post_value($con, "exservice")."',
        '".get_post_value($con, "guardianoccupation")."',
        '".get_post_value($con, "sports")."',
        '".get_post_value($con, "NSSNCC")."',
        '".get_post_value($con, "nameandlocation")."',
        '".get_post_value($con, "accommodation")."',
        '".get_post_value($con, "medium")."',
        '".get_post_value($con, "place")."',
        'Active'
    )";

    // Execute query and check for errors
    if (!$qsql = mysqli_query($con, $sql)) {
        die("Database Error: " . mysqli_error($con));
    }

    // Get inserted application ID
    $insid = mysqli_insert_id($con);

    // Handle student qualifications
    if (isset($_POST["sub"]) && is_array($_POST["sub"])) {
        $sub = $_POST["sub"];
        $maxmark = $_POST["maxmark"];
        $marksobtained = $_POST["marksobtained"];
        $noattempts = $_POST["noattempts"];

        for ($cn = 0; $cn < count($sub); $cn++) {
            $subject = mysqli_real_escape_string($con, $sub[$cn]);
            $max_mark = mysqli_real_escape_string($con, $maxmark[$cn]);
            $marks_obt = mysqli_real_escape_string($con, $marksobtained[$cn]);
            $no_of_attempts = mysqli_real_escape_string($con, $noattempts[$cn]);

            $sql = "INSERT INTO student_qualification(application_no, subject, max_mark, marks_obt, no_of_attempts) 
                    VALUES ('$insid', '$subject', '$max_mark', '$marks_obt', '$no_of_attempts')";

            if (!$qsql = mysqli_query($con, $sql)) {
                die("Database Error: " . mysqli_error($con));
            }
        }
    }

    // Redirect to application print page
    echo "<script>alert('Application form submitted successfully.');</script>";
    echo "<script>window.location.assign('applicationformprint.php?applicationid=".$insid."');</script>";
}
?>

<form method="post" action="" name="appform" onsubmit="return validateform()">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
     <center><font size="+3">ONLINE ADMISSION FORM</font></center>
      <p>Date: <?php echo date("d-m-Y"); ?></p>
      <p>Kindly fill the following application form with valid records...</p>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- section 3 --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <div class="container clear"> 
      <!-- section content --> 
      <!-- ################################################################################################ -->
      <table width="200" border="1">
  <tr style="background-color:#FFC">
    <td colspan="4"><strong>Basic details:</strong></td>
    </tr>
<?php
if (isset($_GET["appid"]) && $_GET["appid"] !== "") 
{

?>  
  <tr style="background-color:#CFF">
    <td width="19%">Registration Date:</td>
    <td width="31%"><input type="date" name="regdate" id="regdate"></td>
    <td width="19%">Admission Number:</td>
    <td width="31%"><input type="text" name="admissionno" id="admissionno"></td>
  </tr>
  <tr style="background-color:#CFF">
    <td height="30">Appication No.</td>
    <td id="Application no"><input type="text" name="applicationno" id="applicationno"></td>
    <td>Admission Date:</td>
    <td><input type="text" name="admissiondate" id="admissiondate"></td>
  </tr>
<?php
}
?>  
  <tr style="background-color:#CFF">
    <td height="30">Course:</td>
    <td>
    <select name="course" id="course">
    <option value="Select">Select</option>
    <?php
	$sql = "SELECT * FROM course where status='Active'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[course_id]'>$rs[coursename]</option>";
	}
	?>
    </select>
    </td>
    <td>Semester</td>
    <td>
    <select name="semester" id="semester">
    <?php
	$arr = array("Select","First semester", "Third Semester", "Fifth Semester");
	foreach($arr as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
    </select>
    </td>
  </tr>
      </table>

      <!-- ################################################################################################ --> 
      <!-- / section content -->
      <div class="clear">
        <table width="200" height="326">
          <tr style="background-color:#FFC">
            <td height="36" colspan="4"><strong>Student details:</strong></td>
          </tr>
          <tr style="background-color:#CFF">
            <td width="27%" height="40">First name:</td>
            <td width="24%" id="firstname"><input type="text" name="firstname" id="firstname"></td>
            <td width="26%">DOB (dd/mm/yyy)</td>
            <td width="23%"><input type="date" name="dob" id="dob"></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="43">Last name:</td>
            <td><input type="text" name="lastname" id="lastname"></td>
            <td>Blood group:</td>
            <td><select name="bloodgroup" id="bloodgroup">
              <option value="A positive">A positive</option>
              <option value="A negative">A negative</option>
              <option value="B positive">B positive</option>
              <option value="B negative">B negative</option>
              <option value="AB positive">AB positive</option>
              <option value="AB negative">AB negative</option>
              <option value="O positive">O positive</option>
              <option value="O negative">O negative</option>
            </select></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Gender:</td>
            <td><input type="radio" name="gender" id="Male" value="Male">
Male
  <input type="radio" name="gender" id="Female" value="Female">
Female </td>
            <td>Place of Birth:</td>
            <td><input type="text" name="placeofbirth" id="placeofbirth"></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Parent's information:</td>
            <td><input type="radio" name="parentsinfo" id="parent" value="parent">
parent 
<input type="radio" name="parentsinfo" id="Guardian" value="Guardian">
Guardian</td>
            <td>Father's Occupation:</td>
            <td><input type="text" name="fathersoccupation" id="fatherssssoccupation"></td>
          </tr> 
          <tr style="background-color:#CFF">
            <td height="39">Father name:</td>
            <td><input type="text" name="fathername" id="father name"></td>
            <td>Mother Name:</td>
            <td><input type="text" name="mothername" id="mother name"></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="43">Mother's Occupation:</td>
            <td>
                <input type="text" name="mothersoccupation" id="mothersoccupation">
             </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <table width="200" border="1">
        <tr style="background-color:#FFC">
          <td colspan="4"><strong>Contact Details:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td>Contact Address:</td>
          <td id="contact Address"><textarea name="contactaddress" id="contactaddress"></textarea></td>
          <td>State:</td>
          <td><input type="text" name="state" id="state"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Mobile Number:</td>
          <td><p id="mobile  number">
            <input type="text" name="mobilenumber" id="mobileno">
          </p></td>
          <td>District:</td>
          <td><input type="text" name="district" id="district"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Email:</td>
          <td><input name="email" type="text" id="email"></td>
          <td valign="baseline">Taluk:</td>
          <td><input type="text" name="taluk" id="taluk"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="50">Alternate Contact Number:</td>
          <td><input type="text" name="alternatecontactnumber" id="alternatecontactnumber"></td>
          <td valign="baseline">City / Town / Suburb:</td>
          <td><input name="citytownsuburb" type="text" id="citytownsuburb"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><p>Country:</p></td>
          <td><p id="email">
            <input type="text" name="country" id="country">
          </p></td>
          <td valign="baseline"><p>Postal / Zip Code:</p></td>
          <td><p>
            <input type="text" name="postalzipcode" id="postalzipcode">
          </p></td>
        </tr>
      </table>
     <table width="200" border="1">
          <tr style="background-color:#FFC">
            <td colspan="4"><strong>Nationality  details:</strong></td>
          </tr>
          <tr style="background-color:#CFF">
            <td><p>Student Religion:</p></td>
            <td><p>
              <select name="studentreligion" id="studentreligion">
              <?php
	$arr = array("Select","Hindu", "Muslim", "Christian", "Jain", "Other");
	foreach($arr as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
              </select>
            </p>
            </td>
            <td><p>Mother Tongue:</p></td>
            <td><p>
              <input type="text" name="mothertoungue" id="mothertoungue">
            </p></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Category:</td>
            <td><select name="studentcategory" id="studentcategory">
            <?php
				$arr = array("Select","General", "SC", "ST", "1 A", "2 A", "2 B", "3 A", "3 B");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
			?>
            </select></td>
            <td>Nationality:</td>
            <td><input type="text" name="nationality" id="nationality"></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Caste:</td>
            <td><input type="text" name="studentcaste" id="studentcaste"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
     <table width="200" border="1">
       <tr style="background-color:#FFC">
          <td>Subject</td>
          <td>Maximum Marks</td>
          <td>Marks obtained</td>
          <td>No. of attempts</td>
        </tr>
        <tr style="background-color:#CFF">
          <td><input type="text" name="sub[]" id="textfield9" /></td>
          <td><input type="text" name="maxmark[]" id="maxmark[]" /></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained1" value="0" onkeyup="myFunction()"></td>
          <td><input type="text" name="noattempts[]" id="noattempts[]"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><input type="text" name="sub[]" id="sub[]" /></td>
          <td><input type="text" name="maxmark[]" id="maxmark[]"></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained2" value="0" onkeyup="myFunction()"></td>
          <td><input type="text" name="noattempts[]" id="noattempts[]"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><p>
            <input type="text" name="sub[]" id="sub[]" />
          </p></td>
          <td><p>
            <input type="text" name="maxmark[]" id="maxmark[]">
            </p></td>
          <td><p>
            <input name="marksobtained[]" type="text" id="marksobtained3" value="0" onkeyup="myFunction()">
          </p></td>
          <td><p>
            <input type="text" name="noattempts[]" id="noattempts[]">
            </p></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><input type="text" name="sub[]" id="sub[]"></td>
          <td><input type="text" name="maxmark[]" id="maxmark[]"></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained4" value="0"  onkeyup="myFunction()"/></td>
          <td><input type="text" name="noattempts[]" id="noattempts[]"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><input type="text" name="sub[]" id="sub[]"></td>
          <td><input type="text" name="maxmark[]" id="maxmark[]"></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained5" value="0" onkeyup="myFunction()"></td>
          <td><input type="text" name="noattempts[]" id="noattempts[]"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><input type="text" name="sub[]" id="sub[]"></td>
          <td><input type="text" name="maxmark[]" id="textfield7"></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained6" value="0" onkeyup="myFunction()"></td>
          <td><input type="text" name="noattempts[]" id="attempt6ss"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><input type="text" name="sub[]" id="sub[]"></td>
          <td><input type="text" name="maxmark[]" id="maxmark[]"></td>
          <td><input name="marksobtained[]" type="text" id="marksobtained7" value="0" onkeyup="myFunction()"></td>
          <td><input type="text" name="noattempts[]" id="noattempts[]"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">&nbsp;</td>
          <td>Total marks </td>
          <td>&nbsp;<span id="txtHint"></span></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="95%" border="1" style="border-color:#666;border:1px;">
        <tr style="background-color:#FFC">
          <td colspan="2"><strong>Other  details:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td width="77%" height="50">Language studied in X Std. other than English</td>
          <td width="23%"><input type="radio" name="langstudiedxeng" id="langstudiedxeng" value="Yes">
Yes
  <input type="radio" name="langstudiedxeng" id="langstudiedxeng" value="No">
No </td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="44">Language studied in XII Std. other than English</td>
          <td><input type="radio" name="langstudiedxiieng" id="langstudiedxiieng" value="Yes">
yes
  <input type="radio" name="langstudiedxiieng" id="langstudiedxiieng" value="No">  No </td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="49">Are You a Vocational course student?</td>
          <td><input type="radio" name="vaccourse" id="vaccourse" value="Yes">
yes
  <input type="radio" name="vaccourse" id="vaccourse" value="No">
No </td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="46">Are you Physically Challenged?</td>
          <td><input type="radio" name="phychal" id="yes4" value="Yes">
yes
  <input type="radio" name="phychal" id="no4" value="No">
No</td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="58">Are you a Son/Daughter of Ex-Serviceman of Karnataka origin?</td>
          <td><input type="radio" name="exservice" id="exservice" value="Yes">
yes
  <input type="radio" name="exservice" id="exservice" value="No">
No</td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="57">Whether your father/mother/guardian is Farmer/Agricultural Labourer/Registered   Tenant?</td>
          <td><p>
            <input type="radio" name="guardianoccupation" id="guardianoccupation" value="Yes">
            yes
            <input type="radio" name="guardianoccupation" id="guardianoccupation" value="No">
            No</p></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="44">Did you represent the District or State level in any sports?</td>
          <td><input type="radio" name="sports" id="sports" value="Yes">
            yes
            <input type="radio" name="sports" id="sports" value="No">
            No</td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="47">Are you a member of NSS/NCC</td>
          <td><input type="radio" name="NSSNCC" id="NSSNCC" value="Yes">
yes
  <input type="radio" name="NSSNCC" id="NSSNCC" value="No">
No</td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Name and Location of School Last studied</td>
          <td><input type="nameandlocation" name="nameandlocation" id="nameandlocation"></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="34">Do you need hostel accommodation?</td>
          <td><input type="radio" name="accommodation" id="yes9" value="Yes">
yes
  <input type="radio" name="accommodation" id="no9" value="No">
No</td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="49">Medium of Instruction</td>
          <td><input type="radio" name="medium" id="yes10" value="English">
            English
            <input type="radio" name="medium" id="no10" value="Kannada">
            Kannada </td>
        </tr>
        </table>
    <hr>
      <table width="200" border="1">
        <tr style="background-color:#FFC">
          <td colspan="2"><strong>Declaration:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td colspan="2">I declare that all the particulars furnished above   are true and correct. I submit that I will abide by the rules and regulations of   the College.</td>
          </tr>
        <tr style="background-color:#CFF">
          <td width="48%"><p>Place :
              
              <input type="text" name="place" id="place">
          </p></td>
          <td width="52%"></td>
          </tr>
        </table>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Submit">
      </p>
    </div>
  </div>
</div>
</form>
<!-- / section 3 --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php
include("footer.php");
?>
<style type="text/css">
.container .group{text-align:center;}
.container .group div{padding:8px 0; font-size:16px; font-family:Verdana, Geneva, sans-serif;}
.container .group div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .group div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (min-width:180px) and (max-width:900px) {
	.container .group div{margin-bottom:0;}
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script type="application/javascript">
function validateform()
{
	if(document.appform.firstname.value=="")
	{
	    alert("First name should not be empty..");
		document.appform.firstname.focus();
		return false;
	}
	else if(document.appform.lastname.value=="")
	{
	    alert("Last name should not be empty..");
		document.appform.lastname.focus();
		return false;
	}
	else if(document.appform.dob.value=="")
	{
	    alert("Date of birth should not be empty..");
		document.appform.dob.focus();
		return false;
	}
	else if(document.appform.placeofbirth.value=="")
	{
	    alert("Place of birth should not be empty..");
		document.appform.placeofbirth.focus();
		return false;
	}
	else if(document.appform.fathersoccupation.value=="")
	{
	    alert("Fathers occupation should not be empty..");
		document.appform.fathersoccupation.focus();
		return false;
	}
	else if(document.appform.fathername.value=="")
	{
	    alert("Father name should not be empty..");
		document.appform.fathername.focus();
		return false;
	}
	
	else if(document.appform.mothername.value=="")
	{
	    alert("Mother name should not be empty..");
		document.appform.mothername.focus();
		return false;
	}
	else if(document.appform.mothersoccupation.value=="")
	{
	    alert("Mothers occupation  should not be empty..");
		document.appform.mothersoccupation.focus();
		return false;
	}
	else if(document.appform.contactaddress.value=="")
	{
	    alert("Contact address should not be empty..");
		document.appform.contactaddress.focus();
		return false;
	}
	else if(document.appform.state.value=="")
	{
	    alert("State should not be empty..");
		document.appform.state.focus();
		return false;
	}
	else if(document.appform.mobilenumber.value=="")
	{
	    alert("Mobile number should not be empty..");
		document.appform.mobilenumber.focus();
		return false;
	}
	else if(document.appform.district.value=="")
	{
	    alert("District should not be empty..");
		document.appform.district.focus();
		return false;
	}
	else if(document.appform.email.value=="")
	{
	    alert("Email  should not be empty..");
		document.appform.email.focus();
		return false;
	}
	else if(document.appform.taluk.value=="")
	{
	    alert("Taluk should not be empty..");
		document.appform.taluk.focus();
		return false;
	}
	else if(document.appform.alternatecontactnumber.value=="")
	{
	    alert("Alternate contact number should not be empty..");
		document.appform.alternatecontactnumber.focus();
		return false;
	}
	
    else if(document.appform.citytownsuburb.value=="")
	{
	    alert("City/Town/Suburb should not be empty..");
		document.appform.citytownsuburb.focus();
		return false;
	}
    else if(document.appform.country.value=="")
	{
	    alert("Country should not be empty..");
		document.appform.country.focus();
		return false;
	}
    else if(document.appform.postalzipcode.value=="")
	{
	    alert("Postal/Zipcode should not be empty..");
		document.appform.postalzipcode.focus();
		return false;
	}
    else if(document.appform.studentcaste.value=="")
	{
	    alert("Student caste should not be empty..");
		document.appform.studentcaste.focus();
		return false;
	}
    else if(document.appform.mothertoungue.value=="")
	{
	    alert("Mother toungue should not be empty..");
		document.appform.mothertoungue.focus();
		return false;
	}
    else if(document.appform.nationality.value=="")
	{
	    alert("Nationality should not be empty..");
		document.appform.nationality.focus();
		return false;
	}
	else if(document.appform.studentcaste.value=="")
	{
	    alert("Student caste should not be empty..");
		document.appform.studentcaste.focus();
		return false;
	}
	
	else if(document.appform.maxmark1.value=="")
	{
	    alert("Max mark1 should not be empty..");
		document.appform.maxmark1.focus();
		return false;
	}
	
	else if(document.appform.maxmark2.value=="")
	{
	    alert("Max mark2 should not be empty..");
		document.appform.maxmark2.focus();
		return false;
	}
	else if(document.appform.maxmark3.value=="")
	{
	    alert("Max mark3  should not be empty..");
		document.appform.maxmark3.focus();
		return false;
	}
	else if(document.appform.maxmark4.value=="")
	{
	    alert("Max mark4 should not be empty..");
		document.appform.maxmark4.focus();
		return false;
	}else if(document.appform.maxmark5.value=="")
	{
	    alert("Max mark5 caste should not be empty..");
		document.appform.maxmark5.focus();
		return false;
	}else if(document.appform.maxmark6.value=="")
	{
	    alert("Max mark6 should not be empty..");
		document.appform.maxmark6.focus();
		return false;
	}
	else if(document.appform.marksobtain1.value=="")
	{
	    alert("Marks obtain1  should not be empty..");
		document.appform.marksobtain1.focus();
		return false;
	}
	else if(document.appform.marksobtain2.value=="")
	{
	    alert("Marks obtain2 should not be empty..");
		document.appform.marksobtain2.focus();
		return false;
	}
	else if(document.appform.marksobtain3.value=="")
	{
	    alert("Marks obtain3 should not be empty..");
		document.appform.marksobtain3.focus();
		return false;
	}
	else if(document.appform.marksobtain4.value=="")
	{
	    alert("Marks obtain4 should not be empty..");
		document.appform.marksobtain4.focus();
		return false;
	}
	else if(document.appform.marksobtain5.value=="")
	{
	    alert("Marks obtain5 should not be empty..");
		document.appform.marksobtain5.focus();
		return false;
	}
	else if(document.appform.marksobtain6.value=="")
	{
	    alert("Marks obtain6 should not be empty..");
		document.appform.marksobtain6.focus();
		return false;
	}
	
	else if(document.appform.nameandlocation.value=="")
	{
	    alert("Name and location obtain6 should not be empty..");
		document.appform.nameandlocation.focus();
		return false;
	}
	
	else if(document.appform.place.value=="")
	{
	    alert("Place should not be empty..");
		document.appform.place.focus();
		return false;
	}
	else if(document.appform.date.value=="")
	{
	    alert("Date should not be empty..");
		document.appform.date.focus();
		return false;
	}
		else
	{
		return true;
	}
	
}
</script>
<script type="text/javascript">
function myFunction()
{
var the_fields1 = document.getElementById("marksobtained1").value;
var the_fields2 = document.getElementById("marksobtained2").value;
var the_fields3 = document.getElementById("marksobtained3").value;
var the_fields4 = document.getElementById("marksobtained4").value;
var the_fields5 = document.getElementById("marksobtained5").value;
var the_fields6 = document.getElementById("marksobtained6").value;
var the_fields7 = document.getElementById("marksobtained7").value;
document.getElementById("txtHint").innerHTML = parseFloat(the_fields1) + parseFloat(the_fields2) +parseFloat(the_fields3) +parseFloat(the_fields4) + parseFloat(the_fields5) +parseFloat(the_fields6) + parseFloat(the_fields7);
}
</script>