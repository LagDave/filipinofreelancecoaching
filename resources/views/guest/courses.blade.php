@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/user_dashboard.css')}}">
<link rel="stylesheet" href="{{asset('css/enroll-page-pricing.css')}}">

<a href="{{Auth::check() ? '/home/enroll' : '/register'}}">
  <div class="sticky-top shadow-sm enroll-steps-header">
    <div class="container">
      <h2 class="text-center">{{Auth::check() ? 'ENROLL' : 'REGISTER'}} NOW!</h2>
      <h5 class="text-white text-center">And get access to all of the courses listed below at the best price!</h5>
    </div>
  </div>
</a>

<div class="container">
    <div class="card card-body">
      <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Courses</h3>
      <hr>
      <div class="courses-container row">
        @foreach($courses as $course)
        <div class="mb-5 col-lg-3 course">
              <img src="{{asset($course->cover_img)}}" alt="" class="img-fluid">
              <p class='mt-2 course-title'><b>{{$course->title}}</b></p>
              <a href='/register' class="btn-outline-primary btn w-100 btn-sm">Register Now</a>
          </div>
        @endforeach
      </div>
      {{$courses->links()}}
    </div>
</div>

@endsection