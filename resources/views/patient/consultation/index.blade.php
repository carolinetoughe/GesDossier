@extends('layouts.apppatient')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Gestion consultations</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success" href="{{ route('patient.home') }}">Retour</a>
    
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
                <th>Id Consultations</th>
                <th>Dates</th>
                <th>Noms Medecins Consultants</th>
                <th width="280px">Action</th>
            </tr>

	    @foreach($consultations as $consultation)
	        <tr>
	                <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->date }}</td>
                    <td>{{ $consultation->user->name }}</td>
	                <td>
                    <!-- <form action="{{ route('consultations.destroy',$consultation->id) }}" method="POST"> -->
                        <a class="btn btn-info" href="{{ route('patient.consultationshow',$consultation->id) }}">Afficher Informations</a>
               
	                </td>
	        </tr>
	    @endforeach
    </table>