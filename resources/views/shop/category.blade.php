@extends('layouts.app')

@section('content')
  <h1>{{$category->name}}</h1>
  <div>{{$category->description}}</div> 

  @foreach ($category->products as $product)
      {{$product->name}} <br>
  @endforeach
  
@endsection
