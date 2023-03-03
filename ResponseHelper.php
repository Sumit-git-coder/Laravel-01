<?php

namespace App\Helpers;
use App\Models\Employees;

class Helper {

    // public static function helperfunction1(){
    //     return "helper function 1 response";
    // }

    public function hello(){
        return "hello every one Welcome to laravel !";
    }
    public static function responseToken($token)
    {
        return response()->json([
            'user' => auth()->user(),
            'success' => true,
            'access_token' => $token,
            // 'expire_in'=>auth()->factory()->getTTL()*1;
        ]);
    }
}






 