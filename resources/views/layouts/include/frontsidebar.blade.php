<div class="border-end bg-dark" id="sidebar-wrapper">
  <div class="sidebar-heading bg-dark"><a style="text-decoration: none;" href="{{ url('/') }}"><img class="slider-logo" src="{{asset('images/logo.png')}}"><h4>KothinSheba.abc<h4></a></div>
  <div class="list-group list-group-flush bg-dark">
      @foreach($service as $item)
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{url('service/'.$item->slug)}}">{{$item->name}}</a>   
      @endforeach
  </div>
</div>