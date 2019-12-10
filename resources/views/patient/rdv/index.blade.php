@extends('layouts.apppatient')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mes Rendez-Vous</h2>
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
                <th>Dates</th>
                <th>Noms Medecins Consultants</th>
            </tr>

	    @foreach($rdvs as $rdv)
	        <tr>
                    <td>{{ $rdv->date }}</td>
                    <td>{{ $rdv->user->name }}</td>
	        </tr>
	    @endforeach
    </table>
    @endsection