@extends('layouts.approle')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Voir Informations Fiches</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ficheanalyses.index') }}">Retour</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $ficheanalyse->consultation->date }}
        </div>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Medecin:</strong>
                {{ $ficheanalyse->consultation->user->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mardi:</strong>
                {{ $disponibilites->mardi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mercredi:</strong>
                {{ $disponibilites->mercredi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jeudi:</strong>
                {{ $disponibilites->jeudi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>vendredi:</strong>
                {{ $disponibilites->vendredi }}
            </div>
        </div>
    </div>
@endsection