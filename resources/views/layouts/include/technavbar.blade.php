<div class="sidebar" data-color="blue">

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('tech-dashboard')?'active':''}}">
            <a href="{{url('tech-dashboard')}}">
              <p>Dashboard</p>
            </a>
          </li>
          

          <li class =" {{Request::is('view-orders')?'active':''}}">
            <a href="{{url('view-orders')}}">
              <p>View Orders</p>
            </a>
          </li>

          <li class =" {{Request::is('view-user')?'active':''}}">
            <a href="{{url('view-user')}}">
              <p>View Users</p>
            </a>
          </li>

          
        </ul>
      </div>
    </div>