<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_category()
    {
        $category = Categorie::all();
        return view('/admin/show_category', compact('category'));
    }
    public function add_category(Request $request)
    {
        $data = ['name' => $request->name];
        DB::table('categories')->insert($data);
        return redirect(route('show_category'));
    }
    public function del_category(Request $request)
    {
        DB::table('categories')->where('id', '=', $request->id)->delete();
        return redirect(route('show_category'));
    }
}
