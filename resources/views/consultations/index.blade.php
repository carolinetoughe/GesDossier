@extends('layouts.approle')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Gestion consultations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('consultations.create') }}">Creer Nouvelle consultation</a>
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
            <th>No</th>
            <th>Date</th>
            <th>Nom Patient</th>
            <th>Nom Medecin</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($consultations as $consultation)
	    <tr>
	        <td>{{ $consultation->id }}</td>
	        <td>{{ $consultation->date }}</td>
	        <td>{{ $consultation->patient->nom }}</td>
            <td>{{ $consultation->user->name }}</td>
	        <td>
                <!-- <form action="{{ route('consultations.destroy',$consultation->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('consultations.show',$consultation->id) }}">Afficher Informations</a>



                    @csrf
                    @method('DELETE')
                    @can('consultation-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form> -->

                <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Plus
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <form action="{{ route('consultations.destroy',$consultation->id) }}" method="POST">
    @csrf
                    @method('DELETE')
    <a class="dropdown-item" href="{{ route('consultations.show',$consultation->id) }}">Voir détails</a>
    <a class="dropdown-item" href="{{ route('create_fiche', ['consultation' => $consultation->id]) }}">Créer fiche analyse</a>
    <a class="dropdown-item" href="#">Créer Ordonnance</a>
                  
                    @can('consultation-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
  </div>
</div>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $consultations->links() !!}
    @endsection
