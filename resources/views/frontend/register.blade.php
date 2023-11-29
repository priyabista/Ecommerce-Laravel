@extends('frontend.layouts.main')
@extends('frontend.layouts.navbar')
@section('main-section')
<div class="signup">
<h2><center>Registration Form</center></h2>
<form action="{{url('/')}}/signup" method="post">
    @csrf
<div class="container" style="max-width: 40%">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="fullname">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
  </div>
  
   <input type="submit" name="signup" value="signup" class="btn btn-primary"/>
</form>
<div class="text-center text-secondary mt-2">Already registered? <a href="/login">Login</a></div>
</div>
</div>
@endsection
