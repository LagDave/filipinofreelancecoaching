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

    <div class="alert alert-success alert-dismissible fade show" role="alert">
      We sent a code to {{$email}}. Please allow up to 5 minutes.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
      <div class="card">
          <div class="card-header"><i class="icofont-lock"></i> Prove it's you</div>

          <div class="card-body">
            <form method='post' action="/reset_password/update_pass" class="form">
              @csrf
              <div class="form-group">
                <label>Enter the code:</label>
                <input name='code' required type="text" class="form-control">
              </div> 

              <input type="hidden" name='email' value='{{$email}}'>

              <button class="btn btn-primary">Check code</button>

            </form>
          </div>
      </div>
  </div>
</div>
</div>

@endsection