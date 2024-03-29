@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="design/css/style.css">

<body>
<section id="banner" style="background: url({{asset('design/img/bg-banner.jpg') }}) no-repeat fixed;
background-size: cover;
min-height: 650px;
position: relative;">
    
    
<div class="container">

        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                    <div class="card-header text-primary text-center font-weight-bold" style="font-size: 30px;">{{ __('Connexion Patient') }}</div>

                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" method="POST" action="{{ route('patient.login') }}">
                                @csrf
                            <div class="form-group">
                                <label for="email" class="text-white">E-Mail Patient:</label><br>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                   
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Connexion">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
  </section>
</body>
@endsection