<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ges            Dos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
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
                height: 100vh;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    GesDos
                </div>
                @if (Route::has('login'))
                <div class="links">
                    <a href="#">Accueil</a>
                    <a href="">Services</a>
                    <a href="">Contacts</a>
                   
                    @auth
                        <a href="{{ url('/home') }}">Espace Medical</a>
                    @else
                        <a href="{{ route('login') }}">Espace Medical</a>
                    @endauth

                    @auth
                        <a href="{{ url('patient/home') }}">Espace Patient</a>
                    @else
                        <a href="{{ route('patient.login') }}">Espace Patient</a>
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
