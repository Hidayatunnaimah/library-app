<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth/login");
    }

    public function ProccesLogin (Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');

        if (!Auth::attempt($credentials)) {
            echo "<script>alert('Username and password not matched');window.location.href = '" . url('/login') . "';</script>";
            return;
        }

        $user = Auth::user();
        $request->session()->put('user', $user);

        return redirect()->route('book.index');
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
