<?php

namespace App\Helpers\Service;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ResizeImage {

    protected $filename;
    protected $image;
    const sizes = [
        'sliders' => [410, 250],
        'main' => [746, 541],
        'sub' => [230, 190],
        'another' => [264, 192]
    ];

    public function convert($fileName)
    {
        $this->filename = $fileName;
        $this->image();
        foreach (self::sizes as $key => $value)
        {
            $this->image->fit($value[0], $value[1]);
            $this->save($key);
        }

    }

    protected function image()
    {
      $this->image =  Image::make(Storage::path('/public/images/services/origin/').$this->filename)
          ->encode('webp', 50);
    }

    protected function save(string $path)
    {
        $this->image->save(Storage::path('/public/images/services/').'resize/'.$path.'/'.$this->filename);
    }

}
