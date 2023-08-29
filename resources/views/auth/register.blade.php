@extends('auth.layout')
@section('content')

<div class="login-container">
    <h1>Register</h1>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="#" method="POST" action="{{ url('/register') }}">
    @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" @error('username') is-invalid @enderror required>
            @error('username')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" @error('password') is-invalid @enderror required>
            @error('password')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <input name="password_confirmation" type="password" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="Repeat Password" @error('password_confirmation') is-invalid @enderror required>
            @error('password_confirmation')
                <p class="text-danger small">
                    <strong>Password Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" @error('email') is-invalid @enderror required>
            @error('email')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Address" @error('address') is-invalid @enderror required>
            @error('address')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="submit-btn" value="Register">
        </div>
    </form>
    <div class="text-center">
        <a class="small" href="{{url('/login')}}">Already have an account? Directly sign in!</a>
    </div>
</div>

@endsection