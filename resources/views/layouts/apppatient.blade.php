<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GesDos') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    GesDos
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">



                    
@if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe"></i> Notification <span class="badge badge-danger" id="count-notification">{{
                                    auth()->guard('patient')->user()->unreadNotifications->count()}}
                                    </span><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @if(auth()->guard('patient')->user()->unreadNotifications->count())
                            @foreach(auth()->guard('patient')->user()->unreadNotifications as $notification )
                           
                                <a class="dropdown-item" href="{{ route('patient.consultationindex') }}">

                                {{ $notification->data['consultation']['motif'] }}
                                </a>
                                @endforeach
                                @else
                                <a class="dropdown-item" href="#">
                                    Pas De Notification
                                </a>
                                @endif
                            </div>
                        </li>


@endif
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('patient.login') }}">{{ __('Connexion') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ url('patient/home') }}">Mon Profil</a></li>
                            <li><a class="nav-link" href="">Mes Rendez-Vous</a></li>
                        
                            <li><a class="nav-link" href="">Mes Ordonnances</a></li>
                        
                            <li><a class="nav-link" href="{{ url('patient/ficheanalyseindex') }}">Mes Bons Analyses</a></li>
                         
                            <li><a class="nav-link" href="">Mes Hospitalisations</a></li>
                         
                            <li><a class="nav-link" href="{{ url('patient/consultationindex') }}">Mes Consultations</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }}
                                    
                                    <img src="{{asset('images/'.Auth::user()->image)}}" width="100" height="80"alt="">
                                    <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

