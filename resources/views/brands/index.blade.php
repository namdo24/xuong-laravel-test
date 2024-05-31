@extends('master')
@section('title')
    Brand
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">List Brands</h1>
<a class="btn btn-primary " href="{{route('brands.create')}}">Thêm mới</a>
@if(session('msg'))
<h2 class="alert">{{session('msg')}}</h2>
@endif

    <table class="table">
       <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>IMAGE</th>
        <th>ACTION</th>
       </tr>
     @foreach ( $data as $item )
       <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
            <img src="{{asset($item->image)}}" style="width:70px; height:70px" alt=""></td>
       
        <td>
            <div class="d-flex">
                <a class="btn btn-primary me-2" href="{{route('brands.show',$item)}}">Show</a>
                <a class="btn btn-warning me-2 " href="{{route('brands.edit',$item)}}">Edit</a>
                <form action="{{route('brands.destroy',$item)}}" method="post">
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
