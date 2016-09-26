@extends('main')

@section('title', '| Home')

@section('content')


        <div class="content">
             <div class="title m-b-md">
                 Event Main page
             </div>

             <div class="col-md-4 col-md-offset-4">
			<a href="{{ route('events.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Event</a>
			</div>

			<div class="clearfix"></div>

			<div class=" col-offset-2">
				<table class="table event-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Descriptions</th>
							<th>Special Offers</th>
							<th>Date</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($events as $event) 
						<tr>
								<td>{{ $event->id }}</td>
								<td>{{ $event->title }}</td>
								<td>{{ substr($event->description, 0, 30) }}{{ strlen($event->description)>30 ? '...': '' }}</td>
								<td>{{ substr($event->specialOffers, 0, 30) }}{{ strlen($event->specialOffers)>30 ? '...': '' }}</td>
								<td>{{ date('jS  F  Y, G:i',strtotime($event->eventDateTime)) }}</td>
								<td><a href="{{ route('events.show', $event->id)}}" class="btn btn-default btn-sm">View</a>
									<a href="{{ route('events.edit', $event->id) }}" class="btn btn-default btn-sm">Edit</a></td>
				                    </form>
								</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

        </div>

@stop