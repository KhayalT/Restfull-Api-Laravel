<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public $table = 'users';

    const Admin_User = 'true';
    const Regular_User = 'false';

    const Verified_User = '1';
    const UnVerified_User = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function IsVerified()
    {
        return $this->verified  = User::Verified_User;
    }

    public function IsAdmin()
    {
        return $this->admin = User::Admin_User;
    }

    public static function generateVerificationCode()
    {
        $random = Str::random(40);
        return $random;
    }
}
