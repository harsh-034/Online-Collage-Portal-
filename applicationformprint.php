<?php
include("header.php");
include("dbconnection.php");

$applicationid = isset($_GET["applicationid"]) ? mysqli_real_escape_string($con, $_GET["applicationid"]) : '';

if ($applicationid) {
    $sql = "SELECT * FROM applicationform WHERE applicationnumber='$applicationid'";
    $qsql = mysqli_query($con, $sql);
    
    if (!$qsql) {
        echo mysqli_error($con);
    }

    $rsprint = mysqli_fetch_array($qsql);
}
?>
<form method="post" action="" name="appform" onsubmit="return validateform()">
    <div class="wrapper row3">
        <div class="rounded">
            <main class="container clear"> 
                <center><font size="+3">ONLINE ADMISSION FORM</font></center>
                <p>Date: <?php echo date("d-m-Y"); ?></p>
                <p>Kindly fill the following application form with valid records...</p>
            </main>
        </div>
    </div>

    <div class="wrapper row3">
        <div class="rounded">
            <div class="container clear">
                <table width="100%" border="1">
                    <tr style="background-color:#FFC">
                        <td colspan="4"><strong>Basic details:</strong></td>
                    </tr>
                    <?php if (isset($_GET["appid"])) { ?>  
                        <tr style="background-color:#CFF">
                            <td width="25%">Registration Date:</td>
                            <td width="25%"><input type="date" name="regdate" id="regdate"></td>
                            <td width="25%">Admission Number:</td>
                            <td width="25%"><input type="text" name="admissionno" id="admissionno"></td>
                        </tr>
                        <tr style="background-color:#CFF">
                            <td>Application No.</td>
                            <td><input type="text" name="applicationno" id="applicationno"></td>
                            <td>Admission Date:</td>
                            <td><input type="date" name="admissiondate" id="admissiondate"></td>
                        </tr>
                    <?php } ?>  
                    <tr style="background-color:#CFF">
                        <td>Course:</td>
                        <td>
                            <?php
                            $sqlcourse = "SELECT * FROM course WHERE course_id='" . $rsprint["course_id"] . "'";
                            $qsqlcourse = mysqli_query($con, $sqlcourse);
                            $rscourse = mysqli_fetch_array($qsqlcourse);
                            echo $rscourse["coursename"];
                            ?>
                        </td>
                        <td>Semester</td>
                        <td><?php echo $rsprint["semester"]; ?></td>
                    </tr>
                </table>

                <table width="100%" border="1">
                    <tr style="background-color:#FFC">
                        <td>Subject</td>
                        <td>Maximum Marks</td>
                        <td>Marks Obtained</td>
                        <td>No. of Attempts</td>
                    </tr>
                    <?php
                    $totmark = 0;
                    $sql = "SELECT * FROM student_qualification WHERE application_no='$applicationid'";
                    $qsql = mysqli_query($con, $sql);
                    while ($rsmarklist = mysqli_fetch_array($qsql)) {
                        ?>
                        <tr style="background-color:#CFF">
                            <td><?php echo $rsmarklist["subject"]; ?></td>
                            <td><?php echo $rsmarklist["max_mark"]; ?></td>
                            <td><?php echo $rsmarklist["marks_obt"]; ?></td>
                            <td><?php echo $rsmarklist["no_of_attempts"]; ?></td>
                        </tr>
                        <?php
                        $totmark += $rsmarklist["marks_obt"];
                    }
                    ?>        
                    <tr style="background-color:#CFF">
                        <td></td>
                        <td><strong>Total Marks</strong></td>
                        <td><?php echo $totmark; ?></td>
                        <td></td>
                    </tr>
                </table>
                <button onclick="myFunction()">Print this page</button>
                <script>
                    function myFunction() {
                        window.print();
                    }
                </script>
            </div>
        </div>
    </div>
</form>

<?php include("footer.php"); ?>

<style type="text/css">
.container .group { text-align: center; }
.container .group div { padding: 8px 0; font-size: 16px; font-family: Verdana, Geneva, sans-serif; }
.container .group div:nth-child(odd) { color: #FFFFFF; background: #CCCCCC; }
.container .group div:nth-child(even) { color: #FFFFFF; background: #979797; }
@media screen and (min-width:180px) and (max-width:900px) {
    .container .group div { margin-bottom: 0; }
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
