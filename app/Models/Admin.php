<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guarded = ['id'];

    public function discussions()
    {
        return $this->morphMany(OrderDiscussion::class, 'discussable');
    }

    // get is super admin attribute
    public function getIsSuperAdminAttribute()
    {
        return $this->id == 1;
    }

    // get records except super admin
    public function scopeExceptSuperAdmin($query)
    {
        return $query->where('id', '!=', 1);
    }
}
