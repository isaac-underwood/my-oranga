@extends('layouts.app') @section('content')
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 pb-4">
            <h1>My Entries</h1>
        </div>
    </div>

    <div class="row pt-2 text-center">
        <div class="col-md-2">
            <a href="{{route('activities.create')}}" class="btn btn-outline-dark btn-lg m-4">ACTIVITY</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('alcohol.create')}}" class="btn btn-outline-dark btn-lg m-4">ALCOHOL</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('moods.create')}}" class="btn btn-outline-dark btn-lg m-4">MOOD</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('sleep.create')}}" class="btn btn-outline-dark btn-lg m-4">SLEEP</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('snacks.create')}}" class="btn btn-outline-dark btn-lg m-4">SNACK</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('weights.create')}}" class="btn btn-outline-dark btn-lg m-4">WEIGHT</a>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="{{route('targets.create')}}" class="btn btn-outline-dark btn-lg m-4">TARGET</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 pb-4">
            <h2>Activities</h2>
        </div>
    </div>
<div id="activities" class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
                <th scope="col">Distance</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $entry)
            <tr>
                <td>{{$entry->date}}</td>
                <td>{{$entry->type}}</td>
                <td>{{$entry->time}}</td>
                <td>{{$entry->location}}</td>
                <td>{{$entry->distance}}</td>
                <td><a href="{{route('activities.edit', $entry->id)}}" class="btn btn-primary tbl-edit-btn"><i class="fas fa-edit fa-1x"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$activities->links()}}
    </div>
</div>
@endsection