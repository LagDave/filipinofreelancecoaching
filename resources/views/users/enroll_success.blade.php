@extends('layouts.app')
@section('content')

<style>
  *{
  box-sizing:border-box;
  /* outline:1px solid ;*/
  }
  body{
  background: #ffffff;
  background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
      height: 100%;
          margin: 0;
          background-repeat: no-repeat;
          background-attachment: fixed;
    
  }

  .wrapper-1{
    width:100%;
    height:100vh;
    display: flex;
  flex-direction: column;
  }
  .wrapper-2{
    padding :30px;
    text-align:center;
  }
  h1{
      font-family: 'Kaushan Script', cursive;
    font-size:4em;
    letter-spacing:3px;
    color:#e60c3e ;
    margin:0;
    margin-bottom:20px;
  }
  .wrapper-2 p{
    margin:0;
    font-size:1.3em;
    color:#aaa;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing:1px;
  }
  .go-home{
    color:#fff;
    background:#e60c3e;
    border:none;
    padding:10px 50px;
    margin:30px 0;
    border-radius:30px;
    text-transform:capitalize;
    box-shadow: 0 10px 16px 1px #e60c3f57;
  }
  .footer-like{
    margin-top: auto; 
    background:#e60c3f11;
    padding:6px;
    text-align:center;
  }
  .footer-like p{
    margin:0;
    padding:4px;
    color:#e60c3e;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing:1px;
  }
  .footer-like p a{
    text-decoration:none;
    color:#e60c3e;
    font-weight:600;
  }

  @media (min-width:360px){
    h1{
      font-size:4.5em;
    }
    .go-home{
      margin-bottom:20px;
    }
  }

  @media (min-width:600px){
    .content{
    max-width:1000px;
    margin:0 auto;
  }
    .wrapper-1{
    height: initial;
    max-width:620px;
    margin:0 auto;
    box-shadow: 4px 8px 40px 8px #e60c3f25;
  }

  }
  @media(max-width:600px){
    .footer-like{
    margin-top: 0 !important;
  }
  .wrapper-1{
    height: auto;
  }
  }
  a:hover{
    text-decoration: none;
    color:white;
  }
</style>
<link rel="stylesheet" href="{{asset('css/enroll-page-pricing.css')}}">


<div class="sticky-top shadow-sm enroll-steps-header">
  <div class="container">
    <h2 class="text-center">SUCCESS!</h2>
    <h5 class="text-white text-center">That is all there is to it</h5>
  </div>
</div>

<div class='content my-5'>
  <div class="wrapper-1">
    <div class="wrapper-2">
      <h1>Thank you !</h1>
      <p>Your enrollment application has been sent to the admins.</p>
      <p>Please allow up to 24 hours.</p>
      <p>We will send you an email once the enrollment has been granted.</p>
      <p class='mt-4'>
      <a href='/home' class="go-home">
        go home
      </a>
    </p>
    </div>
    <div class="footer-like">
      <p>Want to make things faster?
       <a href="https://web.facebook.com/filipinofreelancecoaching/">Message us on our FB page!</a>
      </p>
    </div>
</div>
</div>



<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

@endsection