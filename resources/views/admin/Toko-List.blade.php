@extends('admin.layout')
@section('content')

    <!-- partial:content -->
    <h1>List Toko</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Toko</th>
                <th>Lokasi</th>
                <th>Contact Person</th>
                <th>Jam Buka Operasional</th>
                <th>Jam Tutup Operasional</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $data): ?>
                <tr>
                    <td><?php echo $data['pk']; ?></td>
                    <td><?php echo $data['nama_toko']; ?></td>
                    <td><?php echo $data['lokasi']; ?></td>
                    <td><?php echo $data['contact_person']; ?></td>
                    <td><?php echo $data['jamBuka_operasional']; ?></td>
                    <td><?php echo $data['jamTutup_operasional']; ?></td>
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