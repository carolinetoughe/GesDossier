@extends('layouts.approle')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Nouvelle Disponibilite</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('disponibilites.index') }}">Retour</a>
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


    <form action="{{ route('disponibilites.store') }}" method="POST">
    	@csrf


         <div class="row">
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
                <label for="lundi" class="col-md-4 control-label">Lundi :</label>
                    <select name="lundi" id="lundi-select">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Indisponible</option>
                    </select>
		    </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
                <label for="mardi" class="col-md-4 control-label">Mardi :</label>
                    <select name="mardi" id="mardi-select">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Indisponible</option>
                    </select>
		    </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
                <label for="mercredi" class="col-md-4 control-label">Mercredi :</label>
                    <select name="mercredi" id="mercredi-select">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Indisponible</option>
                    </select>
		    </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
                <label for="jeudi" class="col-md-4 control-label">jeudi :</label>
                    <select name="jeudi" id="jeudi-select">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Indisponible</option>
                    </select>
		    </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
                <label for="vendredi" class="col-md-4 control-label">Vendredi :</label>
                    <select name="vendredi" id="vendredi-select">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Indisponible</option>
                    </select>
		    </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection