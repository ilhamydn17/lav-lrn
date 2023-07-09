<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    // login
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            // jika login berhasil
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('authToken')->plainTextToken;
            return new LoginResource([
                'user'=> $user,
                'token'=> $token
            ]);
        }else{
            // jika login gagal
            return response()->json([
                'message'=> 'Email atau password salah',
            ], 404);
        }

    }

    // register
    public function register(RegisterRequest $request){
        // validate input
        // save user to database
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
        ]);
        // create token
        $token = $user->createToken('authToken')->plainTextToken;
        // return token
        return new LoginResource([
            'user'=> $user,
            'token'=> $token
        ]);
    }

    // logout
    public function logout(Request $request){
        // hapus token yang ada pada user
        $request->user()->tokens()->delete();
        // return response no content
        return response()->noContent();
    }
}
