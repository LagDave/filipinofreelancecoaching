@extends('layouts.app')
@section('content')

  <div class="container-fluid">
    <div class="card mb-3 card-body">
      <div class="number-cards">
        <div class="card unsubscribed">
            <p class="number">{{ sizeof($unsubscribed) }}</p>
            <p class="label">Unsubscribed</p>
        </div>
        <div class="card pending">
            <p class="number">{{ sizeof($pending) }}</p>
            <p class="label">Pending</p>
        </div>
        <div class="card subscribed">
            <p class="number">{{ sizeof($subscribed) }}</p>
            <p class="label">Subscribed</p>
        </div>
        <div class="card expired">
            <p class="number">{{ sizeof($expired) }}</p>
            <p class="label">Expired</p>
        </div>
        <div class="card renewal">
            <p class="number">{{ sizeof($renewal) }}</p>
            <p class="label">Renewal</p>
        </div>
      </div>
    </div>
    <div class="card card-body">
      <div class="row">
        <div class="col-lg-6">
          <p class="text-center"><b>Subscription Type Density</b></p>
          <canvas id="sub_type_chart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script>
  
  {{-- MAIN SCRIPT --}}
  <script>
    let sub_type_ctx = document.getElementById("sub_type_chart");
    var sub_type_chart = new Chart(sub_type_ctx, {
        type: "horizontalBar",
        data: {
            labels: ["1 Month", "1 Year", "Lifetime"],
            datasets: [
                {
                    data: [{{$monthlySubscribed}}, {{$yearlySubscribed}}, {{$lifetimeSubscribed}}],
                    backgroundColor: [
                        "#e60c3f7a",
                        "#e60c3f7a",
                        "#e60c3f7a"
                    ]
                }
            ]
        },
        options: {
            legend: {
                display: false
            }
        }
    });

  </script>
  {{-- MAIN SCRIPT END --}}

  <link rel="stylesheet" href="{{asset('css/statistics.css')}}">
@endsection