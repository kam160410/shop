<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;

class UserAddressesController extends Controller
{
    //用户地址列表
    public function index(Request $request){

        return view('user_address.index',[
            'addresses'=>$request->user()->addresses
        ]);

    }

    //添加用户地址展示页
    public function create()
    {
        return view('user_address.create_and_edit', ['address' => new UserAddress()]);
    }

    //添加用户地址
    public function store(UserAddressRequest  $request)
    {
        $request->user()->addresses()->create($request->only([
            'province','city','district','address','zip','contact_name','contact_phone'
        ]));
        return redirect()->route('user_addresses.index');
    }
    
    
}
