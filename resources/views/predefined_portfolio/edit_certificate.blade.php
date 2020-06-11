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

<div class="btn-group">
  <a href="/home/portfolio/setup" class="btn btn-secondary">Basic Information</a>
  <a href="/home/portfolio/projects" class="btn btn-secondary">Projects</a>
  <a href="/home/portfolio/certificates" class="btn disabled btn-secondary">Certificates</a>
</div>
<br>


<form method='POST' action="/home/portfolio/certificates/update/{{$certificate->id}}" class="form">
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Title:</label>
        <input required value='{{$certificate->title}}' type="text" name='title' class="form-control">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>Image Link: <a
          data-toggle="tooltip"
          data-placement="top"
          title='Click this link and upload your image. Then, paste the "direct link" below.'
          href="https://postimg.cc/"
          target="_blank"
          ><small class="text-muted"
              >Need Help?</small
          ></a
      ></label>
        <input required type="text" name='image' value='{{$certificate->image}}' class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Description: <small class="text-danger">Required for Featured Ceritficates</small></label>
    <textarea name="description" rows="5" class="form-control">{{$certificate->description}}</textarea>
  </div>

  <button class="btn btn-primary">Update Certificate</button>

</form>
@endsection