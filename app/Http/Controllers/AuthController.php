<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function proses_login(Request $request)
    {
    	if (Auth::attempt($request->only('email', 'password'))) 
    	{
    		return redirect('/dashboard')->with('sukses', 'Anda Berhasil Login');
    	}

    	return redirect('/login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
