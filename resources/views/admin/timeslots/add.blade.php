@extends('layouts.admin')

@section('content')

<div class="card">
    <div class ="card-header">
        <h4>Add Service</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-slot')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class = "row">
                <div class = "col-md-6">
                    <select class="form-select" name="service" aria-label="Default select example">
                        <option value="">Select Service</option>
                        @foreach($service as $item)
                            <option value = "{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class ="col-md-6">
                    <label for="">Start Time</label>
                    <input type="time" class= "form-control" name="start_time">
                </div>

                <div class ="col-md-6">
                    <label for="">End Time</label>
                    <input type="time" class= "form-control" name="end_time">
                </div>
 
                <div class="col-md-12">
                    <button type="submit" class = "btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection