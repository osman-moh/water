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
                    <a href="<?php echo e(route('Comm.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
بلاغ جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
<div class="table-responsive">
                <table id="Comm" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>مكان البلاغ</th>
                        <th> التاريخ</th>
                        <th> اسم المبلغ  </th>
                        <th >  هاتف1   </th>
                        <th>  النوع </th>
                         <th > المسؤل  </th>
                        <th>  الهاتف</th>
                        <th >  المنطقة   </th>
                        <th > المحلية    </th>
                        <th > م. فرعي   </th>
                        <th > المدنية    </th>
                        <th > المربع    </th>
                        <th > رقم المنزل    </th>
                     <!--   <th >  الوصف    </th>
                        <th >  نوع      </th>-->
                        <th > انشاء     </th>
                        <th > تحديث     </th>
                        <th colspan="3" > الاجراء     </th>
                    </tr>
                    </thead>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="<?php echo e($value->stats==0?"bg-danger":""); ?>">
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->loction); ?></td>
                        <td><?php echo e($value->date); ?></td>
                        <td><?php echo e($value->name); ?></td>
                        <td><?php echo e($value->phone1); ?></td>
                        <td><?php echo e($value->type); ?></td>
                          <td><?php echo e($value->wokername); ?></td>
                          <td><?php echo e($value->phone1); ?></td>
                        <td><?php echo e(empty($value['Lloction']->name)?"":$value['Lloction']->name); ?></td>






                        <td><?php echo e($value->Housenumber); ?></td>
                    <!--    <td>//$value->description}}</td>
                        <td>//$value->type}}</td>-->

                        <td><?php echo e($value->created_at); ?></td>
                        <td><?php echo e($value->updated_at); ?></td>
                        <td>
                            <a  class="btn btn-success" href="<?php echo e(route('Comm.edit',$value->id)); ?>">
                                تعديل

                            </a>
                        <td>
                        <td>

                            <form  action="<?php echo e(route('Comm.destroy',$value->id)); ?>"method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                <button    type="submit" class="btn btn-danger">
                                    <i class="fa fa-fw fa-remove"></i>
                                </button>
                            </form>




                        </td>
                            <td>
                                <?php if($value->stats==0): ?>
                                <a  class="btn btn-success" href="<?php echo e(route('Commdone',$value->id)); ?>">
                                   جاري حل المشكلة

                                </a>
                                    <?php else: ?>
                                    <a  class="btn btn-success" href="<?php echo e(route('Commundone',$value->id)); ?>">

تم حل المشكلة
                                    </a>

                                    <?php endif; ?>

                            </td>

                    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
            </div>
                <?php echo e($data->links()); ?>

            </div>
        </div>
        <div class="box-footer">




        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>