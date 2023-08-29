@extends('auth.layout')
@section('content')

<div class="login-container">
    <h1>Login</h1>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="#" method="POST" action="{{ url('/login') }}">
    @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" @error('username') is-invalid @enderror required>
            @error('username')
                <p class="text-danger small">
                    <strong>Username / Password Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" @error('password') is-invalid @enderror required>
            @error('password')
                <p class="text-danger small">
                    <strong>Username / Password Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="submit-btn" value="Login">
        </div>
    </form>
    <div class="text-center">
        <a class="small" href="{{url('/register')}}">Don't have an account? Let's create one!</a>
    </div>
</div>

@endsection
