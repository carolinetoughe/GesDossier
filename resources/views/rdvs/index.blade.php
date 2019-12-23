@extends('layouts/approle')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion Des Rendez-Vous</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('rdvs.create') }}"> Creer Nouveau Rendez-Vous</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-striped">
 <tr>
  
  <th width="35%">Date</th>
  <th width="35%">Nom Patient</th>
  <th width="35%">Nom Medecin</th>

  <th width="30%">Actions</th>
 </tr>
 @foreach($rdvs as $rdv)
  <tr>
  
   <td>{{ $rdv->date }}</td>
   <td>{{ $rdv->patient->nom }}</td>
   <td>{{ $rdv->user->name }}</td>

   <td>
                <form action="{{ route('rdvs.destroy',$rdv->id) }}" method="POST">
               
                    <a href="{{ route('rdvs.edit', $rdv->id) }}" class="btn btn-warning">Modifier</a>
                    @csrf
                    @method('DELETE')
                    @can('rdv-delete',Rdv::class)
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
	        </td>
  </tr>
 @endforeach
</table>
{{-- {!! $rdvs->links() !!} --}}
@endsection