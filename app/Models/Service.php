<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function prices()
    {
        return $this->hasMany(ServicePrice::class, 'service_id', 'id');
    }
    public function options()
    {
        return $this->hasMany(ServiceOption::class, 'service_id', 'id');
    }
    public function image()
    {
        return $this->hasOne(ServiceImage::class, 'service_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id', 'id');
    }
}
