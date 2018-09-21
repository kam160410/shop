<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    //用户地址列表
    public function index(Request $request){

        return view('user_address.index',[
            'addresses'=>$request->user()->addresses
        ]);

    }
}
