@extends('main')

@section('title', '| Single Place')

@section('content')


       <div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h1 class="event-single">{{ $place->name }}</h1>
			<hr>

            <div class="card">

              <div class="card-block">
                <h2 class="card-text"><b>Type:</b> {{ $place->type }}</h2>
              </div>

              <div class="card-block">
                <p class="card-text"><b>Fitures:</b> {{ $place->fitures }}</p>
              </div>

              <div class="card-block">
                @if($place->imgURL != 'NULL')
                  <img src="{{ asset($place->imgURL) }}" class="event-img">
                @endif
                @if($place->videoURL != 'NULL')
                  <video src="{{ asset($place->videoURL) }}" class="event-img">
                @endif
              </div>

              <div class="card-block">
                <p class="card-text"><b>Description:</b> {{ $place->description }}</p>
              </div>


            </div>

            <div class="col-md-6 col-md-offset-2">
            <a href="{{ route('places.index') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"><< Return to the List of Places</a>
            </div>			
		</div>

        <div class="col-md-3">
            <div class="panel panel-info event-panel">
                <div class="panel-body">
                    {{ $place->name}}
                </div>
                <div class="panel-footer">
                    <p><b>Category/Subcategory:</b>  @if(isset($subcategory->category->name)){{ $subcategory->category->name }} @else NO CATECORY @endif/@if(isset($subcategory->name)){{ $subcategory->name }} @else NO SUBCATECORY @endif</p>
                    <p><b>Working Hours:</b> {{ $place->work_hours }}</p>
                    <p><b>Everage price:</b> {{ $place->everage_price }}</p>
                    <p><b>Address:</b> {{ $place->address }}</p>
                    <hr class="in_card">
                    <p><b>Created at</b> {{date("M j, Y h:ia", strtotime($place->created_at)) }}</p>
                    <p><b>Updated at</b> {{ date("M j, Y h:ia", strtotime($place->updated_at)) }} </p>
                    <p><a href="{{ route('places.edit', $place->id) }}" class="btn btn-sm btn-block btn-default">Edit</a></p>
                    <form action="{{ route('places.destroy', $place->id)}}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-block btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

	</div>

@stop