@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Record an Activity</h1>
        <div class="task-icons text-center">
            <i class="fas fa-running p-2"></i>
            <i class="fas fa-biking p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('activities.store')}}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start-date">Start Date</label>
                    <input type="date" name="start-date" class="form-control" id="start-date" aria-describedby="dateHelp">
                </div>
                <div class="form-group col-md-6">
                    <span>
                        <label for="end-date" class="pr-4">End Date</label>
                        <input type="checkbox" id="same-as-start">
                        <label for="same-as-start">Same as Start Date</label>
                    </span>
                    <input type="date" name="end-date" class="form-control" id="end-date" aria-describedby="dateHelp">
                </div>
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" class="form-control" id="activity" placeholder="e.g. Run, Walk, Skate, Surf, etc.">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="time">Time (in minutes)</label>
                    <input type="number" name="time" class="form-control" id="time" aria-describedby="numberHelp" step="0.01">
                </div>
                <div class="form-group col-md-6">
                    <label for="distance">Distance (in kilometres)</label>
                    <input type="number" name="distance" class="form-control" id="distance" aria-describedby="numberHelp" step="0.01">
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left">x Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Activity +</button>
        </form>
    </div>
@endsection