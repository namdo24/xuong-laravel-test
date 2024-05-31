@extends('master')
@section('title')
    Edit Category :{{$category->name}}
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Edit Categories: :{{$category->name}}</h1>
@if(session('msg'))
<h2 class="alert">{{session('msg')}}</h2>
@endif
<form action="{{ route('categories.update',$category) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}">
    </div>

    <button type="submit" class="btn btn-success">Sửa</button>

    <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
</form>
  
@endsection
  