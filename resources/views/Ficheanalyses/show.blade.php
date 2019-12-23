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
                <strong>Nom Patient:</strong>
                {{ $ficheanalyse->consultation->patient->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Analyses:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->nom }}: {{ $v->prix }} </label>
                    @endforeach
                @endif
            </div>
        </div>
       
@endsection