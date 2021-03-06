
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->email }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
           
           @if(Auth::user()->role === 'superadmin')
              <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('dental/users') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ url('dental/users/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
              </ul>
            </li>
           @endif
            
         <!--   @if(Auth::user()->role === 'admindental')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Staff</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('dental/staffs') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ url('dental/staffs/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
              </ul>
            </li>
             @endif
-->
             @if(Auth::user()->role === 'admindental')
           
             <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Clinic</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <a href="#"><i class="fa fa-circle-o"></i> Clinics <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                   <li><a href="{{ url('dental/clinics') }}"><i class="fa fa-circle-o"></i> List</a></li>
                    <li><a href="{{ url('dental/clinics/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                     
                    </li>
                  </ul>
                </li>
               
              </ul>
              <ul class="treeview-menu">
                  <a href="#"><i class="fa fa-circle-o"></i> Patient <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('dental/patients') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ url('dental/patients/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                     
                    </li>
                  </ul>
                </li>
               
              </ul>
            </li>

            @endif

              <!--<li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Dental Details</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/details') }}"><i class="fa fa-circle-o"></i> List</a></li>
                      <li><a href="{{ url('dental/details/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                  </ul>
              </li>-->


               @if(Auth::user()->role === 'admindental')
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Services</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/services') }}"><i class="fa fa-circle-o"></i> List</a></li>
                      <li><a href="{{ url('dental/services/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                  </ul>
              </li>
              @endif



             <!-- @if(Auth::user()->role === 'admindental')
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Transfer</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/transfers') }}"><i class="fa fa-circle-o"></i> List</a></li>
                      
                  </ul>
              </li>
              @endif-->

<!-- 
              @if(Auth::user()->role === 'admindental')
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Appointment</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/set/appointments') }}"><i class="fa fa-circle-o"></i> List</a></li>
                      <li><a href="{{ url('dental/appointments/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                  </ul>
              </li>
              @endif
 -->          
        @if(Auth::user()->role === 'superadmin')
                    <li class="treeview">
                    <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>Request</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('dental/request') }}"><i class="fa fa-circle-o"></i> List</a></li>
                    </ul>
                  </li>
           @endif

              @if(Auth::user()->role === 'superadmin')
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Subscriptions</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/subscriptions') }}"><i class="fa fa-circle-o"></i> List</a></li>
                  </ul>
              </li>
              @endif



               <li class="treeview">
                  <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Payment</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('dental/payments') }}"><i class="fa fa-circle-o"></i> view</a></li>
                  </ul>
              </li>

                  @if(Auth::user()->role === 'admindental')
                 <li class="treeview">
                    <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>Dentists</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('dental/dentists') }}"><i class="fa fa-circle-o"></i> List</a></li>
                      <li><a href="{{ url('dental/dentists/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                    </ul>
                  </li>
                  @endif

                @if(Auth::user()->role === 'admindental')
             <li class="treeview">
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Anouncements</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('dental/anouncements') }}"><i class="fa fa-circle-o"></i> List</a></li>
                  <li><a href="{{ url('dental/anouncements/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                </ul>
              </li>
              @endif


          <li class="treeview">
              <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Products</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ url('dental/products') }}"><i class="fa fa-circle-o"></i> List</a></li>
                  <li><a href="{{ url('dental/products/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
              </ul>
          </li>

           
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
