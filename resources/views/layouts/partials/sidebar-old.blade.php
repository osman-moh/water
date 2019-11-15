@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
           <li  id="tour_step4">
            <a href="{{route('home')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span><h4>الرئيسية</h4></span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="{{route('reports.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span><h4>البلاغات</h4></span>
            </a>
          </li>
        

            <button class="dropdown-btn"><h4>اعدادات النظام </h4>
             <i class="fa fa-caret-down"></i>
            </button>

       <div class="dropdown-container">
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
          <li  id="tour_step4">
              <a href="{{route('reportType.index')}}" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    انواع البلاغ
              </span>
              </a>
            </li>
  </div>
         

          </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "show") {
  dropdownContent.style.display = "show";
  } else {
  dropdownContent.style.display = "show";
  }
  });
}
</script>