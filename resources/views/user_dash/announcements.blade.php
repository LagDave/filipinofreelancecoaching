@extends('layouts.user_dashboard')
@section('current_section')

<h3 class='section-header mb-2'><i class="fas fa-bullhorn"></i> Announcements</h3>
<hr>

  @foreach($announcements as $entry)
    <div class="alert alert-secondary">
      <div class="row">
        <div class="col-2">
          <small>{{$entry->created_at}}</small>        
        </div>
        <div class="col-10" style='border-left: 1px solid white'>
          <p class='my-0'>{{$entry->content}}</p>
        </div>
      </div>
    </div>
  @endforeach
@endsection