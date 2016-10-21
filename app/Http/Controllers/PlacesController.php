<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subcategory;
use App\Place;
use Illuminate\Support\Facades\Session;

class PlacesController extends Controller
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
        $places = Place::all();
        
        return view('places.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $subs = array();
        foreach ($subcategories as $subcategory) {
            $subs [$subcategory->id] = $subcategory->name;
        }

        return view('places.create', ['subcategories' => $subs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|max:50',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:places,slug',
            'imgURL' => 'required|max:20',
            'videoURL' => 'max:20',
            'type' => 'required|max:100',
            'work_hours' => 'required',
            'description' => 'required|min:5|max:1000',
            'fitures' => 'required|min:5|max:1000',
            'everage_price' => 'required|numeric',
            'address' => 'required|min:5|max:500',
        ]);

        $place = new Place;

        $place->name = $request->name;  
        $place->slug = $request->slug;  
        $place->imgURL = $request->imgURL;  
        $place->videoURL = $request->videoURL;  
        $place->type = $request->type;  
        $place->work_hours = $request->work_hours;        
        $place->description = $request->description;  
        $place->fitures = $request->fitures;  
        $place->address = $request->address; 
        $place->everage_price = $request->everage_price; 

        $place->subcategory()->associate($request->subcategory_id); 

        $place->save(); 

        Session::flash('success', 'Place was created successfuly!');

        //redirect to another page
        return redirect()->route('places.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        $subcategory =Subcategory::find($place->subcategory_id);

        return view('places.single', ['place' => $place, 'subcategory' => $subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        $subcategories = Subcategory::all();

        $subs = array();
        foreach ($subcategories as $subcategory) {
            $subs[$subcategory->id] = $subcategory->name;
        }

        return view('places.edit', ['subcategories' => $subs, 'place' => $place]);
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
        $place = Place::find($id);

        if ($request->input('slug') == $place->slug) {
        
             $this->validate($request, [
                'name' => 'required|max:50',
                'imgURL' => 'required|max:20',
                'videoURL' => 'max:20',
                'type' => 'required|max:100',
                'work_hours' => 'required',
                'description' => 'required|min:5|max:1000',
                'fitures' => 'required|min:5|max:200',
                'everage_price' => 'required|numeric',
                'address' => 'required|min:5|max:500',
            ]);
        }
        else {
            $this->validate($request, [
            'name' => 'required|max:50',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:places,slug',
            'imgURL' => 'required|max:20',
            'videoURL' => 'max:20',
            'type' => 'required|max:100',
            'work_hours' => 'required',
            'description' => 'required|min:5|max:1000',
            'fitures' => 'required|min:5|max:200',
            'everage_price' => 'required|numeric',
            'address' => 'required|min:5|max:500',
        ]);
        }

        $place->name = $request->input('name');  
        $place->slug = $request->input('slug');  
        $place->imgURL = $request->input('imgURL');  
        $place->videoURL = $request->input('videoURL');  
        $place->type = $request->input('type');  
        $place->work_hours = $request->input('work_hours');        
        $place->description = $request->input('description');  
        $place->fitures = $request->input('fitures');  
        $place->address = $request->input('address'); 
        $place->everage_price = $request->input('everage_price'); 

        $place->subcategory()->associate($request->subcategory_id); 

        $place->save(); 

        Session::flash('success', 'Place was Updated successfuly!');

        //redirect to another page
        return redirect()->route('places.show', $place->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $place = Place::find($id);
       $place->delete();

       Session::flash('success', 'Your Place was deleted succesfully!');

       return redirect()->route('places.index');

    }
}
