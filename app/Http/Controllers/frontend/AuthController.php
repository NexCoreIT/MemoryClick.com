<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function frontendLogout(){
        Auth::logout();
        return redirect('/')->withSuccess('Logout Success');
    }
}
