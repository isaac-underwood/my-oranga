@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Edit Mood</h1>
        <div class=" text-center">
            <i class="far fa-sad-tear fa-3x p-2"></i>
            <i class="far fa-meh fa-3x p-2"></i>
            <i class="far fa-smile-beam fa-3x p-2"></i>
        </div>
    </div>
    <div class="container">
        <h5 class="text-center">You're editing your mood for</h5>
        <h4 class="text-center">{{date('l', strtotime($mood->date))}} the {{date('jS', strtotime($mood->date))}} of {{date('F', strtotime($mood->date))}}, {{date('Y', strtotime($mood->date))}}</h4>
        <h4 class="text-center">It was a <b>{{$mood->indicator}}</b></h4>
        <form action="{{route('moods.update', $mood->id)}}" method="post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="{{$mood->date}}" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }}" id="date" aria-describedby="dateHelp">
                    @if($errors->has('date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="customRange2">Your Mood</label>
                    <input type="range" name="mood" class="custom-range {{$errors->has('mood') ? 'is-invalid' : '' }}" value="{{$mood->indicator}}" min="1" max="10" id="moodInput" oninput="moodOutput.value = moodInput.value">
                    @if($errors->has('mood'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('mood')}}
                        </span>
                    @endif
                    <div class="mx-auto text-center">
                        <i class="far fa-sad-tear fa-3x p-2 float-left"></i>
                        <i class="far fa-meh fa-3x p-2"></i>
                        <i class="far fa-smile-beam fa-3x p-2 float-right"></i>
                        <br>
                        <output class="text-center mx-auto pt-4 mood-output" name="mood-output" id="moodOutput">{{$mood->indicator}}</output>
                    </div>
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Update Mood <i class="fa fa-check fa-1x p-2"></i></button>
        </form>
    </div>
@endsection