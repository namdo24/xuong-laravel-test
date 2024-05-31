@extends('master')
@section('title')
    Edit brand :{{$brand->name}}
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Edit Categories: :{{$brand->name}}</h1>
@if(session('msg'))
<h2 class="alert">{{session('msg')}}</h2>
@endif
<form action="{{ route('brands.update',$brand) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$brand->name}}">
    </div>
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Image</label><br>
    <img src="{{asset($brand->image)}}" style="width:70px; height:70px; margin-bottom:8px" alt="">
    <input  type="file" id="name" name="image" class="form-control">
</div>
    <button type="submit" class="btn btn-success">Sửa</button>

    <a href="{{ route('brands.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
</form>
  
@endsection
  