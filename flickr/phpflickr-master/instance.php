<?php

//Include the phpflickr file
require_once("/phpFlickr.php");

//Create new phpFlickr object
$f = new phpFlickr("7ae9545cbd914bc57555aeef73248a98");

//username on flickr
$user = "nmngarg174@gmail.com";

//Find the NSID of the username
$person = $f->people_findByUsername($user);
echo $person; 
    
// Get the friendly URL of the user's photos (this is the one you can define, not the random numbers with the at sign in it
$photos_url = $f->urls_getUserPhotos($person['id']);

//set the number of photos per page
$photos_per_page = 16;

//set page if there is one, otherwise get the first page
if(0)
{
  //$page = $_GET['page'];
}else{
  $page = 1;
}
    
// Get the user photos based on photos per page and page
$photos = $f->people_getPublicPhotos($person['id'], NULL, $photos_per_page, $page);

//loop photos and titles out
foreach ((array)$photos['photo'] as $photo)
{
  //Now for an item.
  $photo_html .= '<div class="left"><a href="' . $photos_url . $photo[id] . '"><img border="0" alt="' . $photo[title] . '" src="' . $f->buildPhotoURL($photo, "square") . '" /></a><br /><p>' . $photo[title] . '</p></div>';
}

//work out HTML for pagination
for($i=1;$i<$photos['pages']+1;$i++)
{
  if($page!=$i)
  {
    $pages_html .= '<a href="?page=' . $i . '">' . $i . '</a>&nbsp;';
  }else{
    $pages_html .= $i . '&nbsp;';
  }
}

//end the php code and build html return
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Flickr gallery of <?php echo $user; ?></title>
    <link href="gallery.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="main">
      <h1>My Flickr gallery</h1>
      <?php echo $photo_html; ?> 
      <p class="clear">Pages:&nbsp;&nbsp;<?php echo $pages_html; ?></p> 
    </div>
  </body>
</html> 