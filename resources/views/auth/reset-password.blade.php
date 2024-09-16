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
<form class='w-50 mx-auto' action={{route('password.update')}} method='POST'>
@csrf
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="hidden" name="token" id="form2Example1" value={{$token}} class="form-control border" />
  </div>
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" value="{{ old('email', isset($_GET['email']) ? $_GET['email'] : '') }}" class="form-control border" readonly/>
    <label class="form-label" for="form2Example1">Email</label>
    @error('email')
    <label class="for-error">{{ $message }}</label>
@enderror
  </div>
  
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">Password</label>
    @error('password')
    <label class="for-error">{{ $message }}</label>
@enderror
  </div>
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password_confirmation" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">Confirm Password</label>
    @error('password_confirmation')
    <label class="for-error">{{ $message }}</label>
@enderror
  </div>
  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="signin_btn hoverBtn w-100 mb-2">Reset Password</button>

</form>
</section>

@endsection