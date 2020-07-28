<?
session_start();
$_SESSION["cptrndnum"] = mt_rand(1000, 9999);
$cptrndimg = imagecreatetruecolor(90, 50);
imagettftext($cptrndimg, 20, -10, 10, 30, imagecolorallocate($cptrndimg, 255, 255, 255), __DIR__."/fonts/verdana.ttf", $_SESSION["cptrndnum"]);
header("Content-type: image/png");
imagepng($cptrndimg);
imagedestroy($cptrndimg);
?>