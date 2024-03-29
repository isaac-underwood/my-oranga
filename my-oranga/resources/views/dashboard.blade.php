@extends('layouts.app')

@section('content')
<div class="dashboard-strip dashboard-goal-strip text-center">
    <div class="container">
        <h2>Hello, {{Auth::user()->name}}.</h2>
        <h1 class="h1-large">Target Summary</h1>
    {{$recent_targets}}
        <div class="row mt-5">
            @foreach($recent_targets as $target)
            <div class="ldBar label-center mx-auto" style="width:15%;height:15%;" data-value="{{Carbon::parse($target->end_date)->diff(Carbon::now())}}" data-max="{{Carbon::parse($target->start_date)->diff(Carbon::parse($target->end_date))}}" data-preset="circle" 
            data-transition-in="on-load" data-stroke-width="8"></div>
            @endforeach
        </div>
        <div class="row">
            <h2 class="mx-auto">Fitness Goal</h2>
            <h2 class="mx-auto">Snack Goal</h2>
            <h2 class="mx-auto">Alcohol Goal</h2>
        </div>
        <div class="row pt-5">
            <div class="col-md-6 mx-auto">
                <a href="{{route('entries.targets')}}" class="btn btn-outline-primary">Manage Targets <i class="fa fa-list fa-1x pl-2"></i></a>
            </div>
            <div class="col-md-6 mx-auto">
                <a href="{{route('targets.create')}}" class="btn btn-outline-success">Create Target <i class="fa fa-plus fa-1x pl-2"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-strip dashboard-record-strip text-center">
    <div class="container">
        <h1 class="h1-large">Record</h1>
        <h4>Update your wellness information</h4>
        <div class="row pt-2 text-center">
            <div class="col-md-2">
                <a href="{{route('activities.create')}}" class="btn btn-outline-light btn-lg m-4">ACTIVITY</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('alcohol.create')}}" class="btn btn-outline-light btn-lg m-4">ALCOHOL</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('moods.create')}}" class="btn btn-outline-light btn-lg m-4">MOOD</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('sleep.create')}}" class="btn btn-outline-light btn-lg m-4">SLEEP</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('snacks.create')}}" class="btn btn-outline-light btn-lg m-4">SNACK</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('weights.create')}}" class="btn btn-outline-light btn-lg m-4">WEIGHT</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <a href="{{route('targets.create')}}" class="btn btn-outline-light btn-lg m-4">TARGET</a>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-strip text-center">
    <div class="container">
        <h1 class="pb-3 h1-large">This Week</h1>
        <a href="{{route('results')}}" class="btn btn-outline-primary">View Lifetime <i class="fa fa-heartbeat fa-1x pl-2"></i></a>
        <div class="row dashboard-row-spacing">
            <div class="col-md-4 p-2">
                <i class="fas fa-wine-glass-alt icon-large"></i>
                <br>
                <h1 class="pt-2">{{$total_alcohol_drinks}}</h1>
                <h2>Standard Drinks</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-biking icon-large"></i>
                <br>
                <h1 class="pt-2">{{$total_exercise_minutes}}</h1>
                <h2>Minutes Exercise</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-biking icon-large"></i>
                <br>
                <h1 class="pt-2">{{$total_exercise_distance}} km</h1>
                <h2>Exercise</h2>
            </div>
        </div>
        <div class="row dashboard-row-spacing">
            <div class="col-md-4 p-2">
                <i class="far fa-smile-beam icon-large"></i>
                <br>
                <h1 class="pt-2">{{number_format($average_mood, 1)}} / 10</h1>
                <h2>Average Mood</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-cookie-bite icon-large"></i>
                <br>
                <h1 class="pt-2">{{$total_calories}} cal</h1>
                <h2>Snack Food</h2>
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-balance-scale icon-large"></i>
                <br>
                <h1 class="pt-2">@if($latest_weight)
                {{$latest_weight->kg}}
                @else 0
                @endif kg</h1>
                <h2>Weight</h2>
            </div>
        </div>
    </div>
</div>
@endsection
