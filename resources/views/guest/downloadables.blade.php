@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/user_dashboard.css')}}">
<link rel="stylesheet" href="{{asset('css/enroll-page-pricing.css')}}">

<a href="/register">
  <div class="sticky-top shadow-sm enroll-steps-header">
    <div class="container">
      <h2 class="text-center">REGISTER NOW!</h2>
      <h5 class="text-white text-center">And get access to all of the downloadables listed below at the best price!</h5>
    </div>
  </div>
</a>


<div class="container">
    <div class="card card-body">
      <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Downloadables</h3>
      <hr>

        <h2 class='text-center mb-3'>Ebooks</h2>
        <div class="row">
          @foreach($ebooks as $ebook)
              <div class="mb-5 col-lg-3 course">
                  <img src="{{asset($ebook->cover_img)}}" alt="" class="img-fluid">
                  <p class='mt-2 course-title'><b>{{$ebook->name}}</b></p>
                  <a class="btn-outline-primary btn w-100 btn-sm">Register Now</a>
              </div>

          @endforeach
      </div>
      {{$ebooks->links()}}


      <h2 class='mb-3 text-center'>Templates</h2>
      <div class="row">
        @foreach($templates as $template)
            <div class="mb-5 col-lg-3 course">
                <img src="{{asset($template->cover_img)}}" alt="" class="img-fluid">
                <p class='mt-2 course-title'><b>{{$template->name}}</b></p>
                <a class="btn-outline-primary btn w-100 btn-sm">Register Now</a>
            </div>

        @endforeach
    </div>
    {{$templates->links()}}


    <h2 class='text-center mb-3'>Software and Tools</h2>
    <div class="row">
      @foreach($softwares_and_tools as $software_or_tool)
          <div class="mb-5 col-lg-3 course">
              <img src="{{asset($software_or_tool->cover_img)}}" alt="" class="img-fluid">
              <p class='mt-2 course-title'><b>{{$software_or_tool->name}}</b></p>
              <a class="btn-outline-primary btn w-100 btn-sm">Register Now</a>
          </div>

      @endforeach
  </div>
  {{$softwares_and_tools->links()}}

    </div>
</div>

@endsection