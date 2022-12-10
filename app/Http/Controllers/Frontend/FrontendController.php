<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            
            return view('frontend.viewService',compact('service','serv'));
        }
        else{
            return redirect('/')->with('status','No such product found');
        }
    }

}
