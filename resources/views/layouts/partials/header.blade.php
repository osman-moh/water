
<!-- Main Header -->
  <header class="main-header no-print" style="
    background-color: #00c0ef;
">

    <!-- Header Navbar -->

    <nav class="navbar navbar-static-top" role="navigation">


      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">


        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span>{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
 
               
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a  href="{{ route('logout') }}" class="btn btn-default btn-flat"
                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                     style="
    background: rgba(117, 166, 0, 0.18);
    will-change: inherit;
    width: 138px;
    height: inherit;" >
                                                       خروج
                  </a>

                   
                  <a   data-toggle="modal" data-target="#changpasswoerd" class="btn btn-default btn-flat"   style="
    background: rgba(117, 166, 0, 0.18);
    will-change: inherit;
    width: 113px;
    height: inherit;">
       
                    تغير كلمة السر
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>