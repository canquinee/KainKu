@extends('home.layout')
@section('content')

<div class="content" style="display: flex; align-items: center; justify-content: center; height: 10vh;">
    <h1 style="text-align: center; font-weight: bold;">Change Password</h1>
</div>
<div class="content" style="display: flex; justify-content: center; height: 33vh;">
    <form method="POST" action="{{url('/editProfilePassword')}}">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <label for="password"><b>New Password</b></label>
            <input type="password" id="password" name="password" placeholder="Password" @error('password') is-invalid @enderror required>
            @error('password')
                <p class="text-danger small">
                    <strong>Data Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"><b>Confirm New Password</b></label>
            <input name="password_confirmation" type="password" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="Repeat New Password" @error('password_confirmation') is-invalid @enderror required>
            @error('password_confirmation')
                <p class="text-danger small">
                    <strong>Password Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="submit-btn" value="Change">
        </div>
    </form>
</div>
<div class="content" style="display: flex; justify-content: center; height: 11vh;">
    <form method="GET" action="{{ route('profile') }}" style="display: inline-block; text-align: center;">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-sm btn-secondary"> <h5>Cancel</h5></button>
    </form>
</div>

@endsection