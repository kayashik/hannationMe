@extends('main')

@section('title', '| Create Place')

@section('content')


       <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="event-create">Create New Place</h1>
			<hr>

              {!! Form::open(['route' => 'places.store', 'class' => 'form-horizontal', 'method'=> 'POST']) !!}

                 <div class="form-group">
                    {{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('slug', 'Slug:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('slug', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('subcategory_id', 'Subcategory:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                    {{ Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('imgURL', 'Img URL:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('imgURL', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('videoURL', 'Video URL:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('videoURL', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('type', 'Type:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'What do you think your place is?']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('fitures', 'Fitures:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::textarea('fitures', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Describe special fitufers of your own place']) }}
                    </div>
                </div>

                 <div class="form-group">
                    {{ Form::label('everage_price', 'Everage Price:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('everage_price', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Describe your place']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Address:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'China, Wuhan, Guangu Square, 60']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('work_hours', 'Working hours:', ['class' => 'col-md-4 control-label'])}}
                    <div class="col-md-6">
                        {{ Form::text('work_hours', null, ['class' => 'form-control', 'placeholder' => '17:0-04:00 or 21:00-till last customer']) }}
                    </div>
                </div>

                    <div class="clearfix"></div>
                    <div class="col-md-6 col-md-offset-4">
                        <div class="col-md-6">
                            {{Form::submit('Save', ['class' => 'btn btn-lg btn-block btn-primary']) }} 
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('places.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
                        </div>
                    </div>
                    
                {!! Form::close() !!}
			
		</div>
	</div>

@stop

