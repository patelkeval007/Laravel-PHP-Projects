<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
use DB;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product(Request $request)
    {
        if ($request->cat_id==null) {
            $categories = Categorie::all();
            $products = DB::table('products')->where('cat_id', '=', $categories[0]->id)->get();
        } else {
            $c_id = $request->cat_id;
            $products = DB::table('products')->where('cat_id', '=', $c_id)->get();
            $categories = Categorie::all();
        }
        return view('/user/product', compact('products', 'categories'));
    }
}
