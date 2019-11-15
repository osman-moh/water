@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the logo and sidebar -->
  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
          <li  id="tour_step4">
            <a href="{{route('home')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>القائمة الرئيسة</span>
            </a>
          </li>
            <li  id="tour_step4">
                <a href="{{route('reports.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>البلاغات</span>
                </a>
            </li>
            @if (auth()->user()->type == 1)
            <li  id="tour_step4">
              <a href="{{route('locations.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                مواقع البلاغلات
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('category.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                تصنيف البلاغات
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('cities.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                  المناطق الكبري
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('localities.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    المحليات
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('offices.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    المكاتب الفرعية
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('towns.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    المدن
              </span>
              </a>
            </li>
            <li  id="tour_step4">
              <a href="{{route('squares.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    المربعات
              </span>
              </a>
            </li>
            <li  id="tour_step4">
                <a href="{{route('usersType.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                  تصنيف المستخدمين
                </span>
                </a>
              </li>
            <li  id="tour_step4">
              <a href="{{route('user.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    المستخدمين
              </span>
              </a>
            </li>
            <li id="tour_step4">
                <a href="{{route('reportType.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                      انواع البلاغ
                </span>
                </a>
            </li>
            <li id="tour_step4">
                <a href="{{route('report_sub_types.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    البنود الفرعية للبلاغات
                </span>
                </a>
            </li>
            <li id="tour_step4">
              <a href="{{route('report_sub_details.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                  تفاصيل البنود الفرعية
              </span>
              </a>
          </li>
            @endif
          </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
