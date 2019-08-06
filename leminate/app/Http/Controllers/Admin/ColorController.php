<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Color;
class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_color()
    {
        $color = Color::all();
        return view('/admin/show_color', compact('color'));
    }
    public function add_color(Request $request)
    {
        $data = ['name' => $request->name];
        DB::table('colors')->insert($data);
        return redirect(route('show_color'));
    }
    public function del_color(Request $request)
    {
        DB::table('colors')->where('id', '=', $request->id)->delete();
        return redirect(route('show_color'));
    }
    public function add_color_csv(Request $request)
    {


        
        // if ($request->hasFile('myfile')) {
        //     $path = $request->file('myfile')->getRealPath();
        //     $data = Excel::load($path)->get();
        //     dd($data);
        //     if ($data->count()) {
        //         foreach ($data as $key => $value) {
        //             $arr[] = ['name' => $value->name, 'details' => $value->details];
        //         }
        //         if (!empty($arr)) {
        //             \DB::table('products')->insert($arr);
        //             dd('Insert Record successfully.');
        //         }
        //     }
        // }
        
        return redirect(route('show_product'));
    }
}
