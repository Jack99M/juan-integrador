<?php

namespace App\Services;

class HeatmapService
{
    public function generateHeatmap($imagePath, $outputPath)
    {
        $image = $this->loadImage($imagePath);
        if (!$image) return false;

        $width = imagesx($image);
        $height = imagesy($image);
        
        $heatmap = imagecreatetruecolor($width, $height);
        imagealphablending($heatmap, false);
        imagesavealpha($heatmap, true);
        
        $hotspots = rand(5, 9);
        for ($i = 0; $i < $hotspots; $i++) {
            $centerX = rand(0, $width);
            $centerY = rand(0, $height);
            $radius = rand(60, 180);
            $this->drawHotspot($heatmap, $centerX, $centerY, $radius, $width, $height);
        }
        
        imagefilter($heatmap, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($heatmap, IMG_FILTER_GAUSSIAN_BLUR);
        
        imagecopy($image, $heatmap, 0, 0, 0, 0, $width, $height);
        imagejpeg($image, $outputPath, 90);
        imagedestroy($image);
        imagedestroy($heatmap);
        
        return true;
    }
    
    private function loadImage($path)
    {
        $info = getimagesize($path);
        if (!$info) return false;
        
        switch ($info[2]) {
            case IMAGETYPE_JPEG: return imagecreatefromjpeg($path);
            case IMAGETYPE_PNG: return imagecreatefrompng($path);
            case IMAGETYPE_GIF: return imagecreatefromgif($path);
            default: return false;
        }
    }
    
    private function drawHotspot($image, $cx, $cy, $radius, $width, $height)
    {
        for ($x = max(0, $cx - $radius); $x < min($width, $cx + $radius); $x++) {
            for ($y = max(0, $cy - $radius); $y < min($height, $cy + $radius); $y++) {
                $distance = sqrt(pow($x - $cx, 2) + pow($y - $cy, 2));
                if ($distance < $radius) {
                    $intensity = 1 - ($distance / $radius);
                    $alpha = (int)(70 * $intensity);
                    $color = $this->getHeatColor($image, $intensity, $alpha);
                    imagesetpixel($image, $x, $y, $color);
                }
            }
        }
    }
    
    private function getHeatColor($image, $intensity, $alpha)
    {
        if ($intensity > 0.75) {
            $r = 255; $g = 0; $b = 0;
        } elseif ($intensity > 0.5) {
            $r = 255; $g = 165; $b = 0;
        } elseif ($intensity > 0.25) {
            $r = 255; $g = 255; $b = 0;
        } else {
            $r = 0; $g = 255; $b = 0;
        }
        
        return imagecolorallocatealpha($image, $r, $g, $b, 127 - $alpha);
    }
}
