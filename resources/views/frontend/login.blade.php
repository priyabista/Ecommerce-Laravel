@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.navbar')

<div class="login">
<h2><center>Login</center></h2>
<form action="{{url('/')}}/login" method="post">
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
   <!-- username -->
   <input type="submit" name="login" value="login" class="btn btn-primary"/>
  </div>
</form>
</div>

@endsection