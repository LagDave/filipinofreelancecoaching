@extends('layouts.app')

@section('content')
  <div id="manage_courses">
    <router-view></router-view>
  </div>
  
  <script src="{{ asset('js/manage_courses.js') }}" defer></script>
@endsection
