<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use App\Color;
use App\Design;
use App\Categorie;

class ProductController extends Controller
{
    public function show_product()
    {
        $product = Product::all();
        // $data = DB::table('products');
        // dd($data);
        $arr_category = array();
        $arr_color = array();
        $arr_design = array();
        foreach ($product as $t_product) {
            array_push($arr_category, DB::table('categories')->where('id', $t_product->cat_id)->first());
            array_push($arr_color, DB::table('colors')->where('id', $t_product->color_id)->first());
            array_push($arr_design, DB::table('designs')->where('id', $t_product->design_id)->first());
        }
        // dd($arr_color);
        return view('/admin/show_product', compact('product', 'arr_category', 'arr_color', 'arr_design'));
    }

    public function add_product_view_page(Request $request)
    {
        $color = Color::all();
        $design = Design::all();
        $category = Categorie::all();
        return view('/admin/add_product', compact('color', 'design', 'category'));
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
        return view('/admin/update_product', compact('product', 'color', 'design', 'category', 's_color', 's_design', 's_category'));
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
