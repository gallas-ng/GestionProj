@extends('master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Laravel 9  Gestion de Projet</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('projets.create')}}">Create New Projet</a>
	</div>
</div>
@if($message = Session::get('error'))
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>{{$message}}!</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<table class="table table-primary">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nom</th>
		      <th scope="col">Description</th>
		      <th scope="col">Date de debut</th>
		      <th scope="col">Date de fin</th>
		      <th scope="col">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
	  		@if($projets->count() > 0)
			  	@foreach($projets as $projet)
			    <tr>
			      <td>{{$loop->index + 1}}</td>
			      <td>{{$projet->nom}}</td>
			      <td>{{$projet->Description}}</td>
			      <td>{{$projet->date_debut}}</td>
			      <td>{{$projet->date_fin}}</td>
			      <td>
  	                <form action="{{ route('projets.destroy', $projet->id) }}" method="POST">
                    	<a class="btn btn-info" href="{{ route('projets.show', $projet->id) }}">Show</a>
                    	<a class="btn btn-primary" href="{{ route('projets.edit', $projet->id) }}">Edit</a>
	                    @csrf
	                    @method('DELETE')
	                    <button type="submit" class="btn btn-danger">Delete</button>
                	</form>
			      </td>
			    </tr>
			    @endforeach
		    @else
		    <tr>
		      <td colspan="4">Record not found!</td>
		    </tr>
		    @endif
		  	</tbody>
		</table>
		{!! $projets->links() !!}
	</div>
</div>
@endsection