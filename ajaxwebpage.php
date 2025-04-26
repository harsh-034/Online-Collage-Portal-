<?php
$sqlwebpage = "SELECT * FROM webpage WHERE webpage_id='$_GET[webpage]'";
$qsqlwebpage = mysqli_query($con,$sqlwebpage);
$rswebpage = mysqli_fetch_array($qsqlwebpage);
?>
<table width="200" border="1">
<tr>
	<td>Page Title</td>
	<td><input type="text"  value="<?php echo $rswebpage[pagetitle]; ?>" name="pagetitle" id="pagetitle" style="width:100%;"></td>
</tr>
<tr>
    <td>Description</td>
    <td>
    <?php
    include("ckeditor.php");
    ?>
    </td>
</tr>
<tr>
    <td>Image</td>
    <td><input type="file" name="image" id="image"><br>
    <img src="webpage/<?php echo $rswebpage[imagepath]; ?>" width="100" height="100">
    </td>
</tr>
</select>        
</table> 
</td>
        
  </tr>

<tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="submit" id="submit" value="Submit"></td>
</tr>
</table>