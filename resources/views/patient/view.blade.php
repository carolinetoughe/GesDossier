@extends('patient/parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('patient.liste') }}" class="btn btn-default">Retour</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
 <h3>Numero de Dossier - {{ $data->dossier }} </h3>
 <h3>Numero de Piece d'identité - {{ $data->pieceidentite }} </h3>
 <h3>Prenom - {{ $data->prenom }} </h3>
 <h3>Nom - {{ $data->nom }}</h3>
 <h3>Sexe - {{ $data->sexe }}</h3>
 <h3>Date Naissance - {{ $data->datenaissance }}</h3>
 <h3>Situation Matrimoniale - {{ $data->civilite }} </h3>
 <h3>Adresse - {{ $data->adresse }}</h3>
 <h3>Nationalite - {{ $data->nationalite }}</h3>
 <h3>Groupe Sanguin - {{ $data->groupesanguin }}</h3>
 <h3>Numero Telephone - {{ $data->numerotelephone }}</h3>
 <h3>Nom Urgence - {{ $data->nomurgence }}</h3>
 <h3>Numero Urgence - {{ $data->numerourgence }}</h3>

</div>
@endsection