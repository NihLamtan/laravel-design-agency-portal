<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    
}
