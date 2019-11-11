@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Edit {{$activity->type}} Activity</h1>
        <div class="task-icons text-center">
            <i class="fas fa-running p-2"></i>
            <i class="fas fa-biking p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('activities.update', $activity->id)}}" method="post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="start-date">Start Date</label>
                    <input type="date" value="{{$activity->date}}" name="start_date" class="form-control {{$errors->has('start_date') ? 'is-invalid' : '' }}" id="start-date" aria-describedby="dateHelp">
                    @if($errors->has('start_date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('start_date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" value="{{$activity->type}}" class="form-control {{$errors->has('activity') ? 'is-invalid' : '' }}" id="activity" placeholder="e.g. Run, Walk, Skate, Surf, etc.">
                @if($errors->has('activity'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('activity')}}
                        </span>
                @endif            
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="time">Time (in minutes)</label>
                    <input type="number" value="{{$activity->minutes}}" name="time" class="form-control {{$errors->has('activity') ? 'is-invalid' : '' }}" id="time" aria-describedby="numberHelp" step="0.01" placeholder="0">
                    @if($errors->has('time'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('time')}}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="distance">Distance (in kilometres)</label>
                    <input type="number" value="{{$activity->distance}}" name="distance" class="form-control {{$errors->has('distance') ? 'is-invalid' : '' }}" id="distance" aria-describedby="numberHelp" step="0.01" placeholder="0">
                    @if($errors->has('distance'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('distance')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left">x Cancel</a>
            <button type="submit" class="btn btn-success float-right">Update Activity <i class="fas fa-check fa-2x"></i></button>
        </form>
    </div>
@endsection