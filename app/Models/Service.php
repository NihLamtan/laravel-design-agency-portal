<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    
    
    protected $guarded = ['id'];
    protected $casts = ['features' => 'array'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function category()
    {
        return $this->belongsto(ServiceCategory::class, 'category_id');
    }

    public function getImageUploadPathAttribute()
    {
    return \Storage::url("public/services-img/$this->image_upload");
    }
    public function getFrontImgPathAttribute()
    {
    return \Storage::url("public/front-images/$this->front_img");
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

   
}
