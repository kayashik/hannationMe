
@extends('main')

@section('title', '| Single Event')

@section('content')

       
    <div class="col-md-6 col-md-offset-3">
       <div class="title ">
                 Edit Page
        </div>
    </div>

    {!! Form::model($event, ['route' => ['events.update', $event->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
    
            <div class="form-group">
                {{ Form::label('title', 'Title:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('slug', 'Slug:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::text('slug', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('imgURL', 'Img URL:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::text('imgURL', null, ['class' => 'form-control']) }}
                </div>
            </div>
            
            <div class="form-group">
                {{ Form::label('description', 'Description:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('specialOffers', 'Special Offers:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::textarea('specialOffers', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('eventDateTime', 'Date and Time:', ['class' => 'col-md-4 control-label'])}}
                <div class="col-md-6">
                    {{ Form::input('datetime-local', 'eventDateTime', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="col-md-6">
                                    {{Form::submit('Save Changes', ['class' => 'btn btn-success btn-lg btn-block my-btn']) }} 
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('events.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
                                </div>
                            </div>
                        </div>
        

        {!! Form::close() !!} 



@stop

