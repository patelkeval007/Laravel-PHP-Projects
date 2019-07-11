<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use App\Color;
use App\Design;
use App\Categorie;
use App\Supplier;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_product()
    {
        // $product = Product::all();
        // $data = DB::table('products');
        // dd($data);
        // $arr_category = array();
        // $arr_color = array();
        // $arr_design = array();
        // foreach ($product as $t_product) {
        //     array_push($arr_category, DB::table('categories')->where('id', $t_product->cat_id)->first());
        //     array_push($arr_color, DB::table('colors')->where('id', $t_product->color_id)->first());
        //     array_push($arr_design, DB::table('designs')->where('id', $t_product->design_id)->first());
        // }
        $product = DB::table('products')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->join('designs', 'designs.id', '=', 'products.design_id')
            ->join('categories', 'categories.id', '=', 'products.cat_id')
            ->select('products.*', 'categories.name as cat_name', 'designs.name as design_name', 'colors.name as color_name')
            ->get();
        return view('/admin/show_product', compact('product'));
    }

    public function add_product_view_page(Request $request)
    {
        $color = Color::all();
        $design = Design::all();
        $category = Categorie::all();
        $supplier = Supplier::all();
        return view('/admin/add_product', compact('color', 'design', 'category', 'supplier'));
    }

    public function add_product(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'qoh' => $request->qoh,
            'price' => $request->price,
            'cat_id' => $request->category,
            'color_id' => $request->color,
            'design_id' => $request->design,
            'supplier_id' => $request->supplier,
        ];
        DB::table('products')->insert($data);
        return redirect(route('show_product'));
    }

    public function update_product_view_page(Request $request)
    {
        $product = DB::table('products')->where('id', '=', $request->id)->first();
        $color = Color::all();
        $s_color =  DB::table('colors')->where('id', $product->color_id)->first();
        $design = Design::all();
        $s_design = DB::table('designs')->where('id', $product->design_id)->first();
        $category = Categorie::all();
        $s_category = DB::table('categories')->where('id', $product->cat_id)->first();
        $supplier = Supplier::all();
        $s_supplier = DB::table('suppliers')->where('id', $product->supplier_id)->first();
        return view('/admin/update_product', compact('product', 'color', 'design', 'category', 'supplier', 's_color', 's_design', 's_category', 's_supplier'));
    }

    public function update_product(Request $request)
    {
        if (DB::table('products')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'qoh' => $request->qoh,
            'price' => $request->price,
            'cat_id' => $request->cat_id,
            'color_id' => $request->color_id,
            'design_id' => $request->design_id,
            'supplier_id' => $request->supplier_id,
        ])) {
            return redirect(route('show_product'));
        } else {
            return redirect(route('show_product'));
        }
    }

    public function del_product(Request $request)
    {
        DB::table('products')->where('id', '=', $request->id)->delete();
        return redirect(route('show_product'));
    }
}
