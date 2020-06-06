@extends('layouts.app')
@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-body">

            <h4><i class="fas fa-bullhorn"></i> Create Announcement</h4>
            <hr>
            <form method="POST" action="/admin/manage/announcements/store" class="form">
              @csrf
              <div class="form-group">
                <label>Content:</label>
                <textarea name="content" rows="10" class="form-control"></textarea>
              </div>
              <button class="btn btn-primary">Save</button>
            </form>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-body">

            @foreach($announcements as $entry)
              <div class="alert alert-secondary">
                <div class="row">
                  <div class="col-2">
                    <small>{{$entry->created_at}}</small>
                    <form action="/admin/manage/announcements/delete/{{$entry->id}}" method="POST" class="form">
                      @csrf
                      <button type='submit' class="btn btn-sm mt-2 w-100 btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    
                  </div>
                  <div class="col-10" style='border-left: 1px solid white'>
                    <p class='my-0'>{{$entry->content}}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div> 
      </div>
    </div>

@endsection