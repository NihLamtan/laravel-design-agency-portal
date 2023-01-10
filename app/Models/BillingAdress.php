<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAdress extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'state',
        'postal_code',
        'address',
        'default',
        'user_id',
    ];

   
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
