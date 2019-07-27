<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Regex\Result;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product_detail(Request $request)
    {
        $product = DB::table('products')->where('id', '=', $request->id)->first();
        return view('/user/product_detail', compact('product'));
    }
    
    public function product_add_to_cart(Request $request)
    {
        // dd(Auth::user()->id);
        $id = $request->id;
        $quantity = $request->quantity;
        $tProduct = DB::table('products')->where('id', '=', $id)->first();
        $total = $tProduct->price * $quantity;

        $cart = DB::table('carts')->where('user_id', '=', Auth::user()->id)->get();
        if (count($cart)) {
            if ($cart[0]->status) {
                $result = DB::table('cart_details')
                    ->where([
                        ['cart_id', '=', DB::table('carts')->where('user_id', '=', Auth::user()->id)->first()->id],
                        ['product_id', '=', $id]
                    ])
                    ->update([
                        'quantity' => $quantity,
                        'date_add' => date('Y-m-d'),
                        'total' => $total,
                    ]);
                if ($result == 0) {
                    $data = [
                        'quantity' => $quantity,
                        'date_add' => date('Y-m-d'),
                        'product_id' => $tProduct->id,
                        'cart_id' => DB::table('carts')->where('user_id', '=', Auth::user()->id)->first()->id,
                        'total' => $total
                    ];
                    DB::table('cart_details')->insert($data);
                }
            } else {
                DB::table('carts')
                    ->where('user_id', '=', Auth::user()->id)
                    ->update([
                        'status' => true
                    ]);
                $result = DB::table('cart_details')
                    ->where([
                        ['cart_id', '=', DB::table('carts')->where('user_id', '=', Auth::user()->id)->first()->id],
                        ['product_id', '=', $id]
                    ])
                    ->update([
                        'quantity' => $quantity,
                        'date_add' => date('Y-m-d'),
                        'total' => $total,
                    ]);
                if ($result == 0) {
                    $data = [
                        'quantity' => $quantity,
                        'date_add' => date('Y-m-d'),
                        'product_id' => $tProduct->id,
                        'cart_id' => DB::table('carts')->where('user_id', '=', Auth::user()->id)->first()->id,
                        'total' => $total
                    ];
                    DB::table('cart_details')->insert($data);
                }
            }
        } else {
            $data = [
                'user_id' => Auth::user()->id,
                'status' => true
            ];
            DB::table('carts')->insert($data);

            $data = [
                'quantity' => $quantity,
                'date_add' => date('Y-m-d'),
                'total' => $total,
                'product_id' => $tProduct->id,
                'cart_id' => DB::table('carts')->where([['user_id', '=', Auth::user()->id], ['status', '=', true]])->first()->id,
            ];
            DB::table('cart_details')->insert($data);
        }
        $product = DB::table('products')->where('id', '=', $request->id)->first();
        return view('/user/product_detail', compact('product'));
    }
}
