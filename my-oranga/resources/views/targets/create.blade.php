@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Set a Target</h1>
        <div class="task-icons text-center">
            <i class="fas fa-bullseye p-2"></i>
            <i class="far fa-calendar-check fa-3x p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('targets.store')}}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Start Date (Today)</label>
                    <input type="date" name="start_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" id="start_date" aria-describedby="dateHelp" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" aria-describedby="dateHelp">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="target_type">Target Type</label>
                    <select name="target_type" id="target_type" class="form-control {{$errors->has('target_type') ? 'is-invalid' : '' }}">
                        @foreach($target_types as $t_type)
                        <option value="{{$t_type}}">{{$t_type}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('target_type'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('target_type')}}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="goal">Goal</label>
                    <input type="number" name="goal" class="form-control {{$errors->has('goal') ? 'is-invalid' : '' }}" id="goal" aria-describedby="numberHelp" placeholder="0" step="0.01">
                    @if($errors->has('goal'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('goal')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ route('home') }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Set Target <i class="fa fa-plus fa-1x p-2"></i></button>
        </form>
    </div>
@endsection