@extends('/layout/app')
@section('content')
@if($message = Session::get('status'))
<div class='alert alert-success'>
  <div class="container"> <strong>{{$message}}</strong> </div>
</div>
@elseif ($message = Session::get('email'))
<div class='alert alert-danger'>
<div class="container"> <strong>{{$message}}</strong> </div>
</div>
 @endif
 <section id='login-page' class='m-5'>
<div class='container d-flex align-items-center h-100'>
<!-- Pills navs -->
<form class='w-50 mx-auto' action={{route('password.email')}} method=POST>
@csrf
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>
  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="signin_btn hoverBtn w-100 mb-2">Reset Password</button>

</form>
</section>

@endsection