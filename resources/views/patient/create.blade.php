@extends('patient/parent')

@section('main')
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
  <label class="col-md-4 text-right">Enter Prenom Name</label>
  <div class="col-md-8">
   <input type="text" name="prenom" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Entrer nom</label>
  <div class="col-md-8">
   <input type="text" name="nom" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />


   <div class="form-group">
    <label class="col-md-4 text-right">Enter Numero Piece identite</label>
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
   {{-- <input type="text" name="sexe" class="form-control input-lg" /> --}}
   <label for="sexe" class="col-md-4 control-label">Sexe :</label>
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
  <label class="col-md-4 text-right">Enter Date Naissance</label>
  <div class="col-md-8">
   <input type="date" name="datenaissance" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Adresse</label>
  <div class="col-md-8">
   <input type="text" name="adresse" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Nationalite</label>
  <div class="col-md-8">
   <input type="text" name="nationalite" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Groupe Sanguin</label>
  <div class="col-md-8">
   {{-- <input type="text" name="groupesanguin" class="form-control input-lg" /> --}}
   <label for="groupesanguin" class="col-md-4 control-label">Groupe Sanguin :</label>
   <select name="groupesanguin" id="groupesanguin-select">
       <option value="aplus">A+</option>
       <option value="amoins">A-</option>
       <option value="bplus">B+</option>
       <option value="bmoins">B-</option>
       <option value="abplus">AB+</option>
       <option value="abmoins">AB-</option>
       <option value="oplus">O+</option>
       <option value="omoins">O-</option>
       <option value="inconnu">Inconnu</option>



       
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
    <label for="civilite" class="col-md-4 control-label">Situation Matrimoniale :</label>
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
  <label class="col-md-4 text-right">Enter Nom Urgence</label>
  <div class="col-md-8">
   <input type="text" name="nomurgence" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Numero Urgence</label>
  <div class="col-md-8">
   <input type="text" name="numerourgence" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Enter Email</label>
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
  <label class="col-md-4 text-right">Select Profile Image</label>
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
