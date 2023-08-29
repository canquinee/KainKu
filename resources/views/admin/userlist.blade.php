@extends('admin.layout')
@section('content')

    <!-- partial:content -->
    <h1>@yield('tableTitle')</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $data): ?>
                <tr>
                    <td><?php echo $data['pk']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo substr($data['password'], 0, 10) . '...'; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td class="action-cell">
                        <form method="GET" action="{{ route('editProfileByAdmin') }}" style="display: inline-block; text-align: center;">
                        @csrf
                            <input type="hidden" name="data" value="{{ json_encode($data) }}">
                            <button type="submit" class="btn btn-sm btn-secondary"><span class="fa fa-edit fa-lg"></span>Edit</button>
                        </form>
                    </td>
                    @if(session('user')['data']['level'] != $data['level'] && session('user')['data']['level'] == '2')
                    <td class="action-cell">
                        <form method="POST" action="{{ route('deleteProfileByAdmin') }}" style="display: inline-block; text-align: center;">
                        @csrf
                        @method('DELETE')
                            <input type="hidden" name="data" value="{{ json_encode($data) }}">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?');"><span class="fa fa-trash fa-lg"></span>Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- partial -->

@endsection