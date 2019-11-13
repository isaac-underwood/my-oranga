@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Record a Snack</h1>
        <div class="task-icons text-center">
            <i class="fas fa-cookie-bite p-2"></i>
            <i class="fas fa-coffee p-2"></i>
            <i class="fas fa-ice-cream p-2"></i>
        </div>
    </div>
    <div class="container">
        @if($last_snack != null)
            <h5 class="text-center">Your last snack was</h5>
            <h4 class="text-center">{{$last_snack->item}}</h4>
            <h5 class="text-center">{{$last_snack->calories}} calories ({{$last_snack->kj}} kJ)</h5>
        @endif
        <form action="{{route('snacks.store')}}" method="post" class="form">
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
                    <label for="item">Item</label>
                    <input type="text" class="form-control {{$errors->has('item') ? 'is-invalid' : '' }}" name="item" id="item" placeholder="e.g. Biscuit, Latte, Energy Drink, etc.">
                    @if($errors->has('item'))
                            <span class="invalid-feedback font-weight-bold">
                                * {{$errors->first('item')}}
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
                        <option value="calories">Calories</option>
                    </select>
                    @if($errors->has('energy_type'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('energy_type')}}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="energy_amount">Energy Amount</label>
                    <input type="number" name="energy_amount" class="form-control {{$errors->has('energy_amount') ? 'is-invalid' : '' }}" id="energy_amount" aria-describedby="numberHelp" placeholder="0">
                    @if($errors->has('energy_amount'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('energy_amount')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Snack <i class="fa fa-plus fa-1x p-2"></i></button>
        </form>
    </div>
@endsection