@extends('admin.layout')
@section('content')

    <!-- partial:content -->
    <h1>List Kain</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Lowest estimated price</th>
                <th>Highest estimated price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $data): ?>
                <tr>
                    <td><?php echo $data['pk']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['desc']; ?></td>
                    <td><?php echo $data['img']; ?></td>
                    <td><?php echo $data['lowest_est']; ?></td>
                    <td><?php echo $data['highest_est']; ?></td>
                    <td class="action-cell">
                        <form method="GET" action="{{ route('editProfileByAdmin') }}" style="display: inline-block; text-align: center;">
                        @csrf
                            <input type="hidden" name="data" value="{{ json_encode($data) }}">
                            <button type="submit" class="btn btn-sm btn-secondary"><span class="fa fa-edit fa-lg"></span>Edit</button>
                        </form>
                    </td>
                    <td class="action-cell">
                        <form method="POST" action="{{ route('deleteProfileByAdmin') }}" style="display: inline-block; text-align: center;">
                        @csrf
                        @method('DELETE')
                            <input type="hidden" name="data" value="{{ json_encode($data) }}">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?');"><span class="fa fa-trash fa-lg"></span>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- partial -->

@endsection