<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales_Order;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
use DateTime;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_report()
    {
        return view('/admin/show_report');
    }

    public function users_pdf()
    {
        $users = User::all();
        $name = Auth::user()->name;
        $today = date('d-m-Y');
        $pdf = PDF::loadView('admin/users_pdf', compact('users', 'name', 'today'));
        return $pdf->download('leminates_customers.pdf');
    }

    public function users_excel()
    {
        $users = User::all();
        return (new FastExcel($users))->download('leminates_customers.xlsx');
    }

    public function sales_pdf(Request $request)
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
            ->whereBetween('sales_orders.date', array(new DateTime($request->f_date), new DateTime($request->t_date)))
            ->get();
        $name = Auth::user()->name;
        $today = date('d-m-Y');
        $f_date = $request->f_date;
        $t_date = $request->t_date;
        $pdf = PDF::loadView('admin/sales_pdf', compact('sales', 'name', 'today', 'f_date', 't_date'));
        return $pdf->download('leminates_sales.pdf');
    }
}
