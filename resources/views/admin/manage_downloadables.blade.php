@extends('layouts.app')

@section('content')
  <div id="manage_downloadables">
    <router-view></router-view>
  </div>
  
  <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
