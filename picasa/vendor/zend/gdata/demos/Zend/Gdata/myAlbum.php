<?php
error_reporting(E_ALL);
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_Photos');
 
// Album and User
$sUserID = "100211726914724722900";
$sAlbumName = "jujuNew";
 
$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
$gp = new Zend_Gdata_Photos();
$query = $gp->newAlbumQuery();
$query->setUser($sUserID);
$query->setAlbumName($sAlbumName);
$query->setImgMax("800");
$query->setThumbSize("160");
$albumFeed = $gp->getAlbumFeed($query);
$sPrintThumbs = "";
 
foreach ($albumFeed as $albumEntry) {
if ($albumEntry->getMediaGroup()->getThumbnail() != null) {
// Load Thumbnail Info
$mediaThumbnailArray = $albumEntry->getMediaGroup()->getThumbnail();
$ThumbnailUrl = $mediaThumbnailArray[0]->getUrl();
$ThumbnailHeight = $mediaThumbnailArray[0]->getHeight();
$ThumbnailWidth = $mediaThumbnailArray[0]->getWidth();
// Load Picture Info
$mediaArray = $albumEntry->getMediaGroup()->getContent();
$ImageUrl = $mediaArray[0]->getUrl();
$sImageTitle = $albumEntry->getMediaGroup()->getDescription()->text;
$url = $albumEntry->getLink('alternate')->href;
 
$sLinkString = <<<LTEXT
<a href="$ImageUrl" title="$sImageTitle"><img src="$ThumbnailUrl" width="$ThumbnailWidth" height="$ThumbnailHeight" /></a>
LTEXT;
$sPrintThumbs .=$sLinkString ;
}
}

//var_dump($sPrintThumbs); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title> Loading pictures from Picasa Gallery</title>
</head>

  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

  <!-- Fotorama -->
  <link href="fotorama/fotorama.css" rel="stylesheet">
  <script src="fotorama/fotorama.js"></script>

  <!-- Just don’t want to repeat this prefix in every img[src] -->
  <base href="http://s.fotorama.io/okonechnikov/">
  <style>
  
  
  	  </style>
<body >
<div>
<div>
<h3>SampleGallery (Picasa)</h3>
 
</div>
<div>
<?php //echo $sPrintThumbs; ?>
<div class="fotorama " data-allowfullscreen="true"   data-transition="crossfade" data-autoplay="true"
     data-nav="thumbs">
  <?php 
  
  echo $sPrintThumbs; 
  
  
  ?>
  
</div>
</div>
</div>
<div class="clear"></div>
</body>
</html>
