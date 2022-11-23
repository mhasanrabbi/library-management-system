@extends('users.layout')
@section('content')
    <div id="content">
        @include('users.partials.nav')
        <div class="container">
            <div class="row d-flex">
                <div class="col-8 justify-content-center">
                    <h4 class="text-center" style="color: #487eb0">Reset Password</h4>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-8 justify-content-end">
                    <form action="{{ route('reset.password') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" style="color: #2c2c54">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #2c2c54">New Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password" required>
                            @error('password')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" style="color: #2c2c54">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirm"
                                placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
