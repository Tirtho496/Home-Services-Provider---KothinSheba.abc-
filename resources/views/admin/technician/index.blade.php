@extends('layouts.admin')

@section('content')

<div class="card">
    <div class ="card-body">
        <h2>Pending Technicians</h2>
    </div>
    <div class ="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>NID</th>
                    <th>Service</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ptechnician as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->age}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->nid}}</td>
                    <td>{{$item->service->name}}</td>
                    <td>
                        <a href = "{{url('verify/'.$item->id)}}" class = "btn btn-success" style="padding-left:29px;padding-right:29px">Verify</a>
                        <a href ="{{url('deny/'.$item->id)}}" class ="btn btn-danger">Deny</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class ="card-body">
        <h2>Verified Technicians</h2>
    </div>
    <div class ="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>NID</th>
                    <th>Service</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vtechnician as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->age}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->nid}}</td>
                    <td>{{$item->service->name}}</td>
                    <td>
                        <a href ="{{url('deny/'.$item->id)}}" class ="btn btn-danger">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection