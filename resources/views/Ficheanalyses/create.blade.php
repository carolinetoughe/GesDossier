@extends('layouts.approle')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Nouvelle Fiche Analyse</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ficheanalyses.index') }}">Retour</a>
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


    <form action="{{ route('ficheanalyses.store') }}" method="POST">
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
            <label for="consultation_id" class="col-md-4 control-label">Id Consultation :</label>
                            
                            <select name="consultation_id" class="form-control">
                                @foreach($consultations as $consultation)
                                    <option value="{{ $consultation->id }}">{{ $consultation->id }}</option>
                                @endforeach
                            </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Analyses:</strong>
            <br/>
            @foreach($analyses as $value)
                <label>{{ Form::checkbox('analyse_id[]', $value->id, false, array($value, (array) Analyse::old('analyses'))) . ' ' . __('analyses.' . $value) }}
                {{ $value->nom }} </label>
            <br/>
            @endforeach
            </div>
          
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection