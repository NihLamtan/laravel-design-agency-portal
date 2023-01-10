<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    protected $guarded = ['id'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('restrictAdmin', function (Builder $builder) {
            if (auth()->guard('admin')->check() && !auth()->guard('admin')->user()->is_super_admin) {
                $builder->where('admin_id', auth()->guard('admin')->id());
            }
        });
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->order_id = Str::uuid()->toString();
            $model->order_number = 'LIU';
        });

        self::created(function ($model) {
            $model->order_number = 'LIU-'.Str::padLeft($model->id, 5, '0');
            $model->save();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function refund()
    {
        return $this->hasMany(Refund::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function brief()
    {
        return $this->hasOne(OrderBrief::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function discussions()
    {
        return $this->hasMany(OrderDiscussion::class);
    }

    public function attachments()
    {
        return $this->hasManyThrough(OrderDiscussionAttachment::class, OrderDiscussion::class, 'order_id', 'discussion_id', 'id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function billing_address()
    {
        return $this->hasOne(BillingAdress::class);

    }

    public function package()
    {
        return $this->belongsTo(Package::class);

    }

    // check if order is refundable
    public function refundable()
    {
        $now = Carbon::now();

        return (
                $this->created_at->diffInDays($now) + 1 <= 7
                && $this->payment_status == 'succeeded'
                && $this->order_status != 'refund requested'
            );
    }

    public function OrderReview()
    {
        return $this->belongsTo(OrderReview::class);
    }

    public function refundReq()
    {
        return $this->update(['order_status' => 'refund requested']);
    }
}
