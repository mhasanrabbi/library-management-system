@extends('users.layout')
@section('content')
    <div id="content">
        @include('users.partials.nav')
        <div class="container">
            <div class="row d-flex">
                <div class="col-8 justify-content-center">
                    <h4 class="text-center" style="color: #487eb0">User Login</h4>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-8 justify-content-end">
                    <form action="{{ route('user.dashboard') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" style="color: #2c2c54">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email" required>
                            @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #2c2c54">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password" required>
                        </div>

                        <div class="form-group">
                            <label for="remember" style="color: #2c2c54">Remember me</label>
                            <input type="checkbox" name="remember" id="remember" value="1">
                        </div>

                        <button type="submit" class="btn btn-outline-primary">Login</button>
                        <a href="{{ route('user.register') }}">
                            <p style="color: #2c2c54">Don't Have an account? <span class="text-primary">Register</span></p>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
