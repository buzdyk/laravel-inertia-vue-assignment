<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPE_ADMIN = 'admin';
    const TYPE_NANNY = 'nanny';
    const TYPE_CUSTOMER = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function types()
    {
        return [
            self::TYPE_ADMIN,
            self::TYPE_CUSTOMER,
            self::TYPE_NANNY,
        ];
    }

    public function scopeAdmins($query)
    {
        $query->where('type', self::TYPE_ADMIN);
    }

    public function scopeCustomers($query)
    {
        $query->where('type', self::TYPE_CUSTOMER);
    }

    public function scopeNannies($query)
    {
        $query->where('type', self::TYPE_NANNY);
    }
}
