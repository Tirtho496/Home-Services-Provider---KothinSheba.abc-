@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h5 class="mb-0">Trending Service</h5>
        </div>
    </div>

    <div class="py-5">
        <div class ="container">
            
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($feat_serv as $item)
                        <div class = "item">
                            <div class="card ">
                                
                                <a href ="{{url('service/'.$item->slug)}}" style="text-decoration: none; color:black;">
                                <img style ="width:100%;height:150px; object-fit:cover; " src="{{asset('assets/uploads/service/'.$item->image)}}" alt="Trending Categories"></a>
                                
                                
                                <div class ="card-body" style="background-color:rgba(22,28,45); color:antiquewhite">
                                    <h6>{{$item->name}}</h6>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                        
            </div>
        </div>
    </div>

    
    <div class="contact">
       <h3>Contact Us</h3>
      <form action="{{url('place-comment')}}" method="POST">      
        {{csrf_field()}}
        <input name="name" type="text" class="feedback-input" placeholder="Name" />   
        <input name="email" type="text" class="feedback-input" placeholder="Email" />
        <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
        <input type="submit" value="SUBMIT"/>
      </form>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

jQuery('#datepicker').datepicker({
    timepicker:false,
    formatDate:'Y/m/d',
    minDate:'0',
    maxDate:'0+6'
});
</script>
@endsection