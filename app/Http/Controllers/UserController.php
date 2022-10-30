<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        return view( 'welcome' );
    }

    public function indextest()
    {
        if ( Auth::user()->role == 1 ) {
            return view( 'dashboard' );
        }
        return view( 'test' );
    }

    public function registration()
    {
        return view( 'registration' );
    }

    public function validate_registration( Request $request )
    {
        $request->validate( [

            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'      => ['required', 'string', 'max:20', 'unique:users'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ] );

        $data = $request->all();

        User::create( [
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'password'   => Hash::make( $data['password'] ),
        ] );

        return redirect( '/' )->with( 'success', 'Registration Completed, now you can login' );
    }

    public function validate_login( Request $request )
    {
        $request->validate( [
            'email'    => 'required',
            'password' => 'required',
        ] );

        $credentials = $request->only( 'email', 'password' );

        if ( Auth::attempt( $credentials ) ) {
            return redirect( 'dashboard' );
        }

        return redirect( '/' )->with( 'success', 'Login details are not valid' );
    }

    public function dashboard()
    {
        if ( Auth::check() ) {
            return view( 'dashboard' );
        }

        return redirect( '/' )->with( 'success', 'you are not allowed to access' );
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect( '/' );
    }

}
