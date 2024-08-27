<?php

//reduce size
function resizeImage($imgSrc, $thumbnail_width, $thumbnail_height, $photo_file) { //$imgSrc is a FILE - Returns an image resource.
  //getting the image dimensions 
  list($width_orig, $height_orig) = getimagesize($imgSrc);
  // $myImage = imagecreatefromjpeg($imgSrc);  
  //amit	
  $photo = $photo_file;
  $temp1 = explode(".", $photo);
  $extension1 = end($temp1);
  if ($extension1 == "jpg" || $extension1 == "jpeg" || $extension1 == "JPG" || $extension1 == "JPEG") {
    $myImage = imagecreatefromjpeg($imgSrc);
  } else if ($extension1 == "png" || $extension1 == "PNG") {
    $myImage = imagecreatefrompng($imgSrc);
  } else {
    $myImage = imagecreatefromgif($imgSrc);
  }
//amit
  $ratio_orig = $width_orig / $height_orig;

  if ($thumbnail_width / $thumbnail_height > $ratio_orig) {
    $new_height = $thumbnail_width / $ratio_orig;
    $new_width = $thumbnail_width;
  } else {
    $new_width = $thumbnail_height * $ratio_orig;
    $new_height = $thumbnail_height;
  }
  $x_mid = $new_width / 2;  //horizontal middle
  $y_mid = $new_height / 2; //vertical middle 
  $process = imagecreatetruecolor(round($new_width), round($new_height));
  imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
  $thumb = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
  imagecopyresampled($thumb, $process, 0, 0, ($x_mid - ($thumbnail_width / 2)), ($y_mid - ($thumbnail_height / 2)), $thumbnail_width, $thumbnail_height, $thumbnail_width, $thumbnail_height);
  imagedestroy($process);
  imagedestroy($myImage);
  return $thumb;
}

//reduce size