@extends('layouts.app') @section('content')
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 pb-4">
            <h1>My Entries</h1>
        </div>
    </div>

    <div class="row pt-2 text-center">
        <div class="col-md-2">
            <a href="{{route('entries.activities')}}" class="btn btn-outline-dark btn-lg m-4">ACTIVITY</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('entries.alcohol')}}" class="btn btn-outline-dark btn-lg m-4">ALCOHOL</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('entries.moods')}}" class="btn btn-outline-dark btn-lg m-4">MOOD</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('entries.sleep')}}" class="btn btn-outline-dark btn-lg m-4">SLEEP</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('entries.snacks')}}" class="btn btn-outline-dark btn-lg m-4">SNACK</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('entries.weights')}}" class="btn btn-outline-dark btn-lg m-4">WEIGHT</a>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="{{route('entries.targets')}}" class="btn btn-outline-dark btn-lg m-4">TARGET</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 pb-4">
            <h1>Targets</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-right text-right">
        <div class="col-md-12 pb-4">
            <a href="{{route('targets.create')}}" class="btn btn-outline-success">Create Target <i class="fa fa-plus fa-1x pl-2"></i></a>
        </div>
    </div>
<div id="activities" class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Type</th>
                <th scope="col">Goal Amount</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($targets as $entry)
            <tr>
                <td>{{$entry->start_date}}</td>
                <td>{{$entry->end_date}}</td>
                <td>{{$entry->name}}</td>
                <td>{{$entry->goal}}</td>
                <td><a href="{{route('targets.edit', $entry->id)}}" class="btn btn-primary tbl-edit-btn"><i class="fas fa-edit fa-1x"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$targets->links()}}
    </div>
</div>
@endsection