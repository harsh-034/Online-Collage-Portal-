<?php
include("header.php");
include("dbconnection.php");

if (isset($_POST['submit'])) {  // Corrected line
    $sql = "INSERT INTO `staff`(`name`, `login_id`, `password`, `staff_type`, `designtion`, `address`, `contact_no`, `status`) 
            VALUES ('$_POST[staffname]','$_POST[staffloginid]','$_POST[staffpassword]','$_POST[stafftype]','$_POST[staffdesignation]','$_POST[staffadress]','$_POST[staffcontactno]','$_POST[staffstatus]')";
    if (!$qsql = mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('Staff record inserted successfully.');</script>";
    }
}

// Fix: Check if 'editid' is set and fetch the record only if it exists
$rs = null; // Initialize $rs variable
if (isset($_GET['editid'])) {  // Corrected line
    $sql = "SELECT * FROM staff WHERE staff_id='$_GET[editid]'";
    $qsql = mysqli_query($con, $sql);

    // Check if the query returned a result
    if (mysqli_num_rows($qsql) > 0) {
        $rs = mysqli_fetch_array($qsql);
    } else {
        echo "<script>alert('Staff record not found.'); window.location='viewstaff.php';</script>";
    }
}
?>

<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <?php include("leftsidebar.php"); ?>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="two_third"> 
        <h1><a href="staff.php"><strong>Add Staff</strong></a> | <strong><a href="viewstaff.php">View Staff</a></strong></h1>
        <h1>Add Staff</h1>
        <form method="post" action="" onsubmit="return validateform()">
        <table width="603" border="1">
            <tr>
                <td width="27%">Name</td>
                <td width="73%"><input value="<?php echo isset($rs['name']) ? $rs['name'] : ''; ?>" type="text" name="staffname" size="25" id="staffname"></td>
            </tr>
            <tr>
                <td>LoginId</td>
                <td><input type="text" value="<?php echo isset($rs['login_id']) ? $rs['login_id'] : ''; ?>" name="staffloginid" id="staffloginid" size="25"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" value="<?php echo isset($rs['password']) ? $rs['password'] : ''; ?>" name="staffpassword" id="staffpassword" size="25" /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" value="<?php echo isset($rs['password']) ? $rs['password'] : ''; ?>" name="staffcpassword" id="staffcpassword" size="25"></td>
            </tr>
            <tr>
                <td>Staff Type</td>
                <td><select name="stafftype" id="stafftype">
                    <option>Select</option>
                    <option value="Administrator" <?php echo (isset($rs['staff_type']) && $rs['staff_type'] == 'Administrator') ? 'selected' : ''; ?>>Administrator</option>
                    <option value="Employee" <?php echo (isset($rs['staff_type']) && $rs['staff_type'] == 'Employee') ? 'selected' : ''; ?>>Employee</option>
                </select></td>
            </tr>
            <tr>
                <td>Designation</td>
                <td><input type="text" value="<?php echo isset($rs['designation']) ? $rs['designation'] : ''; ?>" name="staffdesignation" id="staffdesignation" size="25"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="staffadress" id="staffadress"><?php echo isset($rs['address']) ? $rs['address'] : ''; ?></textarea></td>
            </tr>
            <tr>
                <td>Contact No</td>
                <td><input type="text" value="<?php echo isset($rs['contact_no']) ? $rs['contact_no'] : ''; ?>" name="staffcontactno" id="staffcontactno" size="25"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><select name="staffstatus" id="staffstatus">
                    <option value="">Select</option>
                    <option value="Active" <?php echo (isset($rs['status']) && $rs['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?php echo (isset($rs['status']) && $rs['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>        
                </select></td>
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

<script type="application/javascript">
function validateform() {
    if (document.staffform.name.value == "") {
        alert("Name should not be empty..");
        document.staffform.name.focus();
        return false;
    }
    else if (document.staffform.loginid.value == "") {
        alert("Login id should not be empty..");
        document.staffform.loginid.focus();
        return false;
    }
    else if (document.staffform.password.value == "") {
        alert("Password should not be empty..");
        document.staffform.password.focus();
        return false;
    }
    else if (document.staffform.paswrd.value == "") {
        alert("Confirm password should not be empty..");
        document.staffform.passwrd.focus();
        return false;
    }
    else if (document.staffform.designation.value == "") {
        alert("Designation should not be empty..");
        document.staffform.designation.focus();
        return false;
    }
    else if (document.staffform.address.value == "") {
        alert("Address should not be empty..");
        document.staffform.address.focus();
        return false;
    }
    else if (document.contactno.address.value == "") {
        alert("Contact no should not be empty..");
        document.staffform.contactno.focus();
        return false;
    }
    else {
        return true;
    }
}
</script>
