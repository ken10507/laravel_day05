<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request){
        $info = $request->only('email', 'password');

        if ( auth()->attempt($info) ) {

            $user = auth()->user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return ['token' => $token];

        }else{
            
            return response([
                'message' => 'Unauthenticated.'
            ], 401);

        }
    }

}
