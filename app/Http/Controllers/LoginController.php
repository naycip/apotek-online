<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Pastikan kamu punya file resources/views/auth/login.blade.php
        return view('auth.login');
    }
}