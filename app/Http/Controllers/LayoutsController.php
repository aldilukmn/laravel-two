<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'user' => Auth::user(),
        ];
        return view('partials.mains.home', $data);
    }
}
