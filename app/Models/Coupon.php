<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = ['code', 'amount', 'type', 'start_date', 'end_date', 'emails'];
    
    protected $dates = ['start_date', 'end_date'];

    protected $casts = ['emails' => 'json'];


    /**
     * get all users
     */
    public function users()
    {
        return $this->hasMany(CouponUser::class);
    }

    /**
     * get all usages
     */
    public function usages()
    {
        return $this->hasMany(CouponUsage::class);
    }

    /**
     * get the coupon by code
     */
    public function scopeCode($query, $code)
    {
        $code = strtolower($code);
        return $query->whereRaw("LOWER(code) = '$code'");
    }

    /**
     * check if a coupon is allowed to a user
     */
    public function is_allowed_to_user($email='')
    {
        if (auth()->check()) {
            return ($this->users()->where('user_id', auth()->id())->first());
        } elseif ($email) {
            return (in_array($email, explode(',', $this->emails)));
        }
    }

    /**
     * check if a coupon is open publicly
     */
    public function is_allowed_to_all()
    {
        return !$this->users()->count();
    }

    /**
     * check if a user has used the coupon
     */
    public function is_not_used_by_user($email='')
    {
        if (auth()->check()) {
            return !$this->usages()->where('user_id', auth()->id())->first();
        } elseif ($email) {
            return !$this->usages()->whereHas('user', function ($q) use ($email) {
                return $q->whereRaw("LOWER(email) = '$email'");
            })->first();
        }
    }

    /**
     * check expiry
     */
    public function is_not_expired()
    {
        $now = now()->format('Y-m-d');
        $start_date = $this->start_date ? $this->start_date->format('Y-m-d') : null;
        $end_date = $this->end_date ? $this->end_date->format('Y-m-d') : null;

        return (
            is_null($start_date) && is_null($end_date))
            || ($start_date && is_null($end_date) && $start_date <= $now)
            || ($end_date && is_null($start_date) && $now <= $end_date)
            || (
                $start_date <= $now && $now <= $end_date
            );
    }

    /**
     * get the coupon is valid attribute
     */
    public function is_valid($email='')
    {
        return (
                $this->is_not_expired()
                && (
                    $this->is_allowed_to_all()
                    || $this->is_allowed_to_user($email)
                )
                && $this->is_not_used_by_user($email)
                );
    }

    /**
     * get coupon code amount
     */
    public function get_formatted_amount()
    {
        return ($this->type == 'percent') ? "{$this->amount}%" : $this->amount;
    }
}
