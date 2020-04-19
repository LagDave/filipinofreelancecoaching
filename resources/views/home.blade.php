@extends('layouts.app')

@section('content')
<div class="container user-dashboard">
    @if(Auth::user()->plan == null)
        <div class="alert alert-info" role="alert">
            You are currently not enrolled to any plan. <a href="#" class="alert-link">Enroll Now</a>
        </div>
    @endif
    <div class="card card-body">
        <div class="dashboard-header">
            <h4>Welcome back, {{Auth::user()->first_name}}!</h4>
            <p>Learn something new.</p>
            <hr>
        </div>
        <div class="dashboard-container">
            <div class="row">
                <div class="col-lg-12 courses">
                    <p><b>Courses</b></p>
                    <small class="text-muted">You have no Courses</small>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 e-books">
                    <p><b>E-Books</b></p>
                    <small class="text-muted">You have no Books</small>
                </div>
                <div class="col-lg-6 tools">
                    <p><b>Tools</b></p>
                    <small class="text-muted">You have no Tools</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
