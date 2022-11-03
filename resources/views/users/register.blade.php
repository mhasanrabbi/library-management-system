@extends('users.layout')
@section('content')
    <div id="content">
        @include('users.partials.nav')
        <div class="container">
            <div class="row d-flex">
                <div class="col-8 justify-content-center">
                    <h4 class="text-center" style="color: #487eb0">User Registration</h4>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-8 justify-content-end">
                    <form action="{{ route('user.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="color: #2c2c54">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter your name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: #2c2c54">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" style="color: #2c2c54">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                            @error('phone')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" style="color: #2c2c54">Address</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="Enter your address" value="{{ old('address') }}" required>
                            @error('address')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #2c2c54">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password" required>
                            @error('password')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirmation"
                                placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Register</button>
                        <a href="{{ route('user.login') }}">
                            <p style="color: #2c2c54">Have an account? <span class="text-primary">Login</span></p>
                        </a>

                        <div class="row">
                            <div class="col-12">
                                <p style="background-color: #0984e3; color: #2c3e50" class="text-center p-1"><a href="#"><b>Log in with google</b></a></p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
