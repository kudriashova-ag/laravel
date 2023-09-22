@extends('admin.layouts.app')

@section('content')
   <h1>Products</h1> 

   <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>

   <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($products as $product)
          <tr>
            <td>{{$loop->iteration + $products->perPage() * ($products->currentPage() - 1)}}</td>
            
            <td><img src="{{asset($product->image)}}" alt="" style="width: 70px"></td>

            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>
              <a href="{{route('product.edit', ['product'=>$product->id])}}" class="btn btn-warning">Edit</a>
              {!! Form::open([
                'route'=>['product.destroy', $product->id], 
                'method'=>'delete'
                ]) !!}

                {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}

                {!! Form::close() !!}
            </td>
          </tr>
      @endforeach
    </tbody>

   </table>

   {{$products->links()}}
   
@endsection