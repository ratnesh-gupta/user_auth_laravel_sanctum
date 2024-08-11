<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request['email'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 422);
        }

        $token = $user->createToken($user->name . '-AuthToken' . $user->email)->plainTextToken;

        $data = [
            'access_token' => $token,
            'token' => $token,
            'user' => $user,
        ];

        return response()->json($data, 200);
    }
}
