<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Storage extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('restrictAdmin', function (Builder $builder) {
            if (auth()->guard('admin')->check() && !auth()->guard('admin')->user()->is_super_admin) {
                $builder->whereHas('user.orders', function ($q) {
                    $q->where('admin_id', auth()->guard('admin')->id());
                });
            }
        });
    }

    protected $fillable = [
        'file_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
