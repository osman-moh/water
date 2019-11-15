    
	<?php $__env->startSection('title' , 'تعديل بيانات مستخدم'); ?>
    <?php $__env->startSection('content'); ?>

        <div class="container">
            <hr>
            <div class="row"></div>
            <hr>
            <div class="row" dir="rtl">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel ">
                        <div class="panel-heading">تعديل بيانات مستخدم  </div><hr>
                        <div class="panel-body">
                            <form   class="form-horizontal"  method="post" action="<?php echo e(route('user.update', $user->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="name" class="col-md-4 control-label">الاسم</label>

                                    <div class="col-md-6">
                                        <input  id="name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required autofocus>

                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label">البريد</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="col-md-4 control-label">كلمة السر</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">تاكيد كلمة السر</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="phone" class="col-md-4 control-label">رقم الهاتف</label>
    
                                        <div class="col-md-6">
                                            <input id="phone" type="number" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">نوع المستخدم   </label>
                                    <div class="col-md-6">
                                        <select name="type"  class="form-control" >
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type->id); ?>" <?php echo e(($type->id==$user->type)?'selected' :''); ?>>
                                                    <?php echo e($type->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                        <label for="city_id" class="col-md-4 control-label">المنطقة</label>
                                        <div class="col-md-6">
                                            <select name="city_id" id="city_id" class="form-control">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>" <?php echo e(($city->id==$user->city_id)?'selected' :''); ?>>
                                                        <?php echo e($city->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="office_id" class="col-md-4 control-label">المكتب</label>
                                        <div class="col-md-6">
                                            <select name="office_id" id="office_id" class="form-control">
                                                <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($office->id); ?>" <?php echo e(($office->id==$user->office_id)?'selected' :''); ?>>
                                                        <?php echo e($office->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                </div>


                                <hr>
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                    </div>
                                    <div class="col-md-3"><a href="/user" class="btn btn-danger">إلغاء</a></div>
                                </div>
                                

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ./container -->
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('javascript'); ?>
    <script>
        $('document').ready(function(){
            $("#city_id").change(
                function () {
                    var id = $(this).val();
                    $.get('/city-offices-list/'+id,
                        function(data){
                            var options = '<option></option>' ;
                            $.each(data , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#office_id').html(options);
                        });

                }
            );
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>