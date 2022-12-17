<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $newcartItems = Cart::where('user_id',Auth::id())->get();

        return view('frontend.checkout',compact('newcartItems'));
    }

    public function placeOrder(Request $request)
    {
        if($request->input('fname') == "")
        {
            session()->flash('msg','Fill up all customer details fields');
            return redirect()->back();
        }

        if($request->input('cardname') == "")
        {
            $paystatus = '0';
        }
        else
        {
            $paystatus = '1';
        }

        $cart_total = Cart::where('user_id',Auth::id())->get();
        foreach($cart_total as $item)
        {
            
            $order = new Order();
            $order->user_id = Auth::id();
            $order->fname = $request->input('fname');
            $order->lname = $request->input('lname');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->district= $request->input('district');
            $order->division = $request->input('division');
            $order->total_price = $item->service->price;
            $order->tracking_no = 'trk'.time().rand(1111,9999);
            $order->service_id = $item->service->id;
            $order->date = $item->date;
            $order->technician_id = $item->technician_id;
            $order->slot_id = $item->slot_id;
            $order->paystatus = $paystatus;
        }
        


        
        $order->save();

        $order->id;

        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status',"Order Placed Successfully");
    }

}