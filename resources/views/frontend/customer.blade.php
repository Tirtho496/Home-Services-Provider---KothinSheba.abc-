@include('layouts.include.frontendnavbar')
@include('layouts.include.links')

@section('title')
Cart
@endsection

@section('content')
    <div class="tbody">


    <div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>

                            
                            <input class="form-control" id="inputFirstName" type="text" placeholder="{{$items[0]->user->name}}" value="{{$items[0]->user->name}}" readonly>
                        </div>
                        

                        <!-- <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                            </div>
                        </div> -->



                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{$items[0]->user->email}}" readonly>
                        </div>


             
                        <!-- <div class="row gx-3 mb-3">
                    
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                            </div>
                         
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                            </div>
                        </div>
                      
                        <button class="btn btn-primary" type="button">Save changes</button> -->
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

    @if($items->count()>0)
                    
            <div class="container">
                <div class="card-body">


                    <div class="card mb-4">
                    <div class="card-header">Order Details</div>
                    <div class="card-body">
                    <form>
                    @if($items->count()>0)
                        <table style="width:100%">
                            <tr>
                                @foreach($items as $item)

                                    @if($item->id % 2!=0)
                                    <tr>
                                    @endif

                                    <th>
                                        <article class="box">
                                            <div class="card-body ">

                                            <table>
                                                <tr>
                                                <h1 class="card-title upper "> <p style="background-color:powderblue;">{{$item->service->name}}</p></h1>
                                                </tr>

                                                <tr>
                                                <h3 class="card-text upper"><b><p style="background-color:powderblue;">By: {{$item->technician->name}}</b></p></h3>
                                                </tr>

                                                <tr>
                                                <h3 class="card-text upper "><p style="background-color:powderblue;"><b>Date: {{$item->date}}</p></b></h3>
                                                </tr>

                                                <tr>
                                                <p class="card-text upper"><p style="background-color:powderblue;"><b>From <br>{{$item->slot->start_time}}<br> </p> </p> <p class="card-text upper"> <p style="background-color:powderblue;">To <br> {{$item->slot->end_time}}</b></p></p>
                                                </tr>
                                            </table>
                                            </div>
                                        </article>
                                    </th>
                                    
                                    @if($item->id % 2==0)
                                    </tr>
                                    @endif
                                @endforeach

                            </tr>
                        </table>
                    @endif
                    </form>
                    </div>
                    </div>
                    </div>
            </div>
            </div>
            @else
                <div class="card-body">
                    <h2>Empty Cart<i class="fa fa-shopping-cart"></i></h2>
                    <a href="{{url('/')}}" class="btn btn-success">Return Home</a>
                </div>
            @endif
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Service</td>
                        <td>Date</td>
                        <td>Slot</td>
                        <td>Technician</td>
                    </tr>
                    </thead>
                    <tbody>
     
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->service->name}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->slot->start_time}}-{{$item->slot->end_time}}</td>
                        <td>{{$item->technician->name}}</td>
                    </tr>
                    @endforeach                    
                    </tbody>
                </table>
            </div>
    </div>



@yield('content')

@section('scripts')

        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

            {{-- <script>
                  var availableTags = [];
                  $.ajax({
                    method: "GET",
                    url: "/product_list",
                    success: function(response){
                        startAutoComplete(response);
                    }
                  });
                  function startAutoComplete(availableTags)
                  {
                    $( "#search_product" ).autocomplete({
                    source: availableTags
                  });
                  }
                  
                </script>
    
    <script>
        
        $('.delete-item').click(function(e){
            e.preventDefault();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajax({
                method:"POST",
                url: "delete-item",
                data: {
                    'prod_id':prod_id,
                },
                success: function(response)
                {
                    window.location.reload();
                    swal("",response.status, "success");
                }
            });
        });


        
        $(document).ready(function(){
            $('.increment-btn').click(function (e){
                e.preventDefault();
                var inc_val= $(this).closest('.product_data').find('.qty-input').val()
                var permit= $(this).closest('.product_data').find('.available').val()
                var value = parseInt(inc_val,10);
                value = isNaN(value)? 0 : value;
                if(value<=permit && value<10)
                {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }

                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            
            $.ajax({
                type: "POST",
                url: "update-cart",
                data: {
                    'prod_id':prod_id,
                    'prod_qty': qty,
                },
                success: function (response) {
                    window.location.reload();
                    swal("",response.status, "success");
                }
            });
            });
        });
    
        $(document).ready(function(){
            $('.decrement-btn').click(function (e){
                e.preventDefault();
                var dec_val= $(this).closest('.product_data').find('.qty-input').val()
                var value = parseInt(dec_val,10);
                value = isNaN(value)? 0 : value;
                if(value>1)
                {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            
            $.ajax({
                type: "POST",
                url: "update-cart",
                data: {
                    'prod_id':prod_id,
                    'prod_qty': qty,
                },
                success: function (response) {
                    window.location.reload();
                    swal("",response.status, "success");
                }
            })
            });
        });

    

        
    </script> --}}

@endsection

@yield('scripts')
    
