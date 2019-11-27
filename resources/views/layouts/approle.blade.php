<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gestion Dossiers Medicaux') }}</title>
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
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                        @else
                        @can('user-list',User::class)
                            <li><a class="nav-link" href="{{ route('users.index') }}">Gestion Utilisateurs</a></li>
                        @endcan
                        @can('role-list',Role::class)
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Gestion Roles</a></li>
                         @endcan
                         @can('disponibilite-list',Disponibilite::class)
                            <li><a class="nav-link" href="{{ route('disponibilites.index') }}">Gestion Horaires</a></li>
                        @endcan
                         @can('rdv-list',Rdv::class)
                            <li><a class="nav-link" href="">Gestion Rendez-Vous</a></li>
                         @endcan
                         @can('analyse-list',Analyse::class)
                            <li><a class="nav-link" href="{{ route('analyses.index') }}">Gestion Analyses</a></li>
                         @endcan
                         @can('ordonnance-list',Ordonnance::class)
                            <li><a class="nav-link" href="">Gestion Ordonnances</a></li>
                         @endcan
                         @can('bonanalyse-list',Bonanalyse::class)
                            <li><a class="nav-link" href="">Gestion Bons Analyses</a></li>
                         @endcan
                         @can('consultation-list',Consultation::class)
                            <li><a class="nav-link" href="{{ route('consultations.index') }}">Gestion Consultations</a></li>
                         @endcan
                         @can('patient-list',Patient::class)
                            <li><a class="nav-link" href="{{ route('patient.liste') }}">Gestion Patients</a></li>
                         @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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