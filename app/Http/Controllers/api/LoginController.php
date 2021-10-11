<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token =  $user->createToken('api_token')->plainTextToken;

            return response()->json([
                'api_token' => $token,
                'message' => 'Login Successful!',
            ], 201);
        }
        else{
            return response()->json([
                'error' => 'Invalid credentials!'
            ], 401);
        }
    }

    public function logout() {

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged Out!'
        ]);
    }
}
