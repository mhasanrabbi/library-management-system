<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\UserloginHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function indextest()
    {
        if (Auth::user()->role == 1) {
            return view('dashboard');
        }
        return view('test');
    }

    public function registration()
    {
        return view('registration');
    }

    public function validate_registration(Request $request)
    {
        $request->validate([

            'first_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'string', 'max:255'],
            'last_name'  => ['required', 'regex:/^[\pL\s\-]+$/u', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'      => ['required', 'string', 'max:20', 'unique:users'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();

        $createUser = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'password'   => Hash::make($data['password']),
        ]);

        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);

        Mail::send('verification', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');

        return redirect('/')->with('success', 'Registration Completed, please check your email and verify it.then you can login');
    }

    public function validate_login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $credentials['first_name'] = Auth::user()->first_name;

            Event::dispatch(new UserloginHistory((object) $credentials));

            return redirect('dashboard');
        }

        return Redirect::back()->withErrors(['msg' => 'Login details are not valid']);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect('/')->with('success', 'you are not allowed to access');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('/');
    }




    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        // return redirect()->route('login')->with('message', $message);
        return redirect('/')->with('success', $message);
    }
}