@extends('layouts/approle')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion Des Analyses</h2>
        </div>
        <div class="pull-right">
            @can('analyse-create',Analyse::class)
            <a class="btn btn-success" href="{{ route('analyses.create') }}"> Creer Nouvelle Analyse</a>
            @endcan
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
  <th width="10%">Id</th>
  <th width="35%">Nom</th>
  <th width="35%">Prix</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($analyses as $analyse)
  <tr>
  <td>{{ $analyse->id}}</td>
   <td>{{ $analyse->nom }}</td>
   <td>{{ $analyse->prix }}</td>
   <td>
                <form action="{{ route('analyses.destroy',$analyse->id) }}" method="POST">
                    @can('analyse-dit',Analyse::class)
                    <a href="{{ route('analyses.edit', $analyse->id) }}" class="btn btn-warning">Modifier</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('analyse-delete',Analyse::class)
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
	        </td>
  </tr>
 @endforeach
</table>
{!! $analyses->links() !!}
@endsection