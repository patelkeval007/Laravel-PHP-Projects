<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_supplier()
    {
        $supplier = Supplier::all();
        return view('/admin/show_supplier', compact('supplier'));
    }

    public function add_supplier_view_page(Request $request)
    {
        return view('/admin/add_supplier');
    }

    public function add_supplier(Request $request)
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'm_no' => $request->m_no,
        ];
        DB::table('suppliers')->insert($data);
        return redirect(route('show_supplier'));
    }

    public function update_supplier_view_page(Request $request)
    {
        if ($request->id) {
            $supplier = DB::table('suppliers')->where('id', '=', $request->id)->first();
            return view('/admin/update_supplier', compact('supplier'));
        } else {
            return redirect(route('show_supplier'));
        }
    }
    public function update_supplier(Request $request)
    {
        if (DB::table('suppliers')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'm_no' => $request->m_no,
        ])) {
            return redirect(route('show_supplier'));
        } else {
            return redirect(route('show_supplier'));
        }
    }
    public function del_supplier(Request $request)
    {
        DB::table('suppliers')->where('id', '=', $request->id)->delete();
        return redirect(route('show_supplier'));
    }
}
