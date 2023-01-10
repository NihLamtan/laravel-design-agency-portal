<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ServiceCategory()
    {
        return $this->belongsto(ServiceCategory::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function getImagePathAttribute()
    {
        return \Storage::url("public/service-categories/$this->image");
    }

  
}
