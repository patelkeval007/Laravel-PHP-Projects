<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function show_purchase()
    // {
    //     $purchase = Purchase::all();
    //     // $data = DB::table('purchases');
    //     // dd($data);
    //     $arr_category = array();
    //     $arr_color = array();
    //     $arr_design = array();
    //     foreach ($purchase as $t_purchase) {
    //         array_push($arr_category, DB::table('categories')->where('id', $t_purchase->cat_id)->first());
    //         array_push($arr_color, DB::table('colors')->where('id', $t_purchase->color_id)->first());
    //         array_push($arr_design, DB::table('designs')->where('id', $t_purchase->design_id)->first());
    //     }
    //     // dd($arr_color);
    //     return view('/admin/show_purchase', compact('purchase', 'arr_category', 'arr_color', 'arr_design'));
    // }

    // public function add_purchase_view_page(Request $request)
    // {
    //     $color = Color::all();
    //     $design = Design::all();
    //     $category = Categorie::all();
    //     return view('/admin/add_purchase', compact('color', 'design', 'category'));
    // }

    // public function add_purchase(Request $request)
    // {
    //     $data = [
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'qoh' => $request->qoh,
    //         'price' => $request->price,
    //         'cat_id' => $request->category,
    //         'color_id' => $request->color,
    //         'design_id' => $request->design,
    //     ];
    //     DB::table('purchases')->insert($data);
    //     return redirect(route('show_purchase'));
    // }

    // public function update_purchase_view_page(Request $request)
    // {
    //     $purchase = DB::table('purchases')->where('id', '=', $request->id)->first();
    //     $color = Color::all();
    //     $s_color =  DB::table('colors')->where('id', $purchase->color_id)->first();
    //     $design = Design::all();
    //     $s_design = DB::table('designs')->where('id', $purchase->design_id)->first();
    //     $category = Categorie::all();
    //     $s_category = DB::table('categories')->where('id', $purchase->cat_id)->first();
    //     return view('/admin/update_purchase', compact('purchase', 'color', 'design', 'category', 's_color', 's_design', 's_category'));
    // }

    // public function update_purchase(Request $request)
    // {
    //     if (DB::table('purchases')->where('id', '=', $request->id)->update([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'qoh' => $request->qoh,
    //         'price' => $request->price,
    //         'cat_id' => $request->cat_id,
    //         'color_id' => $request->color_id,
    //         'design_id' => $request->design_id,
    //     ])) {
    //         return redirect(route('show_purchase'));
    //     } else {
    //         return redirect(route('show_purchase'));
    //     }
    // }

    // public function del_purchase(Request $request)
    // {
    //     DB::table('purchases')->where('id', '=', $request->id)->delete();
    //     return redirect(route('show_purchase'));
    // }
}
