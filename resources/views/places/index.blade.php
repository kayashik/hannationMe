@extends('main')

@section('title', '| Places')

@section('content')


        <div class="content">
             <div class="title m-b-md">
                 Place Main page
             </div>
		
             <div class="col-md-4 col-md-offset-4">
			<a href="{{ route('places.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Place</a>
			</div>

				<div class="clearfix"></div>

			@if (!$places->isEmpty())

			<div class=" col-offset-2">
				<table class="table event-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Type</th>
							<th>Description</th>
							<th>Fitures</th>
							<th>Address</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($places as $place) 
						<tr>
								<td>{{ $place->id }}</td>
								<td>{{ $place->name }}</td>
								<td>{{ $place->type }}</td>
								<td>{{ substr($place->description, 0, 15) }}{{ strlen($place->description)>30 ? '...': '' }}</td>
								<td>{{ substr($place->fitures, 0, 15) }}{{ strlen($place->fitures)>30 ? '...': '' }}</td>
								<td>{{ substr($place->address, 0, 30) }}{{ strlen($place->fitures)>30 ? '...': '' }}</td>
								<td><a href="{{ route('places.show', $place->id)}}" class="btn btn-default btn-sm">View</a>
									<a href="{{ route('places.edit', $place->id) }}" class="btn btn-default btn-sm">Edit</a></td>
				                    </form>
								</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		
		@else
			<h1>Create Your First Interestig Place!</h1>
		@endif

		<!-- $myfirst->my_first_function() -->
        </div>

@stop
