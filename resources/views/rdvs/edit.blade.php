@extends('layouts.approle')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier Rendez-vous</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('rdvs.index') }}">Retour</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($rdvs, ['method' => 'PATCH','route' => ['rdvs.update', $rdvs->id]]) !!}
<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {!! Form::text('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
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
                                                <label for="user_id" class="col-md-4 control-label">Nom Medecin :</label>
                                                
                                                    <select name="user_id" class="form-control">
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                            
                        </div>
                        </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>

</div>
{!! Form::close() !!}

@endsection