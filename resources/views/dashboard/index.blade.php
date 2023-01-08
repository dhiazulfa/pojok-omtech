@extends('dashboard.layouts.main')
@section('container')
<br>
@if(session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{auth()->user()->name}}</h1>
    
</div>

  {{-- <h5>Post Chart per Month</h5> --}}
  <br>
  <canvas id="myChart" height="100px"></canvas>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script type="text/javascript">
    
        var labels =  {{ Js::from($labels) }};
        var posts =  {{ Js::from($data) }};
    
        const data = {
          labels: labels,
          datasets: [{
            label: 'Post per Month',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: posts,
          }]
        };
    
        const config = {
          type: 'line',
          data: data,
          options: {}
        };
    
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    
  </script>

@endsection