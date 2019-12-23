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
    <style>
        .circle-icon {
    background: #ffc0c0;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    text-align: center;
    line-height: 100px;
    vertical-align: middle;
    /* padding: 10px; */
}
    </style>
</head>
<body style="background-color: #ddebfa;">
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
                                    <i class="fa fa-bell fa-4x text-danger"></i><span class="badge badge-danger" id="count-notification">{{
                                        auth()->guard()->user()->unreadNotifications->count()}}
                                        </span><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    
                                @if(auth()->guard()->user()->unreadNotifications->count())
                                @foreach(auth()->guard()->user()->unreadNotifications as $notification )
                               
                                    <a class="dropdown-item" href="{{ route('user.rdvindex') }}">
                                        {{-- {{ $notification }} --}}
                                    
                                    {{ $notification->data['rdv']['date'] }}
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Mon Profil') }}</a></li>
                        
                            <li class="nav-item dropdown">
                    
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                    {{-- <img src="{{asset('images/'.Auth::user()->image)}}" width="100" height="80"alt="" class="circle-icon"> --}}
        <img src="{{ asset('storage/'.Auth::user()->image) }}"width="100" height="80"  class="circle-icon" />
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a> --}}
                        @else
        <div class="container" >
            <div class="row">
              
                    @can('user-list',User::class)
                    <a href="{{ route('users.index') }}">
              <div class="col-lg-3">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-6">
                        <i class="fa fa-users fa-5x text-danger"></i>
                      </div>
                      <div class="col-xs-6 text-right">
                        <p class="announcement-heading">{{
                            DB::table('users')->count()}}
                          
                        </p>
                        <p class="announcement-text">Utilisateurs</p>
                      </div>
                    </div>
                  </div>
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        
                        <div class="col-xs-6 text-right">
                          {{-- <i class="fa fa-arrow-circle-right"></i> --}}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endcan
              @can('role-list',Role::class)
              <a href="{{ route('roles.index') }}">

              <div class="col-lg-3">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-6">
                        <i class="fa fa-briefcase fa-5x text-danger"></i>
                      </div>
                      <div class="col-xs-6 text-right">
                        <p class="announcement-heading">{{
                            DB::table('roles')->count()}}</p>
                        <p class="announcement-text"> Roles</p>
                      </div>
                    </div>
                  </div>
                 
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        
                        <div class="col-xs-6 text-right">
                          {{-- <i class="fa fa-arrow-circle-right"></i> --}}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              @endcan
                         
              @can('rdv-list',Rdv::class)
              <a href="{{ route('rdvs.index') }}">

              <div class="col-lg-3">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-6">
                        <i class="fa fa-calendar fa-5x text-danger"></i>
                      </div>
                      <div class="col-xs-6 text-right">
                        <p class="announcement-heading">{{
                            DB::table('rdvs')->count()}}</p>
                        <p class="announcement-text">Rendez-Vous</p>
                      </div>
                    </div>
                  </div>
                
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        
                        <div class="col-xs-6 text-right">
                          {{-- <i class="fa fa-arrow-circle-right"></i> --}}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              @endcan
              @can('analyse-list',Analyse::class)
              <a href="{{ route('analyses.index') }}">

              <div class="col-lg-3">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-6">
                        <i class="fa fa-flask fa-5x text-danger"></i>
                      </div>
                      <div class="col-xs-6 text-right">
                        <p class="announcement-heading">{{
                            DB::table('analyses')->count()}}</p>
                        <p class="announcement-text"> Analyses</p>
                      </div>
                    </div>
                  </div>
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        
                        <div class="col-xs-6 text-right">
                          {{-- <i class="fa fa-arrow-circle-right"></i> --}}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endcan

              @can('ordonnance-list',Ordonnance::class)
              <a href="{{ route('ordonnances.index') }}">
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-medkit fa-5x text-danger"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">{{
                      DB::table('ordonnances')->count()}}</p>
                  <p class="announcement-text">Ordonnances</p>
                </div>
              </div>
            </div>
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  
                  <div class="col-xs-6 text-right">
                    {{-- <i class="fa fa-arrow-circle-right"></i> --}}
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endcan

        @can('bonanalyse-list',Bonanalyse::class)
        <a href="{{ route('ficheanalyses.index') }}">
  <div class="col-lg-3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-file-text fa-5x text-danger"></i>
          </div>
          <div class="col-xs-6 text-right">
            <p class="announcement-heading">{{
                DB::table('ficheanalyses')->count()}}</p>
            <p class="announcement-text">Fiches Analyses</p>
          </div>
        </div>
      </div>
        <div class="panel-footer announcement-bottom">
          <div class="row">
            
            <div class="col-xs-6 text-right">
              {{-- <i class="fa fa-arrow-circle-right"></i> --}}
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  @endcan

  @can('consultation-list',Consultation::class)
  <a href="{{ route('consultations.index') }}">
<div class="col-lg-3">
<div class="panel panel-info">
<div class="panel-heading">
  <div class="row">
    <div class="col-xs-6">
      <i class="fa fa-user-md fa-5x text-danger"></i>
    </div>
    <div class="col-xs-6 text-right">
      <p class="announcement-heading">{{
          DB::table('consultations')->count()}}</p>
      <p class="announcement-text">Consultations</p>
    </div>
  </div>
</div>
  <div class="panel-footer announcement-bottom">
    <div class="row">
      
      <div class="col-xs-6 text-right">
        {{-- <i class="fa fa-arrow-circle-right"></i> --}}
      </div>
    </div>
  </div>
</a>
</div>
</div>
@endcan

@can('patient-list',Patient::class)
<a href="{{ route('patient.liste') }}">
<div class="col-lg-3">
<div class="panel panel-info">
<div class="panel-heading">
<div class="row">
  <div class="col-xs-6">
    <i class="fa fa-id-card-o fa-5x text-danger"></i>
  </div>
  <div class="col-xs-6 text-right">
    <p class="announcement-heading">{{
        DB::table('patients')->count()}}</p>
    <p class="announcement-text">Patients</p>
  </div>
</div>
</div>
<div class="panel-footer announcement-bottom">
  <div class="row">
    
    <div class="col-xs-6 text-right">
      {{-- <i class="fa fa-arrow-circle-right"></i> --}}
    </div>
  </div>
</div>
</a>
</div>
</div>
@endcan

            </div><!-- /.row -->
            </div>
            @endguest
        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>