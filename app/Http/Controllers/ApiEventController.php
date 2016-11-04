<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\Session;

class ApiEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events  = Event::all();

        return response()->json($events);
    }

    public function show($id){
  
        $event  = Event::find($id);
  
        return response()->json($event);
    }

    public function create(Request $request){
  
        $$this->validate($request, [
                'title' => 'required|max:20',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:events,slug',
                'imgURL' => 'required|max:20',
                'description' => 'required|min:5|max:1000',
                'specialOffers' => 'required|min:5|max:1000',
                'eventDateTime' => 'required',
            ]);

        $event = new Event;

        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->imgURL = $request->imgURL;
        $event->description = $request->description;
        $event->specialOffers = $request->specialOffers;
        $event->eventDateTime = $request->eventDateTime;

        $event->place()->associate($request->place_id); 

        $event->save();
  
        return response()->json($event);
  
    }
  
  
    public function update(Request $request,$id){
        $event = Event::find($id);
        //validation
        if ($request->input('slug') == $event->slug){
            $this->validate($request, [
                'title' => 'required|max:20',
                'imgURL' => 'required|max:20',
                'description' => 'required|min:5|max:1000',
                'specialOffers' => 'required|min:5|max:1000',
                'eventDateTime' => 'required',
            ]);
        } else {
                $this->validate($request, [
                'title' => 'required|max:20',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:events,slug',
                'imgURL' => 'required|max:20',
                'description' => 'required|min:5|max:1000',
                'specialOffers' => 'required|min:5|max:1000',
               'eventDateTime' => 'required',
            ]);
            }

        // save the data to the DB

        $event->title = $request->input('title');
        $event->slug = $request->input('slug');
        $event->imgURL = $request->input('imgURL');
        $event->description = $request->input('description');
        $event->specialOffers = $request->input('specialOffers');
        $event->eventDateTime = $request->input('eventDateTime');

        $event->place()->associate($request->place_id); 

        $event->save();
  
        return response()->json($event);
    }

        public function delete($id){
        $event  = Event::find($id);
        $event->delete();
 
        return response()->json('deleted');
    }
}
