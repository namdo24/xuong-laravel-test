@extends('master')
@section('title')
    Show Category: {{$category->name}}
@endsection
@section('content')
<h1 class="d-flex  justify-content-center mt-2 ">Show Categories:{{$category->name}}</h1>
   <ul>
    @foreach ($category->toArray() as $column => $value )
        <li>{{$column}}: {{$value}}</li>
    @endforeach
   </ul>
    <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại trang chủ</a>


@endsection
  