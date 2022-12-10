<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{
    public function index(){
        $service = Service::all();
        return view('technician.index',compact('service'));
    }

    public function submit_info(Request $request)
    {
        $technician = new Technician();
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension; //name it to currect time+extension of file
            $file->move('assets/uploads/technician',$filename);
            $technician->photo = $filename;
        }

        if($request->hasFile('nid_photo'))
        {
            $file = $request->file('nid_photo');
            $extension = $file->getClientOriginalExtension();
            $nfilename = 'nid'.$filename; 
            $file->move('assets/uploads/technician_nid',$nfilename);
            $technician->nid_photo = $nfilename;
        }

        $technician->service_id = $request->input('service_id');
        $technician->name = $request->input('name');
        $technician->age = $request->input('age');
        $technician->phone = $request->input('phone');
        $technician->email = $request->input('email');
        $technician->password = Hash::make($request->input('password'));
        $technician->nid = $request->input('nid');
        
        $technician->save();
        return redirect('/')->with('status','Technician Request Submitted. Please wait to be verified.');
    }
}
