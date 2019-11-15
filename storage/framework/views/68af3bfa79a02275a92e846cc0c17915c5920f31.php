<?php $__env->startSection('title' , 'المربعات'); ?>
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
            <h3 class="box-title"> المربعات   </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo e(route('squares.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                         اضافة مربع جديد
                    </a>
                </div>
            </div>
           
            <div class="row" >

                <table  class="table" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>المربع   </th>
                        <th>المنطقة الكبري </th>
                        <th>المحلية  </th>
                        <th>المدينة  </th>
                       
                        <th colspan="2"> الاجراء     </th>
                    </tr>
                    </thead>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td>
                                <?php if(isset($value['city']->name)): ?>
                                    <?php echo e($value['city']->name); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($value['locality']->name)): ?>
                                    <?php echo e($value['locality']->name); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($value['town']->name)): ?>
                                    <?php echo e($value['town']->name); ?>

                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <a  class="btn btn-success" href="<?php echo e(route('squares.edit',$value->id)); ?>">
                                    تعديل
                                </a>
                            </td>
                                <td>

                                    <form  action="<?php echo e(route('squares.destroy',$value->id)); ?>"method="POST">
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
        <div class="box-footer">

            <?php echo e($data->links()); ?>



        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

        <script>
            $(document).ready(function(){
               
                $('.message').hide(4000);

            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>