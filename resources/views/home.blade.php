@extends('layouts.app')

@section('content')
<div class="container user-dashboard">
    @if(Auth::user()->plan == 'no_plan')
        <div class="alert alert-info" role="alert">
            You are currently not enrolled to any plan. <a href="/home/enroll" class="alert-link">Enroll Now</a>
        </div>
    @endif
    @if(Auth::user()->plan == 'expired')
    <div class="alert alert-danger" role="alert">
        Your subscription has expired. <a href="/home/enroll" class="alert-link">Renew subscription</a>
    </div>
    @endif
    @if(Auth::user()->plan == 'renewal')
    <div class="alert alert-info" role="alert">
        Your subscription renewal is still under process. Please wait.
    </div>
    @endif
    @if($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Your account subscription is under pending. Please wait for confirmation.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="card card-body">
        <div class="dashboard-header">
            <h4>Welcome back, {{Auth::user()->first_name}}!</h4>
            <p>Learn something new.</p>
        </div>
    </div>
</div>
@endsection
