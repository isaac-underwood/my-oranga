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
            <h2>Alcohol</h2>
        </div>
    </div>
<div id="activities" class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Item</th>
                <th scope="col">Drinks</th>
                <th scope="col">Calories</th>
                <th scope="col">kJ</th>
                <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($alcohols as $entry)
                <tr>
                    <td>{{$entry->date}}</td>
                    <td>{{$entry->item}}</td>
                    <td>{{$entry->standard_drink}}</td>
                    <td>{{$entry->calories}}</td>
                    <td>{{$entry->kj}}</td>
                    <td><a href="{{route('alcohol.edit', $entry->id)}}" class="btn btn-primary tbl-edit-btn"><i class="fas fa-edit fa-1x"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$alcohols->links()}}
    </div>
</div>
@endsection