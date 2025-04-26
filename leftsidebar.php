<?php
// Check if session is not already active before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="one_quarter first"> 
        <!-- ################################################################################################ -->
        <?php
        if(isset($_SESSION["staffid"]))
        {
        ?>
        <h6><a href="dashboard.php">Administrator Menu</a></h6>
        <nav class="sdb_holder">
          <ul>
            <li><a href="viewapplication.php">View application</a></li><hr />
            <li><a href="viewadmission.php">View admission Records</a></li><hr />
            <li><a href="publishnews.php">Publish News</a></li> <hr />
            <li><a href="viewresult.php">Publish result</a></li><hr />
            <li><a href="viewresult.php">View result</a></li> <hr />
            <li><a href="viewalbum.php">View album</a></li><hr />
            <li><a href="viewtimetable.php">Set TimeTable</a></li> <hr />
            <li><a href="webpage.php">Web Pages</a></li><hr />
            <?php
            if(isset($_SESSION["staff_type"]) && $_SESSION["staff_type"] == "Administrator")  
            {
            ?>
            <li><a href="viewcourse.php">View Course</a></li> <hr />
            <li><a href="viewsubject.php">View Subject</a></li>  <hr />
            <li><a href="viewSyllabus.php">View Syllabus</a></li>  <hr />
            <li><a href="Sliderimage.php">Slider settings</a></li> <hr />    
            <li><a href="viewstaff.php">View Staff</a></li><hr /> 
            <?php
            }
            ?>
          </ul>
        </nav>
        <?php
        }
        ?>
        <!-- ################################################################################################ --> 
</div>
