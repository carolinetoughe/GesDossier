@extends('layouts.apppatient')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Creer Nouveau Antecedent</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('antecedents.index') }}">Retour</a>
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


    <form action="{{ route('antecedents.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nom:</strong>
		            <input type="text" name="nom" class="form-control">
		        </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Traitement:</strong>
                        <input type="text" name="traitement" class="form-control">
                    </div>
                </div>
		   
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
                            <input  type="text" name="patient_id" class="form-control" hidden value="{{$patients->id}}">

                        
    </div>
    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection