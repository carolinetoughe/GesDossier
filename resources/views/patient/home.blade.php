@extends('layouts.apppatient')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Gestion Informations personnelles</h1>
        </div>
        <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('patient.editinfo', $patient->id) }}">Modifier Informations</a>
            </div>
        <div class="card">
            <div class="card-body">
                        <img src="{{ URL::to('/') }}/images/{{ $patient->image }}"width="100" height="80"  class="img-thumbnail" />
                            
                <h5 class="card-title">Coordonnées </h5>
                <table class="table">
                    <tbody>
        <br>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $patient->id }}</td>
                        </tr>

                        <tr>
                            <td>Nom </td>
                            <td>{{ $patient->nom }}</td>
</tr>
                            <tr>
                            <td>Prenom</td>
                            <td>{{ $patient->prenom }} </h3>
                            </tr>
                            <tr>
                            <td>Adresse</td>
                            <td>{{ $patient->adresse }}</td>
                            </tr>
                            <tr>
                            <td>Nationalite</td>
                            <td>{{ $patient->nationalite }}</td>
                            </tr>
                            <td>numero Telephone</td>
                            <td>{{ $patient->numerotelephone }}</td>
                            </tr>
                <tr>
                            <td>Date de Naissance</td>
                            <td>{{ $patient->datenaissance }}</td>
                </tr>
                <tr>
                            <td>Sexe</td>
                            <td>{{ $patient->sexe }}</td>
                </tr>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <td>Date d'inscription</td>
                            <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                        </tr>
                        <h5 class="card-title">Coordonnées Medicales</h5>

                        <tr>
                            <td>Groupe Sanguin</td>
                            <td>{{ $patient->groupesanguin }}</td>
                        </tr>
                        <tr>
                            <td>Nom Personne A Contacter </td>
                            <td>{{ $patient->nomurgence }}</td>
                        </tr>
                        <tr>
                            <td>Numero Personne A Contacter</td>
                            <td>{{ $patient->numerotelephone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection