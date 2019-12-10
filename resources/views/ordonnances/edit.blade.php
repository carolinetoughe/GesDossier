@extends('layouts.approle')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier Horaire Medecin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('disponibilites.index') }}"> Retour</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($disponibilites, ['method' => 'PATCH','route' => ['disponibilites.update', $disponibilites->id]]) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lundi:</strong>
            {!! Form::select('lundi', ['disponible' => 'Disponible', 'indisponible' => 'Indisponible']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mardi:</strong>
            {!! Form::select('mardi', ['disponible' => 'Disponible', 'indisponible' => 'Indisponible']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mercredi:</strong>
            {!! Form::select('mercredi', ['disponible' => 'Disponible', 'indisponible' => 'Indisponible']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jeudi:</strong>
            {!! Form::select('jeudi', ['disponible' => 'Disponible', 'indisponible' => 'Indisponible']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vendredi:</strong>
            {!! Form::select('vendredi', ['disponible' => 'Disponible', 'indisponible' => 'Indisponible']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</div>
{!! Form::close() !!}

@endsection