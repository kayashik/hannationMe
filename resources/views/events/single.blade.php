@extends('main')

@section('title', '| Single Event')

@section('content')


       <div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h1 class="event-single">{{ $event->title }}</h1>
			<hr>

            <div class="card">

              <div class="card-block">
                <p class="card-text"><b>Description:</b> {{ $event->description }}</p>
              </div>

              <div class="card-block">
                <img src="{{ asset($event->imgURL) }}" class="event-img">
              </div>

              <div class="card-block">
                <p class="card-text"><b>Special offers:</b> {{ $event->specialOffers }}</p>
              </div>

              <div class="card-block">
                <p class="card-text"><b>Date:</b> {{ date('jS  F  Y, G:i',strtotime($event->eventDateTime)) }}</p>
              </div>

            </div>

            <div class="col-md-6 col-md-offset-2">
            <a href="{{ route('events.index') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"><< Return to the List of Events</a>
            </div>			
		</div>

        <div class="col-md-3">
            <div class="panel panel-info event-panel">
                <div class="panel-body">
                    {{ $event->title}}
                </div>
                <div class="panel-footer">
                    <p><b>Place:</b> {{ $event->place->name }}</p>
                    <p><b>slug</b> {{ $event->slug }}</p>
                    <p><b>URL img</b> {{ $event->imgURL }}</p>
                    <hr class="in_card">
                    <p><b>Created at</b> {{date("M j, Y h:ia", strtotime($event->created_at)) }}</p>
                    <p><b>Updated at</b> {{ date("M j, Y h:ia", strtotime($event->updated_at)) }} </p>
                    <p><a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-block btn-default">Edit</a></p>
                    <form action="{{ route('events.destroy', $event->id)}}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-block btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

	</div>

@stop