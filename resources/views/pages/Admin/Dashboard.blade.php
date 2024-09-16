@extends('layout/app')

@section('content')
    
    @if($message = Session::get('success'))
    <div class='alert alert-success'>
      <div class="container"> <strong>{{$message}}</strong> </div>
   </div>
   @elseif ($message = Session::get('error'))
   <div class='alert alert-danger'>
    <div class="container"> <strong>{{$message}}</strong> </div>
 </div>
     @endif


     {{-- comment out stuff --}}
     {{-- {{ Auth::user()->first_name }} --}}
     {{-- {{ route('logout.user') }} --}}
     {{-- end  --}}
    <div class="page-width">
    <div class='container m-5'>
        {{-- product add btn --}}
    <div class='row'>
        <div class='container'>
            <div class="col">
  <a href={{route('product.add')}} class=" text-light signin_btn hoverBtn">Add New Products</a></div>
        </div>
    </div>
    {{-- product cards --}}
    <div class="row my-3">
        @foreach ($products as $id=>$product )
            
        <div class="col-md-3 col-sm-4 col-12">
          <div class="product-image-container border rounded">
            <img src='{{ asset('storage/' . $product->image) }}' width='100%'>
          </div>
          <div class=".card__information ">
            <h3>{{$product->product_title}}</h3>
            <span>Price: ${{$product->price}}</span>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-12 px-0">
                <a href='{{ url('/admin/' . $product->id . '/edit-product') }}' class=' btn my-1 btn-primary'>Edit Product</a>
              </div>
              <div class="col-12 px-0">
                <a href='{{ url('/admin/' . $product->id . '/delete') }}' class='btn  btn-danger my-1'>Delete Product</a>

              </div>
            </div>
          </div>
       
        </div>
        @endforeach
    </div>

    </div>
</div>

@endsection