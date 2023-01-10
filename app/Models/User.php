<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Image;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'bio',
        'phone',
        'email',
        'password',
        'profile_photo_path',
        'company_name',
        'company_url',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('restrictAdmin', function (Builder $builder) {
            if (auth()->guard('admin')->check() && !auth()->guard('admin')->user()->is_super_admin) {
                $builder->whereHas('orders', function ($q) {
                    $q->where('admin_id', auth()->guard('admin')->id());
                });
            }
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }

    public function brief()
    {
        return $this->hasMany(OrderBrief::class);
    }

    public function Review()
    {
        return $this->hasMany(OrderReview::class);
    }

    public function user_address()
    {
        return $this->hasOne(UserAddress::class);
    }
  

    public function storage()
    {
        return $this->hasMany('App\Models\Storage');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'customer_id');
    }

    public function discussions()
    {
        return $this->morphMany(OrderDiscussion::class, 'discussable');
    }
    public function social_profile()
    {
        return $this->hasOne(UserSocialProfile::class);
    }

    

    // public function updateProfilePhoto(UploadedFile $photo)
    // {
    //     dd('yes');
    //     $image = $input['photo'];
    //     dd($image->getClientOriginalExtention());
    //     $image_name = time().'.'.$image->getClientOriginalExtention();

    //     $destinationPath = storage_path('/profile-photos');
    //     $img = Image::make($image->path());

    //     $img->resize(100, 100, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destinationPath.'/'.$image_name);

    //     $user->update([
    //                 'profile_photo_path' => $image_name,
    //             ]);
    //     tap($this->profile_photo_path, function ($previous) use ($photo) {
    //         $this->forceFill([
    //             'profile_photo_path' => $photo->storePublicly(
    //                 'profile-photos',
    //                 ['disk' => $this->profilePhotoDisk()]
    //             ),
    //         ])->save();

    //         if ($previous) {
    //             Storage::disk($this->profilePhotoDisk())->delete($previous);
    //         }
    //     });
    // }
}
