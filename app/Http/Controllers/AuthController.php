<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //show user register view 
    public function register() {
        return view('users.register', [
            'pageTitle' => 'Register',
        ]);
    }

    //show login view
    public function login() {
        return view('users.login', [
            'pageTitle' => 'Login',
        ]);
    }

}
