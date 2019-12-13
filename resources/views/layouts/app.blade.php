<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GesDos') }}</title>

    <!-- Scripts -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="design/css/style.css">

<style>

        .box {
            width: 500px;
            margin: 200px 0;
        }
        
        .shape1{
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            border-radius: 80px;
            float: left;
            margin-right: -50px;
        }
        .shape2 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            /* background-color: #0074d9; */
            border-radius: 80px;
            margin-top: -30px;
            float: left;
        }
        .shape3 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            /* background-color: red; */
            border-radius: 80px;
            margin-top: -30px;
            float: left;
            margin-left: -31px;
        }
        .shape4 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            border-radius: 80px;
            margin-top: -25px;
            float: left;
            margin-left: -32px;
        }
        .shape5 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            border-radius: 80px;
            float: left;
            margin-right: -48px;
            margin-left: -32px;
            margin-top: -30px;
        }
        .shape6 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            /* background-color: #0074d9; */
            border-radius: 80px;
            float: left;
            margin-right: -20px;
            margin-top: -35px;
        }
        .shape7 {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: red;
            border-radius: 80px;
            float: left;
            margin-right: -20px;
            margin-top: -57px;
        }
        .float {
            position: absolute;
            z-index: 2;
        }
        
        .form {
            margin-left: 145px;
        }
        
        </style>
</head>
<body>
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container"> --}}
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'GesDos') }}
                </a> --}}
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </ul> --}}
                {{-- </div> --}}
            {{-- </div>
        </nav> --}}

        <main class="">
            @yield('content')
        </main>
    {{-- </div> --}}
</body>
</html>
