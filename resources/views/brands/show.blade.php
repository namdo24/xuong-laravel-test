@extends('master')
@section('title')
    Show Brand: {{$brand->name}}
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Show Brand:{{$brand->name}}</h1>

<ul>
        <li>ID: {{$brand->id}}</li>
        <li>NAME: {{$brand->name}}</li>
        <li>IMAGE:  <img src="{{asset($brand->image)}}" style="width:70px; height:70px" alt=""></td></li>
        <li>CREATED_AT: {{$brand->created_at}}</li>
        <li>UPLATED_AT: {{$brand->updated_at}}</li>
</ul>

    <a href="{{ route('brands.index') }}" class="btn btn-danger">Quay lại trang chủ</a>


@endsection
  