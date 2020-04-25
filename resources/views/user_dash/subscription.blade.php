@extends('layouts.user_dashboard')
@section('current_section')


  <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Subscription Status</h3>
  <hr>

  <p>Plan: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->plan_name : 'No Plan'}}</span></p>
  <p>Subscription Start: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->subscription_start  : 'Not Enrolled'}}</span></p>
  <p>Subscription End: <span style='font-weight:bolder !important'>{{$user->plan == 'has_plan' ? $user->subscription_end  : 'Not Enrolled'}}</span></p>

@endsection