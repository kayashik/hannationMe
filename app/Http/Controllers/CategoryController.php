<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
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
                'name' =>'required|max:20', 
        ]); 

       $category = new Category;

       $category->name = $request->name;

       $category->save();

       Session::flash('success', 'Your Category was created succesfully!');

        //redirect to another page
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flag=1; 

        $category_edit = Category::find($id);

        $categories = Category::all();

        return view('categories.index', ['category_edit' => $category_edit, 'flag' => $flag, 'categories' => $categories]);
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
        $category = Category::find($id);

        $category->name = $request->input('name');

        $category->save();

        Session::flash('success', 'Category was updated succesfully!');

        //redirect to another page
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);

        $category->delete();

       Session::flash('success', 'Category was deleted succesfully!');

       return redirect()->route('categories.index');
    }
}
