<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'province','city','district','address','zip',
        'contact_name','contact_phone','last_used_at'
        ];

    protected $dates = ['last_used_at'];

    //关联用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //获取地址时，拼接地址
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }


    
    
}
