@extends('layouts.app')

@section('content')
<div class="dashboard-strip text-center">
    <div class="container">
        <h1 class="h1-large">My Results</h1>
        <i class="fas fa-poll icon-large pt-4"></i>
    </div>
</div>
<div class="dashboard-strip dashboard-record-strip bests-strip text-center">
    <div class="container">
        <h1>My Bests</h1>
        <h5 class="pt-3">Best Results of All Time</h5>
        <div class="row dashboard-row-spacing">
            <div class="col-md-6 p-2">
                <i class="fas fa-running icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->activities()->max('minutes')}} min</h1>
                <h2>Exercise</h2>
            </div>
            <div class="col-md-6 p-2">
                <i class="fas fa-biking icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->activities()->max('distance')}} km</h1>
                <h2>Exercise</h2>
            </div>
        </div>
        <hr>
        <div class="row dashboard-row-spacing">
            <div class="col-md-6 p-2">
                <i class="fas fa-bed icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->sleeps()->max('hours')}} hrs</h1>
                <h2>Sleep</h2>
            </div>
            <div class="col-md-6 p-2">
                <i class="fas fa-balance-scale icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->weights()->min('kg')}} kg</h1>
                <h2>Weight</h2>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-strip dashboard-goal-strip text-center">
    <div class="container">
        <h1 class="pb-3 h1-large">Lifetime Statistics</h1>
        <i class="fas fa-heartbeat icon-large"></i>
        <div class="row dashboard-row-spacing">
            <div class="col-md-4 p-2">
                <i class="fas fa-running icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->activities()->sum('minutes')}} min</h1>
                <h2>Total Exercise</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-biking icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->activities()->sum('distance')}} km</h1>
                <h2>Total Exercise</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-running icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->activities()->count()}}</h1>
                <h2>Total Activities Recorded</h2>
            </div>
        </div>
        <hr>
        <div class="row dashboard-row-spacing">
            <div class="col-md-4 p-2">
                <i class="fas fa-wine-bottle icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->alcohols()->sum('standard_drink')}}</h1>
                <h2>Total Drinks</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-balance-scale icon-large"></i>
                <br>
                <h1 class="pt-2">{{number_format(Auth::user()->weights()->avg('kg'), 2)}} kg</h1>
                <h2>Average Weight</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-cookie-bite icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->snacks()->sum('calories')}} cal</h1>
                <h2>Total Snacks</h2>
            </div>
        </div>
        <hr>
        <div class="row dashboard-row-spacing">
            <div class="col-md-4 p-2">
                <i class="fas fa-bed icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->sleeps()->sum('hours')}} hrs</h1>
                <h2>Total Sleep</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-bullseye icon-large"></i>
                <br>
                <h1 class="pt-2">{{Auth::user()->targets()->count()}}</h1>
                <h2>Total Targets Made</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-smile-beam icon-large"></i>
                <br>
                <h1 class="pt-2">{{number_format(Auth::user()->moods()->avg('indicator'), 1)}}</h1>
                <h2>Average Mood</h2>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
            <div class="col-md-6">
                <h2>Activity Type</h2>
                <div class="chart" id="activity-type-chart"></div>
            </div>
            <div class="col-md-6">
                <h2>Snacks</h2>
                <div class="chart" id="snacks-chart"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var typeAnalytics = <?php echo $activity_type; ?>;
      var snackAnalytics = <?php echo $snack_total; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawTypeChart);
      google.charts.setOnLoadCallback(drawSnacksChart);

      function drawTypeChart() {

        var data = google.visualization.arrayToDataTable(typeAnalytics);

        var options = {
          backgroundColor: 'transparent',
          colors: ['#bc5090', '#58508d', '#003f5c', '#ff6361', '#ffa600'],
          legend: 'none',
          pieSliceText: 'label'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activity-type-chart'));

        chart.draw(data, options);
      }
      function drawSnacksChart() {

        var data = google.visualization.arrayToDataTable(analytics);

        var options = {
        backgroundColor: 'transparent',
        colors: ['#bc5090', '#58508d', '#003f5c', '#ff6361', '#ffa600'],
        legend: 'none',
        pieSliceText: 'label'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activity-type-chart'));

        chart.draw(data, options);
      }
    </script>
@endsection
