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
        return view( 'auth.login' );
    }

    public function customLogin( Request $request )
    {
        $request->validate( [
            'email'    => 'required',
            'password' => 'required',
        ] );

        $credentials = $request->only( 'email', 'password' );

        //  $id = User::where( 'email', $credentials['email'] )->value( 'id','role' );
         
              
          

        if ( Auth::attempt( $credentials ) ) {
           
     
            return redirect()->intended( 'dashboard' )
                ->withSuccess( 'Signed in' );
        }

        return redirect( "login" )->withSuccess( 'Login details are not valid' );
    }

    public function registration()
    {
        return view( 'auth.registration' );
    }

    public function customRegistration( Request $request )
    {
        $request->validate( [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ] );

        $data = $request->all();
        $check = $this->create( $data );

        // return redirect( "dashboard" )->withSuccess( 'You have signed-in' );
        return redirect( "dashboard" )->withSuccess( 'You have signed-in' );
    }

    public function create( array $data )
    {
        return User::create( [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make( $data['password'] ),
        ] );
    }

    public function dashboard()
    {
       $id = auth()->user()->id;
       $role = User::where( 'id', $id )->value('role');

    //    dd($id,$role);
       
       if ($role) {
           return view( 'admin.dashboard' );
        }else{
            // dd($role);
            // return view( 'user.dashboard');
           return view( 'index');
        }
        dd($role);

    if($role){

        if ( Auth::check() ) {
            return view( 'dashboard' );
        }
    }

        return redirect( "login" )->withSuccess( 'You are not allowed to access' );
    }
    public function dashboardadmin()
    {

        
       $id = auth()->user()->id;
       $role = User::where( 'id', $id )->value('role');

    //    dd($id,$role);
       
           return view( 'admin.dashboard' );
    
        
        
       

    if($role){

        if ( Auth::check() ) {
            return view( 'dashboard' );
        }
    }

        return redirect( "login" )->withSuccess( 'You are not allowed to access' );
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect( '/' );
    }
}
