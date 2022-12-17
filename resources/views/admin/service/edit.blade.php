@extends('layouts.admin')

@section('content')

<div class="card">
    <div class ="card-header">
        <h4>Update Service</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-service/'.$service->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class = "row">
                <div class ="col-md-6">
                    <label for="">Name</label>
                    <input type="text" value="{{$service->name}}" class= "form-control" name="name">
                </div>
                <div class ="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" value="{{$service->slug}}" class= "form-control" name="slug">
                </div>
                
                <div class = "col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" cols="30" rows="5" class="form-control">{{$service->description}}</textarea>
                </div>
                <div class = "col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$service->status == "1"?'checked':''}} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$service->Popular == "1"?'checked':''}}  name="popular">
                </div>
                <div class = "col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type = "text" value="{{$service->meta_title}}" class ="form-control" name="meta_title">
                </div>
                <div class = "col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name = "meta_keywords" rows="3" class="form-control">{{$service->meta_keywords}}</textarea>
                </div>
                <div class ="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{$service->meta_desc}}</textarea>
                </div>
                <div class ="col-md-12">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-md-12">
                    <button type="submit" class = "btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection