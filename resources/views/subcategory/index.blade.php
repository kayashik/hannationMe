@extends('main')

@section('title', '| Subcategories')

@section('content')


        <div class="content">
             <div class="title m-b-md">
                 Subcategories Main page
             </div>

              @if(isset($flag))
				<div class="card my-card-subt">
					<h1 class="category_subtitle">This Subategory!</h1>

					{!! Form::model( $subcategory_edit, ['route' => ['subcategories.update', $subcategory_edit->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

					<div class="form-group">
			            {{ Form::label('name', 'New Name:', ['class' => 'col-md-4 control-label'])}}
			            <div class="col-md-6">
			                {{ Form::text('name', null, ['class' => 'form-control']) }}
			            </div>
			        </div>
					
					<div class="form-group">
				        {{ Form::label('category_id', 'Change Category:', ['class' => 'col-md-4 control-label'])}}
				        <div class="col-md-6">
							{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
						</div>
					</div>

			        <div class="col-md-6 col-md-offset-4">
				        {{Form::submit('Save Changes', ['class' => 'btn btn-lg btn-block btn-primary']) 	}} 
				    </div>

					{!! Form::close() !!}
				</div>

			@else

	             {!! Form::open(['route' => 'subcategories.store', 'class' => 'form-horizontal', 'method'=> 'POST']) !!}

	             <div class="form-group">
	                {{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label'])}}
	                <div class="col-md-6">
	                    {{ Form::text('name', null, ['class' => 'form-control']) }}
	                </div>
	            </div>

				 <div class="form-group">
	            	{{ Form::label('category_id', 'Category:', ['class' => 'col-md-4 control-label']) }}
	            	<div class="col-md-6">
					{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
					</div>
				</div>

					<div class="clearfix"></div>
					<div class="col-md-6 col-md-offset-4">
	            	{{Form::submit('Create New Category', ['class' => 'btn btn-lg btn-block btn-primary']) }} 
	            	</div>
	            	
				{!! Form::close() !!}
			
			@endif
			
			<div class="clearfix"></div>

		
			@if (!$subcategories->isEmpty())

			<div class=" col-md-offset-3 col-md-7">
				<table class="table event-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Category</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($subcategories as $subcategory) 
						<tr>
								<td>{{ $subcategory->id }}</td>
								<td>{{ $subcategory->name }}</td>
								<td>{{ $subcategory->category->name }}</td>
								<td>{!! Form::open(['route' => ['subcategories.destroy', $subcategory->id], 'class' => 'small-menu-btn', 'method'=> 'DELETE']) !!}
										{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }} 
									{!! Form::close() !!}
									{!! Form::open(['route' => ['subcategories.edit', $subcategory->id], 'class' => 'small-menu-btn', 'method'=> 'GET']) !!}
										{{Form::submit('Edit', ['class' => 'btn btn-default btn-sm']) }} 
									{!! Form::close() !!}
								</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		
		@else
			<h1 class="category_subtitle">Create Your First SubCategory!</h1>
		@endif

		<!-- $myfirst->my_first_function() -->
        </div>
		<div class="clearfix"></div>
@stop