@extends('layouts.app')

@section('content')
  
  {{-- CUSTOM CSS --}}
  <link rel="stylesheet" href="{{asset('css/enroll-page-pricing.css')}}">
  <link rel="stylesheet" href="{{asset('css/enroll-basic-info.css')}}">

  <div class="sticky-top shadow-sm enroll-steps-header">
    <div class="container">
      <h2 class="text-center">STEP 2. UPLOAD PAYMENT PROOF</h2>
      <h5 class="text-white text-center">Use the information below to process your payment and upload the screenshot/image.</h5>
    </div>
  </div>
  <div class="container">
    <div class="card card-body">
      <div class="row justify-content-center">
        <div class="col-lg-0 billing-details-container">

          {{-- <h3 class='mb-5'>Billing Details</h3>
          <h5>1. Gcash</h5>
          <p>Andrea M - <b>09994575088</b></p>

          <h5>2. Coins</h5>
          <p>Andrea M - <b>09994575088</b></p>

          <h5>3. Paymaya</h5>
          <p>Andrea M - <b>09994575088</b></p>

          <h5>4. Paypal</h5>
          <p>Andrea M - <b>alasnanamandrea@gmail.com</b></p> --}}


        </div>
        <div class="col-lg-8">        

          @yield('form')

        </div>

      </div>
    </div>

    </div>
  </div>

  <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
  <script>
    var upload = new FileUploadWithPreview('proofUpload')
  </script>
@endsection