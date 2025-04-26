<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $albumtitle = mysqli_real_escape_string($con, $_POST['albumtitle']);
    $albumdescription = mysqli_real_escape_string($con, $_POST['albumdescription']);
    $publishdate = $_POST['publishdate'];
    $status = $_POST['status'];

    if (isset($_GET['editid'])) {
        $sql = "UPDATE album SET album_title='$albumtitle', album_description='$albumdescription', publish_date='$publishdate', status='$status' WHERE album_id='$_GET[editid]'";
        if (!mysqli_query($con, $sql)) {
            echo mysqli_error($con);
        } else {
            echo "<script>alert('Album record updated successfully.'); window.location.href='Newalbum.php';</script>";
            exit();
        }
    } else {
        $sql = "INSERT INTO album (album_title, album_description, publish_date, status) VALUES ('$albumtitle', '$albumdescription', '$publishdate', '$status')";
        if (!mysqli_query($con, $sql)) {
            echo mysqli_error($con);
        } else {
            echo "<script>alert('Album record inserted successfully.'); window.location.href='Newalbum.php';</script>";
            exit();
        }
    }
}

$rs = [];
if (isset($_GET['editid'])) {
    $sql = "SELECT * FROM album WHERE album_id='$_GET[editid]'";
    $qsql = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($qsql);
}
?>

<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear">
            <?php include("leftsidebar.php"); ?>

            <div id="content" class="two_third">
                <h1><a href="Newalbum.php">Add New Album</a> | <a href="viewalbum.php">View Album</a></h1>
                <h1>New Album</h1>

                <form method="post" action="" onsubmit="return validateform()" name="albumform">
                    <table width="537" border="1">
                        <tr>
                            <td width="24%" height="39">Album Title</td>
                            <td width="76%"><input type="text" value="<?php echo isset($rs['album_title']) ? $rs['album_title'] : ''; ?>" name="albumtitle" id="albumtitle" style="width:300px;"></td>
                        </tr>
                        <tr>
                            <td height="51">Album Description</td>
                            <td><textarea name="albumdescription" id="albumdescription"><?php echo isset($rs['album_description']) ? $rs['album_description'] : ''; ?></textarea></td>
                        </tr>
                        <tr>
                            <td height="45">Publish Date</td>
                            <td><input type="date" value="<?php echo isset($rs['publish_date']) ? $rs['publish_date'] : ''; ?>" name="publishdate" id="publishdate"></td>
                        </tr>
                        <tr>
                            <td height="38">Status</td>
                            <td>
                                <select name="status" id="status">
                                    <option value="active" <?php echo (isset($rs['status']) && $rs['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactive" <?php echo (isset($rs['status']) && $rs['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td height="41">&nbsp;</td>
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

<script>
function validateform() {
    let form = document.albumform;
    if (form.albumtitle.value.trim() == "") {
        alert("Album title should not be empty.");
        form.albumtitle.focus();
        return false;
    } else if (form.albumdescription.value.trim() == "") {
        alert("Album description should not be empty.");
        form.albumdescription.focus();
        return false;
    } else if (form.publishdate.value == "") {
        alert("Publish date should not be empty.");
        form.publishdate.focus();
        return false;
    }
    return true;
}
</script>
