@extends('layouts.technician')

@section('content')

<div class="card">
    <div class ="card-body">
        <h2>Orders</h2>
    </div>
    <div class ="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Slot</th>
                    <th>Address</th>
                    <th>Phone</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $item)
                <tr>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->slot->start_time}}-{{$item->slot->end_time}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a href = "{{url('complete/'.$item->id)}}" class = "btn btn-success" style="padding-left:29px;padding-right:29px">Complete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
@endsection