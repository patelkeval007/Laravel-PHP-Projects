<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;

class UserController extends Controller
{
    public function show_user()
    {
        $user = DB::table('users')->where('is_admin', '=', 0)->get();
        return view('/admin/show_user', compact('user'));
    }
    // public function add_user(Request $request)
    // {
    //     $data = ['name' => $request->name];
    //     DB::table('categories')->insert($data);
    //     return redirect(route('show_category'));
    // }
    public function update_user_view_page(Request $request)
    {
        if ($request->id) {
            $user = DB::table('users')->where('id', '=', $request->id)->first();
            return view('/admin/update_user', compact('user'));
        } else {
            return redirect(route('show_user'));
        }
    }
    public function update_user(Request $request)
    {
        if (DB::table('users')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'dob' => $request->dob,
            'm_no' => $request->m_no,
        ])) {
            return redirect(route('show_user'));
        } else {
            return redirect(route('show_user'));
        }
    }
    public function del_user(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();
        return redirect(route('show_user'));
    }
}
