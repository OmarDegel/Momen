<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Scopes\GlobaleScope;
use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Laratrust\Contracts\LaratrustUser;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements LaratrustUser, JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRolesAndPermissions, GlobaleScope, SoftDeletes, HasDefaultLogOptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $searchable = ['name_first', 'name_last', 'username', 'name'];
    protected $fillable = [
        'name',
        'username',
        'full_name',
        'name_first',
        'name_last',
        'email',
        'password',
        'duvider',
        'provider_id',
        'provider_token',
        'email_verified_at',
        'type',
        'image',
        'phone',
        'phone_code',
        'last_active',
        'remember_token',
        'code',
        'code_expire',
        'sms_code',
        'sms_code_expire',
        'country_id',
        'city_id',
        'branch_id',
        'address_id',
        'group_id',
        'latitude',
        'longitude',
        'polygon',
        'birth_date',
        'gender',
        'locale',
        'theme',
        'active',
        'vip',
        'all_branch',
        'is_message',
        'is_notify',
        'is_stock',
        'is_tracking',
        'is_offer',
        'is_client',
        'is_admin',
        'is_store',
        'is_delivery',
        'is_available',
        'wallet',
        'point',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'email' => $this->email,
            'name' => $this->name
        ];
    }
    public function getNameAttribute()
    {
        if ($this->name_first || $this->name_last) {
            return trim($this->name_first . ' ' . $this->name_last);
        }
        return $this->attributes['name'];
    }
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active', 'role_id', 'type', 'email', 'phone']);
        $query
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request);
        return $query;
    }
    public function totalPriceInCart()
    {
        return $this->cart->cartItems->sum('total_price');
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function notificationsUnread()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id')->whereNull('read_at');
    }
    public function notificationsRead()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id')->whereNotNull('read_at');
    }
    public function markNotificationAsRead($notifications)
    {
        foreach ($notifications as $notification) {
            if(!$notification->read_at){
                $notification->markAsRead();
            }
        }
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
