@extends('layouts.app')
@section('content')

<div class="container">



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
        
          <div class="card">
              <div class="card-header"><i class="icofont-lock"></i> Reset Password</div>

              <div class="card-body">
                <form method='post' action="/reset_password/verify" class="form">
                  @csrf
                  <div class="form-group">
                    <label>Enter your email:</label>
                    <input name='email' required type="email" class="form-control">
                  </div> 

                  <button class="btn btn-primary">Reset</button>

                </form>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection