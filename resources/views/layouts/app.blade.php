<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Covid-19 Vaccine Appointment') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- <script src="{{ asset('js/firebaseLogin.js') }}" defer></script>
    <script src="{{ asset('js/firebaseappointment.js') }}" defer></script>
    <script src="{{ asset('js/firebasepersonInfo.js') }}" defer></script> -->
    <!-- <script src="{{ asset('js/firebase.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- icons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .mainCon {
            margin: 2% 5%;
        }

        .containers {
            margin: 10px 10px;

        }

        .delete {
            --ionicon-stroke-width: 16px;
            color: rgb(173, 0, 0) !important;
        }

        .edit {
            --ionicon-stroke-width: 16px;
            color: rgb(5, 131, 22) !important;
        }
    </style>
</head>

<body style="min-height:40vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/appointment') }}">
                    <b>{{ config('app.name', 'Covid-19 Vaccine Appointments') }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <img src="">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <div class="row g-2 flex" style="margin:5px 5px">
                                <img src="{{ URL::asset('../../img/profile.png') }}" alt="profile Pic" style="height:25px; width:25px" class="    img-fluid rounded-start">
                                <p class="card-text" style="size: 12;margin-left:10px;margin-top:3px;vertical-align:middle!important;word-wrap:break-word">
                                    <b>Admin</b>
                                </p>
                            </div>
                            {{-- <a style="cursor: pointer;" class="nav-link text-dark"
                                    href="#"><b>{{ __('admin') }}</b></a> --}}
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                <b> {{ __('Logout') }}</b>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                </div>
                </li>
                @endguest
                </ul>
            </div>
    </div>
    </nav>

    <main class="py-4">
        <div class="  mainCon">
            <div class="row g-2">
                <div class="col-3">
                    <ul style="list-decoration: none;padding:0!important">
                        <li style="list-style-type: none; margin-bottom:10px;margin-top:5%">
                            <a href="{{ route('appointment') }}" style="text-decoration: none;">
                                <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                                    <div class="card-body">
                                        <div class="row g-2 flex" style="margin:5px 5px">
                                            <img src="{{ URL::asset('../../img/list.png') }}" alt="profile Pic" height="40" width="40" class="img-fluid rounded-start">
                                            <p class="card-text" style="size: 12;margin-left:10px;margin-top:8px;vertical-align:middle!important;word-wrap:break-word">
                                                <b> Appointments</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li style="list-style-type: none; margin-bottom:10px">
                            <a href="{{ route('patientInfo') }}" style="text-decoration: none;">
                                <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                                    <div class="card-body">
                                        <div class="row g-2 flex" style="margin:5px 5px">
                                            <img src="{{ URL::asset('../../img/personal.png') }}" alt="profile Pic" height="40" width="40" class="img-fluid rounded-start">
                                            <p class="card-text" style="size: 12;margin-left:10px;margin-top:8px;vertical-align:middle!important;word-wrap:break-word">
                                                <b> Patient Information</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li style="list-style-type: none; margin-bottom:10px">
                            <a href="{{ route('schedule') }}" style="text-decoration: none;">
                                <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                                    <div class="card-body">
                                        <div class="row g-2 flex" style="margin:5px 5px">
                                            <img src="{{ URL::asset('../../img/schedule.png') }}" alt="profile Pic" height="40" width="40" class="img-fluid rounded-start">
                                            <p class="card-text" style="size: 12;margin-left:10px;margin-top:8px;vertical-align:middle!important;word-wrap:break-word">
                                                <b> Schedule</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-9" style="padding:0;">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>