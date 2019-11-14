@extends('patient/parent')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('patient.liste') }}" class="btn btn-default">Retour</a>
            </div>
            <br />
     <form method="post" action="{{ route('patient.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Prenom</label>
       <div class="col-md-8">
        <input type="text" name="prenom" value="{{ $data->prenom }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Nom</label>
       <div class="col-md-8">
        <input type="text" name="nom" value="{{ $data->nom }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Sexe Patient</label>
       <div class="col-md-8">
        <input type="text" name="sexe" value="{{ $data->sexe }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Date Naissance</label>
       <div class="col-md-8">
        <input type="date" name="datenaissance" value="{{ $data->datenaissance }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Nationalite</label>
       <div class="col-md-8">
        <input type="text" name="nationalite" value="{{ $data->nationalite }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Adresse</label>
       <div class="col-md-8">
        <input type="text" name="adresse" value="{{ $data->adresse }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Groupe Sanguin</label>
       <div class="col-md-8">
        <input type="text" name="groupesanguin" value="{{ $data->groupesanguin }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Numero telephone</label>
       <div class="col-md-8">
        <input type="text" name="numerotelephone" value="{{ $data->numerotelephone }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Nom Urgence</label>
       <div class="col-md-8">
        <input type="text" name="nomurgence" value="{{ $data->nomurgence }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Numero Urgence</label>
       <div class="col-md-8">
        <input type="text" name="numerourgence" value="{{ $data->numerourgence }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Email</label>
       <div class="col-md-8">
        <input type="email" name="email" value="{{ $data->email }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Entrer Mot De Passe</label>
       <div class="col-md-8">
        <input type="password" name="password" value="" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Choisir Image de Profil</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Modifier" />
      </div>
     </form>

@endsection

