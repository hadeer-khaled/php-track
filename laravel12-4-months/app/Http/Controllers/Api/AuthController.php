<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            "password" => Hash::make($validatedData['password']),
        ]);

        // $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'data' => $user,
            // 'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       $user = User::where('email', $credentials['email'])->first();

       if( $user && Hash::check( $credentials['password'] , $user->password)){
           $token = $user->createToken('API Token')->plainTextToken;
           return response()->json([
               'message' => 'Login successful',
               'data' => $user,
               'token' => $token
           ]);
       }

       return response()->json([
           'message' => 'Invalid credentials',
       ], 401);
    
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}





    