<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/loading-bar.css')}}"/>
    <script type="text/javascript" src="{{asset('js/loading-bar.js')}}"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b42a9b5167.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <main class="py-4 @yield('main-class')">
            @yield('content')
            @if(Auth::check())
            <a href="#" id="askcoach">
                <div id="coachbutton">
                    
                    <div class="feedback"></div>
                    
                </div>
            
            <h6 class="ask-coach-text">Ask Coach!</h6>
            </a>
            @endif
        </main>
    </div>
    @if(session('status')) {{-- <- If session key exists --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}} {{-- <- Display the session value --}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Auth::check())
    <!-- Modal -->
    <div class="modal fade" id="coachModalCentre" tabindex="-1" role="dialog" aria-labelledby="coachModalCentreTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle"><i class="far fa-comment-dots pr-1"></i> Coach says...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="mb-4">"Hey, {{Auth::user()->name}}!"</h4>
                <h3>Mood</h3>
                @if($coach_ai[0] < 7)
                    <p class="pl-3">"You seem a bit down lately. Did you know exercise can help lift your mood?"</p>
                    <div class="mx-auto text-center my-4">
                        <a href="https://depression.org.nz/resources/" class="btn btn-secondary btn-sm mx-4">I Need Help</a>
                        <a href="{{route('activities.create')}}" class="btn btn-primary btn-sm text-center mx-4">Plan an Activity</a>
                    </div>
                @else
                    <p class="pl-3">"Good to see you in a good mood lately, {{Auth::user()->name}}! Keep yourself that way by keeping active!"</p>
                    <div class="mx-auto text-center my-4">
                        <a href="{{route('activities.create')}}" class="btn btn-primary btn-sm text-center mx-4">Plan Another Activity</a>
                    </div>
                @endif
                <h3>Sleep</h3>
                @if($coach_ai[1] < 8)
                    <p class="pl-3">"{{Auth::user()->name}}, you need to sleep more. This will improve all aspects of your wellness."</p>
                @else
                    <p class="pl-3">"Great work on your sleep this week! Keep it up, {{Auth::user()->name}}!"</p>
                @endif
                <h3>Snacks</h3>
                @if($coach_ai[2] > 1800)
                    <p class="pl-3">"Put down those M&M's! {{Auth::user()->name}}, snacking can negatively affect our health. Try to cut down on snacks."</p>
                @else
                    <p class="pl-3">"Good work on not snacking too much!"</p>
                @endif
                <h3>Alcohol</h3>
                @if($coach_ai[3] > 6)
                    <p class="pl-3">"Try to cut down on alcohol consumption. It looks like you may be on the way to exceeding the recommended weekly intake."</p>
                @else
                    <p class="pl-3">"Great work on not consuming alcohol excessively!"</p>
                @endif
                <h3>Activities</h3>
                @if($coach_ai[4] < 2)
                    <p class="pl-3">"I see you haven't been exercising as much as you should be. Let's get back on track!"</p>
                @else
                    <p class="pl-3">"Fantastic exercise! Keep it up!"</p>
                    <div class="mx-auto text-center my-4">
                        <a href="{{route('activities.create')}}" class="btn btn-primary btn-sm text-center mx-4">Plan Another Activity</a>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Thanks Coach!</button>
            </div>
            </div>
        </div>
    </div>
    @endif
    <script type="text/javascript">
    </script>
    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
        setTimeout(function() {
            $(".alert").alert('close');
        }, 6000);
        });

        @if(Auth::check())
        var coach = document.getElementById('askcoach');
        coach.style.cursor = 'pointer';
        coach.onclick = function() {
            $(document).ready(function() {
                $("#coachModalCentre").modal();
                });
        }
        @endif
        </script>
    <style>
    .alert{
        z-index: 99;
        top: 60px;
        right:18px;
        min-width:30%;
        position: fixed;
        animation: slide 0.3s forwards;
    }
    @keyframes slide {
        100% { top: 30px; }
    }
    @media screen and (max-width: 668px) {
        .alert{ /* center the alert on small screens */
            left: 10px;
            right: 10px; 
        }
    }
    .wrapper { 
    height: 100%;
    width: 100%;
    left:0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
    background-size: 1800% 1800%;

    -webkit-animation: rainbow 18s ease infinite;
    -z-animation: rainbow 18s ease infinite;
    -o-animation: rainbow 18s ease infinite;
    animation: rainbow 18s ease infinite;}

    @-webkit-keyframes rainbow {
        0%{background-position:0% 82%}
        50%{background-position:100% 19%}
        100%{background-position:0% 82%}
    }
    @-moz-keyframes rainbow {
        0%{background-position:0% 82%}
        50%{background-position:100% 19%}
        100%{background-position:0% 82%}
    }
    @-o-keyframes rainbow {
        0%{background-position:0% 82%}
        50%{background-position:100% 19%}
        100%{background-position:0% 82%}
    }
    @keyframes rainbow { 
        0%{background-position:0% 82%}
        50%{background-position:100% 19%}
        100%{background-position:0% 82%}
    }
    </style>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@yield('scripts')

</body>
</html>
