@extends('layouts.approle')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Gestion disponibilites</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('disponibilites.create') }}">Creer Nouvelle disponibilite</a>
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
            <th width="280px">Action</th>
        </tr>
	    @foreach ($disponibilites as $disponibilite)
	    <tr>
	        <td>{{ $disponibilite->id }}</td>
            <td>{{ $disponibilite->user->name }}</td>
	        <td>
                <form action="{{ route('disponibilites.destroy',$disponibilite->id) }}" method="POST">
                <!-- @can('disponibilite-edit',Disponibilite::class) -->
                    <a class="btn btn-info" href="{{ route('disponibilites.show',$disponibilite->id) }}">Afficher Informations</a>
                <!-- @endcan -->
                <!-- @can('disponibilite-delete',Disponibilite::class) -->
                    <a href="{{ route('disponibilites.edit', $disponibilite->id) }}" class="btn btn-warning">Modifier</a>
                <!-- @endcan -->


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $disponibilites->links() !!}
