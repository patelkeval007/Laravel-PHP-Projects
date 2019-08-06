<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
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
        $today=date('d-m-Y');
        $pdf = PDF::loadView('admin/users_pdf', compact('users','name','today'));
        return $pdf->download('leminates_customers.pdf');
    }

    public function users_excel()
    {
        $users = User::all();
        return (new FastExcel($users))->download('leminates_customers.xlsx');
    }
}
