<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TechnicianController extends Controller
{
    public function index()
    {
        $ptechnician = Technician::where('verified','0')->get();
        $vtechnician = Technician::where('verified','1')->get();
        return view('admin.technician.index',compact('ptechnician','vtechnician'));
    }

    public function verify($id)
    {
        $technician = Technician::find($id);
        $technician->verified = '1';
        $technician->update();

        $user = new User();
        $user->name = $technician->name;
        $user->email = $technician->email;
        $user->password = $technician->password;
        $user->role_as = '2';

        $user->save();

        return redirect('/dashboard')->with('status','Technician Verified');
    }

    public function delete($id)
    {
        $technician = Technician::find($id);
        if($technician->photo)
        {
            $path = 'assets/uploads/technician/'.$technician->photo;
            if(File::exists($path)){
                File::delete($path);
            }
            
        }

        if($technician->nid_photo)
        {
            $path = 'assets/uploads/technician_nid/'.$technician->nid_photo;
            if(File::exists($path)){
                File::delete($path);
            }
            
        }
        $technician->delete();
        return redirect('/dashboard')->with('status','Technician Denied');
    }
}
