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
                <img src="{{ asset('img/party.jpg') }}" class="event-img">
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
                    <p><b>Cathegory</b> some-randome-cathegory</p>
                    <p><b>Place</b> some-randome-place</p>
                    <p><b>slug</b> some-randome-slug</p>
                    <p><b>URL event</b> some-randome-url</p>
                    <form action="{{ route('events.destroy', $event->id)}}" method="DELETE">
                      {{ csrf_field() }}
                        <button class="btn btn-sm btn-block btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

	</div>

@stop