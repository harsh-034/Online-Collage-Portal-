<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if (isset($_POST['submit'])) {
    $pagetitle = mysqli_real_escape_string($con, $_POST['pagetitle']);
    $pagedescription = mysqli_real_escape_string($con, $_POST['editor1']);
    $webpage_id = mysqli_real_escape_string($con, $_GET['webpage']);
    
    // ✅ Fixed typo in column name
    $sql = "UPDATE webpage SET pagetitle='$pagetitle', pagedescription='$pagedescription'";

    // Handle Image Upload
    if (!empty($_FILES['image']['name'])) {
        $filename = rand() . "_" . basename($_FILES['image']['name']);
        $target_path = "webpage/" . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $sql .= ", imagepath='$filename'";
        }
    }

    $sql .= " WHERE webpage_id='$webpage_id'";

    if (!$qsql = mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('Webpage updated successfully.');</script>";
    }
}

$webpage_id = isset($_GET['webpage']) ? mysqli_real_escape_string($con, $_GET['webpage']) : '';

$sqlwebpage = "SELECT * FROM webpage WHERE webpage_id='$webpage_id'";
$qsqlwebpage = mysqli_query($con, $sqlwebpage);
$rswebpage = mysqli_fetch_array($qsqlwebpage);

// ✅ Prevent warning if no record is found
if (!$rswebpage) {
    $rswebpage = [
        'pagetitle' => '',
        'pagedescription' => '',
        'imagepath' => ''
    ];
}
?>

<!-- ################################################################################################ -->
<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear">
            <?php include("leftsidebar.php"); ?>
            <div id="content" class="two_third">
                <h1>Web Page</h1>
                <form method="post" action="" onsubmit="return validateform()" name="form1" enctype="multipart/form-data">
                    <table border="1">
                        <tr>
                            <td>Page</td>
                            <td>
                                <select name="page" id="page" onchange="changewebpage(this.value)">
                                    <option value="">Select Web page</option>
                                    <?php
                                    $sql = "SELECT * FROM webpage";
                                    $qsql = mysqli_query($con, $sql);
                                    while ($rs = mysqli_fetch_array($qsql)) {
                                        $selected = ($rs['webpage_id'] == $webpage_id) ? "selected" : "";
                                        echo "<option value='{$rs['webpage_id']}' $selected>{$rs['pagename']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <hr>

                    <table border="1">
                        <tr>
                            <td>Page Title</td>
                            <td><input type="text" value="<?php echo $rswebpage['pagetitle']; ?>" name="pagetitle" id="pagetitle" style="width:100%;height:20px;"></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?php include("ckeditor.php"); ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" name="image" id="image"><br>
                                <?php if (!empty($rswebpage['imagepath'])): ?>
                                    <img src="webpage/<?php echo $rswebpage['imagepath']; ?>" width="100" height="100">
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
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

<script type="application/javascript">
function changewebpage(webpage) {
    window.location.assign("Webpage.php?webpage=" + webpage);
}

function validateform() {
    if (document.form1.pagetitle.value == "") {
        alert("Page title should not be empty.");
        return false;
    }
    return true;
}
</script>
