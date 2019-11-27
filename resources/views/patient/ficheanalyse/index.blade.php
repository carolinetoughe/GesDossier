@extends('layouts.apppatient')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mes Fiches Analyses</h2>
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
            <th>Date</th>
            <th>Nom Medecin</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($consultations as $consultation)
	    <tr>
	        <td>{{ $consultation->date }}</td>
            <td>{{ $consultation->user->name }}</td>
	        <td>        
                    @if(isset($consultation->ficheanalyse))
                    <a class="btn btn-info" href="{{ route('patient.ficheanalyseshow',[$consultation->ficheanalyse] )}}">Afficher Informations</a>
                    @else
                    <a class="btn btn-danger" href="#">Aucune fiche d'analyse</a>
                    @endif
	        </td>
	    </tr>
	    @endforeach
    </table>


    @endsection
