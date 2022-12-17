<?php

namespace App\Http\Controllers\Technician;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicianDashboardController extends Controller
{
    public function tech()
    {
        
        return view('technician.techsidebar');
    }
     
}   
