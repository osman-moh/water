@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the logo and sidebar -->
  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{route('home')}}"><i class="fa fa-home"></i><span>القائمة الرئيسة</span></a>
            </li>

            <li class="treeview">
                <a href="{{route('reports.index')}}"><i class="fa fa-cubes"></i><span>البلاغات</span></a>
            </li>

            @if (auth()->user()->user_type_id == 1)

            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i><span>إعدادات البلاغات</span></a>
                <ul class="treeview-menu">
                  <li class="treeview">
                      <a href="{{route('locations.index')}}"><i class="fa fa-circle-o"></i><span>مواقع البلاغلات</span></a>
                  </li>

                  <li class="treeview">
                      <a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i><span>تصنيف البلاغات</span></a>
                  </li>

                  <li class="treeview">
                      <a href="{{ route('reportType.index') }}"><i class="fa fa-circle-o"></i><span>انواع البلاغ</span></a>
                  </li>

                  <li class="treeview">
                      <a href="{{ route('report_sub_types.index') }}"><i class="fa fa-circle-o"></i><span>البنود الفرعية للبلاغات</span></a>
                  </li>
                  <li class="treeview">
                      <a href="{{ route('report_sub_details.index') }}"><i class="fa fa-circle-o"></i><span>تفاصيل البنود الفرعية</span></a>
                  </li>
                </ul>
            </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-map"></i><span>إعدادات المناطق</span></a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                          <a href="{{ route('cities.index') }}"><i class="fa fa-circle-o"></i><span>المناطق الكبري</span></a>
                      </li>
                      <li class="treeview">
                          <a href="{{ route('localities.index') }}"><i class="fa fa-circle-o"></i><span>المحليات</span></a>
                      </li>
                      <li class="treeview">
                          <a href="{{ route('offices.index') }}"><i class="fa fa-circle-o"></i><span>المكاتب الفرعية</span></a>
                      </li>
                      <li class="treeview">
                          <a href="{{ route('towns.index') }}"><i class="fa fa-circle-o"></i><span>المدن</span></a>
                      </li>
                      <li class="treeview">
                          <a href="{{ route('squares.index') }}"><i class="fa fa-circle-o"></i><span>المربعات</span></a>
                      </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i><span>إعدادات المستخدمين</span></a>
                    <ul class="treeview-menu">
                      <li class="treeview"><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i><span>المستخدمين</span></a></li>
                      <li class="treeview"><a href="{{ route('usersType.index') }}"><i class="fa fa-circle-o"></i><span>تصنيف المستخدمين</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-dashboard"></i><span>التقارير</span></a>
                    <ul class="treeview-menu">
                      {{--  <li class="treeview"><a href="{{ route('water-reports.create') }}"><i class="fa fa-bar-chart"></i><span>التقارير العامة</span></a></li>  --}}
                      <li class="treeview"><a href="{{ route('water-reports.index') }}"><i class="fa fa-file-o"></i><span>إنشاء تقرير</span></a></li>
                      {{-- <li class="treeview"><a href="{{ route('water-reports.gis') }}"><i class="fa fa-circle-o"></i><span>تقارير GIS</span></a></li> --}}
                    </ul>
                </li>
            
            @endif
          </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
