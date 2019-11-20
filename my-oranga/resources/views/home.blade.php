@extends('layouts.app')

@section('main-class', 'main-home')
@section('content')
<div class="position-ref full-height home-landing">
    <div class="row mx-auto">
        <div class="col-md-12">
            <h1 class="h1-large text-center d-inline-block brand-handwriting home-brand">My</h1><h1 class="h1-large text-center d-inline-block home-brand">Oranga</h1>
            <hr class="hr-white-home">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="my-2">A Wellness Tool Designed for You.</h3>
        </div>
    </div>
    <div class="row home-get-started">
        <div class="col-md-12">
            <h2 class="my-4">Get Started</h2>
            <hr class="hr-white-home">
        </div>
        
    </div>
    
    <div class="row text-center">
        <div class="col-md-6 text-right">
            <a href="{{route('login')}}" class="btn btn-outline-light btn-lg mx-2">Login</a>
        </div>
        <div class="col-md-6 text-left">
            <a href="{{route('register')}}" class="btn btn-outline-light btn-lg mx-2">Register</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <blockquote class="blockquote quote-home">
                <h2 class="mb-2 quote-home">"If you can dream it,<br>you can do it."</h2>
                <footer class="blockquote-footer">Walt Disney</footer>
            </blockquote>
        </div>
    </div>
</div>
@endsection
