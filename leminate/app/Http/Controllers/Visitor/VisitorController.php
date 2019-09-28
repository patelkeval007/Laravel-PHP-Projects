<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Regex\Result;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class VisitorController extends Controller
{
    public function index()
    {
        $product =  Product::all();
        return view('/visitor/welcome', compact('product'));
    }
}
