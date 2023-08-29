@extends('admin.layout')
@section('content')

<style>
    th, td {
        border: none;
    }
    .button-group {
        display: flex;
        justify-content: center;
        margin-top: 23px;
    }
</style>

<h1>{{ $data['username'] }}'s Profile</h1>

<div class="content" style="display: flex; justify-content: center; height: 60vh;">
<form method="POST" action="{{ url('/editUser') }}" style="display: flex; justify-content: center; height: 60vh;">
    @csrf
    @method('PATCH')
    <table style="border: none;">
        <tbody>
            <tr>
                <td><b>Username</b></td>
                <td>
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ $data['username'] }}" @error('username') is-invalid @enderror required>
                    @error('username')
                        <p class="text-danger small">
                            <strong>Username Invalid {{ $message }}</strong>
                        </p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>
                    <input type="text" id="email" name="email" placeholder="Email" value="{{ $data['email'] }}" @error('email') is-invalid @enderror required>
                    @error('email')
                        <p class="text-danger small">
                            <strong>Email Invalid</strong>
                        </p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td>
                    <input type="text" id="address" name="address" placeholder="Address" value="{{ $data['address'] }}" @error('address') is-invalid @enderror required>
                    @error('address')
                        <p class="text-danger small">
                            <strong>Address Invalid</strong>
                        </p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><b>New Password</b></td>
                <td>
                    <input type="password" id="password" name="password" placeholder="Password">
                    @error('password')
                        <p class="text-danger small">
                            <strong>Data Invalid</strong>
                        </p>
                    @enderror
                </td>
            </tr>
            <tr id="confirm-password-group" style="display: none;">
                <td><b>Confirm New Password</b></td>
                <td>
                    <input name="password_confirmation" type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Repeat New Password">
                    @error('password_confirmation')
                        <p class="text-danger small">
                            <strong>Password Invalid</strong>
                        </p>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="conten button-group" style="display: flex; justify-content: center;">
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-sm btn-success">
            <h5>Change</h5>
        </button>
    </form>

    <form method="GET" action="{{ route('U_List') }}" style="display: inline-block; text-align: center;">
        @csrf
        <button type="submit" class="btn btn-sm btn-secondary">
            <h5>Cancel</h5>
        </button>
    </form>
</div>

<!-- JavaScript code for conditional display of confirm password -->
<script>
    window.addEventListener('DOMContentLoaded', function() {
        document.getElementById('password').addEventListener('input', function() {
            var confirmPasswordGroup = document.getElementById('confirm-password-group');
            if (this.value !== '') {
                confirmPasswordGroup.style.display = 'table-row';
            } else {
                confirmPasswordGroup.style.display = 'none';
            }
        });
    });
</script>

    <!-- partial -->

@endsection