<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Crypt;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_myaccount()
    {
        $user = Auth::user();
        return view('/user/show_myaccount', compact('user'));
    }
    public function edit_profile(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'dob' => $request->dob,
            'm_no' => $request->m_no,
        ];
        $user = DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
        return redirect()->back();
    }
    public function show_change_pass()
    {
        $old_p_status = false;
        $update = false;
        $c_p_status = false;
        return view('/user/show_change_pass', compact('old_p_status', 'update', 'c_p_status'));
    }
    public function edit_password(Request $request)
    {
        $c_p_status = false;
        $old_p_status = false;
        $update = false;
        $user = Auth::user();
        $old_pass = $request->o_password;
        $n_pass = $request->n_password;
        $c_pass = $request->c_password;
        if (Hash::check($old_pass, $user->password)) {
            if ($n_pass == $c_pass) {
                $data = [
                    'password' => Hash::make($n_pass),
                ];
                $user = DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
                $update = true;
                $old_p_status = false;
            } else {
                $c_p_status = true;
            }
        } else {
            $update = false;
            $old_p_status = true;
        }
        return view('/user/show_change_pass', compact('old_p_status', 'update', 'c_p_status'));
    }
}
