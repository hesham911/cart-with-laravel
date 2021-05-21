<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::filter('',null,null,null);
        $brands       = Brand::all();
        $categories   = Category::whereNotNull('parent_category_id')->get();
        return view('frontend.home',['products' => $products,'brands'=>$brands,'categories'=>$categories]);
    }

    public function filterData(Request $request)
    {

        $query = $request->search_query;
        $brands = $request->brands;
        $categories = $request->categories;
        $price = $request->price;
        if ($request->ajax ()) {
            $products = Product::filter ( $query, $price, $brands, $categories );
            return view ( 'frontend.partials.content-data', compact ( 'products' ) )->render();
        }
    }

}
