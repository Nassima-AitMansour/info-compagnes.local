<?php  
ini_set('display_errors', 1);
	require_once '../classes/FuncTools.class.php';
if(isset($_GET['id']) and $_GET['id']>0 and isset($_GET['img'])){
	$img = 'http://blog.local/img-blogs/blog-'.intval($_GET['id']).'/'.$_GET['img'];
}
else{$img = 'http://blog.local/assets/images/no-sm.png';}

//echo $img;
// Source image
$src = imagecreatefromjpeg($img);

$w = 800;
$h = 500;
$mode = 'fit';

// Destination image with white background
$dst = imagecreatetruecolor($w, $h);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
 
// All Magic is here
$func = new FuncTools();
$func -> scale_image($src, $dst, $mode);
 
// Output to the browser
Header('Content-Type: image/jpeg');
imagejpeg($dst);
?>