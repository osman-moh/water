 

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center message"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
        
        <div class="box box-default">
        
            <div class="box-header with-border">
                <h3 class="box-title"> البلاغات </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-4">
                        <a href="<?php echo e(route('reports.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                        بلاغ جديد
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-md-11 table-responsive">
                            <table class="table hover table-hover table-bordered" id="reportsTable">
                                <thead>
                                    <tr>
                                        <th># </th>
                                        <th>مكان البلاغ</th>
                                        <th>تاريخ البلاغ</th>
                                        <th>اسم المبلغ</th>
                                        <th>مسؤول الصيانة</th>
                                        <th>م. الصيانة</th>
                                        <th>إجراء</th>
                                        <th>حالة البلاغ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr onclick="window.location='/reports/<?php echo e($report->id); ?>'" style="cursor: pointer;">
                                            <td><?php echo e($report->id); ?></td>
                                            <td>
                                                <?php if(isset($report->locality->name)): ?>
                                                <?php echo e($report->locality->name); ?> 
                                                <?php endif; ?>
                                                    
                                            </td>
                                            <td><?php echo e($report->created_at); ?></td>
                                            <td><?php echo e($report->name); ?></td>
                                            <td><?php echo e($report->manager_name); ?></td>
                                            <td>
                                                <?php if(isset($report->office->name)): ?>
                                                    <?php echo e($report->office->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td></td>
                                            <td>
                                                <?php if(isset($report->status->name)): ?>
                                                    <?php echo e($report->status->name); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!-- ./container -->

            </div>

        </div>
        
        <div class="box-footer">
        </div>

   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

        <script>
            $(document).ready(function(){
                $('#reportsTable').DataTable();
                
                $('.message').hide(4000);

            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>