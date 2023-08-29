@extends('kains.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>hehe momen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kains.create') }}"> Create New Product</a>
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
            <th>Name</th>
            <th>Details</th>
            <th>Lowest Price</th>
            <th>Highest Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kains as $kain)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $kain->name }}</td>
            <td>{{ $kain->detail }}</td>
            <td>{{ $kain->low_price }}</td>
            <td>{{ $kain->high_price }}</td>
            <td>
                <form action="{{ route('kains.destroy',$kain->id_kain) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('kains.show',$kain->id_kain) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('kains.edit',$kain->id_kain) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $kains->links() !!}
      
@endsection