<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">

        <!-- Styles -->
        
           <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        
            .modal-body {
                padding: 0;
            }
        
            .btn-close {
                position: absolute;
                right: 0;
                padding: 1em;
            }
        
            .form-area h1 {
                font-size: 2.3em;
                font-weight: bold;
            }
        
            .form-area {
                padding: 3em;
                max-width: 100%;
                color: #fff;
                box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5);
            }
        
            .form-control {
                background-color: inherit;
                color: #fff;
                padding-left: 0;
                border: 1px solid #fff;
                border-radius: 0;
            }
        
            .form-area .btn {
                width: 100%;
                font-weight: 800;
                background-color: #fff;
                padding: 0.5em 0;
                border-radius: 50px;
            }
        
            .btn.btn-primary {
                padding: 15px 50px;
                font-family: alfa slab one;
                font-size: 20px;
                letter-spacing: 2px;
                border-radius: 50px;
            }
        
            .form-area .btn:hover {
                background-color: inherit;
                color: #fff;
                border-color: #fff;
            }
        
            .form-area p {
                text-align: center;
                padding-top: 2em;
                color: #fff;
            }
        
            .form-area p a {
                color: #e1e1e1;
                text-decoration: none;
            }
        
            .form-area p a:hover {
                color: #fff;
            }
        
            @media (max-width: 600px) {
                .form-area {
                    padding: 1.5em;
                }
        
                .form-area h1 {
                    font-size: 18px;
                }
            }
        </style>
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            
           
            @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($message = Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            

            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      @auth
                        @if (Auth::user()->role == 1)
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                        @else
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                        @endif
                        @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">
                            Log in
                        </button>
                            @if (Route::has('register'))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registermodal">
                               Register
                            </button>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
       


        <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="ModalFormLabel" data-bs-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="form-area bg-primary">
                            <h1 class="text-center">Login Form</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" 
                                        placeholder="example@email.com"
                                        required 
                                        autocomplete="email" aria-describedby="emailHelp" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                
                            </div>

                             <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                   
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                            
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                 
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                                            : '' }}>
                            
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>



                            
                                <div class="mb-3 mt-3">
                                    <button type="submit" class="btn btn-light mt-3">
                                        {{ __('Login') }}
                                    </button>

                                </div>

                                    @if (Route::has('password.request'))
                                    <a class="link-light" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                               
        
                            </form>

                    
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="ModalFormLabel" data-bs-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="form-area bg-primary">
                            <h1 class="text-center">Registretion Form</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                              
                                <div class="row">


                                    <div class="mb-3 mt-4">
                                            <label for="first_name" class="form-label text-small text-uppercase">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                                value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>
                                            @error('first_name')
                                            <span class="text-danger invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                     </div>


                                     <div class="mb-3">
                                            <label for="last_name" class="text-small text-uppercase">{{ __('Last Name') }}</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name"
                                                autofocus>
                                            @error('last_name')
                                            <span class="text-danger invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                  <div class="mb-3">
                                            <label for="email" class=" text-small text-uppercase">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@email.com"
                                                autofocus>
                                            @error('email')
                                            <span class="text-danger invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                   <div class="mb-3">
                                            <label for="phone" class="text-small text-uppercase">{{ __('phone number') }}</label>
                                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+4300000000" autofocus>
                                            @error('phone')
                                            <span class="text-danger invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                   <div class="mb-3">
                                            <label for="password" class="text-small text-uppercase">{{ __('password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="{{ old('password') }}" required autocomplete="new-password" placeholder="Enter your password"
                                                autofocus>
                                            @error('password')
                                            <span class="text-danger invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                  <div class="mb-3">
                                            <label for="password-confirm" class="text-small text-uppercase">{{ __('Password Confirm') }}</label>
                                            <input id="password-confirm" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirmed your password"
                                                autofocus>
                                    </div>

                                </div>

                               
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="remember">
                                        <label class="custom-control-label text-small" for="remember"> Remember Me </label>
                                    </div>
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <button type="submit" class="btn btn-light mt-3">
                                       {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    </body>
</html>