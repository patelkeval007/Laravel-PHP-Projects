<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Categorie;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/admin/index');
    }

    //user-CRUD
    public function show_user()
    {
        $user = DB::table('users')->where('is_admin', '=', 0)->get();
        return view('/admin/show_user', compact('user'));
    }

    //categories-CRUD
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
        return redirect(route('add_category'));
    }

    
}
