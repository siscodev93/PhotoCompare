<?php
header('Content-type: application/octet-stream');
header('Content-disposition: attachment; filename=offset.png');

$flatoutput = true;
$overlay    = null;

$img1 = "imgs/1.PNG";
$img2 = "imgs/2.PNG";

$im1 = imagecreatefrompng($img1);
$im2 = imagecreatefrompng($img2);

//output file
$oput = imagecreatefrompng($img2);


list($og_width1, $og_height1) = getimagesize($img1);
list($og_width2, $og_height2) = getimagesize($img2);

$red   = imagecolorallocate($oput, 255, 0, 0); 
$green = imagecolorallocate($oput, 0, 255, 0); 

for($x = 0; $x < $og_width1; $x++)
{
    for($y = 0; $y < $og_height1; $y++)
    {
        $png_1 = imagecolorat($im1, $x,$y ); 
        $png_2 = imagecolorat($im2, $x,$y ); 
        if($png_1 !== $png_2)
        {
            imagesetpixel($oput, $x, $y, $red );
        } 
        else if( $flatoutput )
        {
            imagesetpixel($oput, $x, $y, $green );
        }
    }
}

imagepng($oput);
imagedestroy($oput);
return;