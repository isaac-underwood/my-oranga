@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 pb-4">
            <h1>My Entries</h1>
        </div>
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
    <div class="entries-tbl">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-12 pb-4">
                <h2>Alcohol</h2>
            </div>
        </div>
        <div id="alcohol" class="table-responsive">
            <table class="table">
                <thead>
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
                        <td>{{$entry->drinks}}</td>
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
    </div>

    <div class="entries-tbl">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-12 pb-4">
                <h2>Moods</h2>
            </div>
        </div>
        <div id="mood" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Indicator</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($moods as $entry)
                    <tr>
                        <td>{{$entry->date}}</td>
                        <td>{{$entry->indicator}}</td>
                        <td><a href="{{route('moods.edit', $entry->id)}}" class="btn btn-primary tbl-edit-btn"><i class="fas fa-edit fa-1x"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{$moods->links()}}
            </div>
        </div>
    </div>

    <div class="entries-tbl">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-12 pb-4">
                <h2>Moods</h2>
            </div>
        </div>
        <div id="mood" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Indicator</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($moods as $entry)
                    <tr>
                        <td>{{$entry->date}}</td>
                        <td>{{$entry->indicator}}</td>
                        <td><a href="{{route('moods.edit', $entry->id)}}" class="btn btn-primary tbl-edit-btn"><i class="fas fa-edit fa-1x"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{$moods->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
