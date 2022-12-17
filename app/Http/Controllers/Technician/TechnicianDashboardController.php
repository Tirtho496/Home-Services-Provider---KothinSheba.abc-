<?php

namespace App\Http\Controllers\Technician;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TechnicianDashboardController extends Controller
{
    public function tech($id)
    {
        $user = User::where('id',$id)->get();
        return view('technician.techsidebar',compact('user'));
    }

    public function orders($id)
    {
        $orders = Order::where('technician_id',$id)->get();
        return view('technician.order',compact('orders'));
    }
}
