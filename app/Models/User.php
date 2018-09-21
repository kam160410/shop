<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * 可批量分配的属性
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified',
    ];

    /**
     *由于 email_verified 是一个 bool 类型的字段，
     *所以我们新增一个 $casts 属性，告诉 Laravel 这个字段要转换成 bool 类型：
     */
    protected $casts = [
        'email_verified' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addresses(){
        return $this->hasMany(UserAddress::class);
    }
}
