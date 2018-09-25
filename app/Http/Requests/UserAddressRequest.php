<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends Request
{



    public function rules()
    {
        return [
            'province'     =>   'required',
            'city'         =>   'required',
            'district'     =>   'required',
            'zip'          =>   'required',
            'address'      =>   'required',
            'contact_name' =>   'required',
            'contact_phone'=>   'required',
        ];
    }

    public function attributes()
    {
        return [
            'province'   =>  "省份",
            'city'       =>  "城市",
            'district'   =>  "地区",
            'address'    =>  "地址",
            'zip'        =>  "邮编",
            'contact_name' => "姓名",
            'contact_phone'=> "电话"
        ];
    }
}
