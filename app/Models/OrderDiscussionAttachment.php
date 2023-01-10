<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDiscussionAttachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function discussion()
    {
        return $this->belongsTo(OrderDiscussion::class, 'discussion_id');
    }
}
