@extends('layouts.approle')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Gestion Fiches Analyses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ficheanalyses.create') }}">Creer Nouvelle Fiche Analyse</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nom Medecin</th>
            <th>Nom Patient</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($ficheanalyses as $ficheanalyse)
	    <tr>
	        <td>{{ $ficheanalyse->id }}</td>
            <td>{{ $ficheanalyse->consultation->user->name }}</td>
            <td>{{ $ficheanalyse->consultation->patient->nom }}</td>
	        <td>
                <form action="{{ route('ficheanalyses.destroy',$ficheanalyse->id) }}" method="POST">
                <!-- @can('disponibilite-edit',Disponibilite::class) -->
                    <a class="btn btn-info" href="{{ route('ficheanalyses.show',$ficheanalyse->id) }}">Afficher Informations</a>
                <!-- @endcan -->
                <!-- @can('disponibilite-delete',Disponibilite::class) -->
                    <a href="{{ route('ficheanalyses.edit', $ficheanalyse->id) }}" class="btn btn-warning">Modifier</a>
                <!-- @endcan -->


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $ficheanalyses->links() !!}
