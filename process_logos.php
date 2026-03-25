<?php
$dir = __DIR__ . "/public/images/Sponsor Vol I";
if (!is_dir($dir)) {
    die("Directory not found\n");
}
$files = glob($dir . "/*.png");
if (empty($files)) {
    die("No PNG files found\n");
}

foreach ($files as $file) {
    $img = @imagecreatefrompng($file);
    if (!$img) {
        echo "Could not read $file\n";
        continue;
    }
    
    $width = imagesx($img);
    $height = imagesy($img);
    
    $newImg = imagecreatetruecolor($width, $height);
    imagesavealpha($newImg, true);
    $transColor = imagecolorallocatealpha($newImg, 0, 0, 0, 127);
    imagefill($newImg, 0, 0, $transColor);
    
    $fuzziness = 15;
    
    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);
            
            if ($colors['red'] >= 235 && $colors['green'] >= 235 && $colors['blue'] >= 235) {
                imagesetpixel($newImg, $x, $y, $transColor);
            } else {
                $color = imagecolorallocatealpha($newImg, $colors['red'], $colors['green'], $colors['blue'], $colors['alpha']);
                imagesetpixel($newImg, $x, $y, $color);
            }
        }
    }
    
    imagepng($newImg, $file);
    imagedestroy($img);
    imagedestroy($newImg);
    echo "Processed: " . basename($file) . "\n";
}
echo "Done.\n";
