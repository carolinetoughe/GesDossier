@extends('layouts/approle')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading" style="background: #2e6da4; color:white;">
            Gestion Des Rendez-Vous
        </div>
        <div class="panel-body">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection