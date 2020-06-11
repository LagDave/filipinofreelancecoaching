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


<form method='POST' action="/home/portfolio/certificates/store" class="form">
  @csrf
  <div class="row">
    <div class="col-lg-5">
      <div class="form-group">
        <label>Title:</label>
        <input required type="text" name='title' class="form-control">
      </div>
    </div>
    <div class="col-lg-5">
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
        <input required type="text" name='image' class="form-control">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>Featured:</label>
        <select name="is_featured" class='form-control'>
          <option value="false">No</option>
          <option value="true">Yes</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Description: <small class="text-danger">Required for Featured Ceritficates</small></label>
    <textarea name="description" rows="5" class="form-control"></textarea>
  </div>

  <button class="btn btn-primary">Save Certificate</button>

</form>

<hr>

<div class="row featured-certificates">
  @foreach($featured_certificates as $certificate)
  <div class="col-lg-4">
    <div class="btn-group">
      <form action="/home/portfolio/certificates/delete/{{$certificate->id}}" method='POST' class="form">
        @csrf
        <button class="btn mb-2  btn-sm btn-danger"><i class="fas fa-trash"></i></button>

      </form>
      <a href='/home/portfolio/certificates/setToNonFeatured/{{$certificate->id}}' class="btn mb-2  btn-sm btn-primary"><span class="text-white">Unfeature</span></a>
      <a href='/home/portfolio/certificates/edit/{{$certificate->id}}' class="btn mb-2  btn-sm btn-primary"><i class="fas fa-pen-alt"></i></a>
    </div>
    
    <div class="card shadow-sm">
      <img class="img-fluid" src="{{$certificate->image}}" alt="" />
      <div class="card-body">
        <h5 class="card-title">{{$certificate->title}}</h5>
        <p class="card-text">
          {{$certificate->description}}
        </p>
      </div>
    </div>
  </div>
  @endforeach

</div>

<div class="row mt-5">
  @foreach($non_featured_certificates as $certificate)
  <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
    <div class="btn-group">
      <form action="/home/portfolio/certificates/delete/{{$certificate->id}}" method='POST' class="form">
        @csrf
        <button class="btn mb-2  btn-sm btn-danger"><i class="fas fa-trash"></i></button>

      </form>
      <a href='/home/portfolio/certificates/setToFeatured/{{$certificate->id}}' class="btn mb-2  btn-sm btn-primary">Feature</a>
      <a href='/home/portfolio/certificates/edit/{{$certificate->id}}' class="btn mb-2  btn-sm btn-primary"><i class="fas fa-pen-alt"></i></a>

    </div>
    <img
      src="{{$certificate->image}}"
      alt=""
      class="img-fluid mb-2"
    />
    <small>{{$certificate->title}}</small>
  </div>
  @endforeach
</div>



@endsection
