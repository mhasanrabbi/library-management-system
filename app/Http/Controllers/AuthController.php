<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
            
        
        }


        return redirect("login");
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'address'    => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        // dd($check);

        // return redirect("dashboard")->withSuccess('You have signed-in');
        return redirect("home");
    }

    public function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'address'     => $data['address'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function home() // after logged in redirect user to home page.
    {

        $id = auth()->user()->id;
        $role = User::where('id', $id)->value('role');

        // dd("suer :", $id, $role);

        return view('index',['role' => $role]);
    }
    public function dashboard() // after logged in redirect admin to dashboard page.
    {

        return view('dashboard');
    }

    public function signOut()
    {

        Session::flush();
        Auth::logout();


        return Redirect('/');
    }
}