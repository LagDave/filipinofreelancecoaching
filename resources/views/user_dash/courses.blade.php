@extends('layouts.user_dashboard')
@section('current_section')
  <h3 class='section-header mb-2'><i class="fas fa-graduation-cap"></i> Your Courses</h3>
  <hr>
  <div class="courses-container row">
    @foreach($courses as $course)
    <div class="mb-5 col-lg-4 course">
          <img src="{{asset($course->cover_img)}}" alt="" class="img-fluid">
          <div class="mt-2 progress">
            <div class="progress-bar {{$course->course_users[0]->completed == 'true' ? 'bg-success' : '' }} progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$course->course_users[0]->completed == 'true' ? '100' : $course->course_users[0]->topic_index / sizeof($course->topics) * 100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class='mt-2 course-title'><b>{{$course->title}}</b></p>
          <a href="/courses/watch/{{$course->id}}/{{$course->course_users[0]->topic_index}}/{{$course->course_users[0]->lesson_index}}" class="btn-outline-primary btn w-100 btn-sm">Resume Course</a>
      </div>
    @endforeach
  </div>
@endsection