
  <?php
  include_once 'Api.php';
  include_once 'User.php';
 
  $api = new Phlickr_Api("
bf5d0953f69b3386edc3760d784955f5","16d906ea4207bafc");
  $user = Phlickr_User::findByUrl($api, 'http://flickr.com/people/drewish/');
 
  // print out the user's name
  print "User: {$user->getName()}\n";
 
  // print out their groups
  foreach ($user->getGroupList()->getGroups() as $group) {
      print "Group: {$group->getName()} ({$group->buildUrl()})\n";
 }

  // print out their photosets
  foreach ($user->getPhotosetList()->getPhotosets() as $photoset) {
      print "Photoset: {$photoset->getTitle()} ({$photoset->buildUrl()})\n";
  }
 
  // print out their 10 latest, favorite photos
  $photolist = $user->getFavoritePhotoList(10);
  foreach ($photolist->getPhotos() as $photo) {
      print "Favorite: {$photo->getTitle()} ({$photo->buildImgUrl()})\n";
  }
  ?>