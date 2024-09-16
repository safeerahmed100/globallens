@extends('layout.app')
@section('content')
<section id='product-page' class='page-width'>
<div class="container">
    <div class="row my-5">
        <div class="col-md-5">
        <div class="image-container border rounded">
            <img src={{ asset('storage/' . $product->image) }} width='100%'>
        </div>
        
        </div>
        <div class="col-md-7 ">
          <div class='product-information'>
            <h3>{{$product->product_title}}</h3>    
            <span class='product-price text-bold'>
                Price: ${{$product->price}}</span>
        </div>  
      
            <div class='product-description mt-3'>
                <p>{{$product->product_description}}</p>
                </div>
       <form method='POST' action="{{ url($product->id . '/cart/add' ) }}" enctype="multipart/form-data" >
        @csrf
        <div class='form-group'>
            <div class="row align-items-center">
                <div class="col-md-2">Quantity</div>
                <div class="col-md-3"> <input type="number" name='quantity' class="form-control" required></div>
            </div>
        </div>
        <button type='submit' class='btn btn-primary w-100'>Add to Cart</button>
        </form>
        <a href='/' class='btn btn-success w-100 mt-3'>Add to Wishlist</a>   
    </div>
       

        </div>
    </div>
</div>

</section>
@endsection