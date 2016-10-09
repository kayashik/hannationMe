@extends('main')

@section('title', '| Create Event')

@section('content')


       <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="event-create">Create New Event</h1>
			<hr>

			 <form class="form-horizontal" role="form" method="POST" action="{{ route('events.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required autofocus>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imgURL') ? ' has-error' : '' }}">
                            <label for="imgURL" class="col-md-4 control-label">Img URL</label>

                            <div class="col-md-6">
                                <input id="imgURL" type="text" class="form-control" name="imgURL" value="{{ old('imgURL') }}" required autofocus>

                                @if ($errors->has('imgURL'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imgURL') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Describe your event</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="5" class="form-control" name="description" value="{{ old('description') }}" required></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('specialOffers') ? ' has-error' : '' }}">
                            <label for="specialOffers" class="col-md-4 control-label">Describe Special Offers</label>

                            <div class="col-md-6">
                                <textarea id="specialOffers" rows="5" class="form-control" name="specialOffers" value="{{ old('specialOffers') }}" required></textarea>

                                @if ($errors->has('specialOffers'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('special-offers') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('eventDateTime') ? ' has-error' : '' }}">
                            <label for="eventDateTime" class="col-md-4 control-label">When will you event be?</label>

                            <div class="col-md-6">
                                <input id="eventDateTime" type="datetime-local" class="form-control" name="eventDateTime" value="{{ old('eventDateTime') }}" required>

                                @if ($errors->has('eventDateTime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eventDateTime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-lg btn-block my-btn">
                                        Create
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('events.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
			
		</div>
	</div>

@stop
