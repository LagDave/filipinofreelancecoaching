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
  <a href="/home/portfolio/projects" class="btn disabled btn-secondary">Projects</a>
  <a href="/home/portfolio/certificates" class="btn btn-secondary">Certificates</a>
</div>
<br>

<form action="/home/portfolio/projects/store" method='POST' class="form">

  <div class="row">
    <div class="col-4">
      <div class="form-group">
        <label>Project Title:</label>
        <input placeholder='My Cool Project' type="text" name='title' class="form-control">
      </div>
    </div>

    <div class="col-4">
      <div class="form-group">
        <label>Project External Link:</label>
        <input type="text" placeholder='https://project.link' name='link' class="form-control">
      </div>
    </div>

    <div class="col-4">
      <div class="form-group">
        <label>Project Image:
          <a
          data-toggle="tooltip"
          data-placement="top"
          title='Click this link and upload your image. Then, paste the "direct link" below.'
          href="https://postimg.cc/"
          target="_blank"
          ><small class="text-muted"
              >Need Help?</small
          ></a
      ></label>
        <input placeholder='https://i.postimg.cc/image-direct-link' type="text" name='thumbnail' class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Project Description:</label>
    <textarea name="description" rows="5" class="form-control"></textarea>
  </div>

  <button class="btn btn-primary">Add Project</button>



</form>

<hr>
<div class="row">
@foreach($projects as $project)


  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
    <div class="card shadow-sm card-body">
      <div class="row">
        
        <div class="col-9 pr-1">
          <img class='img-fluid' src="{{$project->thumbnail}}" alt="">
        </div>
        <div class="col-3 pl-1">
          <form method='POST' action="/home/portfolio/projects/delete/{{$project->id}}" class="form">
            @csrf
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </form>
        </div>

      </div>
      <p class='mt-2 mb-1'><b>{{$project->title}}</b></p>
      <small>{{$project->description}}</small>
      <p  class='mb-0 mt-2 text-danger'><small>{{$project->link}}</small></p>
    </div>
  </div>
@endforeach

</div>



@endsection
