<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Slot;
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
            $technician = Technician::where('service_id',$serv_id)->get();
            
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


        $check = BookedTechnician::whereDate('date','=',$fdate)
                                ->where('slot', '=', $slot)
                                ->where('technician', '=', $technician)
                                ->get();

        

        //dd($check);
        if(Auth::check())
        {
            $service = Service::where('id',$request->service_id)->first();

            if($check->count()>0)
            {
                
                //return redirect('/')->with('status','Pre-book Tecnician');
                return redirect('/')->with('status','Technician Not Available, Pre-book Technician?');
                return redirect('/')->with('status','proceed to-book');

                
                
               

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

        return redirect('frontend.customer');
    }

}
