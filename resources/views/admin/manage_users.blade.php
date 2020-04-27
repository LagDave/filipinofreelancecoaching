@extends('layouts.app')

@section('content')
  <div id="manage_users">
    <router-view></router-view>
  </div>
  
  <script src="{{ asset('js/manage_users.js') }}" defer></script>
@endsection
