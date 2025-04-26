<?php
include("header.php");
include("dbconnection.php");

if (isset($_POST["submit"])) {
    // Ensure valid input values are used in the SQL query to avoid SQL injection
    $slidertitle = mysqli_real_escape_string($con, $_POST["slidertitle"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $sliderno = mysqli_real_escape_string($con, $_POST["sliderno"]);

    // File upload handling
    $filename = "";
    if ($_FILES["image"]["name"] != "") {
        $filename = rand() . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "sliderimg/" . $filename);
    }

    // Prepare the SQL query
    $sql = "UPDATE slider SET 
            slidertitle='$slidertitle', 
            description='$description',";

    // If there's an image, update the image field
    if ($filename != "") {
        $sql .= " sliderimage='$filename', ";
    }

    // Finalize the SQL query with the status and condition
    $sql .= " status='$status' WHERE sliderno='$sliderno'";

    // Execute the query and handle errors
    if (!$qsql = mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    } else {
        echo "<script>alert('Slider updated successfully.');</script>";
    }
}
?>

<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <!-- main body -->
      <?php include("leftsidebar.php"); ?>
      <!-- ################################################################################################ -->
      <div id="content" class="two_third">
        <!-- ################################################################################################ -->
        <h1>Slider Image</h1>
        <form method="post" action="" enctype="multipart/form-data">
          <table width="415" border="1">
            <tr>
              <td width="19%">Slider No.</td>
              <td width="81%">
                <select name="sliderno" onchange="changeslider(this.value)">
                  <?php
                  $arr = array("Select", "Slider 1", "Slider 2", "Slider 3", "Slider 4", "Slider 5");
                  foreach ($arr as $val) {
                      echo "<option value='$val'>$val</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
          <div id="txtHint"></div>
          <p>&nbsp;</p>
          <input type="submit" name="submit" value="Update Slider">
        </form>
        <div id="comments"></div>
        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ -->
<?php include("footer.php"); ?>

<script>
function changeslider(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "ajaxslider.php?q=" + str, true);
    xmlhttp.send();
}
</script>
