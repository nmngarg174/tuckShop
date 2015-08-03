<?php
/* Last updated with phpFlickr 1.3.2
 *
 * This example file shows you how to call the 100 most recent public
 * photos.  It parses through them and prints out a link to each of them
 * along with the owner's name.
 *
 * Most of the processing time in this file comes from the 100 calls to
 * flickr.people.getInfo.  Enabling caching will help a whole lot with
 * this as there are many people who post multiple photos at once.
 *
 * Obviously, you'll want to replace the "<api key>" with one provided 
 * by Flickr: http://www.flickr.com/services/api/key.gne
 */

//f1a96744921d43a0
require_once("/phpFlickr.php");
 $f->setProxy("localhost", "8080");

$f = new phpFlickr("
bf5d0953f69b3386edc3760d784955f5","16d906ea4207bafc");
//var_dump($f);
$f->getErrorCode(); 
$f->getErrorMsg(); 

$recent = $f->photos_getRecent();

var_dump($recent); 
foreach ((array)$recent['photo'] as $photo) {
    $owner = $f->people_getInfo($photo['owner']);
    echo "<a href='http://www.flickr.com/photos/" . $photo['owner'] . "/" . $photo['id'] . "/'>";
    echo $photo['title'];
    echo "</a> Owner: ";
    echo "<a href='http://www.flickr.com/people/" . $photo['owner'] . "/'>";
    echo $owner['username'];
    echo "</a><br>";
}
?>
