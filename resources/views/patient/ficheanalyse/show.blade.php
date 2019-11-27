@extends('layouts.apppatient')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informations Fiches</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patient.ficheanalyseindex') }}">Retour</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $ficheanalyses->consultation->date }}
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Medecin:</strong>
                {{ $ficheanalyses->consultation->user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Analyses Prescrites:</strong>
            @foreach ($ficheanalyses->analyses as $analyse)
                <br>
                {{ $analyse->nom }}
            @endforeach
            </div>
        </div>
        
    </div>
@endsection