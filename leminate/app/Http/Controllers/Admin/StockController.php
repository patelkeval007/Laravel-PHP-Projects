<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Stock;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_stock()
    {
        $stocks = DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->select('stocks.*', 'products.name as pname')
            ->get();
        $out_status = false;
        foreach ($stocks as $item) {
            if ($item->available == 0) {
                $out_status = true;
            }
        }
        return view('/admin/show_stock', compact('stocks', 'out_status'));
    }
    public function show_out_stock()
    {
        $stocks = DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->select('stocks.*', 'products.name as pname', 'products.id as pid')
            ->get();

        return view('/admin/show_out_stock', compact('stocks'));
    }
}
