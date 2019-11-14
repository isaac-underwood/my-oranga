@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4 text-center">
        <h1>Compare Progress</h1>
        <i class="fas fa-chart-bar p-2"></i>
        <h5 class="pt-2">For This Month</h5>
        <h4>November</h4>
    </div>
    <div class="row text-center w-100 pt-4">
        <div class="col-md-4">
            <h2>You</h2>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <h2>Others</h2>
            <h6>(Average)</h6>
        </div>
    </div>
    <hr>
    {{-- Time Exercised --}}
    @if ($user_minutes >= $others_minutes)
        <div class="row text-center py-4 background-good">
    @else
        <div class="row text-center py-4 background-bad">
    @endif
        <div class="col-md-4">
            <h3>{{number_format($user_minutes)}}</h3>
        </div>
        <div class="col-md-4">
            <h3>Exercise</h3>
            <h5>(Minutes)</h5>
        </div>
        <div class="col-md-4 pr-5">
            <h3>{{number_format($others_minutes)}}</h3>
        </div>
    </div>
    {{-- Distance Exercised --}}
        @if ($user_distance >= $others_distance)
            <div class="row text-center py-4 background-good">
        @else
            <div class="row text-center py-4 background-bad">
        @endif        
        <div class="col-md-4">
            <h3>{{number_format($user_distance, 1, '.', ',')}}</h3>
        </div>
        <div class="col-md-4">
            <h3>Exercise Distance</h3>
            <h5>(Kilometres)</h5>
        </div>
        <div class="col-md-4 pr-5">
            <h3>{{number_format($others_distance, 1, '.', ',')}}</h3>
        </div>
    </div>
    {{-- Sleep --}}
    @if ($user_sleep >= $others_sleep)
            <div class="row text-center py-4 background-good">
        @else
            <div class="row text-center py-4 background-bad">
        @endif        
        <div class="col-md-4">
            <h3>{{number_format($user_sleep, 1, '.', ',')}}</h3>
        </div>
        <div class="col-md-4">
            <h3>Sleep</h3>
            <h5>(Average Hours)</h5>
        </div>
        <div class="col-md-4 pr-5">
            <h3>{{number_format($others_sleep, 1, '.', ',')}}</h3>
        </div>
    </div>
    {{-- Snacks / Calories --}}
        @if ($user_calories >= $others_calories)
            <div class="row text-center py-4 background-good">
        @else
            <div class="row text-center py-4 background-bad">
        @endif        
        <div class="col-md-4">
            <h3>{{number_format($user_calories)}}</h3>
        </div>
        <div class="col-md-4">
            <h3>Snacks</h3>
            <h5>(Calories)</h5>
        </div>
        <div class="col-md-4 pr-5">
            <h3>{{number_format($others_calories)}}</h3>
        </div>
    </div>
    <p class="text-fade text-center pt-4">Note: Your alcohol consumption, weight and mood data are never used for comparison.</p>
</div>
@endsection
