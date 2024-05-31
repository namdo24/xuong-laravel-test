@extends('master')
@section('title')
    Category
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">List Categories</h1>
<a class="btn btn-primary " href="{{route('categories.create')}}">Thêm mới</a>
@if(session('msg'))
<h2 class="alert">{{session('msg')}}</h2>
@endif
    <table class="table">
       <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED_AT</th>
        <th>UPLATED_AT</th>
        <th>ACTION</th>
       </tr>
     @foreach ( $data as $item )
       <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
        <td>
            <div class="d-flex">
                <a class="btn btn-primary me-2" href="{{route('categories.show',$item)}}">Show</a>
                <a class="btn btn-warning me-2 " href="{{route('categories.edit',$item)}}">Edit</a>
                <form action="{{route('categories.destroy',$item)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  class="btn btn-danger " type="submit" onclick="return confirm('Bạn có muốn xóa không ?')">Delete</button>
                </form>
            </div>
            
        </td>
       </tr>
       @endforeach
    </table>
    {{$data->links()}}
@endsection
