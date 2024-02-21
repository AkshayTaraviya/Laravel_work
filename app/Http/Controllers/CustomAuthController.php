<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $user->createToken('mytoken')->plainTextToken;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check(
            $request->password,
            $user->password
        )) {
            return response([
                'message' => 'Email and Password are incorrect.'
            ], 401);
        }

        return $user->createToken('mytoken')->plainTextToken;
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Succefully Logged out!!'
        ]);
    }
}
