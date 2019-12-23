@extends('layouts.apppatient')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prendre Nouveau Rendez-vous</h2>

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


    <form action="{{ route('rdvs.store') }}" method="POST">
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
        
            <input  type="text" name="patient_id" class="form-control" hidden value="{{$patients->id}}">
                  
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

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Creer</button>
		    </div>
		</div>


    </form>

@endsection