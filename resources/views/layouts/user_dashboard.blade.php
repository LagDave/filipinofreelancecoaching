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


    @if($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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

          <a href="#" class="dash-navigation soft-n-tools">

            <i class="fas fa-tools"></i>
            <span class='ml-2'>Software & Tools</span>
          </a>

          <a href="#" class="dash-navigation ebooks">

            <i class="fas fa-book"></i>
            <span class='ml-2'>E-Books</span>
          </a>

          <a href="#" class="dash-navigation templates">

            <i class="fas fa-sticky-note"></i>
            <span class='ml-2'>Templates</span>
          </a>

          <a href="#" class="dash-navigation certs">

            <i class="fas fa-certificate"></i>
            <span class='ml-2'>Certificates</span>
          </a>

        </div>
      </div>
      <div class="col-lg-6 px-0">

        <div class="card card-body">

          @yield('current_section')

        </div>

      </div>
      <div class="col-lg-3 pl-2">
        <div style='top:85px;z-index:0' class="card card-body sticky-top">

          <a href="#" class="dash-navigation ebooks">

            <i class="fas fa-user"></i>
            <span class='ml-2'>My Profile</span>
          </a>

          <a href="#" class="dash-navigation templates">

            <i class="fas fa-clock"></i>
            <span class='ml-2'>Subscription</span>
          </a>

          <a href="#" class="dash-navigation certs">

            <i class="fas fa-phone"></i>
            <span class='ml-2'>Contact Us</span>
          </a>

        </div>
      </div>
    </div>

  </div>
@endsection