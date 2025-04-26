<?php
ob_start();
session_start(); // Ensure session starts properly

if(isset($_SESSION["staffid"])) {
    header("Location: dashboard.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if(isset($_POST['submit'])) {
    // Secure inputs
    $loginid = mysqli_real_escape_string($con, $_POST['loginid']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $stafftype = mysqli_real_escape_string($con, $_POST['stafftype']);

    // Query execution
    $sql = "SELECT * FROM staff WHERE login_id='$loginid' AND password='$password' AND staff_type='$stafftype'";
    $qsql = mysqli_query($con, $sql);

    if(!$qsql) {
        echo mysqli_error($con);
    } else {
        if(mysqli_num_rows($qsql) == 1) {
            $rs = mysqli_fetch_array($qsql);
            $_SESSION["staffid"] = $rs['staff_id'];
            $_SESSION["staff_type"] = $rs['staff_type'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Login ID and Password.');</script>";
        }
    }
}
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1>Login</h1>
        <form method="post" action="">
          <table width="406" border="1">
            <tr>
              <td width="24%" height="38">Login type</td>
              <td width="76%">
                <select name="stafftype" id="stafftype" required>
                  <option value="">Select</option>
                  <option value="Administrator">Administrator</option>
                  <option value="Employee">Employee</option>
                </select>
              </td>
            </tr>
            <tr>
              <td height="35">Login ID</td>
              <td><input name="loginid" type="text" id="loginid" size="35" required></td>
            </tr>
            <tr>
              <td height="33">Password</td>
              <td><input name="password" type="password" id="password" size="35" required></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>
<?php include("footer.php"); ?>
