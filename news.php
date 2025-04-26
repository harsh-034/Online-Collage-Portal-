<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
        <!-- Left Column -->
        <div class="one_quarter first"> 
          <!-- ################################################################################################ -->
          <h4>Latest News & Events</h4>
          <ul class="nospace">
          <?php
            $sql = "SELECT * FROM news WHERE status='Active' ORDER BY publish_date DESC LIMIT 4";
            $qsql = mysqli_query($con, $sql);
            while($rs = mysqli_fetch_array($qsql))
            {
                echo "<li class='btmspace-15'><a href='news-more.php?newsid={$rs['news_id']}'><em class='heading'>{$rs['news_title']}</em> 
                <img class='borderedbox' src='newsimg/{$rs['image']}' alt='' style='width:220px;height:95px;'></a></li>";
            }
          ?> 
          </ul>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Left Column --> 

        <!-- Middle Column -->
        <div class="one_half"> 
          <!-- ################################################################################################ -->
          <h2>Latest News &amp; Events</h2>
          <ul class="nospace listing">
            <li class="clear">
          <?php
            $sql = "SELECT * FROM news WHERE status='Active'";
            
            if(isset($_GET['search']) && !empty($_GET['search']))
            {
                $search = mysqli_real_escape_string($con, $_GET['search']);
                $sql .= " AND (news_title LIKE '%$search%' OR news_content LIKE '%$search%')";
            }

            $sql .= " ORDER BY publish_date";
            $qsql = mysqli_query($con, $sql);
            
            while($rs = mysqli_fetch_array($qsql))
            {
                echo "<div class='imgl borderedbox'><img src='newsimg/{$rs['image']}' style='width:120px;height:120px;'></div>";
                echo "<p class='nospace btmspace-15'><a href='news-more.php?newsid={$rs['news_id']}'>{$rs['news_title']}</a></p>";
                echo "<p>" . substr($rs['news_content'], 0, 140) . "...</p>";
                echo "<p><a href='news-more.php?newsid={$rs['news_id']}'>Read More..</a></p><hr>";
            }
          ?>
            </li>
          </ul>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Middle Column --> 

        <!-- Right Column -->
        <div class="one_quarter sidebar"> 
          <!-- ################################################################################################ -->
          <div class="sdb_holder">
            <h6>Quick Information</h6>
            <ul class="nospace quickinfo">
              <li class="clear"><a href="applicationform.php"><img src="images/onlineadmission.jpg" style="width:80px;height:80px;"> Online Admission Form</a></li>
              <li class="clear"><a href="gallery.php"><img src="images/gallery.jpg" alt="" style="width:80px;height:80px;"> View Photo Gallery</a></li>
              <li class="clear"><a href="news.php"><img src="images/newsevents.jpg" alt="" style="width:80px;height:80px;"> View News and Events</a></li>
              <li class="clear"><a href="courselist.php"><img src="images/course.jpg" alt="" style="width:80px;height:80px;"> View Course Details</a></li>
              <li class="clear"><a href="searchresult.php"><img src="images/result.jpg" alt="" style="width:80px;height:80px;"> Result</a></li>
              <li class="clear"><a href="contact.php"><img src="images/contact.jpg" alt="" style="width:80px;height:80px;"> Contact Us</a></li>
            </ul>
          </div>                             
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Right Column --> 
      </div>
      <!-- ################################################################################################ --> 
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>
