@extends('layouts.approle')


@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

<form method="post" action="{{ route('patient.create') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Prenom(s)</label>
  <div class="col-md-8">
   <input type="text" name="prenom" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Entrer nom(s)</label>
  <div class="col-md-8">
   <input type="text" name="nom" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />


   <div class="form-group">
    <label class="col-md-4 text-right">Entrer Numero Piece identite</label>
    <div class="col-md-8">
     <input type="text" name="pieceidentite" class="form-control input-lg" />
    </div>
   </div>
   <br />
   <br />
   <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Sexe</label>
  <div class="col-md-8">
  
   <select name="sexe" id="sexe-select">
       <option value="feminin">Feminin</option>
       <option value="masculin">Masculin</option>
   </select>
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Date Naissance</label>
  <div class="col-md-8">
   <input type="date" name="datenaissance" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Adresse</label>
  <div class="col-md-8">
   <input type="text" name="adresse" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Nationalite</label>
  <div class="col-md-8">
   <input type="text" name="nationalite" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Groupe Sanguin</label>
  <div class="col-md-8">
   {{-- <input type="text" name="groupesanguin" class="form-control input-lg" /> --}}
   <label for="groupesanguin" class="col-md-4 control-label">Groupe Sanguin :</label>
   <select name="groupesanguin" id="groupesanguin-select">
       <option value="A+">A+</option>
       <option value="A-">A-</option>
       <option value="B+">B+</option>
       <option value="B-">B-</option>
       <option value="AB+">AB+</option>
       <option value="AB-">AB-</option>
       <option value="O+">O+</option>
       <option value="O-">O-</option>
       <option value="Inconnu">Inconnu</option>



       
   </select>
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Numero </label>
  <div class="col-md-8">
   <input type="text" name="numerotelephone" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
    <label for="civilite" class="col-md-4 text-right">Situation Matrimoniale :</label>
   <select name="civilite" id="civilite-select">
       <option value="celibataire">Celibataire</option>
       <option value="marie">Marié(e)</option>
       <option value="veuf">Veuf ou Veuve</option>
       <option value="divorce">Divorcée</option>

   </select>
   </div>
   <br />
   <br />
   <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Nom Urgence</label>
  <div class="col-md-8">
   <input type="text" name="nomurgence" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Numero Urgence</label>
  <div class="col-md-8">
   <input type="text" name="numerourgence" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Entrer Email</label>
  <div class="col-md-8">
   <input type="email" name="email" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Selectionner Image Temporaire</label>
  <div class="col-md-8">
   <input type="file" name="image" />
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Creer Nouveau Dossier" />
 </div>

</form>

@endsection
