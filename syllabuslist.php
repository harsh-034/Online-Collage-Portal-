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
        <main class="container clear"> 
          <h1>Syllabus List</h1>        
          <form id="form1" name="form1" method="get" action="">
            <table width="239" border="1">
              <tr>
                <th width="72" scope="row">&nbsp;Course</th>
                <td width="73">&nbsp;
                  <select name="course">
                    <option value="">Select</option>
                    <?php
                    $sql = "SELECT * FROM course WHERE status='Active'";
                    $qsql = mysqli_query($con, $sql);
                    while ($rs = mysqli_fetch_array($qsql)) {
                      echo "<option value='" . $rs['course_id'] . "'>" . $rs['coursename'] . " - " . $rs['coursetype'] . "</option>";
                    }
                    ?>
                  </select>
                </td>
                <td width="72" rowspan="2"><br />
                  <input type="submit" name="btnsearch" id="btnsearch" value="Search syllabus" />
                </td>
              </tr>
              <tr>
                <th scope="row">&nbsp;Semester</th>
                <td>&nbsp;
                  <select name="semester">
                    <?php
                    $arr = array("Select", "1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester");
                    foreach ($arr as $val) {
                      echo "<option value='$val'>$val</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>
            </table>
          </form>

          <?php
          if (isset($_GET['btnsearch'])) {
              $course_id = mysqli_real_escape_string($con, $_GET['course']);
              $semester = mysqli_real_escape_string($con, $_GET['semester']);

              $sql1 = "SELECT * FROM course WHERE course_id='$course_id'";
              $qsql1 = mysqli_query($con, $sql1);
              
              if ($qsql1 && mysqli_num_rows($qsql1) > 0) {
                  $rs1 = mysqli_fetch_array($qsql1);
              } else {
                  $rs1 = null; // Set to null if no result found
              }

              ?>
              <h1>Search Result</h1>    
              <table width="200" border="1">
                <tr>
                  <th scope="col">&nbsp;Course Name - 
                    <?php 
                    if ($rs1) { 
                        echo $rs1['coursename'] . " - " . $rs1['coursetype']; 
                    } else { 
                        echo "Not Found"; 
                    } 
                    ?>
                  </th>
                  <th scope="col">&nbsp;Semester - <?php echo htmlspecialchars($semester); ?></th>
                </tr>
              </table>

              <?php
              if ($rs1) { // Only search subjects if the course was found
                  $sqlsubject = "SELECT * FROM subject WHERE course_id='$course_id'";
                  $qsqlsubject = mysqli_query($con, $sqlsubject);
                  while ($rssubject = mysqli_fetch_array($qsqlsubject)) {
                      ?>
                      <table width="200" border="1">
                        <tr>
                          <th scope="col">&nbsp;Subject Name - <?php echo $rssubject['subject_name']; ?>&nbsp;<hr />
                            &nbsp;Subject Code - <?php echo $rssubject['subjectcode']; ?></th>
                        </tr>
                        <?php
                        $sqlsyllabus = "SELECT * FROM syllabus WHERE subject_id='" . $rssubject['subject_id'] . "'";
                        $qsyllabus = mysqli_query($con, $sqlsyllabus);
                        while ($rssyllabus = mysqli_fetch_array($qsyllabus)) {
                        ?>
                          <tr>
                            <td colspan="2" scope="col">&nbsp;<strong><?php echo $rssyllabus['syllabustitle']; ?></strong>&nbsp;<br />
                              <?php echo $rssyllabus['syllabuscontents']; ?></td>
                          </tr>
                        <?php
                        }
                        ?>
                      </table>
                      <?php
                  }
              }
          }
          ?>
        </main>
      </div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>
