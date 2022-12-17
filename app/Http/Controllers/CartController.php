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

    public function cart_item_delete($id)
    {
        $cart = Cart::find($id);

        $cart->delete();
        return redirect('cart')->with('status','Removed Item from cart');

    }
}
