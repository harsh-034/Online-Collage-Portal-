<?php
session_start();
if (!isset($_SESSION["staffid"])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dbconnection.php");

// Delete album record
if (isset($_GET['delid'])) {  
    $delid = mysqli_real_escape_string($con, $_GET['delid']);
    $sql = "DELETE FROM album WHERE album_id='$delid'";
    $qsql = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Album record deleted successfully...');</script>";
    }
}
?>

<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <?php include("leftsidebar.php"); ?>
      
      <div id="content" class="two_third"> 
        <h1><a href="Newalbum.php">Add New Album</a> | <a href="viewalbum.php">View Album</a></h1> 
        <h1>View Album</h1>
        
        <table width="613" style="border:medium;background-size:cover">
          <tr>
            <th>Album title</th>
            <th>Album description</th>
            <th>Publish date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php
          $sql = "SELECT * FROM album";
          $qsql = mysqli_query($con, $sql);
          while ($rs = mysqli_fetch_array($qsql)) {
          ?>
          <tr>
            <td><?php echo $rs['album_title']; ?></td>
            <td><?php echo $rs['album_description']; ?></td>
            <td><?php echo $rs['publish_date']; ?></td>
            <td><?php echo $rs['status']; ?></td>
            <td>
              <a href="Newalbum.php?editid=<?php echo $rs['album_id']; ?>">Edit</a> <hr /> 
              <a href="viewalbum.php?delid=<?php echo $rs['album_id']; ?>" onclick="return confirm('Are you sure you want to delete this album?');">Delete</a> <hr />
              <a href="viewimage.php?albumid=<?php echo $rs['album_id']; ?>">Upload images</a>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
      
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include("footer.php"); ?>
