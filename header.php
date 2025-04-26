<?php
// Check if session is not already active before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("dbconnection.php");

if (isset($_SESSION['staffid'])) {  // Fixed: Ensure session variable exists
    $staffid = mysqli_real_escape_string($con, $_SESSION['staffid']);  // Prevent SQL injection
    $sqlstaff = "SELECT * FROM staff WHERE staff_id='$staffid'";
    $qsqlstaff = mysqli_query($con, $sqlstaff);

    if ($qsqlstaff) {
        $rsstaff = mysqli_fetch_array($qsqlstaff);
    } else {
        echo "Error: " . mysqli_error($con);  // Debugging MySQL error
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo isset($pagetitle) ? $pagetitle : "College Portal"; ?></title>  <!-- Fixed: Prevent undefined variable error -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <nav>
      <ul>
        <?php if(isset($_SESSION['staffid'])) { ?>  <!-- Fixed: Proper session check -->
          <li>Welcome <?php echo isset($rsstaff['name']) ? $rsstaff['name'] : "Staff"; ?></li>  <!-- Fixed: Prevent undefined index error -->
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>        		  
        <?php } else { ?>
          <li><a href="index.php">Home</a></li>
          <li><a href="login.php">Staff Login</a></li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="#" title="Free Student Projects" rel="home" target="_blank" style="background-color:rgba(255,255,255,1.00); color:rgba(0,0,0,1.00)">College Portal</a></h1>
    </div>
    <div class="fl_right">
      <form method="get" action="news.php">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" name="search" placeholder="Search Here" style="width:150px;height:20px;">  <!-- Fixed: Search bar width -->
        </fieldset>
      </form>
    </div>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="applicationform.php">Application Form</a></li>
        <li><a href="gallery.php">Gallery</a></li> 
        <li><a href="news.php">News</a></li>
        <li><a class="drop" href="#">Student Portal</a>
          <ul>
            <li><a href="courselist.php">Courses</a></li>
            <li><a href="syllabuslist.php">Syllabus</a></li>
            <li><a href="timetable.php">Time Table</a></li>
            <li><a href="searchresult.php">Result</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Contact Us</a></li>       
      </ul>
    </nav>
  </div>
</div>
