<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function index() 
    {
        $products = Product::latest()->paginate(5);
        
        return view('home', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function getSearch(Request $request) {
       
       
        $keyword = $request->input('keyword');
     
        $products = Product::where('product_name','like','%'.$keyword.'%')->get();
        
        return view('search',compact('products'));
    }
}
