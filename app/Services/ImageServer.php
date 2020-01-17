<?php


namespace App\Services;


use Imagick;
use Intervention\Image\ImageManagerStatic;

class ImageServer
{
    public $driver;
    public function __construct()
    {
        $this->driver = config('image.driver');
    }
    public function make($path)
    {
        if($this->driver && extension_loaded($this->driver)){
            return ImageManagerStatic::configure(['driver'=>$this->driver])->make($path);
        }
        return ImageManagerStatic::make($path);
    }







    ///////////////////////////////////////////////////////////
    public function compositeImage()
    {
        $im = new Imagick(public_path('1/home.tif'));
        $width = $im->getImageWidth() ;
        $height = $im->getImageHeight();
        $canvas = new Imagick();
        $canvas->newImage($width, $height, '');
        $canvas->setImageFormat("jpeg");
        $canvas->compositeImage($im, imagick::COMPOSITE_OVER, 20, 10);
        $canvas->writeImage(public_path('1/1.jpeg'));
    }
}