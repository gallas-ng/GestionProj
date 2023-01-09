@extends('master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Projet Details</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('projets.index')}}">Go Back to Projets</a>
	</div>
    <div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('phases.create',$projet->id)}}">Create New Phase</a>
	</div>
</div>
<div class="row">
	<div class="col-12 mb-3">
		<strong>Nom: </strong>
		{!! $projet->nom !!}
	</div>
	<div class="col-12 mb-3">
		<strong> Description: </strong>
		{!! $projet->Description !!}
	</div>


    <div class="row">
	<div class="col-12">
		<table class="table table-primary">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nom</th>
		      <th scope="col">Duree</th>
		      <th scope="col">Priorite</th>
		      <th scope="col">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
               
            @if($projet->count() > 0) 
                @foreach($phases as $phase)
			    <tr>
			      <td>{{$loop->index + 1}}</td>
			      <td>{{$phase->nom}}</td>
			      <td>{{$phase->duree}}</td>
			      <td>{{$phase->priorite}}</td>
			      <td>
  	                <form action="{{ route('phases.destroy', $phase->id) }}" method="POST">
                    	<a class="btn btn-primary" href="{{ route('phases.edit_phase', $phase->id) }}">Edit</a>
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
		
	</div>
</div>

    
    
</div>
@endsection