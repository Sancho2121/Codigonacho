<?php
namespace App\Trait;

use Intervention\Image\ImageManager;

trait ImageResize
{
    function resizeImage($image,$size=null)
    {
        $h = 100;
        $w = 100;
        if ($size!=null) {
            if (isset($size['h'])) {
            $h = $size['h'];
            }
            if (isset($size['w'])) {
                $w = $size['w'];
            }
        }
        $manager = new ImageManager(array('driver' => 'gd'));
        $img = $manager->make($image);
        $img->orientate();
        $img->resize($h, $w, function($constraint){
            $constraint->upsize();
            $constraint->aspectRatio();
        });
        $img->save($image);
    }

    function getSize($file_size)
    {
        if ($file_size>=1000 && $file_size<=999999) {
            $size =  number_format($file_size/1000, 2, '.', ' ').' KB';
        }elseif($file_size>=1000000 && $file_size<=999999999){
            $size = number_format($file_size/1000000, 2, '.', ' ').' MB';
        }elseif($file_size>=1000000000 && $file_size<=999999999999){
            $size = number_format($file_size/1000000000, 2, '.', ' ').' GB';
        }else{
            $size = number_format($file_size, 2, '.', ' ').' B';
        }
        return $size;
    }
}
