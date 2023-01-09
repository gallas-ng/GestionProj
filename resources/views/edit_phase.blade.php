@extends('master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Edit Phase</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('projets.show')}}">Go Back to Phases</a>
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
		<form method="POST" action="{{route('phase.update', $phase->id)}}">
			@csrf
			@method('PUT')
			<div class="mb-3">
			    <label for="nom" class="form-label">Nom</label>
			    <input type="text" class="form-control" id="nom" name="nom" value="{{phase->nom}}" ">
		  	</div>
		  	<div class="mb-3">
			    <label for="duree" class="form-label">Duree</label>
			    <input type="number" class="form-control" id="duree" name="duree" value="{{phase->duree}}"></textarea>
		  	</div>
		  	<div class="mb-3">
			    <label for="priorite" class="form-label">Priorite</label>
                <select class="form-control" name="priorite">
                    @foreach(["Elevee" => "Elevee", "Moyenne" => "Moyenne", "Faible" => "Faible"] AS $priorite => $contactLabel)    
                    <option value="{{ $priorite }}" {{ old("priorite", $phase->priorite) == $priorite ? "selected" : "" }}>{{ $contactLabel }}</option>
                    @endforeach
                </select>
		  	</div>
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection