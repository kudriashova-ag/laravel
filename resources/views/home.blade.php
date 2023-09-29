@extends('layouts.app')

@section('content')
  <h1>{{$title}}</h1>
  
  <div class="row">
    <h2 class="mb-3">Latest Products</h2>
    @foreach ($latestProducts as $product)
        <div class="col-md-3">

          <div class="bg-white p-3 position-relative border product-js" data-id="{{$product->id}}">
                <img src="{{url($product->image)}}" alt="{{$product->name}}" class="img-fluid">
                <div class="h3">
                  <a href="{{url('product/'. $product->slug)}}" class="stretched-link">  {{$product->name}}   </a>
                </div>
                <div class="price-block d-flex justify-content-between">
                  <div class="text-danger fs-3">{{$product->price}}</div>
                  <div class="text-primary position-relative z-3 to-cart-js">Buy</div>
                </div>
          </div>



        </div>
    @endforeach
  </div>
@endsection

@section('title', $title)
