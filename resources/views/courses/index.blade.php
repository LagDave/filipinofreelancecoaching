@extends('layouts.user_dashboard')
@section('current_section')
<h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Browse Courses</h3>
<hr>

<div class="courses-container row">
  @foreach($courses as $course)
    <div class="mb-5 col-lg-3 course">
        <img src="{{$course->cover_img}}" alt="" class="img-fluid">
        <p class='mt-2 mb-0 course-title'><b>{{$course->title}}</b></p>
        <p class="text-center mb-1">
          <small class="text-muted">{{sizeof($course->topics)}} Topic{{sizeof($course->topics)>1 ? 's': ''}}</small>
        </p>
        <a href="/courses/watch/{{$course->id}}/0/0" class="btn-outline-primary btn w-100 btn-sm">Start Course</a>
    </div>

  @endforeach
    {{ $courses->links() }}
</div>
@endsection