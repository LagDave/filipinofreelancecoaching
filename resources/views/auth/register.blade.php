@extends('layouts.app')

@section('content')
<script src="{{asset('homepage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<link href="{{asset('homepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('homepage/assets/css/courses-carousel.css')}}" rel="stylesheet">
<link href="{{asset('homepage/assets/css/sections-general.css')}}" rel="stylesheet">


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-5 mb-3">
            <div class="card">
                <div class="card-header"><i class="icofont-user"></i> {{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        {{-- First Name --}}
                        <div class="form-group">
                            <label for="first_name" class="col-form-label text-md-right">First Name</label>

                            <div >
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Last Name --}}
                        <div class="form-group">
                            <label for="last_name" class="col-form-label text-md-right">Last Name</label>

                            <div >
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- User Name --}}
                        <div class="form-group">
                            <label for="username" class="col-form-label text-md-right">User Name</label>

                            <div >
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div >
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="form-group">
                            <label for="address" class="col-form-label text-md-right">Address</label>

                            <div >
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div >
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn w-100 btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="register-pricing col-md-7">
            <div class="section-title" data-aos="fade-up">
                <h2>Pricing</h2>
                <p>We have new courses and ebooks every week!</p>
              </div>
            <div class="row">
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header">Yearly</li>
                        <li class="grey">₱ 1,999 / year</li>
                        <li>Templates and Checklists</li>
                        <li>Softwares and Tools</li>
                        <li>Certificates</li>
                        <li>Chat Support</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header recommended">Monthly</li>
                        <li class="grey">₱ 799 / year</li>
                        <li>Templates and Checklists</li>
                        <li>Softwares and Tools</li>
                        <li>Certificates</li>
                        <li><del>Chat Support</del></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header">Lifetime</li>
                        <li class="grey">₱ 3,999 / ∞</li>
                        <li>Templates and Checklists</li>
                        <li>Softwares and Tools</li>
                        <li>Certificates</li>
                        <li>Chat Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 my-5">
            <div class="section-title" data-aos="fade-up">
                <h2>Courses</h2>
                <p>100+ courses for you to learn and master!</p>
              </div>
      
              
              <div data-aos='fade-up' class="owl-carousel courses-carousel">
      
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/facebook-ads-university.png')}}" alt="">
                </div>
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/gads.png')}}" alt="">
                </div>
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/instagram-domination.png')}}" alt="">
                </div>
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-mastery.png')}}" alt="">
                </div>
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-secrets.png')}}" alt="">
                </div>
                <div class="course-item">
                  <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-strategy.png')}}" alt="">
                </div>
      
              </div>
        </div>
    </div>
</div>
<script src="{{asset('homepage/assets/js/courses-carousel.js')}}"></script>
@endsection
