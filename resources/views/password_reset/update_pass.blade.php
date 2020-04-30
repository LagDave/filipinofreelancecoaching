@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
  <div class="col-md-5">  
    
    @if($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
      @if($errors->any())
      <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
      </div>
      @endif
    
      <div class="card">
          <div class="card-header"><i class="icofont-lock"></i> Update your password</div>

          <div class="card-body">
            <form method='post' action="/reset_password/updateStore" class="form">
              @csrf
              <div class="form-group">
                <label>New password:</label>
                <input required type="password" name='password' class='form-control'>
              </div>

              <div class="form-group">
                <label>Confirm new password:</label>
                <input required type="password" name='confirm_password' class="form-control">
              </div>
              <input type="hidden" name='email' value='{{Cookie::get('email')}}'>
              
              <button class="btn btn-primary">Update Password</button>

            </form>
          </div>
      </div>
  </div>
</div>
</div>

@endsection