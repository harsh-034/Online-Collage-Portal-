<?php
session_start();
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
include("header.php");
?>

<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
            <?php
	  include("leftsidebar.php");
	  ?>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="two_third"> 
        <!-- ################################################################################################ -->
        <h1>Admin Dashboard</h1>
        <div id="comments">
          <h2>No. of Admission record - 
          <?php
		  $sql ="SELECT * FROM admission ";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>

          <h2>No.of albums record -
          <?php
		  $sql ="SELECT * FROM album ";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          <h2>No. of applicationform  record -
          <?php
		  $sql ="SELECT * FROM applicationform ";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          
          <h2>No.of course  record -
          <?php
		  $sql ="SELECT * FROM course ";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
           <h2>No. of image record -
          <?php
		  $sql ="SELECT * FROM  image";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
           <h2>No. of news record -
          <?php
		  $sql ="SELECT * FROM news";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2> No. of result record -
          <?php
		  $sql ="SELECT * FROM result";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2> No. of  slider record -
          <?php
		  $sql ="SELECT * FROM slider ";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2> No. of staff  record -
          <?php
		  $sql ="SELECT * FROM staff";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2>No.of student_qualification record -
          <?php
		  $sql ="SELECT * FROM student_qualification";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2> No. of subject record -
          <?php
		  $sql ="SELECT * FROM subject";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
          <h2> No.of syllabus record -
          <?php
		  $sql ="SELECT * FROM syllabus";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
          
           <h2> No. of time_table record -
          <?php
		  $sql ="SELECT * FROM time_table";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
           <h2> No. of webpage record -
          <?php
		  $sql ="SELECT * FROM webpage";
		  $qsql = mysqli_query($con,$sql);
		  echo mysqli_num_rows($qsql);
		  ?>
          </h2>
       
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php
include("footer.php");
?>