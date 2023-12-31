<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {

        $data = [
            'title' => 'Login',
        ];

        if (Auth::user()) {
            return redirect()->intended('/');
        }

        return view('login.index', $data);
    }

    public function process(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            if (Auth::user()) {
                $data = [
                    'user' => Auth::user(),
                ];
                return redirect()->intended('/');
            };
        }

        return back()->withErrors([
            'username' => 'Username or password is incorrect',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
