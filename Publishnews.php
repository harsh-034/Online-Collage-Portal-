<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

if (isset($_POST['submit'])) {  
    $imgname = rand().$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "newsimg/".$imgname);

    $publishdate = mysqli_real_escape_string($con, $_POST['publishdate']);
    $newstype = mysqli_real_escape_string($con, $_POST['newstype']);
    $newstitle = mysqli_real_escape_string($con, $_POST['newstitle']);
    $newscontent = mysqli_real_escape_string($con, $_POST['newscontent']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    if (isset($_GET['newsdelid'])) {
        $newsdelid = mysqli_real_escape_string($con, $_GET['newsdelid']);
        $sql = "UPDATE news SET publish_date='$publishdate', news_type='$newstype', news_title='$newstitle', news_content='$newscontent', image='$imgname', status='$status' WHERE news_id='$newsdelid'";
        $message = "News updated successfully!";
    } else {
        $sql = "INSERT INTO news (publish_date, news_type, news_title, news_content, image, status) VALUES ('$publishdate', '$newstype', '$newstitle', '$newscontent', '$imgname', '$status')";
        $message = "News published successfully!";
    }

    if (!mysqli_query($con, $sql)) {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    } else {
        echo "<script>alert('$message');</script>";
    }
}

$rsnews = [];
if (isset($_GET['newsdelid'])) {
    $newsdelid = mysqli_real_escape_string($con, $_GET['newsdelid']);
    $sqlnews = "SELECT * FROM news WHERE news_id='$newsdelid'";
    $qsqlnews = mysqli_query($con, $sqlnews);
    $rsnews = mysqli_fetch_array($qsqlnews);
}
?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1>Publish News</h1>
        <form name="publishnewsform" method="post" action="" enctype="multipart/form-data" onsubmit="return validateform()">
          <table width="600" border="1">
            <tr>
              <td>News Title</td>
              <td><input type="text" value="<?php echo isset($rsnews['news_title']) ? $rsnews['news_title'] : ''; ?>" name="newstitle" id="newstitle" style="width:400px;height:25px;"></td>
            </tr>
            <tr>
              <td>News Type</td>
              <td>
                <select name="newstype" id="newstype" style="width:200px;height:25px;">
                  <?php
                  $arr = ["Select", "Events", "News"];
                  foreach ($arr as $val) {
                      $selected = (isset($rsnews['news_type']) && $val == $rsnews['news_type']) ? 'selected' : '';
                      echo "<option value='$val' $selected>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Publish Date</td>
              <td><input type="date" value="<?php echo isset($rsnews['publish_date']) ? $rsnews['publish_date'] : ''; ?>" name="publishdate" id="publishdate" style="width:200px;height:25px;"></td>
            </tr>
            <tr>
              <td>News Content</td>
              <td><textarea name="newscontent" id="newscontent" style="width:400px;height:80px;"><?php echo isset($rsnews['news_content']) ? $rsnews['news_content'] : ''; ?></textarea></td>
            </tr>
            <tr>
              <td>Image</td>
              <td><input type="file" name="image" id="image" style="width:200px;height:25px;"></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                <select name="status" id="status" style="width:200px;height:25px;">
                  <?php
                  $arr = ["Select", "Active", "Inactive"];
                  foreach ($arr as $val) {
                      $selected = (isset($rsnews['status']) && $val == $rsnews['status']) ? 'selected' : '';
                      echo "<option value='$val' $selected>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
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
function validateform() {
    var form = document.publishnewsform;
    if (form.newstitle.value.trim() === "") {
        alert("News title should not be empty.");
        form.newstitle.focus();
        return false;
    }
    if (form.newstype.value === "Select") {
        alert("Please select a News Type.");
        form.newstype.focus();
        return false;
    }
    if (form.publishdate.value.trim() === "") {
        alert("Publish date should not be empty.");
        form.publishdate.focus();
        return false;
    }
    if (form.newscontent.value.trim() === "") {
        alert("News content should not be empty.");
        form.newscontent.focus();
        return false;
    }
    return true;
}
</script>
