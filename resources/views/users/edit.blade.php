@extends('layouts.approle')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prenom:</strong>
            {!! Form::text('prenom', null, array('placeholder' => 'Prenom','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adresse:</strong>
            {!! Form::text('adresse', null, array('placeholder' => 'Adresse','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero Telephone:</strong>
            {!! Form::text('numerotelephone', null, array('placeholder' => 'Numero','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    @foreach($jours as $jour)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $jour->name }}                         
                                <button type="button" id="{{ $jour->id }}" class="btn btn-info btn-xs pull-right add_plage">Ajouter une plage horaire</button>
                            </h3>
                        </div>
                        <div class="panel-body">
                            @foreach($jour->users as $user)
                                <div class="ligne">
                                    <div class="row form-group">
                                        <div class="col-sm-10"> 
                                            <label for="{{ 'start' . $index }}" class="col-sm-4 control-label">Heure de début :</label>
                                            <div class="col-sm-8 input-group date">
                                                <input class="form-control" name="{{ 'start[' . $jour->id . '][]' }}" id ="{{ 'start_' . $index++ }}" type="text" value="{{ $user->debut }}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-10"> 
                                            <label for="{{ 'end_' . $index }}" class="col-sm-4 control-label">Heure de fin :</label>
                                            <div class="col-sm-8 input-group date">
                                                <input class="form-control" name="{{ 'end[' . $jour->id . '][]' }}" id ="{{ 'end_' . $index++ }}" type="text" value="{{ $usert->pivot->fin }}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>                                            
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </div>    
                                    </div>    
                                </div>                        
                            @endforeach
                        </div>
                    </div>
                @endforeach
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
 
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            // Initialisation des DateTimePicker
            $('.date').datetimepicker({ locale: 'fr', format: 'LT' });
 
            // Initialisation index pour étiquettes
            var index = {{ $index }};
 
            // Suppression d'une ligne de réponse (utilisation de "on" pour gérer les boutons créés dynamiquement)
            $(document).on('click', '.btn-danger', function(){
                $(this).parents('.ligne').remove(); 
            });
 
            // Ajout d'une ligne de plage horaire
            $('.add_plage').click(function() {
                var html = '<div class="ligne">\n'
                + '<div class="row form-group">\n'
                + '<div class="col-sm-10">\n' 
                + '<label for="start' + index++ + '" class="col-sm-4 control-label">Heure de début :</label>\n'
                + '<div class="col-sm-8 input-group date">\n'
                + '<input class="form-control" name="start[' + $(this).attr("id") + '][]" id ="' + index++ + '" type="text">\n'
                + '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>\n'
                + '</div></div></div>\n'
                + '<div class="row form-group">\n'
                + '<div class="col-sm-10">\n' 
                + '<label for="end' + index++ + '" class="col-sm-4 control-label">Heure de fin :</label>\n'
                + '<div class="col-sm-8 input-group date">\n'
                + '<input class="form-control" name="end[' + $(this).attr("id") + '][]" id ="' + index++ + '" type="text">\n'
                + '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>\n'
                + '</div></div>\n'
                + '<div class="col-sm-2"><button type="button" class="btn btn-danger">Supprimer</button></div></div>\n'
                + '</div>\n';
                $(this).parents('.panel').find('.panel-body').append(html); 
                $('.date').datetimepicker({ locale: 'fr', format: 'LT' });
            });
 
            // Soumission 
            $(document).on('submit', 'form', function(e) {  
                e.preventDefault();
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json"
                })
                .done(function(data) {
                    window.location.href = '{!! url('restaurant') !!}';
                })
                .fail(function(data) {
                    var obj = data.responseJSON;
                    // Nettoyage préliminaire                   
                    $('.help-block').text('');
                    $('.form-group').removeClass('has-error');  
                    $('.alert').addClass('hidden');                 
                    // Balayage de l'objet
                    $.each(data.responseJSON, function (key, value) {
                        // Traitement du nom
                        if(key == 'name') {
                            $('.help-block').eq(0).text(value);
                            $('.form-group').eq(0).addClass('has-error');                           
                        }
                        // Traitement des erreurs des plages horaires
                        else {
                            $('.alert').removeClass('hidden');                              
                        }
                    });
                });
            });
        });
    </script>
@endsection