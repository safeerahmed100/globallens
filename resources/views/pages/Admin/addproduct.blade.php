@extends('layout.app')
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
 
<div class='container my-5'>   
    <div class='row justify-content-center'>
    <div class="col ">
        <div class=" p-2 mt-2">
        <form method='POST' action={{route('product.store')}} enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label >Product Name</label>
              <input type="text" class="form-control" name="product_title" value="{{old('product_title')}}">
             
            </div>

            <div class="form-group">
              <label >Description</label>
              <textarea type="text" class="form-control"  name="product_description">{{old('product_description')}}</textarea>
            </div>
            <div class='row'>
                <div class='col-md-6 col-12 form-group'>
                    <label>Price</label>
                    <input type='number' class='form-control' name='price'>
                </div>
                <div class=' col-md-6 col-12 form-group'>
                    <label>Stock</label>
                    <input type='number' class='form-control' name='stock'>
                </div>
            </div>
            <div class="form-group">
                <label >Product Image</label>
                <input type="file" class="form-control" value="{{old('image')}}" name="image">
              </div>
            <button type="submit" class="text-light signin_btn hoverBtn">Submit</button>
          </form>
    </div>

    </div>


</div>
</div>
@endsection