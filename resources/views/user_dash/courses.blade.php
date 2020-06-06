@extends('layouts.user_dashboard')
@section('current_section')
  @section('section_title')
  <i class="fas fa-graduation-cap"></i> Your Courses
  <hr>
  @endsection
  <div class="courses-container row">
    @foreach($courses as $course)


    <div class="mb-5 col-lg-3 course">
      <div class="card course-card card-body shadow-sm py-0 px-0">

          <div class="progress" style='height: 20px; border-radius:5px 5px 0 0'>
            <div class="progress-bar {{$course->course_users[0]->completed == 'true' ? 'bg-success' : '' }} progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$course->course_users[0]->completed == 'true' ? '100' : $course->course_users[0]->topic_index / sizeof($course->topics) * 100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            {{$course->course_users[0]->topic_index + 1}} / {{sizeof($course->topics)}} Topic{{sizeof($course->topics) > 1 ? 's' : ''}}
            </div>
          </div>
          <img src="{{asset($course->cover_img)}}" alt="" class="img-fluid">
          <div class="content py-3 px-3">
            <p class='mt-1 course-title'><b>{{$course->title}}</b></p>
            <a href="/courses/watch/{{$course->id}}/{{$course->course_users[0]->topic_index}}/{{$course->course_users[0]->lesson_index}}" class="{{$course->course_users[0]->completed == 'true' ? 'btn-success' : 'btn-primary' }} btn w-100 btn-sm">{{$course->course_users[0]->completed == 'true' ? 'Review Course' : 'Resume Course' }}</a>
          </div>
      </div>
    </div>
    @endforeach

    
  </div>
  {{$courses->links()}}
@endsection
