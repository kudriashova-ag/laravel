@extends('layouts.app')

@section('content')
  <h1>{{$title}}</h1>
  
  @foreach ($categories as $category)
      <a href="{{url('category/'. $category->slug)}}">{{$category->name}}</a> <br>
  @endforeach


@endsection

@section('title', $title)
