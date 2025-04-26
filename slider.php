<?php
include("dbconnection.php");
$sqlslider ="SELECT * FROM slider";
$qsqlslider = mysqli_query($con, $sqlslider);
while ($rsslider = mysqli_fetch_array($qsqlslider)) {
    $rssliderimg[] = $rsslider['sliderimage']; // Fixed
    $slidertitle[] = $rsslider['slidertitle']; // Fixed
    $description[] = $rsslider['description']; // Fixed
}
?>
<!-- ################################################################################################ --> 
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
      <figure id="slide-1"><a class="view" href="#"><img src="sliderimg/<?php echo $rssliderimg[0] ?? ''; ?>" alt="" height="350" width="960"></a>
        <figcaption>
          <h2><?php echo $slidertitle[0] ?? ''; ?></h2>
          <p><?php echo  $description[0] ?? ''; ?></p>
        </figcaption>
      </figure>
      <figure id="slide-2"><a class="view" href="#"><img src="sliderimg/<?php echo $rssliderimg[1] ?? ''; ?>" alt="" height="350" width="960"></a>
        <figcaption>
          <h2><?php echo $slidertitle[1] ?? ''; ?></h2>
          <p><?php echo  $description[1] ?? ''; ?></p>
        </figcaption>
      </figure>
      <figure id="slide-3"><a class="view" href="#"><img src="sliderimg/<?php echo $rssliderimg[2] ?? ''; ?>" alt="" height="350" width="960"></a>
        <figcaption>
          <h2><?php echo $slidertitle[2] ?? ''; ?></h2>
          <p><?php echo  $description[2] ?? ''; ?></p>
        </figcaption>
      </figure>
      <figure id="slide-4"><a class="view" href="#"><img src="sliderimg/<?php echo $rssliderimg[3] ?? ''; ?>" alt="" height="350" width="960"></a>
        <figcaption>
          <h2><?php echo $slidertitle[3] ?? ''; ?></h2>
          <p><?php echo  $description[3] ?? ''; ?></p>
        </figcaption>
      </figure>
      <figure id="slide-5"><a class="view" href="#"><img src="sliderimg/<?php echo $rssliderimg[4] ?? ''; ?>" alt="" height="350" width="960"></a>
        <figcaption>
          <h2><?php echo $slidertitle[4] ?? ''; ?></h2>
          <p><?php echo  $description[4] ?? ''; ?></p>
        </figcaption>
      </figure>
      <!-- ################################################################################################ -->
      <ul id="slide-tabs">
        <li><a href="#slide-1"><?php echo $slidertitle[0] ?? ''; ?></a></li>
        <li><a href="#slide-2"><?php echo $slidertitle[1] ?? ''; ?></a></li>
        <li><a href="#slide-3"><?php echo $slidertitle[2] ?? ''; ?></a></li>
        <li><a href="#slide-4"><?php echo $slidertitle[3] ?? ''; ?></a></li>
        <li><a href="#slide-5"><?php echo $slidertitle[4] ?? ''; ?></a></li>
      </ul>
      <!-- ################################################################################################ --> 
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
