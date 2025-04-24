<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('backend.components.auth.login');
    }


            public function store(Request $request)
        {
            // Validate user input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:5',
            ]);

            $credential = $request->only(['email', 'password']);

            if (Auth::attempt($credential)) {
                if (auth()->user()->role == 'customer') {
                    return redirect()->route('home');
                } elseif (auth()->user()->role == 'admin') {
                    return redirect()->route('dashboard')->withSuccess('Login Success');
                }
            }

            return redirect()->back()->with('error' , 'Invalid credentials. Please try again.');
        }




            public function logout(){
                Auth::logout();
                return redirect('/')->withSuccess('Logout Success');
            }

}
