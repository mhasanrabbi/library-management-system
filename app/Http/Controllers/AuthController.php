<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //new user
    public function store(Request $request) {
        $formData = $request->validate([
            'name' => 'required|min:4|max:20|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|unique:users|email',
            'phone' => 'required|digits:11',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'password' => 'required|confirmed|min:6'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        // dd($formData);
        User::create($formData);
        return redirect()->route('user.login');
    }

    //user login
    public function authLogin(Request $request){
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($formData, true)) {

            $request->session()->regenerateToken();
            return redirect()->route('user.home');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    //user logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }

    //show forget form
    public function forget(){
        return view('users.forget');
    }

    //reset new password
    public function reset(Request $request){
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $formData['password'] = bcrypt($formData['password']);
        
        $user = User::whereEmail($formData['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email is not registered !!']);
        }

        User::where('email', $request->email)->update([
            'password' => $formData['password']
        ]);   

        return redirect()->route('user.login');
    }

}
