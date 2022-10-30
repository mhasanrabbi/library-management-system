<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class SampleController extends Controller
{
    public function index()
    {
        return view( 'login' );
    }

    public function registration()
    {
        return view( 'registration' );
    }

    public function validate_registration( Request $request )
    {
        $request->validate( [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ] );

        $data = $request->all();

        User::create( [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make( $data['password'] ),
        ] );

        return redirect( 'login' )->with( 'success', 'Registration Completed, now you can login' );
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

        return redirect( 'login' )->with( 'success', 'Login details are not valid' );
    }

    public function dashboard()
    {
        if ( Auth::check() ) {
            return view( 'dashboard' );
        }

        return redirect( 'login' )->with( 'success', 'you are not allowed to access' );
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect( 'login' );
    }
}
