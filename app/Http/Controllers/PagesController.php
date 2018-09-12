<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * 首页展示
     */
    public  function root()
    {
        return view('pages.root');
    }

    /**
     * 邮箱验证提示
     */
    public function emailVerifyNotice()
    {
        return view('pages.email_verify_notice');
    }
}
