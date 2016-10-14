@extends('main')

@section('title', '| Categories')

@section('content')


        <div class="content">
             <div class="title m-b-md">
                 Categories Main page
             </div>
		
             @if (!isset($flag))
	             {!! Form::open(['route' => 'categories.store', 'class' => 'form-horizontal', 'method'=> 'POST']) !!}

	             <div class="form-group">
	                {{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label'])}}
	                <div class="col-md-6">
	                    {{ Form::text('name', null, ['class' => 'form-control']) }}
	                </div>
	            </div>
					<div class="clearfix"></div>
					<div class="col-md-6 col-md-offset-4">
	            	{{Form::submit('Create New Category', ['class' => 'btn btn-lg btn-block btn-primary']) }} 
	            	</div>
	            	
				{!! Form::close() !!}
			@else 
			<div class="card my-card">
				<h1 class="category_subtitle">Rename This Category!</h1>

				{!! Form::model( $category_edit, ['route' => ['categories.update', $category_edit->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

				<div class="form-group">
		            {{ Form::label('name', 'New Name:', ['class' => 'col-md-4 control-label'])}}
		            <div class="col-md-6">
		                {{ Form::text('name', null, ['class' => 'form-control']) }}
		            </div>
		        </div>

		        <div class="col-md-6 col-md-offset-4">
			        {{Form::submit('Save Changes', ['class' => 'btn btn-lg btn-block btn-primary']) }} 
			    </div>

				{!! Form::close() !!}
			</div>
			@endif

			<div class="clearfix"></div>

		
			@if (!$categories->isEmpty())

			<div class=" col-md-offset-3 col-md-7">
				<table class="table event-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($categories as $category) 
						<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{!! Form::open(['route' => ['categories.destroy', $category->id], 'class' => 'small-menu-btn', 'method'=> 'DELETE']) !!}
										{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }} 
									{!! Form::close() !!}
									{!! Form::open(['route' => ['categories.edit', $category->id], 'class' => 'small-menu-btn', 'method'=> 'GET']) !!}
										{{Form::submit('Edit', ['class' => 'btn btn-default btn-sm']) }} 
									{!! Form::close() !!}
								</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		
		@else
			<h1 class="category_subtitle">Create Your First Category!</h1>
		@endif

		<!-- $myfirst->my_first_function() -->
        </div>
		<div class="clearfix"></div>
@stop