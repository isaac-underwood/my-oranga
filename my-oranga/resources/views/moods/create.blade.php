@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Record a Mood</h1>
        <div class=" text-center">
            <i class="far fa-sad-tear fa-3x p-2"></i>
            <i class="far fa-meh fa-3x p-2"></i>
            <i class="far fa-smile-beam fa-3x p-2"></i>
        </div>
    </div>
    <div class="container">
        <h5 class="text-center">Your last mood was a</h5>
        <h4 class="text-center">7</h4>
        <form action="{{route('moods.store')}}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }}" id="date" aria-describedby="dateHelp">
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
                    <input type="range" name="mood" class="custom-range {{$errors->has('mood') ? 'is-invalid' : '' }}" value="10" min="1" max="10" id="moodInput" oninput="moodOutput.value = moodInput.value">
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
                        <output class="text-center mx-auto pt-4 mood-output" name="mood-output" id="moodOutput">10</output>
                    </div>
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Mood <i class="fa fa-plus fa-1x p-2"></i></button>
        </form>
    </div>
@endsection