<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales_Order;
use App\Sales_Order_Detail;
use DB;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_sales()
    {
        $sales = DB::table('sales_order_details')
            ->join('sales_orders', 'sales_orders.id', '=', 'sales_order_details.sales_order_id')
            ->join('products', 'products.id', '=', 'sales_order_details.product_id')
            ->join('users', 'users.id', '=', 'sales_orders.user_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->select(
                'sales_orders.id as s_o_id',
                'sales_orders.address as s_o_address',
                'sales_orders.date as s_o_date',
                'sales_orders.status as s_o_status',
                'sales_orders.user_id',
                'sales_order_details.id as s_o_d_id',
                'sales_order_details.quantity as s_o_d_quantity',
                'sales_order_details.total as s_o_d_total',
                'sales_order_details.product_id',
                'sales_order_details.sales_order_id',
                'products.name as p_name',
                'users.name as u_name',
                'suppliers.name as s_name',
            )
            ->get();
        return view('/admin/show_sales', compact('sales'));
    }

    // public function add_sales_view_page(Request $request)
    // {
    //     $color = Color::all();
    //     $design = Design::all();
    //     $category = Categorie::all();
    //     $supplier = Supplier::all();
    //     return view('/admin/add_sales', compact('color', 'design', 'category', 'supplier'));
    // }

    // public function add_sales(Request $request)
    // {
    //     $data = [
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'qoh' => $request->qoh,
    //         'price' => $request->price,
    //         'cat_id' => $request->category,
    //         'color_id' => $request->color,
    //         'design_id' => $request->design,
    //         'supplier_id' => $request->supplier,
    //     ];
    //     DB::table('saless')->insert($data);
    //     return redirect(route('show_sales'));
    // }

    // public function update_sales_view_page(Request $request)
    // {
    //     $sales = DB::table('saless')->where('id', '=', $request->id)->first();
    //     $color = Color::all();
    //     $s_color =  DB::table('colors')->where('id', $sales->color_id)->first();
    //     $design = Design::all();
    //     $s_design = DB::table('designs')->where('id', $sales->design_id)->first();
    //     $category = Categorie::all();
    //     $s_category = DB::table('categories')->where('id', $sales->cat_id)->first();
    //     $supplier = Supplier::all();
    //     $s_supplier = DB::table('suppliers')->where('id', $sales->supplier_id)->first();
    //     return view('/admin/update_sales', compact('sales', 'color', 'design', 'category', 'supplier', 's_color', 's_design', 's_category', 's_supplier'));
    // }

    // public function update_sales(Request $request)
    // {
    //     if (DB::table('saless')->where('id', '=', $request->id)->update([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'qoh' => $request->qoh,
    //         'price' => $request->price,
    //         'cat_id' => $request->cat_id,
    //         'color_id' => $request->color_id,
    //         'design_id' => $request->design_id,
    //         'supplier_id' => $request->supplier_id,
    //     ])) {
    //         return redirect(route('show_sales'));
    //     } else {
    //         return redirect(route('show_sales'));
    //     }
    // }

    // public function del_sales(Request $request)
    // {
    //     DB::table('saless')->where('id', '=', $request->id)->delete();
    //     return redirect(route('show_sales'));
    // }
}
