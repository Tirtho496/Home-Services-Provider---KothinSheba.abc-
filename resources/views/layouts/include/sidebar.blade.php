<div class="sidebar" data-color="blue">

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('dashboard')?'active':''}}">
            <a href="{{url('dashboard')}}">
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{Request::is('services')?'active':''}}">
            <a href="{{url('services')}}">
              <p>Services</p>
            </a>
          </li>
          <li class =" {{Request::is('add-service')?'active':''}}"">
            <a href="{{url('add-service')}}">
              <p>Add Services</p>
            </a>
          </li>

          <li class =" {{Request::is('view-order')?'active':''}}">
            <a href="{{url('view-order')}}">
              <p>View Orders</p>
            </a>
          </li>

          <li class =" {{Request::is('view-coupons')?'active':''}}">
            <a href="{{url('view-coupons')}}">
              <p>View Coupons</p>
            </a>
          </li>

          <li class =" {{Request::is('add-coupons')?'active':''}}">
            <a href="{{url('add-coupons')}}">
              <p>Add Coupons</p>
            </a>
          </li>

          <li class =" {{Request::is('technician-panel')?'active':''}}">
            <a href="{{url('technician-panel')}}">
              <p>Technician Panel</p>
            </a>
          </li>

          <li class =" {{Request::is('view-users')?'active':''}}">
            <a href="{{url('view-users')}}">
              <p>View Users</p>
            </a>
          </li>

          <li class =" {{Request::is('view-comments')?'active':''}}">
            <a href="{{url('view-comments')}}">
              <p>View Comments</p>
            </a>
          </li>

          <li class =" {{Request::is('timeslots')?'active':''}}">
            <a href="{{url('timeslots')}}">
              <p>Timeslots</p>
            </a>
          </li>
        </ul>
      </div>
    </div>