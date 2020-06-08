@extends('layouts.user_dashboard')


@section('current_section')
<br>
<div class="row">
  <div class="col-9">
    <h3 class='section-header mb-2'><i class="fas fa-pager"></i> Manage Portfolio Page</h3>
  </div>
  <div class="col-3">
    <p class='text-right'>
      <a target="_blank" href="/portfolio/user/{{Auth::user()->username}}" class="btn btn-primary"><i class="fas fa-eye"></i> Preview Page</a>
    </p>
  </div>
</div>
<hr>

<form method='post' action="/home/portfolio/setup" class="form">
  @csrf
  <div class="form-group">
    <label>Select Global Theme:</label>
    <select name="theme" class='form-control w-auto'>
      <option {{$portfolio_entry->theme == 'litera' ? 'selected' : ''}} value="litera">Litera</option>
      <option {{$portfolio_entry->theme == 'journal' ? 'selected' : ''}} value="journal">Journal</option>
      <option {{$portfolio_entry->theme == 'lux' ? 'selected' : ''}} value="lux">Lux</option>
      <option {{$portfolio_entry->theme == 'material' ? 'selected' : ''}} value="material">Material</option>
      <option {{$portfolio_entry->theme == 'minty' ? 'selected' : ''}} value="minty">Minty</option>
      <option {{$portfolio_entry->theme == 'pulse' ? 'selected' : ''}} value="pulse">Pulse</option>
      <option {{$portfolio_entry->theme == 'sketchy' ? 'selected' : ''}} value="sketchy">Sketchy</option>
      <option {{$portfolio_entry->theme == 'united' ? 'selected' : ''}} value="united">United</option>
    </select>
  </div>

  <div class="form-group">
    <label>Role:</label>
    <input type="text" name='role' value="{{$portfolio_entry->role}}" class="form-control">
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Facebook Link:</label>
        <input value='{{$portfolio_entry->facebook_link}}' type="text" name='facebook_link' class="form-control">
      </div>
      <div class="form-group">
        <label>Twitter Link:</label>
        <input value='{{$portfolio_entry->twitter_link}}' type="text" name='twitter_link' class="form-control">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>LinkedIn Link:</label>
        <input value='{{$portfolio_entry->linkedin_link}}' type="text" name='linkedin_link' class="form-control">
      </div>
      <div class="form-group">
        <label>Instagram Link:</label>
        <input value='{{$portfolio_entry->instagram_link}}' type="text" name='instagram_link' class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>About Me:</label>
      <textarea name="about_content" required rows="10" class="form-control">{{$portfolio_entry->about_content}}</textarea>
  </div>
  
  <div class="row">
    <div class="col-lg-8">
      <div class="form-group">
        <label>Address:</label>
        <input name='address' required value="{{$portfolio_entry->address}}" class="form-control">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Phone Number:</label>
        <input type="text" name='phone_number' required value='{{$portfolio_entry->phone_number}}' class="form-control">
      </div>
    </div>
  </div>


  <button class="btn w-100 btn-primary">Save Settings</button>
</form>

<br><br>

<div class="row">
  <div class="col-lg-6">
    <form enctype="multipart/form-data" action="/home/portfolio/setup/resume" method='POST' class="form">
      @csrf
      <div class="form-group">
        <label>{{$portfolio_entry->resume_link == NULL ? 'Upload': 'Update'}} Resume File: <small class="text-muted">PDF or Document file only</small></label>
        <input required name='resume' accept=".pdf,.PDF,.doc,.DOC,.docx,.DOCX" type="file" class="form-control">
      </div>
      
      @if($portfolio_entry->resume_link == NULL)
      <p class="text-center">
        <img style='height:150px; width:150px' src="{{asset('portfolio-images/resume_empty.png')}}" alt="">
      </p>
      <p class="text-center">
        <small class="text-muted">You don't have a Resume</small>
      </p>
      @else
        <p class="text-center">
          <img style='height:150px; width:150px' src="{{asset('portfolio-images/resume.png')}}" alt="">
        </p>
        <p class="text-center">
          <small class="text-muted">You have a Resume</small>
        </p>
      @endif

      <button class="btn w-100 btn-primary">{{$portfolio_entry->resume_link == NULL ? 'Upload': 'Update'}} and Save Resume</button>
    </form>
  </div>
  <div class="col-lg-6">
    <form enctype="multipart/form-data" action="/home/portfolio/setup/profilePic" method='POST' class="form">
      @csrf
      <div class="form-group">
        <label>Upload Profile Picture: <small class="text-muted">Recommended size: 500 x 500</small></label>
        <input required accept='.jpg,.png,.JPG,.PNG,.jpeg,.JPEG' style='width:auto !important' type="file" name='profile_pic' class="form-control">
      </div>

      <p class="text-center">
        <img style='height:150px; width:150px' src="{{$portfolio_entry->profile_pic}}" alt="">
      </p>
      <p class="text-center">
        <small class="text-muted">Your Portfolio Profile Picture</small>
      </p>

      <button class="btn w-100 btn-primary">Upload Profile Picture</button>
    </form>
  </div>
</div>





@endsection
