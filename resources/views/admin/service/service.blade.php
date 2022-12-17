@extends('layouts.admin')

@section('content')

<div class="card">
    <div class ="card-body">
        <h2>Service Panel</h2>
    </div>
    <div class ="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($service as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <img src ="{{asset('assets/uploads/service/'.$item->image)}}" class = "w-25" alt="Image Here">
                    </td>
                    <td>
                        <a href = "{{url('edit-service/'.$item->id)}}" class = "btn btn-success" style="padding-left:29px;padding-right:29px">Edit</a>
                        <a href ="{{url('delete-service/'.$item->id)}}" class ="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection