@extends('home.layout')
@section('content')

<div class="content" style="display: flex; align-items: center; justify-content: center; height: 10vh;">
    <h1 style="text-align: center; font-weight: bold;">Edit Profile User</h1>
</div>
<div class="content" style="display: flex; justify-content: center; height: 50vh;">
    <form method="POST" action="{{url('/editProfile')}}">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Username" value="{{ $data['username'] }}" @error('username') is-invalid @enderror required>
            @error('username')
                <p class="text-danger small">
                    <strong>Username Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="username"><b>Email</b></label>
            <input type="text" id="email" name="email" placeholder="email" value="{{ $data['email'] }}" @error('email') is-invalid @enderror required>
            @error('email')
                <p class="text-danger small">
                    <strong>Email Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="username"><b>Address</b></label>
            <input type="text" id="address" name="address" placeholder="address" value="{{ $data['address'] }}" @error('address') is-invalid @enderror required>
            @error('address')
                <p class="text-danger small">
                    <strong>Address Invalid</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" name="data" value="{{ json_encode($data) }}">
            <input type="submit" class="submit-btn" value="Change">
        </div>
    </form>
</div>
<div class="content" style="display: flex; justify-content: center; height: 15vh;">
    <form method="GET" action="{{ route('profile') }}" style="display: inline-block; text-align: center;">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-sm btn-secondary"> <h5>Cancel</h5></button>
    </form>
</div>

@endsection