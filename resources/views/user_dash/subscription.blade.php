@extends('layouts.user_dashboard')
@section('current_section')


  <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Subscription Status</h3>
  <hr>

  <p>Plan: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->plan : $user->plan == 'admin' ? 'Admin Rights' : 'Not Enrolled'}}</span></p>
  <p>Subscription Start: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->subscription_start : $user->plan == 'admin' ? 'Admin Rights' : 'Not Enrolled'}}</span></p>
  <p>Subscription End: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->subscription_end : $user->plan == 'admin' ? 'Admin Rights' : 'Not Enrolled'}}</span></p>

@endsection