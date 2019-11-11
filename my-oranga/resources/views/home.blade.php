@extends('layouts.app')

@section('main-class', 'main-home')
@section('content')
<div class="container">
    <div class="mt-4">
    <h1 class="text-left text-h1-large">A Wellness Tool Designed for You.</h1>
    </div>
    <div class="flex-center position-ref full-height">
        <div class="col-md-8">
            <blockquote class="blockquote">
                <h1 class="mb-2">"If you can dream it, you can do it."</h1>
                <footer class="blockquote-footer">Walt Disney</footer>
            </blockquote>
        </div>
        <div class="col-md-4 border-left">
            <div class="mx-auto text-center">
                <h3 class="py-3">Get Started.</h3>
                <a href="{{route('login')}}" class="btn btn-outline-dark btn-lg mx-2">Login</a>
                <a href="{{route('register')}}" class="btn btn-outline-dark btn-lg mx-2">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection
