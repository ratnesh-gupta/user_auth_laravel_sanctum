<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('email',$request['email'])->first();
        if(!$user || !Hash::check($request['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }
}
