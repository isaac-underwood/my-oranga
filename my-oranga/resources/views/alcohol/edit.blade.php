@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Edit Alcohol Consumption</h1>
        <div class="task-icons text-center">
        <i class="fas fa-wine-glass-alt p-2"></i>
        <i class="fas fa-beer p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('alcohol.update', $alcohol->id)}}" method="post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" value="{{$alcohol->date}}" name="date" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }}" id="date" aria-describedby="dateHelp">
                    @if($errors->has('date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="item">Item</label>
                    <input type="text" value="{{$alcohol->item}}" class="form-control {{$errors->has('item') ? 'is-invalid' : '' }}" name="item" id="item" placeholder="e.g. Red Wine, Stubby 4.5%, etc.">
                    @if($errors->has('item'))
                            <span class="invalid-feedback font-weight-bold">
                                * {{$errors->first('item')}}
                            </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="std">Standard Drink(s)</label>
                    <input type="number" name="std" value="{{$alcohol->standard_drink}}" class="form-control {{$errors->has('std') ? 'is-invalid' : '' }}" id="std" aria-describedby="numberHelp" placeholder="0">
                    @if($errors->has('std'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('std')}}
                        </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="energy_type">Energy Type</label>
                    <select name="energy_type" id="energy-select" class="form-control {{$errors->has('energy_type') ? 'is-invalid' : '' }}">
                        <option value="kj">kJ</option>
                        <option value="calories" selected>Calories</option>
                    </select>
                    @if($errors->has('energy_type'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('energy_type')}}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="energy_amount">Energy Amount</label>
                    <input type="number" value="{{$alcohol->calories}}" name="energy_amount" class="form-control {{$errors->has('energy_amount') ? 'is-invalid' : '' }}" id="energy_amount" aria-describedby="numberHelp" placeholder="0">
                    @if($errors->has('energy_amount'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('energy_amount')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Update Alcohol <i class="fa fa-check fa-1x p-2"></i></button>
        </form>
    </div>
@endsection