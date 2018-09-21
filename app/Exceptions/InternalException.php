<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Http\Request;
class InternalException extends Exception
{

    protected $msgForUser;

    public function __construct(string $message,string $msgForUser="系统内部错误!",$code=500)
    {
        parent::__construct($message,$code);
        $this->msgForUser = $msgForUser;
    }

    public function render(Request $request)
    {
        if($request->expectsJson()){
            response()->json(['msg'=>$this->msgForUser],500);
        }
        return view('pages.error',['msg'=>$this->msgForUser]);
    }

}
