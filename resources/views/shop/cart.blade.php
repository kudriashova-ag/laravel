<table class="table">
  @forelse (session('cart')??[] as $product)
      <tr>
          <td><img src="{{url($product['image'])}}" alt="{{$product['name']}}" style="width: 100px"></td>
          <td>{{$product['name']}}</td>
          <td>{{$product['price']}}</td>
          <td>{{$product['amount']}}</td>
          <td>{{$product['amount'] * $product['price']}}</td>
      </tr>
  @empty
      <h1>Your cart is empty</h1>
  @endforelse
</table>