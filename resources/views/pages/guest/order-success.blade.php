@extends('layout.app')
@section('content')

@if($itemsArray)
<div class="container my-5 ">
    <div class="row">
        <div class="col-md-6">
            <h1>Thankyou for your purchase</h1>
        
            <p>Your Order# is <strong>{{$itemsArray[0]->order_no}}</strong>  </p>
            <p>We'll mail you an order confirmation with details and tracking info</p>
            <a class='btn  text-light my-3 hoverBtn signin_btn' href={{route('home')}}>Continue Shopping</a>
        </div>
        <div class="col-md-6">
            <div class="shadow py-5 px-3 border">
                <table class="table">
                   
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope='col'>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($itemsArray as $order)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $order->product_title }}</td>
                        <td>${{ $order->price }}</td>
                        <td> {{ $order->quantity }}</td>
                        <td>${{ $order->total_price }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="order-info">
            <p class='my-3'>Order Date: {{$itemsArray[0]->order_date}}</p>
            <h3>Order Information</h3>
            <div class="container">
                <div class="row">
                    <div class="col-4 pl-0">
                        <strong>Shipping Address</strong>
                        <span>{{$itemsArray[0]->address}}
                            {{$itemsArray[0]->zipcode}}
                        </span>
                    </div>
                    
                    <div class="col-4 pl-0">
                        <strong>Contact Detail</strong>
                          
                        <span>
                            {{$itemsArray[0]->name}}
                            {{$itemsArray[0]->email}}
                          
                            {{$itemsArray[0]->phone}}
                        </span>
                    </div>
                    <div class="col-4 pl-3 pr-0">
                        <strong>Payment Method</strong>
                        <span>Bank Transfer</span>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@else
<div class="container my-5 text-center">
    <h1>No Orders</h1>
    <a href={{route('home')}} class='btn text-light hoverBtn signinBtn'>Continue Shopping</a>
</div>
@endif
@endsection