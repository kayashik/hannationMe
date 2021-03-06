<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Place;
use Illuminate\Support\Facades\Session;
use App\Http\Events\Events\EventFactory;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10); 
       /* $myfirst = EventFactory::all();*/
     
        return view('events.index', ['events' => $events]); 
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        $pls = array();
        foreach ($places as $place) {
            $pls[$place->id] = $place->name;
        }
        return view('events.create', ['places' => $pls]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
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

        Session::flash('success', 'Your Event was created succesfully!');

        //redirect to another page
        return redirect()->route('events.show', $event->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.single', ['event'=> $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        $places = Place::all();
        $pls = array();
        foreach ($places as $place) {
            $pls[$place->id] = $place->name;
        }

        return view('events.edit', ['event' => $event, 'places' => $pls]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        Session::flash('success', 'Your Event was updated succesfully!');

        //redirect to another page
        return redirect()->route('events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $event = Event::find($id);

       $event->delete();

       Session::flash('success', 'Your Event was deleted succesfully!');

       return redirect()->route('events.index');
    }

}
