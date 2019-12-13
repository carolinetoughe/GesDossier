@extends('layouts.approle')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier Antecedent</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('antecedents.index') }}">Retour</a>
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


{!! Form::model($antecedents, ['method' => 'PATCH','route' => ['antecedents.update', $antecedents->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom:</strong>
            {!! Form::text('nom', null, array('placeholder' => 'Intitulé','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Traitement:</strong>
                {!! Form::text('traitement', null, array('placeholder' => 'Traitements','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                                        <label for="patient_id" class="col-md-4 control-label">Nom Patient :</label>
                                        
		            <input  type="text" name="patient" class="form-control" value="{{$antecedents->nom}}">
                                            
                                    
                </div>
                </div>
               

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>

</div>
{!! Form::close() !!}

@endsection