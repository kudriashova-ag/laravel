@extends('admin.layouts.app')

@section('content')
<h1>Add Product</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

{!! Form::open(['route' => 'product.store', 'files' => true]) !!}

@include('admin.product._form')

{!! Form::close() !!}


@endsection