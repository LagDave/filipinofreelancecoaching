@extends('layouts.app')

@section('content')
<script src="{{asset('homepage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<link href="{{asset('homepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('homepage/assets/css/courses-carousel.css')}}" rel="stylesheet">
<link href="{{asset('homepage/assets/css/sections-general.css')}}" rel="stylesheet">


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
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
        <div class="register-pricing col-md-8">
            <div class="section-title" data-aos="fade-up">
                <h2>Pricing</h2>
                <p>We have new courses every week!</p>
              </div>
            <div class="row">
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header">Yearly</li>
                        <li class="grey">₱ 1,999 / year</li>
                        <small><li>100+ Courses</li></small>
                        <small><li>Templates and Checklists</li></small>
                        <small><li>Softwares and Tools</li></small>
                        <small><li>E-Books</li></small>
                        <small><li>Cheat Sheet</li></small>
                        <small><li>Certificates</li></small>
                        <small><li>Chat Support</li></small>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header recommended">Monthly</li>
                        <li class="grey">₱ 799 / month</li>
                        <small><li>100+ Courses</li></small>
                        <small><li>Templates and Checklists</li></small>
                        <small><li>Softwares and Tools</li></small>
                        <small><li>E-Books</li></small>
                        <small><li>Cheat Sheet</li></small>
                        <small><li>Certificates</li></small>
                        <small><li><del>Chat Support</del></li></small>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="price">
                        <li class="header">Lifetime</li>
                        <li class="grey">₱ 3,999 / ∞</li>
                        <small><li>100+ Courses</li></small>
                        <small><li>Templates and Checklists</li></small>
                        <small><li>Softwares and Tools</li></small>
                        <small><li>E-Books</li></small>
                        <small><li>Cheat Sheet</li></small>
                        <small><li>Certificates</li></small>
                        <small><li>Chat Support</li></small>
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
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/facebook-ads-university.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/gads.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/instagram-domination.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-mastery.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-secrets.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/social-media-strategy.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/write-like-freddy.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/write-ads-that-sell.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/the-click-minded-salesfunnel.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/script-writing.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/amazon.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/yt-mc.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/htgka.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/fun-des.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/fba.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/fare.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/gads-ecom.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/ck.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/tseo.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/smed-marketing.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/ssss.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/copywriting.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/ideal-cust.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/iww.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/1k.png')}}" alt="">
                  </a>
                </div>
                <div class="course-item">
                  <a href="/guest/courses">
                    <img class='img-fluid' src="{{asset('homepage/assets/img/ytca.png')}}" alt="">
                  </a>
                </div>
              </div>
        </div>
    </div>
</div>
<script src="{{asset('homepage/assets/js/courses-carousel.js')}}"></script>
@endsection
