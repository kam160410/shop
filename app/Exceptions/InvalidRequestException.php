<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Http\Request;

class InvalidRequestException extends Exception
{
    //构造方法
    public function __construct(string $message="",int $code = 400)
    {
        parent::__construct($message,$code);
    }


    public function render(Request $request)
    {
        if($request->expectsJson()){
            response()->json(['msg'=>$this->message],400);
        }
        return view('pages.error',['msg'=>$this->message]);
    }

}
