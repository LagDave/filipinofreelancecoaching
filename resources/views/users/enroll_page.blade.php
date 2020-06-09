@extends('layouts.app')

@section('content')

{{-- CUSTOM CSS --}}
<link rel="stylesheet" href="{{asset('css/enroll-page-pricing.css')}}">

<div class="sticky-top shadow-sm enroll-steps-header">
  <div class="container">
    <h2 class="text-center">STEP 1. PICK A SUBSCRIPTION PLAN</h2>
    <h5 class="text-white text-center">Choose one that suits you best!</h5>
  </div>
</div>

<section id="pricing" class="enroll-page-pricing pricing">
  <div class="container">

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="box" data-aos="zoom-in-right" data-aos-delay="200">
          <h3>Yearly</h3>
          <h4><sup>₱</sup>999<span> / year</span></h4>
          <ul>
            <li>100+ Courses</li>
            <small><li>Web Portfolio</li></small>
            <li>Templates and Checklists</li>
            <li>Softwares and Tools</li>
            <li>E-Books</li>
            <li>Cheat sheet</li>
            <li>Certificates</li>
            <li>Chat support</li>
          </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/yearly/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
        <div class="box recommended" data-aos="zoom-in" data-aos-delay="100">
          <h3>Monthly</h3>
          <h4><sup>₱</sup>399<span> / month</span></h4>
          <ul>
            <li>100+ Courses</li>
            <small><li>Web Portfolio</li></small>
            <li>Templates and Checklists</li>
            <li>Softwares and Tools</li>
            <li>E-Books</li>
            <li>Cheat sheet</li>
            <li>Certificates</li>
            <li class="na">Chat support</li>
          </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/monthly/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
          <h3>Lifetime</h3>
          <h4><sup>₱</sup>1,999<span> / limitless</span></h4>
          <ul>
            <li>100+ Courses</li>
            <small><li>Web Portfolio</li></small>
            <li>Templates and Checklists</li>
            <li>Softwares and Tools</li>
            <li>E-Books</li>
            <li>Cheat sheet</li>
            <li>Certificates</li>
            <li>Chat support</li>
          </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/lifetime/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Pricing Section -->

@endsection