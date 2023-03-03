<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Helper;
use App\Models\User;
use App\Models\Posting\Posting;

use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    //


    public function getPosts()
    {


        if (Auth::user()) {
            $data = Posting::where('posting_end_date', '>=', Carbon::now()->toDateString())->get();
            return $data;
        }

        return "You are Unauthoreized";
    }

    public function loginApi(Request $request)
    {
        $data = $request->only('email', 'password');

        try {
            if (Auth::attempt($data)) {
                $user = $request->user();
                $user = Auth::user();
                $token = $user->createToken('hello')->accessToken;
                return Helper::responseToken($token);
            } else {

                return response()->json(['msg' => 'you are not looks like an user,do register with us ']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function logout(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json(['msg' => 'successfully logout']);
        } catch (\Exception $error) {

            return response()->json(['msg' => $error->getMessage()]);
        }
    }






    // public function refresh(Request $request)
    // {
    //     $refreshToken = $request->user()->tokens()->where('name', 'hello')->first();
    //     if (!$refreshToken) {
    //         return response()->json(['error' => 'Refresh token not found'], 404);
    //     }
    //     $token = $refreshToken->refresh();
    //     return $this->responseToken($token);
    //     return response(['user' => auth()->user(), 'token' => $token]);
    // }




    // public function refresh(Request $req) 
    // { 
    //     if (auth()->user()) {
    //         try {
    //            $token = $req->user()->tokens()->where('name', 'hello')->first();
    //            return $token;
    //         //    ->first()->refresh();
    //             $token->save();
    //             return response()->json(['token' => $token]);
    //         } catch (\Exception $e) {
    //             return response()->json(['error' => $e->getMessage()]);
    //         }
    //     } else {
    //         return response()->json(['success' => false, 'msg' => 'not authenticated']);
    //     }
    // }


    public function registerApi()
    {
        return "Enter your details to register";
    }
}
