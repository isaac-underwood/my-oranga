@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Record a Mood</h1>
        <div class=" text-center">
            <i class="far fa-smile-beam fa-3x p-2"></i>
            <i class="far fa-sad-tear fa-3x p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('moods.store')}}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date" aria-describedby="dateHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="customRange2">Your Mood</label>
                    <input type="range" class="custom-range" value="10" min="1" max="10" id="moodInput" oninput="moodOutput.value = moodInput.value">
                    <div class="mx-auto text-center">
                        <i class="far fa-sad-tear fa-3x p-2 float-left"></i>
                        <output class="text-center mx-auto" name="mood-output" id="moodOutput">10</output>
                        <i class="far fa-smile-beam fa-3x p-2 float-right"></i>
                    </div>
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left">x Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Mood +</button>
        </form>
    </div>
@endsection