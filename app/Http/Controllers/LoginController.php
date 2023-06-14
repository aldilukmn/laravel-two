<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login() {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1' :
                    return redirect()->intended('home');
                break;
                case '2' :
                    return redirect()->intended('students');
                break;
            }
        }

        return view('login.index');
    }
}
