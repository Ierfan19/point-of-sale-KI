<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    function getViewUser(){
        $dataParameter['listuser'] = User::all();
        // $pw = User::all();
        // $dataParameter['encript'] = Crypt::encryptString($);
        return view('/user', $dataParameter);
    }
    function getViewRegister(){
        return view('pages.user-pages.register');
    }
    function store(){
        $validatedData = Request::validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|unique:users',
            'password' => 'required|min:3',
            'role' => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'berhasil');
    }
    function getViewLogin(){
        return view('pages/user-pages/login');
    }
    function authenticate(){
        $credential = Request::validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            Request::session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Gagal Login');
    }
    function logout(){
        Auth::logout();

        Request::session()->invalidate();
        Request::session()->regenerateToken();

        return redirect('/');
    }
}
