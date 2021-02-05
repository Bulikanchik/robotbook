<?php
class Uniq
{
    static public function image($source, $dest)
    {
        $image = file_get_contents($source);
        $im    = new Imagick();
        $im->readimageblob($image);

        $width  = $im->getImageWidth();
        $height = $im->getImageHeight();

        do {
            $ratio      = rand(0, 1000) / 100;
            $new_width  = floor($width * $ratio);
            $new_height = floor($height * $ratio);
        } while (
            ($new_width < 700 || $new_width > 1000)
            && ($new_height < 700 || $new_height > 1000));

        $im->scaleImage($new_width, $new_height);
        $im->rotateImage('#00000000', rand(-30, 30) / 100);
        $crop_pixels = rand(0, 5);
        $im->cropImage(
            $new_width - abs($crop_pixels), $new_height - abs($crop_pixels),
            0, 0
        );

        $color       = new ImagickPixel();
        $rand_color1 = rand(0, 255);
        $rand_color2 = rand(0, 255);
        $rand_color3 = rand(0, 255);
        $color->setColor("rgb($rand_color1,$rand_color2,$rand_color3)");
        $im->borderImage($color, rand(0, 1), rand(0, 1));

        $im->brightnessContrastImage(rand(-5, 5), rand(-5, 5));

        $image = $im->getimageblob();
        file_put_contents($dest, $image);
    }

    static public function video($source, $dest)
    {
        $noise_types = ['all', 'c0', 'c1', 'c2', 'c3'];
        $noise_flags = ['a', 'p', 't', 'u'];
        $noise       = $noise_types[array_rand($noise_types)];
        $noise_flag  = $noise_flags[array_rand($noise_flags)];
        $noise_value = rand(0, 10);
        $bitrate     = rand(750, 1250);
        $command
                     = "ffmpeg -i {$source} -vf noise={$noise}s={$noise_value}:{$noise}f={$noise_flag} -b:v {$bitrate}K {$dest} >/dev/null";
        shell_exec($command);
    }
}
    
    
?>