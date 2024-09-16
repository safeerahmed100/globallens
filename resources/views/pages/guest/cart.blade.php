@extends('layout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

@if($message = Session::get('success'))
<div class='alert alert-success'>
  <div class="container"> <strong>{{$message}}</strong> </div>
</div>
@elseif ($message = Session::get('error'))
<div class='alert alert-danger'>
<div class="container"> <strong>{{$message}}</strong> </div>
</div>
 @endif

<div id="cart-page" class="page-width">
    @if($cart)
<table class="table my-5 table-hover">
    <thead>
      <tr>

        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
        <th scope='col'>Total</th>
        <th scope='col'>Action</th>
        
      </tr>
    </thead>
    <tbody>
       

        @foreach ($cart as $id=>$product )
        <tr>
           
       
        <td>{{$product['product_title']}}</td>
        <td>${{$product['price']}}</td>
        <td>{{$product['quantity']}}</td>
        <td>${{$product['total']}}</td>
        <td><form action="{{ url('cart/remove/' . $id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove</button>
        </form>
           
        </td>

        
    </tr>
    @endforeach  
    </tbody>
  </table>
  <div class='cart-ctas my-5'>
  <a href='{{route('customer.info')}}' class='btn text-light hoverBtn signin_btn'>Proceed to Checkout</a>
  <a href='{{route('home')}}' class='btn mt-0 btn-primary'>Continue Shopping</a>
</div>
  @else
  <div class="container my-5 text-center">
  <h1 class='mt-5 mb-5'>Cart is Empty</h1>
  <a href={{route('home')}} class='  text-light text-center signin_btn  hoverBtn'>Start Shopping</a>
</div>
</div>
@endif
@endsection



   