@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Technician Register') }}</div>

                <div class="card-body">
                    <form action="{{ url('tech-register-submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class = "row">

                            <div class ="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class= "form-control" name="name">
                            </div>

                            <div class ="col-md-6">
                                <label for="">Age</label>
                                <input type="number" class= "form-control" name="age">
                            </div>

                            <div class ="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class= "form-control" name="phone">
                            </div>

                            <div class ="col-md-6">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class ="col-md-6">
                                <label for="">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col md-6">
                                <label for="">Confirm Password</label>
                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>

                            <div class = "col-md-12" style="margin-top:5px;">
                                <select class="form-select" name="service_id" aria-label="Default select example">
                                    <option value="">Select Service</option>
                                    @foreach($service as $item)
                                        <option value = "{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class ="col-md-6">
                                <label for="">Upload Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class ="col-md-6">
                                <label for="">NID No.</label>
                                <input type="text" class= "form-control" name="nid">
                            </div>
                            <div class ="col-md-6">
                                <label for="">Upload NID</label>
                                <input type="file" class="form-control" name="nid_photo">
                            </div>
                            
                            <div class="col-md-12" style="margin-top:5px;">
                                <button type="submit" class = "btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
