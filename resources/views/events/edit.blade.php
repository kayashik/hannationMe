
@extends('main')

@section('title', '| Single Event')

@section('content')

       
    <div class="col-md-6 col-md-offset-3">
       <div class="title ">
                 Edit Page
        </div>
    </div>

<form class="form-horizontal" role="form" method="POST" action="{{ route('events.update', $event->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ isset($event->title) ? $event->title : old('title') }}" required autofocus>                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ isset($event->slug) ? $event->slug : old('slug') }}" required autofocus>
                             </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="imgUR" class="col-md-4 control-label">Img URL</label>
                            <div class="col-md-6">
                                <input id="imgUR" type="text" class="form-control" name="imgUR" value="{{ isset($event->imgUR) ? $event->imgUR : old('imgUR') }}" required autofocus>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Describe your event</label>
                            <div class="col-md-6">
                                <textarea id="description" rows="5" class="form-control" name="description" value="{{ isset($event->description) ? $event->description : old('description') }}" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="specialOffers" class="col-md-4 control-label">Describe Special Offers</label>
                            <div class="col-md-6">
                                <textarea id="specialOffers" rows="5" class="form-control" name="specialOffers" value="{{ isset($event->specialOffers) ? $event->specialOffers : old('specialOffers') }}" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="eventDateTime" class="col-md-4 control-label">When will you event be?</label>
                            <div class="col-md-6">
                                <input id="eventDateTime" type="datetime-local" class="form-control" name="eventDateTime" value="{{ isset($event->eventDateTime) ? $event->eventDateTime : old('eventDateTime') }}" required>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-lg btn-block my-btn">
                                        Save Changes
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('events.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>

@stop