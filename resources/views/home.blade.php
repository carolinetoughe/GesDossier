@extends('layouts.approle')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Gestion de Votre Profil</h1>
    </div>
    <div class="pull-right">
            
            {{-- <a class="btn btn-success" href="{{ route('user.editinfo', $user->id) }}">Modifier Informations</a> --}}
        </div>
    <div class="card">
        <div class="card-body">
                    <img src="{{ asset('storage/'.$user->image) }}"width="100" height="80"  class="img-thumbnail" />
                        
                    <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">{{ __('Modifier Informmations') }}</a></li>

            <table class="table">
                <tbody>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>

                    <tr>
                        <td>Nom </td>
                        <td>{{ $user->name }}</td>
</tr>

                        <tr>
                        <td>Prenom</td>
                        <td>{{ $user->prenom }} </h3>
                        </tr>

                        <tr>
                        <td>Adresse</td>
                        <td>{{ $user->adresse }}</td>
                        </tr>

                        <tr>
                        <td>numero Telephone</td>
                        <td>{{ $user->numerotelephone }}</td>
                        </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Date d'ajout</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
