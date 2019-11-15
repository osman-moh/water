 
    
	<?php $__env->startSection('title' , 'تفاصيل بلاغ'); ?>
    <?php $__env->startSection('content'); ?>
        <div class="box box-default">

            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
                    <!-- /.box-header -->
                    
            <div class="box-body">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>بيانات البلاغ</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>مكان استقبال البلاغ</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                <?php if(isset( $report->location->name )): ?> 
                                 <?php echo e($report->location->name); ?>

                                <?php endif; ?>
                                الخرطوم
                            </h5>
                        </div>
                        <div class="col-md-2"><h5><strong>تاريخ استقبال البلاغ</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                    <?php if(isset( $report->date )): ?>
                                    <?php echo e($report->date); ?>

                                   <?php endif; ?>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>نوع الجهة المبلغة</strong></h5></div>
                        <div class="col-md-1">
                            <h5>
                                <?php if(isset($report->category->name )): ?>
                                    <?php echo e($report->category->name); ?>

                                <?php endif; ?>
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>اسم المبلغ</strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                            
                            <?php if(isset( $report->name )): ?>
                            <?php echo e($report->name); ?>

                           <?php endif; ?>
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>رقم الهاتف</strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                                    <?php if(isset( $report->phone1 )): ?>
                                    <?php echo e($report->phone1); ?>

                                   <?php endif; ?>
                            </h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>المنطقة الكبرى</strong></h5></div>
                        <div class="col-md-1">
                            <h5>
                                <?php if(isset( $report->city->name )): ?>
                                <?php echo e($report->city->name); ?>

                               <?php endif; ?>
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>المحلية</strong></h5></div>
                        <div class="col-md-2"><h5>
                           
                            <?php if(isset( $report->locality->name )): ?>
                            <?php echo e($report->locality->name); ?>

                           <?php endif; ?>
                            </h5></div>

                        <div class="col-md-1"><h5><strong>المكتب</strong></h5></div>
                        <div class="col-md-2"><h5>
                           
                            <?php if(isset( $report->office->name )): ?>
                            <?php echo e($report->office->name); ?>

                           <?php endif; ?>
                        </h5></div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-1"><h5><strong>المدينة</strong></h5></div>
                            <div class="col-md-2"><h5>
                               
                                <?php if(isset( $report->town->name )): ?>
                                <?php echo e($report->town->name); ?>

                               <?php endif; ?>
                            </h5></div>

                            <div class="col-md-1"><h5><strong>المربع</strong></h5></div>
                            <div class="col-md-2"><h5>
                                    <?php if(isset( $report->square->name )): ?>
                                    <?php echo e($report->square->name); ?>

                                   <?php endif; ?>
                                </h5></div>

                            <div class="col-md-1"><h5><strong>رقم المنزل</strong></h5></div>
                            <div class="col-md-2"><h5>
                                    <?php if(isset( $report->house_number )): ?>
                                    <?php echo e($report->house_number); ?>

                                   <?php endif; ?>
                                </h5></div>
                    </div>
                    <hr> 
                    <div class="row">
                        <div class="col-md-2"><h5><strong>وصف المنزل</strong></h5></div>
                        <div class="col-md-4"><h5>
                                <?php if(isset( $report->house_description )): ?>
                                <?php echo e($report->house_description); ?>

                               <?php endif; ?>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-2"><h5><strong>مدير الصيانة</strong></h5></div>
                            <div class="col-md-4"><h5>
                                    <?php if(isset( $report->manager_name )): ?>
                                        <?php echo e($report->manager_name); ?>

                                    <?php endif; ?>
                                </h5>
                            </div>
                            <div class="col-md-2"><h5><strong>رقم الهاتف</strong></h5></div>
                            <div class="col-md-4"><h5>
                                    <?php if(isset( $report->manager_phone )): ?>
                                    <?php echo e($report->manager_phone); ?>

                                <?php endif; ?>
                                </h5>
                            </div>
                            
                        </div>
                        <hr>
                    <div class="row">
                        <div class="col-md-1"><h5><strong>نوع البلاغ </strong></h5></div>
                        <div class="col-md-2"><h5>
                                <?php if(isset( $report->type->name )): ?>
                                <?php echo e($report->type->name); ?>

                               <?php endif; ?>
                            </h5></div>
                        <div class="col-md-1"><h5><strong>البند الفرعي </strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                                <?php echo e(empty($report->sub_type->name) ? '' : $report->sub_type->name); ?>

                            </h5>
                        </div>
                        <div class="col-md-2"><h5><strong>تفصيل البلاغ </strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                <?php echo e(empty($report->sub_report_detail->name) ? '' : $report->sub_report_detail->name); ?>

                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-1"><h5><strong>حالة البلاغ </strong></h5></div>
                            <div class="col-md-2"><h5><?php echo e(empty($report->status->name)?'': $report->status->name); ?></h5></div>

                            <div class="col-md-2"><h5><strong> تم استلام البلاغ بواسطة </strong></h5></div>
                            <div class="col-md-2">
                                <h5>
                                <?php if(isset( $report->user->name )): ?>
                                    <?php echo e($report->user->name); ?>

                                <?php endif; ?>
                               </h5>
                            </div>

                            <div class="col-md-1"><h5><strong>تاريخ البلاغ </strong></h5></div>
                            <div class="col-md-2"><h5>
                                    <?php if(isset( $report->created_at )): ?>
                                    <?php echo e($report->created_at); ?>

                                   <?php endif; ?>
                                </h5></div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php if(auth()->user()->type != 3): ?>
                            
                        <form action="/reports/update-status/<?php echo e($report->id); ?>" method="post">
                            <?php echo method_field('PATCH'); ?>
                            <?php echo csrf_field(); ?>
                            
                            <div class="row">
                                <div class="col-md-2"><label for="">تعديل حالة البلاغ</label></div>
                                <div class="col-md-2">
                                    <input type="radio" name="report_status" value="1" <?php echo e(($report->report_status == 1)? 'checked' :''); ?>>&nbsp;&nbsp; غير منجز
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="report_status" value="2" <?php echo e(($report->report_status == 2)? 'checked' :''); ?>>&nbsp;&nbsp;منجز
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="report_status" value="3" <?php echo e(($report->report_status == 3)? 'checked' :''); ?>>&nbsp;&nbsp;معلق
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="report_status" value="4" <?php echo e(($report->report_status == 4)? 'checked' :''); ?>>&nbsp;&nbsp;قيد التنفيذ
                                </div>
                                <div class="col-md-3"> 
                                    <button type="submit" class="btn btn-success btn-block">تعديل الحالة</button>
                                 </div>
                            </div><hr>
                        </form>
                        <?php endif; ?>
                        <?php if(auth()->user()->type == 1): ?>
                            
                            <form action="/reports/<?php echo e($report->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div class="row">
                                    <div class="col-md-12"><br><br></div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">
                                        <a href="/reports/<?php echo e($report->id); ?>/edit" class="btn btn-primary btn-block">تعديل البلاغ</a>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <button class="btn btn-danger btn-block" type="submit">حذف البلاغ</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div><hr>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>