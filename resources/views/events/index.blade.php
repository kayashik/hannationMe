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
        </div>

@stop