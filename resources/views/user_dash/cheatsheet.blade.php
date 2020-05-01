@extends('layouts.user_dashboard')
@section('current_section')

<h3 class='section-header mb-2'><i class="fas fa-scroll"></i> Cheat Sheet</h3>
<hr>
<div class="accordion" id="accordionExample">

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="text-left btn w-100" type="button" style='color:white' data-toggle="collapse" data-target="#newbie" aria-expanded="true" aria-controls="newbie">
          MUST READ: </span><strong>NEWBIE STARTER PACK</strong><span style="font-weight: 400;"> (THIS IS FOR EVERYONE)
        </button>
      </h2>
    </div>

    <div id="newbie" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.newbie')
      </div>
    </div>
  </div>
  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#social_med_mgmt" aria-expanded="false" aria-controls="social_med_mgmt">
          Social Media Management/Manager
        </button>
      </h2>
    </div>
    <div id="social_med_mgmt" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.social_med_mgmt')
      </div>
    </div>
  </div>


  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#graphic_designer" aria-expanded="false" aria-controls="graphic_designer">
          Graphics Designer or Graphics Animator
        </button>
      </h2>
    </div>
    <div id="graphic_designer" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.graphic_designer')
      </div>
    </div>
  </div>

  
  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#transcriptionist" aria-expanded="false" aria-controls="transcriptionist">
          Transcriptionist
        </button>
      </h2>
    </div>
    <div id="transcriptionist" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.transcriptionist')
      </div>
    </div>
  </div>

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#amazon_fba" aria-expanded="false" aria-controls="amazon_fba">
          AmazonFBA Expert
        </button>
      </h2>
    </div>
    <div id="amazon_fba" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.amazon_fba')
      </div>
    </div>
  </div>

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#web_designer" aria-expanded="false" aria-controls="web_designer">
          Web Designer
        </button>
      </h2>
    </div>
    <div id="web_designer" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.web_designer')
      </div>
    </div>
  </div>

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#web_developer" aria-expanded="false" aria-controls="web_developer">
          Web Developer
        </button>
      </h2>
    </div>
    <div id="web_developer" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.web_developer')
      </div>
    </div>
  </div>

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#seo" aria-expanded="false" aria-controls="seo">
          S.E.O. (Search Engine Optimization)
        </button>
      </h2>
    </div>
    <div id="seo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.seo')
      </div>
    </div>
  </div>

  <div style='border-bottom:1px solid white' class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="text-left btn w-100 collapsed" style='color:white' type="button" data-toggle="collapse" data-target="#shopify" aria-expanded="false" aria-controls="shopify">
          Shopify Expert
        </button>
      </h2>
    </div>
    <div id="shopify" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @include('user_dash.cheat_sheets.shopify')
      </div>
    </div>
  </div>



</div>


@endsection