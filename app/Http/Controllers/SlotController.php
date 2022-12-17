<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlotController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('admin.timeslots.add',compact('service'));

    }

    public function insert(Request $request)
    {
        $slot = new Slot();
        $slot->service_id = $request->input('service');
        $slot->start_time = $request->input('start_time');
        $slot->end_time = $request->input('end_time');

        $slot->save();
        return redirect('/dashboard')->with('status','New Slot Added Successfully');
    }
}
