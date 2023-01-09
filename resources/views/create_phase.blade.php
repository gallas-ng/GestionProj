@extends('master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Create New Phase</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('projets.index')}}">Go Back to Phase</a>
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
		<form method="POST" action="{{route('phases.store', $projet->id)}}">
			@csrf
            
			<div class="mb-3">
			    <label for="nom" class="form-label">Nom</label>
			    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom projet ">
		  	</div>
		  	<div class="mb-3">
			    <label for="duree" class="form-label">Duree</label>
			    <input type="number" class="form-control" id="duree" name="duree" placeholder="duree"></textarea>
		  	</div>
		  	<div class="mb-3">
			    <label for="priorite" class="form-label">Priorite</label>
                <select name="priorite" id="priorite">
                    <option value="" selected>Choix</option>
                    <option value="Elevee" >Elevee</option>
                    <option value="Moyenne" >Moyenne</option>
                    <option value="Faible" >Faible</option>
                </select>
		  	</div>
            <input type="text" name="id" id="id" value="{{$projet->id}}">
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection