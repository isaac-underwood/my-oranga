@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-center text-center mx-auto">
            <h1 class="pb-2">Activity Calendar</h1>
            <div>
                <div class="text-right mb-2">
                    <a href="{{route('activities.create')}}" class="btn btn-success">Add Activity <i class="fa fa-plus fa-1x p-2"></i></a>
                </div>
            </div>
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@stop

@section('scripts')
    {!! $calendar->script() !!}
@stop
