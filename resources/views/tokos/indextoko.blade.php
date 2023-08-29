@extends('tokos.layouttoko')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>hehe momen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tokos.create') }}"> Create New Toko</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Toko</th>
            <th>Alamat</th>
            <th>jam operasional</th>
            <th>contact person</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tokos as $toko)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $toko->toko }}</td>
            <td>{{ $toko->alamat }}</td>
            <td>{{ $toko->jam_operasional }}</td>
            <td>{{ $toko->cp }}</td>
            <td>
                <form action="{{ route('tokos.destroy',$toko->id_toko) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tokos.show',$toko->id_toko) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('tokos.edit',$toko->id_toko) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tokos->links() !!}
      
@endsection