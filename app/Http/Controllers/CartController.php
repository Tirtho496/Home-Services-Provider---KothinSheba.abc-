<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function viewCart()
    {
        $items = Cart::where('user_id',Auth::id())->get();
        return view('frontend.viewCart',compact('items'));
    }

    // public function deleteitem(Request $request)
    // {   
    //     if(Auth::check())
    //     {
    //         $prod_id = $request->input('prod_id');
    //         if(Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists())
    //         {
    //             $cartItem = Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
    //             $cartItem->delete();

    //             return response()->json(['status' => "Product Deleted Successfully"]);
    //         }
    //     }
    //     else{
    //         return response()->json(['status'=>"Login to Continue"]);
    //     }
    // }
}
