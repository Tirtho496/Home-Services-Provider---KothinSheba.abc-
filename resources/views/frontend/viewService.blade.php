@extends('layouts.frontend')

@section('title',$serv->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h5 class="mb-0">{{$serv->name}}</h5>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/service/'.$serv->image)}}" class="w-100" alt="">
                    <label class="badge bg-success" style="margin:5px; padding:5px;">Tk.{{$serv->price}}</label>
                </div>

                <div class="col-md-4 border-right">
                    <h5>Select A Date</h5>
                    <div class="row">
                        <form action="{{url('go-technician')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12" style="margin-bottom:5px;">
                            <input type = "text" size="30" class="form-control" id="datepicker" name="date" required>
                        </div>

                        <div class = "col-md-12" style="margin-bottom:5px;">
                            <select class="form-select" name="slot" aria-label="Default select example" required>
                                <option value="" >Select Slot</option>
                                @foreach($slot as $item)
                                    <option value = "{{$item->id}}">{{$item->start_time}} - {{$item->end_time}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class = "col-md-12" style="margin-bottom:5px;">
                            <select class="form-select" name="technician" aria-label="Default select example">
                                <option value="">Select Technician</option>
                                @foreach($technician as $item)
                                    <option value = "{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <input type="hidden" value="{{$serv->id}}" name="service_id">
                            <button type="submit" class="btn btn-success me-3 float-start add-to-cart">Add to Cart <i class="fa fa-shopping-cart"></i> </button>
                        </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-4 border-right">
                <div class="row">
                    <h5>Emergency Service!</h5>
                    <form>
                        <div class="col-md-12">
                            <input type="hidden" value="{{$serv->id}}" name="service_id">
                            <!-- <a href="{{url('delete-cart/'.$item->i)}}"style=" background-color:Red" class="btn btn-danger">Book Now</a> -->
                            <a href="{{url('book-emergencycart/'.$serv->id)}}"style=" background-color:Red" class="btn btn-danger">Book Now</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
                
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    jQuery('#datepicker').datepicker({
    timepicker:false,
    formatDate:'Y/m/d',
    minDate:'0',
    maxDate:'0+6'
});
      
</script>

<script>

    // $(document).ready(function (){
    //     $('.add-to-cart').click(function(e){
    //         e.preventDefault();

    //         var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //         var product_qty = $(this).closest('.product_data').find('.qty-input').val();


    //         $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
            
    //         $.ajax({
    //             method: "POST",
    //             url: "/add-to-cart",
    //             data: {
    //                 'product_id': product_id,
    //                 'product_qty': product_qty,
    //             },
    //             success: function(response){
    //                 alert(response.status);
    //             }
    //         });

    //     });
    // });

    // $(document).ready(function (){
    //     $('.add-to-wishlist').click(function(e){
    //         e.preventDefault();

    //         var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //         var product_qty = $(this).closest('.product_data').find('.qty-input').val();


    //         $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
            
    //         $.ajax({
    //             method: "POST",
    //             url: "/add-to-wishlist",
    //             data: {
    //                 'product_id': product_id,
    //                 'product_qty': product_qty,
    //             },
    //             success: function(response){
    //                 alert(response.status);
    //             }
    //         });

    //     });
    // });

    // $(document).ready(function(){
    //     $('.increment-btn').click(function (e){
    //         e.preventDefault();
    //         var inc_val= $(this).closest('.product_data').find('.qty-input').val()
    //         var permit= $(this).closest('.product_data').find('.available').val()
    //         var value = parseInt(inc_val,10);
    //         value = isNaN(value)? 0 : value;
    //         if(value<permit && value<10)
    //         {
    //             value++;
    //             $(this).closest('.product_data').find('.qty-input').val(value);
    //         }
    //     });
    // });

    // $(document).ready(function(){
    //     $('.decrement-btn').click(function (e){
    //         e.preventDefault();
    //         var dec_val= $(this).closest('.product_data').find('.qty-input').val()
    //         var value = parseInt(dec_val,10);
    //         value = isNaN(value)? 0 : value;
    //         if(value>1)
    //         {
    //             value--;
    //             $(this).closest('.product_data').find('.qty-input').val(value);
    //         }
    //     });
    // });
</script>


@endsection