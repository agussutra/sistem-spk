<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $validation = validator($request->all(), [
            'username' => ['required', function ($attr, $value, $fail) {
                if(\App\Models\User::where('username', $value)->exists() === false)
                    $fail("Username Tidak Ditemukan !");
            }],
            'password' => ['required', function ($attr, $value, $fail) use ($request) {
                $user = \App\Models\User::where('username', $request->username)->first();
                if(\Illuminate\Support\Facades\Hash::check($value, $user->password) === false)
                    $fail("Password Salah");
            }],
        ], [
            'username.required' => 'Masukan Username',
            'password.required' => 'Masukan Password'
        ]);

        if($validation->fails())
            return redirect()->back()->with('error' , $validation->errors()->first());

        $auth = Auth::attempt($request->except('_token'));

        return redirect()->route('dashboard')->with('success', 'Login Berhasil !');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Keluar Dari Aplikasi !');
    }
}
