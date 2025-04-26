<?php
session_start();
include("header.php");
include("dbconnection.php");

// Fix: Check if 'newsdelid' exists before using it
if(isset($_GET['newsdelid'])) {
    $newsdelid = mysqli_real_escape_string($con, $_GET['newsdelid']);
    $sql = "DELETE FROM news WHERE news_id='$newsdelid'";
    $qsql = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con) == 1) {
        echo "<script>alert('News record deleted successfully...');</script>";
    }
}
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <div class="group btmspace-30"> 
        <div class="one_quarter first"> 
          <h4>Latest News & Events</h4>
          <ul class="nospace">
          <?php
          // Fix: Corrected SQL syntax and used proper array key formatting
          $sql = "SELECT * FROM news WHERE status='Active' ORDER BY publish_date DESC LIMIT 4";
          $qsql = mysqli_query($con, $sql);
          while($rs = mysqli_fetch_array($qsql)) {
              echo "<li class='btmspace-15'><a href='news.php?news_id=" . $rs['news_id'] . "'>
              <em class='heading'>" . $rs['news_title'] . "</em> 
              <img class='borderedbox' src='newsimg/" . $rs['image'] . "' alt='' style='width:220px;height:95px;'></a></li>";
          }
          ?> 
          </ul>
        </div>
       
        <div class="one_half"> 
          <h2>Latest News &amp; Events</h2>
          <ul class="nospace listing">
            <li class="clear">
          <?php
          // Fix: Corrected SQL syntax
          if(isset($_GET['newsid'])) {
              $newsid = mysqli_real_escape_string($con, $_GET['newsid']);
              $sql = "SELECT * FROM news WHERE news_id='$newsid'";
              $qsql = mysqli_query($con, $sql);

              while($rs = mysqli_fetch_array($qsql)) {
                  echo "<h2><a href='news-more.php?newsid=" . $rs['news_id'] . "'>" . $rs['news_title'] . "</a></h2>";
                  echo "<p><u> Publish date: " . $rs['publish_date'] . " | News type - " . $rs['news_type'] . "</u></p>";

                  if(isset($_SESSION["staffid"])) {
                      echo " | <a href='publishnews.php?newsdelid=" . $rs['news_id'] . "'>Edit News</a> 
                      | <a href='news-more.php?newsdelid=" . $rs['news_id'] . "'>Delete News</a></p>";
                  }
                  echo "<div class='imgl borderedbox'><img src='newsimg/" . $rs['image'] . "' style='width:520px;height:320px;'></div>";
                  echo "<p>" . $rs['news_content'] . "</p>";
              }
          }
          ?>
            </li>
          </ul>
        </div>

        <div class="one_quarter sidebar"> 
          <div class="sdb_holder">
            <h6>Quick Information</h6>
            <ul class="nospace quickinfo">
              <li class="clear"><a href="applicationform.php"><img src="images/onlineadmission.jpg" style="width:80px;height:80px;"> Online Admission Form</a></li>
              <li class="clear"><a href="gallery.php"><img src="images/gallery.jpg" alt="" style="width:80px;height:80px;"> View Photo Gallery</a></li>
              <li class="clear"><a href="news.php"><img src="images/newsevents.jpg" alt="" style="width:80px;height:80px;"> View News and Events</a></li>
              <li class="clear"><a href="viewallcourse.php"><img src="images/course.jpg" alt="" style="width:80px;height:80px;"> View Course Details</a></li>
              <li class="clear"><a href="searchresult.php"><img src="images/result.jpg" alt="" style="width:80px;height:80px;"> Result</a></li>
              <li class="clear"><a href="contact.php"><img src="images/contact.jpg" alt="" style="width:80px;height:80px;"> Contact Us</a></li>
            </ul>
          </div>                             
        </div>
      </div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>
