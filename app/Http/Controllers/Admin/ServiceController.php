<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('admin.service.service',compact('service'));
    }

    public function add()
    {
        return view('admin.service.add');
    }

    public function insert(Request $request)
    {
        $service = new Service();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension; //name it to currect time+extension of file
            $file->move('assets/uploads/service',$filename);
            $service->image = $filename;
        }

        $service->name = $request->input('name');
        $service->slug = $request->input('slug');
        $service->description = $request->input('description');
        $service->status = $request->input('status') == TRUE?'1':'0';
        $service->Popular = $request->input('popular') == TRUE?'1':'0';
        $service->meta_title = $request->input('meta_title');
        $service->meta_keywords = $request->input('meta_keywords');
        $service->meta_desc = $request->input('meta_description');
        $service->save();
        return redirect('/dashboard')->with('status','New Service Added Successfully');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $im_path = 'assets/uploads/category/'.$category->image;
        if(File::exists($im_path))
        {
            File::delete($im_path);
        }
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension; //name it to currect time+extension of file
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->Popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_desc = $request->input('meta_description');
        $category->update();
        return redirect('/dashboard')->with('status','Category Updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            
        }
        $category->delete();
        return redirect('categories')->with('status','Category Deleted Successfully');
    }
}
