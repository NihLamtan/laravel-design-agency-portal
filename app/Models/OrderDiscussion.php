<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDiscussion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function discussable()
    {
        return $this->morphTo();
    }

    public function attachments()
    {
        return $this->hasMany(OrderDiscussionAttachment::class, 'discussion_id');
    }
}
