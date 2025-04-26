<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <div class="group btmspace-30"> 
        <div id="content" class="two_third first"> 
          <h1>Course List</h1>
          <strong>We offer the following courses:</strong><br>
          
          <table border="1" cellpadding="5" cellspacing="0">
            <tr>
              <th>Course Name</th>
              <th>Course Type</th>
              <th>About Course</th>
            </tr>
            
            <?php
            $query = "SELECT coursename, coursetype, description FROM course WHERE status='Active'";
            $result = mysqli_query($con, $query);
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['coursename'] . "</td>";
                echo "<td>" . $row['coursetype'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>

<?php
include("footer.php");
?>
