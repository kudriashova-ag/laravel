@extends('admin.layouts.app')

@section('content')
<h1>Edit Category {{$category->name}}</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
{!! Form::model($category, ['route' => ['category.update', $category->id], 'method'=>'put']) !!}

@include('admin.category._form')

{!! Form::close() !!}


@endsection