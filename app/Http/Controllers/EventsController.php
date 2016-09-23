<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\Session;

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
        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
                'description' => 'required|min:5|max:255',
                'specialOffers' => 'required|min:5|max:255',
                'eventDateTime' => 'required',
            ]);

        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->specialOffers = $request->specialOffers;
        $event->eventDateTime = $request->eventDateTime;

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
        //
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
        //
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
