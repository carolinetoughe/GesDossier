@extends('layouts.apppatient')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mes Antecedents medicaux</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('antecedents.create') }}"> Ajouter Antecedent</a>
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
                <th>Noms</th>
                <th>Traitements</th>
            </tr>

	    @foreach($antecedents as $rdv)
	        <tr>
                    <td>{{ $rdv->nom }}</td>
                    <td>{{ $rdv->traitement }}</td>
	        </tr>
	    @endforeach
    </table>
    @endsection