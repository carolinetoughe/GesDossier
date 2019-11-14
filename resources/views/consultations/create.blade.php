@extends('layouts.approle')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Nouvelle Consultation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('consultations.index') }}">Retour</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('consultations.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Date:</strong>
		            <input type="date" name="date" class="form-control">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="user_id" class="col-md-4 control-label">Nom Medecin :</label>
                            
                            <select name="user_id" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
        </div>
    </div>
		   
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
                            <label for="patient_id" class="col-md-4 control-label">Nom Patient :</label>
                            
                                <select name="patient_id" class="form-control">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                                    @endforeach
                                </select>
                        
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nom Service:</strong>
		            <input type="text" name="service_id" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Taille Patient:</strong>
		            <input type="text" name="taille_patient" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Poid Patient:</strong>
		            <input type="text" name="poids_patient" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Pression Patient:</strong>
		            <input type="text" name="pression_patient" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Motif:</strong>
		            <input type="text" name="motif" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Diagnostique:</strong>
		            <input type="text" name="diagnostique" class="form-control">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection