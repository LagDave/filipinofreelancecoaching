@extends('layouts.app')

@section('content')
  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{asset('css/user_dashboard.css')}}">

  <div class="container-fluid alerts">

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
    @if(Auth::user()->plan == 'pending')
    <div class="alert alert-info" role="alert">
        Your subscription application is still under process. Please wait.
    </div>
    @endif
  </div>
  <div class="container-fluid user-dashboard">

    <div class="row">
      <div  class="col-lg-3 pr-2">
        <div style='top:85px;z-index:0' class="card card-body sticky-top">

          <a href="/home/courses" class="dash-navigation courses">

              <i class="fas fa-graduation-cap"></i>
              <span class='ml-2'>My Courses</span>
          </a>
          {{-- <a href="/home/cheat_sheet" class="dash-navigation templates">

            <i class="fas fa-scroll"></i>
            <span class='ml-2'>Cheat Sheet</span>

          </a> --}}
          <a href="/home/profile" class="dash-navigation ebooks">

            <i class="fas fa-user"></i>
            <span class='ml-2'>My Profile</span>
          </a>
          
          <a style='position:relative' href="/home/portfolio/setup" class="dash-navigation certs">

            <i class="fas fa-user"></i>
            <span class='ml-2'>Manage Portfolio Page</span>

            <span style='
            font-size:.6em; 
            background:dodgerblue; 
            color:white; 
            padding:1px 5px;
            position:absolute;
            top:-5px;
            right: -10px;
            border-radius:2px'
            >NEW!</span>
          </a>

          {{-- <a href="/home/subscription" class="dash-navigation templates">

            <i class="fas fa-clock"></i>
            <span class='ml-2'>Subscription</span>
          </a> --}}

          <a href="/home/contacts" class="dash-navigation certs">

            <i class="fas fa-phone"></i>
            <span class='ml-2'>Contact Us</span>
          </a>

          <hr>
          @foreach($announcements as $entry)
            <div class="alert alert-{{$entry->type}}">
              <small><u><b>{{$entry->created_at}}</b></u></small>
              <small class='my-0'>{{$entry->content}}</small>
            </div>
          @endforeach
      
        </div>
      </div>
      <div class="col-lg-9 ">
          <div class="card card-body mb-3">
            <h3 class='section-header mb-0'>@yield('section_title')</h3>
          
          @yield('current_section')
        </div>
      </div>
    </div>

  </div>
@endsection