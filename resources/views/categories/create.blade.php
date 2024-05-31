@extends('master')
@section('title')
    Create Category
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Create Categories</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>

    <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
</form>
  
@endsection
  