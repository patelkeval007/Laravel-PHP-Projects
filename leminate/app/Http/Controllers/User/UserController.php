<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Regex\Result;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product =  Product::all();
        return view('/user/index', compact('product'));
    }
}
