@extends('layouts/approle')

@section('content')
<div align="right">
  <a href="{{ route('patient.create') }}" class="btn btn-success btn-sm ">Ajouter patient</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<input type="search" id="myInput" onkeyup="myFunction()" placeholder="Rechercher">
<table class="table table-bordered table-striped" id="myTable">
 <tr>
  <th width="10%">Image</th>
  <th width="35%">Prenom</th>
  <th width="35%">Nom</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->prenom }}</td>
   <td>{{ $row->nom }}</td>
   <td>
    <a href="{{ route('patient.show', $row->id) }}" class="btn btn-primary">Voir Plus</a>
    <a href="{{ route('patient.edit', $row->id) }}" class="btn btn-warning">Modifier</a>
    <form id="deleteForm-{{$row->id }}" method="POST" action="{{ route('patient.destroy', $row->id) }}" style="display:none;">
    {{csrf_field()}}
    {{method_field('delete')}}
    </form>
    <button onclick="delete_stud()">Supprimer</button> </td>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
var delete_stud = function(){
		if(confirm("voulez vous supprimer ce patient?"))
		{
			document.getElementById=('deleteForm-{{$row->id }}').submit();
		}
	}
</script>
