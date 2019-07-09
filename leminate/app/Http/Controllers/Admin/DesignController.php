<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Design;
class DesignController extends Controller
{
    public function show_design()
    {
        $design = Design::all();
        return view('/admin/show_design', compact('design'));
    }
    public function add_design(Request $request)
    {
        $data = ['name' => $request->name];
        DB::table('designs')->insert($data);
        return redirect(route('show_design'));
    }
    public function del_design(Request $request)
    {
        DB::table('designs')->where('id', '=', $request->id)->delete();
        return redirect(route('show_design'));
    }
}
