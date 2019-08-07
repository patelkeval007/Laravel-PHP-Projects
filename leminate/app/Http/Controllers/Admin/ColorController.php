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
        $file = $request->file('myfile');

        // File Details 
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        // Valid File Extensions
        $valid_extension = array("csv");

        // 2MB in Bytes
        $maxFileSize = 2097152;

        // Check file extension
        if (in_array(strtolower($extension), $valid_extension)) {
            // Check file size
            if ($fileSize <= $maxFileSize) {
                // File upload location
                $location = 'uploads';
                // Upload file
                $file->move($location, $filename);
                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");
                $importData_arr = array();
                $i = 0;
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    // Skip first row (Remove below comment if you want to skip the first row)
                    /*if($i == 0){
                      $i++;
                      continue; 
                   }*/
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                    $i++;
                }
                fclose($file);
                // Insert to MySQL database
                foreach ($importData_arr as $importData) {

                    $insertData = array(
                        "name" => $importData[0]
                    );
                    Color::insert($insertData);
                }

            } else {
                dd('File too large. File must be less than 2MB.');
            }
        } else {
            dd('Invalid File Extension.');
        }

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

        return redirect(route('show_color'));
    }
}
