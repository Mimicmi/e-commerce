@extends('layouts.app')

@section('content')

<div class="container">
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}  
      </div>        
    @endforeach      
  @endif
  <table id="cart" class="table table-hover ">    
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>

      @if ($cart)
      @php $i=1 @endphp
      @foreach ($cart->items as $product)    

      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td><img src="{{ Storage::url($product['image']) }}" width="100"></td>
        <td>{{ $product['name'] }}</td>
        <td>{{ $product['price'] }}€</td>
        <td>
          <form action="{{ route('update.cart', $product['id']) }}" method="POST">@csrf
            <input type="text" name="qty" value="{{ $product['qty'] }}">
            <button class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i>Update</button>
          </form>
        </td>
          <td>
            <form action="{{ route('destroy.cart', $product['id']) }}" method="POST">@csrf
              <button class="btn btn-danger">Remove</button>
            </form>
          </td>
      </tr>

      @endforeach
      
    </tbody>
  </table>	
  <hr>
  <div class="card-footer">
    <button class="btn btn-warning">Continue Shopping</button>
    <span style="margin-left:300px;">Total Price: {{ $cart->totalPrice }}€</span>
    <a href="{{ route('checkout.cart', $cart->totalPrice) }}">
      <button class="btn btn-info float-right">Checkout</button>
    </a>
  </div>			

  @else
  <td>No items in cart</td>  
  @endif

</div>
@endsection