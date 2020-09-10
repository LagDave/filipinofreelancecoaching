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

    <div class="row justify-content-center">

      <div class="col-lg-4 col-md-6">
        <div class="box" data-aos="zoom-in-right" data-aos-delay="200">
          <h3>Promo A</h3>
              <h4><sup>₱</sup>999<span> / Lifetime Access</span></h4>
              <ul>
                <li>200+ Courses</li>
                <li>Website Portfolio</li>
                <li>Additional Courses Every Week!</li>
                <del><li>Softwares and Tools</li></del>
                <del><li>+ Freebies and Bonuses</li></del>
                <li>Lifetime Access on Everything</li>
              </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/promo_a/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
          <h3>Promo B</h3>
              <h4><sup>₱</sup>1499<span> / Lifetime Access</span></h4>
              <ul>
                <li>200+ Courses</li>
                <li>Website Portfolio</li>
                <li>Additional Courses Every Week!</li>
                <li>Softwares and Tools</li>
                <li>+ Freebies and Bonuses</li>
                <li>Lifetime Access on Everything</li>
              </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/promo_b/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
          <h3>Promo C</h3>
              <h4><sup>₱</sup>499<span> / 1 Year</span></h4>
              <ul>
                <li>200+ Courses</li>
                <li>Website Portfolio</li>
                <li>Additional Courses Every Week!</li>
                <del><li>Softwares and Tools</li></del>
                <del><li>+ Freebies and Bonuses</li></del>
                <li>1 Year Access on Everything!</li>
              </ul>
          <div class="btn-wrap">
            <a href="/home/enroll/promo_c/basic_info" class="btn-buy">Enroll Now</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Pricing Section -->

@endsection