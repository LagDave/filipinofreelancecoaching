@extends('layouts.app')
@section('content')
  

<div class="container">
    <div class="row">
      <div class="col-lg-8 pr-1">
        <div class="card card-body">
          
          <h3 class='mb-4' style='font-weight:bolder'>{{$curr_lesson->name}}</h3>
          <div class="responsive-video">
            {!! $curr_lesson->vimeo_link !!}
          </div>
          <br>

          <div class="btn-group">
          <a href="/courses/watch/{{$course->id}}/{{$topic_index}}/{{$prevLesson}}" class="{{$topic_index == 0 && $lesson_index == 0 ? 'disabled': ''}} btn btn-primary next-button"><i class="fas fa-arrow-left"></i> PREVIOUS</a>
            @if($is_last_lesson == false)
              <a href="/courses/watch/{{$course->id}}/{{$topic_index}}/{{$nextLesson}}" class="btn btn-primary next-button">NEXT <i class="fas fa-arrow-right"></i></a>
            @endif
            @if($is_last_lesson == true)
              <a href="/courses/{{$course->id}}/completed" class="btn btn-success  next-button">COMPLETE COURSE <i class="fas fa-check"></i></a>
            @endif
          </div>

          <br>
          <br><br>
          <h1 style='font-weight:bolder'>{{$course->title}}</h1>
          <hr>
          {!!$course->description!!}
          
        </div>
      </div>
      <div class="col-lg-4 pl-1">
        <div class="card px-2 card-body">

          @foreach($course->topics as $topic)
            <div class="topic-container">
              <p><b>{{$topic->name}}</b></p>
            </div>
            <div class="lessons-container pt-2">

              @foreach($topic->lessons as $lesson)
              <div class="lesson mb-2 {{$lesson->id == $curr_lesson->id ? 'active' : ''}}">

                  <div class="row" style='width:100%'>
                    <div class="col-3 mx-0 px-0">
                      <small
                      class="lesson-duration shadow-sm"
                      >{{$lesson->duration}}</small>
                    </div>
                    <div class="col-9">
                      {{$lesson->name}}
                    </div>
                  </div>

                </div>
              @endforeach

            </div>
          @endforeach

        </div>
      </>
    </div>

  </div>

  <style>
    .next-button{
      color:white !important;
    }
    .responsive-video {
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
    }
    .responsive-video iframe {
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
    .lesson-duration {
    margin-right: 10px;
    padding: 3px 8px;
    color: white;
    min-width: 50px !important;
    background: #e60c3e;
    }
    .lessons-container {
        padding-left: 30px;
        border-left: 1px solid #e60c3e;
    }
    .lesson {
        background: #f5f5f5;
        color: #777;
        padding: 10px;
    }
    .topic-container {
        background: #ececec;
        padding: 10px 8px;
        border-left: 5px solid #e60c3e;
    }
    .topic-container p {
        margin-bottom: 0;
    }
    .active{
      background:#e60c3f56;
      color:black
    }
  </style>
@endsection