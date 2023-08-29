@extends('admin.layout')
@section('content')

<div class="content" style="display: flex; align-items: center; justify-content: center; height: 10vh;">
    <h1 style="text-align: center; font-weight: bold;">Create New User</h1>
</div>
<div class="content" style="display: flex; align-items: center; justify-content: center; height: 60vh;">
    <form method="POST" action="{{url('/createUser')}}"  style="width: 500px; margin: 0 auto;">
    @csrf
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Username" class="form-control form-control-user" style="color: #ffffff;" @error('username') is-invalid @enderror required>
            @error('username')
                <p class="text-danger small">
                    <strong>Username Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="username"><b>Email</b></label>
            <input type="text" id="email" name="email" placeholder="email"class="form-control form-control-user" style="color: #ffffff;" @error('email') is-invalid @enderror required>
            @error('email')
                <p class="text-danger small">
                    <strong>Email Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="username"><b>Address</b></label>
            <input type="text" id="address" name="address" placeholder="address"class="form-control form-control-user" style="color: #ffffff;" @error('address') is-invalid @enderror required>
            @error('address')
                <p class="text-danger small">
                    <strong>Address Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Password"class="form-control form-control-user" style="color: #ffffff;" @error('password') is-invalid @enderror required>
            @error('password')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"><b>Confirm Password</b></label>
            <input name="password_confirmation" type="password" class="form-control form-control-user" style="color: #ffffff;" 
                id="exampleInputPassword" placeholder="Repeat New Password" @error('password_confirmation') is-invalid @enderror required>
            @error('password_confirmation')
                <p class="text-danger small">
                    <strong>Password Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group"  style="display: flex; justify-content: center; height: 5vh;">
            <input type="submit" class="submit-btn" value="Create User">
        </div>
    </form>
</div>
<div class="content" style="display: flex; justify-content: center; height: 15vh;">
    <form method="GET" action="{{ route('dash') }}" style="display: inline-block; text-align: center;">
        @csrf
        <button type="submit" class="btn btn-sm btn-secondary"> <h5>Cancel</h5></button>
    </form>
</div>

@endsection