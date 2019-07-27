<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Regex\Result;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shoping_cart()
    {
        $cart = DB::table('carts')->where('user_id', '=', Auth::user()->id)->first();
        $cart_details = DB::table('cart_details')->where('cart_id', '=',  $cart->id)->get();
        $cart_details = DB::table('cart_details')
            ->join('products', 'products.id', '=', 'cart_details.product_id')
            ->join('carts', 'carts.id', '=', 'cart_details.cart_id')
            ->select('cart_details.*', 'products.name as pname', 'products.image as pimage', 'products.price as pprice')
            ->get();
        // dd($cart_details);
        $total = 0;
        foreach ($cart_details as $dtls_obj) {
            $total += $dtls_obj->total;
        }
        return view('/user/shoping_cart', compact('cart_details', 'total'));
    }

    public function product_remove_from_cart(Request $request)
    {
        if (DB::table('cart_details')->where('id', '=',  $request->id)->delete()) {
            return redirect(route('userhome'));
        } else {
            return redirect(route('shoping_cart'));
        }
    }

    public function checkout(Request $request)
    {
        $data = [
            'address' => $request->address,
            'date' => date('Y-m-d'),
            'status' => false,
            'user_id' => Auth::user()->id,
        ];
        DB::table('sales_orders')->insert($data);
        $sales_id = DB::table('sales_orders')->where([['user_id', '=', Auth::user()->id], ['status', '=', false]])->latest('id')->first()->id;

        $cart = DB::table('carts')->where('user_id', '=', Auth::user()->id)->first();
        $cart_details = DB::table('cart_details')->where('cart_id', '=',  $cart->id)->get();
        foreach ($cart_details as $item) {
            $data = [
                'quantity' => $item->quantity,
                'total' => $item->total,
                'product_id' => $item->product_id,
                'sales_order_id' => $sales_id,
            ];
            DB::table('sales_order_details')->insert($data);
        }

        if (DB::table('carts')->where('user_id', '=', Auth::user()->id)->delete()) {
            return redirect(route('userhome'));
        } else {
            return redirect(route('shoping_cart'));
        }
    }
}
