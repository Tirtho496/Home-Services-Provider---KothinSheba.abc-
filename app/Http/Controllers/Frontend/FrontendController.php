<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Slot;
use App\Models\Order;
use App\Models\Service;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Models\BookedTechnician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){

        $service = Service::all();
        $feat_serv = Service::where('Popular','1')->get();
        return view('frontend.index',compact('service','feat_serv'));
    }

    public function viewService($slug)
    {

        if(Service::where('slug',$slug)->exists())
        {
            $service = Service::all();
            $serv = $service->where('slug',$slug)->first();
            $serv_id = $serv->id;
            $slot = Slot::where('service_id',$serv_id)->get();
            $technician = Technician::where('service_id',$serv_id)->where('verified','1')->get();
            
            return view('frontend.viewService',compact('service','serv','slot','technician'));
        }
        else{
            return redirect('/')->with('status','No such product found');
        }
    }

    public function book(Request $request)
    {

        $date = $request->input('date');
        $fdate = substr($date,6,4).'-'.substr($date,0,2).'-'.substr($date,3,2);
        $slot = $request->input('slot');
        $technician = $request->input('technician');

        if(!$technician)
        {
            // return redirect('/')->with('status','Technician Not Selected');
            $random = Technician::all()->random(1);
            //dd($random);
            $check = BookedTechnician::whereDate('date','=',$fdate)
                                ->where('slot', '=', $slot)
                                ->where('technician', '=', $random[0]->id)
                                ->get();
            while($check->count()>0)
            {
                $random = Technician::all()->random(1);
                $check = BookedTechnician::whereDate('date','=',$fdate)
                                    ->where('slot', '=', $slot)
                                    ->where('technician', '=', $random[0]->id)
                                    ->get();
            }
            $technician = $random[0]->id;

        }
        else{
            $check = BookedTechnician::whereDate('date','=',$fdate)
                                ->where('slot', '=', $slot)
                                ->where('technician', '=', $technician)
                                ->get();

        }

        

        

        //dd($check);
        if(Auth::check())
        {
            $service = Service::where('id',$request->service_id)->first();

            if($check->count()>0)
            {
                
                return redirect('/')->with('status','Technician Not Availabe');
            }
            else
            {
                
                $booked = new BookedTechnician();
                $booked->date = $fdate;
                $booked->slot = $slot;
                $booked->technician = $technician;

                

                $item = new Cart();
                if(Cart::where('service_id',$service->id)->where('user_id',Auth::id())->whereDate('date',$fdate)->where('slot_id',$slot)->exists())
                {
                    return response()->json(['status'=>$service->name."Already added to cart"]);
                }
                else
                {
                    $item->service_id = $service->id;
                    $item->user_id= Auth::id();
                    $item->date = $fdate;
                    $item->slot_id = $slot;
                    $item->technician_id = $technician;

                    $item->save();
                    // return response()->json(['status'=> $product->name."Added to cart"]);
                
                }
                $booked->save();
                return redirect('/')->with('status','Success');
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }

        
    }

    public function customer_profile()
    {

        $items = Order::where('user_id',Auth::id())->get();
        return view('frontend.customer',compact('items'));
    }

    public function searchProduct(Request $request)
    {
        $product = $request->search;

        if($product != "")
        {
            $item = Service::where("name","LIKE","%$product%")->first();
            if($item){
                return redirect('service/'.$item->slug);
            }
            else{
                return redirect()->back()->with("status","No products matched with search");
            }
        }
        else{
            return redirect()->back();
        }
        
    }

}
