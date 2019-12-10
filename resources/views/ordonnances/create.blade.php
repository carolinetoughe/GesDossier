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


    <form action="" method="POST">
    	@csrf

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Date:</strong>
		            <input  type="text" name="date" class="form-control" value="{{$consultation->date}}">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <label for="consultation_id" class="col-md-4 control-label">Consultation :</label>

                    
                    <input  type="text" name="consultation_id" id="" value="{{isset($consultation) ? $consultation->id : 'ttttt'}}">
                         
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Analyses:</strong>
            <br/>

            @foreach($analyses as $analyse)
                <input type="checkbox" name="analyses[]" id="{{ $analyse->nom }}" value="{{ $analyse->id }}">
                <label for="{{ $analyse->nom }}">{{ $analyse->nom }}</label>
                <br>
            @endforeach

            </div>
          
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection