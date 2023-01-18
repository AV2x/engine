<?php

namespace App\Helpers\Banner;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ResizeImage {

    protected $filename;
    protected $image;
    protected $meme;
    const sizes = [
        'main' => [1903, 562],
        'sub' => [1903, 562],
    ];

    public function convert($fileName, $type)
    {
        $this->filename = $fileName;
//        $img = Image::make(Storage::path('/public/images/banners/origin/').$this->filename);
//        $imgEnc = $img->encode('webp', 50);
//        $imgEnc->save(Storage::path('/public/images/banners/').'resize/'.$type.'/1.webp');
        $this->image();
        $this->image->fit(self::sizes[$type][0], self::sizes[$type][1]);
        $this->save($type);

    }

    protected function image()
    {
        $this->image =  Image::make(Storage::path('/public/images/banners/origin/').$this->filename)
            ->encode('webp', 50);
    }

    protected function save(string $path)
    {
        $this->image->save(Storage::path('/public/images/banners/').'resize/'.$path.'/'.$this->filename, 50);
    }

}
