@include('layouts.include.frontendnavbar')
@include('layouts.include.links')

@section('title')
Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h5 class="mb-0">Your Cart</h5>
        </div>
    </div>
    <div class="container">
        <div class="card shadow ">
            @if($items->count()>0)
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
                    @php
                        $total = 0;
                    @endphp
                    @foreach($items as $item)
                    @php
                        $total+=$item->service->price
                    @endphp
                    <tr>
                        <td>{{$item->service->name}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->slot->start_time}}-{{$item->slot->end_time}}</td>
                        <td>{{$item->technician->name}}</td>
                    </tr>
                    
                    </tbody>
                @endforeach
            </div>

            <div class="card-footer">
                <h6>Total Price: BDT {{$total}}

                <a href="{{url('checkout')}}" class="btn btn-success float-end">Proceed to Checkout</a></h6>
            </div>
        
            @else
                <div class="card-body">
                    <h2>Empty Cart<i class="fa fa-shopping-cart"></i></h2>
                    <a href="{{url('/')}}" class="btn btn-success">Return Home</a>
                </div>
            @endif
        </div>
    </div>
@endsection

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
    
