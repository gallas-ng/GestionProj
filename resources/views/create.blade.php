@extends('master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Create New Projet</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('projets.index')}}">Go Back to Projets</a>
	</div>
</div>
@if($errors->any())
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Some error occured!</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  <ul>
		  	@foreach($errors->all() as $error)
		  	<li>{{$error}}</li>
		  	@endforeach
		  </ul>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<form method="POST" action="{{route('projets.store')}}">
			@csrf
			<div class="mb-3">
			    <label for="nom" class="form-label">Nom</label>
			    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom projet ">
		  	</div>
		  	<div class="mb-3">
			    <label for="Description" class="form-label">Description</label>
			    <textarea class="form-control" id="Description" name="Description" placeholder="Description"></textarea>
		  	</div>
		  	<div class="mb-3">
			    <label for="date_debut" class="form-label">Date de debut</label>
			    <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="date_debut"></textarea>
		  	</div>
		  	<div class="mb-3">
			    <label for="date_fin" class="form-label">Date de fin</label>
			    <input type="date" class="form-control" id="date_fin" name="date_fin" placeholder="date_fin"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection