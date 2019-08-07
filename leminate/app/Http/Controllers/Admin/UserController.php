<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_user()
    {
        $user = DB::table('users')->where('is_admin', '=', 0)->get();
        return view('/admin/show_user', compact('user'));
    }

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
}
