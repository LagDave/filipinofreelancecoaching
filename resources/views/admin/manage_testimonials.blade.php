@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-body">
          <h5><b>Add Testimonial</b></h5>
          <hr>
          <form action="/admin/manage/testimonials/store" method='POST' class="form">
            @csrf
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name='name' required class="form-control">
            </div>
            <div class="form-group">
              <label>Image:                                         <a
                data-toggle="tooltip"
                data-placement="right"
                title='Click this link and upload your image. Then, paste the "direct link" below.'
                href="https://postimg.cc/"
                target="_blank"
                ><small class="text-muted"
                    >Need Help?</small
                ></a
            ></label>
              <input type="text" name='image' required class="form-control">
            </div>
            <div class="form-group">
              <label>Role:</label>
              <input type="text" name='role' required class="form-control">
            </div>
            <div class="form-group">
              <label>Testimonial:</label>
              <textarea class='form-control' name="testimonial" required rows="5"></textarea>
            </div>
            <button class="btn btn-primary w-100">Save Testimonial</button>
          </form>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card card-body">
          <h5><b>Existing Testimonials</b></h5>
          <hr>
          <div class="testimonials">
            @foreach($testimonials as $item)
            <div class="alert alert-success testimonial-tile">
              <div class="row">
                <div class="col-3" style='border-right:1px solid white'>
                  <img style='border:1px solid white' src="{{$item->image}}" alt="" class="w-100 img-fluid">
                  <a href='/admin/manage/testimonials/delete/{{$item->id}}' class="btn btn-danger btn-sm w-100"><i class="fas fa-trash"></i></a>
                </div>
                <div class="col-9">
                  <p class='text-white mb-0'><b>{{$item->name}}</b></p>
                  <small class="text-white">{{$item->role}}</small>
                  <p class="text-white">{{$item->testimonial}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection