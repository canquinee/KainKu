@extends('home.layout')
@section('content')

<div class="content" style="display: flex; justify-content: center; height: 100vh;">
    <h1 style="text-align: center; font-weight: bold;">Profile User</h1>
    <table class="table table-striped" id="users">
        <tbody>
        <tr class="align-middle">
            <th>Username</th>
            <td><?php echo $data['username']; ?></td>
        </tr>
        <tr class="align-middle">
            <th>Email</th>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr class="align-middle">
            <th>Alamat</th>
            <td><?php echo $data['address']; ?></td>
        </tr>
        <tr class="align-middle">
            <th>Password<br>(encrypted)</th>
            <td><?php echo substr($data['password'], 0, 10) . '...' ?></td>
        </tr>
        </tbody>
    </table>
</div>
<div style="display: flex; align-items: center; justify-content: center; height: 10vh;">
    <form method="GET" action="{{ route('editProfile') }}" style="display: inline-block; text-align: center; margin-right: 200px;">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-sm btn-warning"><span class="fa fa-edit fa-2x"></span> <h5>Edit Profile Data</h5></button>
    </form>
    <form method="GET" action="{{ route('editProfilePassword') }}" style="display: inline-block; text-align: center;">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-edit fa-2x"></span> <h5>Change Password</h5></button>
    </form>
</div>

@endsection