<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Regex\Result;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class ProductDetailController extends Controller
{
    public function product_detail(Request $request)
    {
        $product = DB::table('products')->where('id', '=', $request->id)->first();

        $color = DB::table('colors')->where('id', '=', $product->color_id)->first();
        $category = DB::table('categories')->where('id', '=', $product->cat_id)->first();
        $design = DB::table('designs')->where('id', '=', $product->design_id)->first();
        $supplier = DB::table('suppliers')->where('id', '=', $product->supplier_id)->first();
        $stock = DB::table('stocks')->where('product_id', '=', $request->id)->first();
        return view('/visitor/product_detail', compact('product', 'stock', 'color', 'category', 'design', 'supplier'));
    }

    public function product_add_to_cart(Request $request)
    {
        return redirect(route('login'));
    }
}
