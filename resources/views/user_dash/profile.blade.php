@extends('layouts.user_dashboard')
@section('current_section')


@if ($errors->any())
<div class="alert alert-danger mb-3">
  @foreach ($errors->all() as $error)
      <p class='mb-0'>{{ $error }}</p>
  @endforeach
</div>
@endif

  <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Profile</h3>
  <hr>

  <p>Full Name: <span style='font-weight:bolder !important'>{{$user->first_name}} {{$user->last_name}}</span></p>
  <p>Email: <span style='font-weight:bolder !important'>{{$user->email}}</span></p>
  <p>Address: <span style='font-weight:bolder !important'>{{$user->address}}</span></p>
  <hr>
  
  <form method='post' action='/user/change_password' class="form">
    @csrf
    <div class="form-group">
      <label>Password:</label>
      <input required name='password' type="text" class="form-control">
    </div>
    <div class="form-group">
      <label>Confirm Password:</label>
      <input required name='confirm_password' type="text" class="form-control">
    </div>
    <button class="btn btn-primary">Save New Password</button>
  </form>

@endsection