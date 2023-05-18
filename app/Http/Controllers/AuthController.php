<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {

        $a = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($a)) {
            return redirect('produits')->with('success', 'Login successfully');
        }
        return back()->with('error', 'Email ou Password incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
