<?php
ini_set('display_errors', 1);
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('watersm.png');
$plan = imagecreatefrompng('vbig.png');
$im = imagecreatefromjpeg('http://immomedina.com/img-annonce/annonce-16/dsc_0083.jpg');

// Set the margins for the stamp and get the height/width of the stamp image
$px = imagesx($plan);
$py = imagesy($plan);

$sx = imagesx($stamp);
$sy = imagesy($stamp);

$marge_right = ($px/2)-($sx/2);
$marge_bottom = ($py/2)-($sy/2);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($plan, $stamp, $marge_right, $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
imagepng($plan);
imagedestroy($plan);
?>