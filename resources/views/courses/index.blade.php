@extends('layouts.user_dashboard')
@section('current_section')

@section('section_title')
    <i class="fas fa-graduation-cap"></i> Browse Courses
    <hr>
@endsection

  <form action="/courses/search" class="form">
    <div class="row">
      <div class="col-11">
        <div class="form-group">
          <input placeholder='Search for a course...' type="text" name='search_query' class="form-control">
        </div>
      
      </div>
      <div class="col-1">
        <button class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>

  <br>

  @if(sizeof($courses) < 1)
    <p class='text-center'><i class="fas fa-frown"></i> Nothing to see here. <a href="/courses">See all Courses.</a></p>
  @endif

<div class="courses-container row">
  @foreach($courses as $course)
    <div class="mb-5 col-lg-3 course">

      <div class="card course-card card-body shadow-sm py-0 px-0">
        <img src="{{$course->cover_img}}" alt="" class="img-fluid">

        <div class="content py-3 px-3">
          <p class='mt-0 mb-0 course-title'><b>{{$course->title}}</b></p>
          <p class="text-center mb-1">
          <small class="text-muted"><i class="fas fa-lightbulb"></i> {{sizeof($course->topics)}} Topic{{sizeof($course->topics)>1 ? 's': ''}} | <i class="fas fa-user"></i> {{sizeof($course->course_users)}} Student{{sizeof($course->course_users)>1 ? 's': ''}}</small>
          </p>
          @if(sizeof($course->topics) > 0)
            <a href="/courses/watch/{{$course->id}}/0/0" class="btn-primary btn w-100 btn-sm">Start Course</a>
          @else
            <button class="btn btn-outline-secondary w-100 btn-sm">Coming Soon</button>
          @endif
        </div>
      </div>
      </div>

  @endforeach
</div>

@if(!isset($search))
{{$courses->links()}}
@endif
@endsection