@extends('layouts.app')
@section('content')
    <div class="header">
        <h1 class="text-center">Record a Weight</h1>
        <div class=" text-center">
        <i class="fas fa-weight p-2"></i>
        <i class="fas fa-balance-scale p-2"></i>
        </div>
    </div>
    <div class="container">
        <form action="{{route('weights.store')}}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="{{old('date')}}" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }}" id="date" aria-describedby="dateHelp">
                    @if($errors->has('date'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('date')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" value="{{old('weight')}}" name="weight" step="0.01" class="form-control {{$errors->has('weight') ? 'is-invalid' : '' }}" id="weight" aria-describedby="numberHelp" placeholder="0">
                    @if($errors->has('weight'))
                        <span class="invalid-feedback font-weight-bold">
                            * {{$errors->first('weight')}}
                        </span>
                    @endif
                </div>
            </div>
            <a href="{{ URL()->previous() }}" class="btn btn-danger float-left"><i class="fa fa-remove fa-1x p-2"></i> Cancel</a>
            <button type="submit" class="btn btn-success float-right">Record Weight <i class="fa fa-plus fa-1x p-2"></i></button>
        </form>
    </div>
@endsection