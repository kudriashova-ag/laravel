@extends('admin.layouts.app')

@section('content')
   <h1>Categories</h1> 

   <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>

   <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($categories as $category)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
              <a href="{{route('category.edit', ['category'=>$category->id])}}" class="btn btn-warning">Edit</a>
              {!! Form::open([
                'route'=>['category.destroy', $category->id], 
                'method'=>'delete'
                ]) !!}

                {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}

                {!! Form::close() !!}
            </td>
          </tr>
      @endforeach
    </tbody>

   </table>
@endsection