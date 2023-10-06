@if(session('cart'))
    <table class="table">
        @foreach (session('cart') as $product)
        <tr data-id={{$product['id']}}>
            <td><img src="{{url($product['image'])}}" alt="{{$product['name']}}" style="width: 100px"></td>
            <td>{{$product['name']}}</td>
            <td>{{$product['price']}}</td>
            <td>
                <input type="number" value="{{$product['amount']}}" class="amount-js">
            </td>
            <td>{{$product['amount'] * $product['price']}}</td>
            <td><button class="btn-danger btn remove-js">Remove</button></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" class="text-end">Total: </td>
            <td>{{session('totalSum')}}</td>
        </tr>
    </table>    
@else
    <h1>Your cart is empty</h1>
@endif