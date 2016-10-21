<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
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
        $subcategories = Subcategory::all();
        $categories = Category::all();

        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        return view('subcategory.index', ['subcategories' => $subcategories, 'categories' => $cats]);
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
            'name'=> 'required|max:30',
        ]);

        $subcategory = new Subcategory;


        $subcategory->name = $request->name;


        $subcategory->category()->associate($request->category_id); 
        $subcategory->save();

        Session::flash('success', 'Subcategory was created successfuly!');

        //redirect to another page
        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory_edit = Subcategory::find($id);
        $subcategories = Subcategory::all();
        $categories = Category::all();
        $flag = 1;

        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        return view('subcategory.index', ['subcategories' => $subcategories, 'subcategory_edit' => $subcategory_edit, 'categories' => $cats, 'flag' => $flag]);
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
        $this->validate($request, [
            'name' =>'required|max:20',
            ]);

        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->input('name');

        $subcategory->category()->associate($request->input('category_id')); 

        $subcategory->save();

        Session::flash('success', 'Subcategory was updated succesfully!');

        //redirect to another page
         return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->delete();

        Session::flash('success', 'Subcategory was deleted succesfully!');

        return redirect()->route('subcategories.index');
    }
}
