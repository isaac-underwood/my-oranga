@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Edit a Sleep</h1>
        <div class=" text-center">
        <i class="fas fa-moon p-2"></i>
        <i class="fas fa-bed p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('sleep.update', $sleep->id)}}" method="post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date Sleep Started</label>
                    <input type="date" name="date" value="{{$sleep->date}}" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }}" id="date" aria-describedby="dateHelp">
                    @if($errors->has('date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="hours">Hours Slept</label>
                    <input type="number" value="{{$sleep->hours}}" name="hours" step="0.01" class="form-control {{$errors->has('hours') ? 'is-invalid' : '' }}" id="hours" aria-describedby="numberHelp" placeholder="0">
                    @if($errors->has('hours'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('hours')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Update Sleep <i class="fa fa-check fa-1x p-2"></i></button>
        </form>
    </div>
@endsection