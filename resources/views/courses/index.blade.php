@extends('layouts.user_dashboard')
@section('current_section')

@section('section_title')
<i class="fas fa-graduation-cap"></i> Browse Courses
@endsection

<div class="courses-container row">
  @foreach($courses as $course)
    <div class="mb-5 col-lg-3 course">

      <div class="card course-card card-body shadow-sm py-0 px-0">
        <img src="{{$course->cover_img}}" alt="" class="img-fluid">

        <div class="content py-3 px-3">
          <p class='mt-0 mb-0 course-title'><b>{{$course->title}}</b></p>
          <p class="text-center mb-1">
            <small class="text-muted">{{sizeof($course->topics)}} Topic{{sizeof($course->topics)>1 ? 's': ''}}</small>
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

{{$courses->links()}}
@endsection