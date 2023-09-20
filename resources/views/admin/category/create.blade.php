@extends('admin.layouts.app')

@section('content')
<h1>Add Category</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

{!! Form::open(['route' => 'category.store']) !!}

@include('admin.category._form')

{!! Form::close() !!}


@endsection