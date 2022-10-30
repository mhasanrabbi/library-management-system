@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                  <label for="first_name" class="text-small text-uppercase">{{ __('First Name') }}</label>
                                  <input id="first_name"
                                   type="text"
                                    class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                     name="first_name" value="{{ old('first_name') }}"
                                      required autocomplete="first_name"
                                      placeholder="First Name"
                                       autofocus>
                                  @error('first_name')
                                  <span class="text-danger invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="last_name" class="text-small text-uppercase">{{ __('Last Name') }}</label>
                                  <input id="last_name"
                                   type="text"
                                   class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                   name="last_name"
                                   value="{{ old('last_name') }}"
                                   required autocomplete="last_name"
                                   placeholder="Last Name"
                                   autofocus>
                                  @error('last_name')
                                  <span class="text-danger invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="email" class=" text-small text-uppercase">{{ __('Email Address') }}</label>
                                  <input id="email" 
                                   type="email"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email" 
                                   placeholder="example@email.com"
                                   autofocus>
                                  @error('email')
                                  <span class="text-danger invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="phone" class="text-small text-uppercase">{{ __('phone number') }}</label>
                                  <input id="phone"
                                   type="number" 
                                   class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   required autocomplete="phone" 
                                   placeholder="+4300000000"
                                   autofocus>
                                  @error('phone')
                                  <span class="text-danger invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="password" class="text-small text-uppercase">{{ __('password') }}</label>
                                  <input id="password"
                                   type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   value="{{ old('password') }}" 
                                   required autocomplete="new-password"
                                   placeholder="Enter your password"
                                   autofocus>
                                  @error('password')
                                  <span class="text-danger invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="password-confirm" class="text-small text-uppercase">{{ __('Password Confirm') }}</label>
                                  <input id="password-confirm"
                                   type="password" 
                                   class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" 
                                   name="password_confirmation" 
                                   required autocomplete="new-password"
                                   placeholder="Confirmed your password"
                                   autofocus>
                                  
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="remember" id="remember">
                              <label class="custom-control-label text-small" for="remember"> Remember Me </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark">  {{ __('Register') }} </button>
                          </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ========================= --}}
{{-- <div class="login-form-container">
    <div class="form-group">
      <form method="POST" action="http://localhost:8080/register">
        <input type="hidden" name="_token" value="zV16Lx0urYe1wFQvqPO3KSm2k51Whzgv4IEP2o41">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="first_name" class="text-small text-uppercase">First Name</label>
              <input id="first_name" type="text" class="form-control form-control-lg" name="first_name" value="" placeholder="First Name">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="last_name" class="text-small text-uppercase">Last Name</label>
              <input id="last_name" type="text" class="form-control form-control-lg" name="last_name" value="" placeholder="Last Name">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="username" class="text-small text-uppercase">Username</label>
              <input id="username" type="text" class="form-control form-control-lg" name="username" value="" placeholder="Username">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="email" class="text-small text-uppercase">E-Mail Address</label>
              <input id="email" type="email" class="form-control form-control-lg" value="" name="email" placeholder="Enter your Email">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="phone" class="text-small text-uppercase">Phone</label>
              <input id="phone" type="number" class="form-control form-control-lg" name="phone" placeholder="Enter your Phone Number">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="password" class="text-small text-uppercase">New Password</label>
              <input id="password" type="password" class="form-control form-control-lg" name="password" placeholder="Enter your password">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="password-confirm" class="text-small text-uppercase">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember">
            <label class="custom-control-label text-small" for="remember"> Remember Me </label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-dark"> Register </button>
          <a class="btn btn-link text-small" href="http://localhost:8080/login"> Login? </a>
        </div>
      </form>
    </div>
  </div> --}}
{{-- ========================= --}}

 {{-- <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            
                            {{-- <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}

                            {{-- <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div> --}}



@endsection
