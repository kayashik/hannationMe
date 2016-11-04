<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subcategory;
use App\Place;
use App\Category;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function home()
    {
        return view('pages.home');
    }

    public function index()
    {
        $categories = Category::all();

        return view('pages.places', ['categories' => $categories]);
    }

    public function placesList($id)
    {
        $categories = Category::all();
       // $subcat = Subcategory::find($id);
        $places = Place::select('*')
                        ->where('subcategory_id', '=', $id)
                        ->get();

        return view('pages.places', ['categories' => $categories, 'places' => $places]);
    }
}
