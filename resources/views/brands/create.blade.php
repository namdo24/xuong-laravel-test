@extends('master')
@section('title')
    Create Brand
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Create Brands</h1>
<form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="mt-2 mb-2">
        <label class="form-label" for="name">Image</label>
        <input type="file" id="name" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>

    <a href="{{ route('brands.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
</form>
@endsection

