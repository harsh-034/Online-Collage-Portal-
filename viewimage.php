<?php
session_start();
if(!isset($_SESSION["staffid"])) {
	header("Location: login.php");
}
include("header.php");
include("dbconnection.php");

if(isset($_GET['delid'])) {
	$sql = "DELETE FROM image WHERE image_id='".$_GET['delid']."'";
	$qsql = mysqli_query($con, $sql);	
	if(mysqli_affected_rows($con) == 1) {
		echo "<script>alert('Image form record deleted successfully...');</script>";
	}
}

if(isset($_POST['btnuploadimg'])) {
	$filename = rand().$_FILES['btnuploadimgpath']['name'];
	move_uploaded_file($_FILES['btnuploadimgpath']["tmp_name"],"photogallery/".$filename);
	$sql = "INSERT INTO image (album_id, image_title, image_path) 
	        VALUES('".$_GET['albumid']."','".$_POST['btnuploadimgtitle']."','$filename')";
	if(!$qsql = mysqli_query($con, $sql)) {
		echo mysqli_error($con);
	} else {
		echo "<script>alert('Image uploaded successfully..');</script>";
	}
}
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      <div id="content" class="two_third"> 
        <h1>Album detail</h1>
        <?php
        $album_title = "";
        $sql = "SELECT * FROM album WHERE album_id='".$_GET['albumid']."'";
        $qsql = mysqli_query($con, $sql);
        if($rs = mysqli_fetch_array($qsql)) {
          $album_title = $rs['album_title'];
        ?>
        Album title: &nbsp;<?php echo $rs['album_title']; ?><br />
        Album description: &nbsp;<?php echo $rs['album_description']; ?><br />
        Publish date: &nbsp;<?php echo $rs['publish_date']; ?>
        <?php } ?>
        
        <br />
        <h1>Upload image under this album</h1>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validateform()">
        <table width="613" border="1">
          <tr>
            <td width="192" height="43">Image title</td>
            <td width="405"><input type="text" name="btnuploadimgtitle" id="btnuploadimgtitle" /></td>
          </tr>
          <tr>
            <td height="51">Image path</td>
            <td><input type="file" name="btnuploadimgpath" id="btnuploadimgpath" /></td>
          </tr>
          <tr>
            <td height="53" colspan="2">
              <center><input type="submit" name="btnuploadimg" id="btnuploadimg" value="Upload image" /></center>
            </td>
          </tr>
        </table>
        </form>  

        <hr />
        <h1>View images of <?php echo $album_title; ?> album</h1>
        <table width="613" border="1">
          <tr>
            <th>Image title</th>
            <th>Image path</th>
            <th>Action</th>
          </tr>
          <?php
          $sql = "SELECT * FROM image WHERE album_id='".$_GET['albumid']."'";
          $qsql = mysqli_query($con, $sql);
          while($rs = mysqli_fetch_array($qsql)) {
          ?>  
          <tr>
            <td><?php echo $rs['image_title']; ?></td>
            <td><img src="photogallery/<?php echo $rs['image_path']; ?>" style="width:250px;height:150px;" /></td>
            <td><a href="viewimage.php?delid=<?php echo $rs['image_id']; ?>&albumid=<?php echo $_GET['albumid']; ?>" onclick="return confirm('Are you sure to delete this image?')">Delete</a></td>
          </tr>
          <?php } ?>
        </table>
        <div id="comments"></div>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>
<?php include("footer.php"); ?>

<script type="application/javascript">
function validateform() {
	if(document.form1.btnuploadimgtitle.value == "") {
		alert("Title should not be empty..");
		return false;
	} else if(document.form1.btnuploadimgpath.value == "") {
		alert("Image path should not be empty..");
		return false;
	} else {
		return true;
	}
}
</script>
