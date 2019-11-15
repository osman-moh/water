<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
          <li  id="tour_step4">
            <a href="<?php echo e(route('reports.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>البلاغات</span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('locations.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
              مواقع البلاغلات
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('category.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
              تصنيف البلاغات
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('cities.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                 المناطق الكبري
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('localities.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                  المحليات
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('offices.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                  المكاتب الفرعية
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('towns.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                   المدن
            </span>
            </a>
          </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('squares.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                   المربعات
            </span>
            </a>
          </li>
          <li  id="tour_step4">
              <a href="<?php echo e(route('usersType.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                تصنيف المستخدمين
              </span>
              </a>
            </li>
          <li  id="tour_step4">
            <a href="<?php echo e(route('user.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                   المستخدمين
            </span>
            </a>
          </li>
          <li  id="tour_step4">
              <a href="<?php echo e(route('reportType.index')); ?>" id="tour_step4_menu"><i class="fa fa-fw fa-cube"></i> <span>
                    انواع البلاغ
              </span>
              </a>
            </li>
          </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
