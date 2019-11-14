@extends('layouts.approle')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Afficher Informations</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
        </div>
    </div>
</div>


<div class="row">
<img src="{{ URL::to('/') }}/utilisateurs/{{ $user->image }}" class="img-thumbnail" />
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prenom:</strong>
            {{ $user->prenom }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adresse:</strong>
            {{ $user->adresse }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero:</strong>
            {{ $user->numerotelephone }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
    <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Heures de Disponiilites</h3>
                </div>
                <div class="panel-body">
                    @foreach($jours as $jour)
                        @if($jour->users->count() > 0)
                            <strong>{{ $jour->name }} :</strong><br> 
                            <ul>
                            @foreach($jour->users as $user)
                                <li>{{ $user->pivot->debut }} à {{ $user->pivot->fin }}</li>
                            @endforeach
                            </ul>
                        @endif
                    @endforeach
                </div>
</div>
@endsection