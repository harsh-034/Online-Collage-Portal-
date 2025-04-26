<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Delete result record
if (isset($_GET['delid'])) {  
    $delid = mysqli_real_escape_string($con, $_GET['delid']);
    $sql = "DELETE FROM result WHERE result_id='$delid'";
    $qsql = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Result record deleted successfully.');</script>";
    }
}

// Insert result record
if (isset($_POST['PublishResult'])) {  
    $studentid = mysqli_real_escape_string($con, $_POST['studentid']);
    $result = mysqli_real_escape_string($con, $_POST['result']);

    $sql = "INSERT INTO result (applicationnumber, result, status) VALUES ('$studentid', '$result', 'Active')";
    $qsql = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Result record inserted successfully.');</script>";
    }
}
?>
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear"> 
            <?php include("leftsidebar.php"); ?>
            <div id="content" class="two_third"> 
                <h1>Add Result</h1>
                <form method="post" action="" onsubmit="return validateform()" name="form1">
                    <table border="1">
                        <tr>
                            <th>Student Name</th>
                            <td>
                                <select name="studentid">
                                    <option value="">Select Student</option>
                                    <?php
                                    $sql = "SELECT * FROM applicationform";
                                    $qsql = mysqli_query($con, $sql);
                                    while ($rs = mysqli_fetch_array($qsql)) {
                                        echo "<option value='{$rs['applicationnumber']}'>{$rs['firstname']} {$rs['lastname']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Result</th>
                            <td><textarea name="result"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="PublishResult" value="Publish Result"></td>
                        </tr>
                    </table>
                </form>
                <hr />
                <h1>View Result</h1>
                <table border="1">
                    <tr>
                        <th>Roll Number</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM result";
                    $qsql = mysqli_query($con, $sql);
                    while ($rs = mysqli_fetch_array($qsql)) {
                        ?>
                        <tr>
                            <td><?php echo $rs['applicationnumber']; ?></td>
                            <td><?php echo $rs['result']; ?></td>
                            <td><?php echo $rs['status']; ?></td>
                            <td>
                                <a href="viewresult.php?delid=<?php echo $rs['result_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="clear"></div>
        </main>
    </div>
</div>
<?php include("footer.php"); ?>

<script type="application/javascript">
function validateform() {
    if (document.form1.studentid.value == "") {
        alert("Kindly select the student.");
        return false;
    }
    if (document.form1.result.value == "") {
        alert("Result should not be empty.");
        return false;
    }
    return true;
}
</script>
