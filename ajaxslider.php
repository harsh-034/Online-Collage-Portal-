<?php
error_reporting(0);
include("dbconnection.php");
$sqlslider = "select * from slider where sliderno='$_GET[q]'";
$qsqlslider= mysqli_query($con,$sqlslider);
$rsslider = mysqli_fetch_array($qsqlslider);
?>
<table width="200" border="1">
          <tr>
            <td width="24%">Title</td>
            <td width="76%">
            <input type="title" name="slidertitle" id="newstitle" style="width:400px;height:35px;" value="<?php echo $rsslider[slidertitle];?>" /></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file"  name="image" id="image" /><br>
					<img src="sliderimg/<?php echo $rsslider[sliderimage]; ?>" width="500px" height="300px">
            </td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" id="description" rows="10" cols="50"><?php echo $rsslider[description];?></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center" ><input type="submit" name="submit" id="submit" value="Submit" /></td>
          </tr>
        </table>