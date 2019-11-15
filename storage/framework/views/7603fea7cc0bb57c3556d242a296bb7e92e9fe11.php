 
<?php $__env->startSection('title' , 'تفاصيل البنود الفرعية للبلاغات'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center"><?php echo e(Session::get('message')); ?></div>
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
            <h3 class="box-title">  تفاصيل بنود البلاغات الفرعية</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo e(route('report_sub_details.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                               اضافة تفصيل جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
                <div class="col-lg-8">
                <table id="Comm" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>تفصيل البند </th>
                        <th>نوع البند</th>
                        <th colspan="2" class="text-center"> الاجراء   </th>
                    </tr>
                    </thead> 
                    <?php $__currentLoopData = $report_sub_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kay=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if(isset($value->id)): ?>
                                    <?php echo e($value->id); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($value->name)): ?>
                                    <?php echo e($value->name); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($value->report_sub_types->name)): ?>
                                    <?php echo e($value->report_sub_types->name); ?>

                                <?php endif; ?>
                            </td>
                            <td> 
                                <a  class="btn btn-success" href="<?php echo e(route('report_sub_details.edit',$value->id)); ?>">
                                    تعديل

                                </a>
                            </td>
                            <td>
                                <form  action="<?php echo e(route('report_sub_details.destroy',$value->id)); ?>"method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                    <button    type="submit" class="btn btn-danger">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-footer">


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>