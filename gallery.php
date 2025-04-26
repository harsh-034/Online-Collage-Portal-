<?php
include("header.php");
include("dbconnection.php");
?>
<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <div id="gallery">
        <figure>
          <header class="heading">Photo Gallery</header>
          <ul class="nospace clear">
            <?php
            $sql = "SELECT * FROM album WHERE status='active'";
            $qsql = mysqli_query($con, $sql);
            $i = 0; // ✅ Fix: Initialize $i

            while ($rs = mysqli_fetch_array($qsql)) {
                $sql1 = "SELECT * FROM image WHERE album_id='" . $rs['album_id'] . "' ORDER BY RAND() LIMIT 1";
                $qsql1 = mysqli_query($con, $sql1);
                $rs1 = mysqli_fetch_array($qsql1);

                // ✅ Fix: Check if the image exists
                $imagePath = isset($rs1['image_path']) ? $rs1['image_path'] : 'default.jpg';
                $imageTitle = isset($rs1['image_title']) ? $rs1['image_title'] : 'No Image Available';
            ?>
                <li class="one_quarter 
                <?php
                if ($i == 0) {
                    echo " first";
                }
                $i = ($i >= 3) ? 0 : $i + 1;
                ?>
                ">
                  <a class="nlb" data-lightbox-gallery="gallery1" href="viewgalleryimages.php?galleryid=<?php echo $rs['album_id']; ?>">
                    <div id="container">
                      <p id="text"><?php echo htmlspecialchars($rs['album_title']); ?></p>
                      <img class="borderedbox" src="photogallery/<?php echo htmlspecialchars($imagePath); ?>" 
                          alt="<?php echo htmlspecialchars($imageTitle); ?>" style="height:175px; width:270px;">
                    </div>
                  </a>
                </li>
            <?php
            }
            ?>
          </ul>        
        </figure>
      </div>
      <!-- ################################################################################################ --> 
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>

<!-- JAVASCRIPTS --> 
<script src="backup/academic-education/layout/scripts/jquery.min.js"></script> 
<script src="backup/academic-education/layout/scripts/jquery.fitvids.min.js"></script> 
<script src="backup/academic-education/layout/scripts/jquery.mobilemenu.js"></script> 
<script src="backup/academic-education/layout/scripts/nivo-lightbox/nivo-lightbox.min.js"></script> 
