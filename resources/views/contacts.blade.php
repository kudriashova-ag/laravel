@extends('layouts.app')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif


  <form action="{{url('contacts')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
      @error('name')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group mt-3">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
      @error('email')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

     <div class="form-group mt-3">
      <label for="message">Message:</label>
      <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror">{{old('message')}}</textarea>
      @error('message')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    <button class="btn btn-primary mt-3">Send</button>

  </form>

@endsection