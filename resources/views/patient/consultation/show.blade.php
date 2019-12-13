@extends('layouts.apppatient')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Informations consultations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patient.consultationindex') }}">Retour</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{ $consultations->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Medecin:</strong>
                {{ $consultations->user->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Taille Patient:</strong>
                {{ $consultations->taille_patient }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poids Patient:</strong>
                {{ $consultations->poids_patient }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pression Patient:</strong>
                {{ $consultations->taille_patient }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Motif:</strong>
                {{ $consultations->motif }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Diagnostique:</strong>
                {{ $consultations->diagnostique }}
            </div>
        </div>
    </div>
@endsection