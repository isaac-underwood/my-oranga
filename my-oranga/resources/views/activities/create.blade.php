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
                <div class="form-group col-md-12">
                    <label for="start-date">Date</label>
                    <input type="date" name="start_date" class="form-control {{$errors->has('start_date') ? 'is-invalid' : '' }}" id="start-date" aria-describedby="dateHelp">
                    @if($errors->has('start_date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('start_date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" class="form-control {{$errors->has('activity') ? 'is-invalid' : '' }}" name="activity" id="activity" placeholder="e.g. Run, Walk, Skate, Surf, etc.">
                @if($errors->has('activity'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('activity')}}
                        </span>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="time">Time (in minutes)</label>
                    <input type="number" name="time" class="form-control {{$errors->has('time') ? 'is-invalid' : '' }}" id="time" aria-describedby="numberHelp" step="0.01" placeholder="0">
                    @if($errors->has('time'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('time')}}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="distance">Distance (in kilometres)</label>
                    <input type="number" name="distance" class="form-control {{$errors->has('distance') ? 'is-invalid' : '' }}" id="distance" aria-describedby="numberHelp" step="0.01" placeholder="0">
                    @if($errors->has('distance'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('distance')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left">x Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Activity +</button>
        </form>
    </div>
@endsection