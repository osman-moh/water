<?php $__env->startSection('content'); ?>
    <div class="row" dir="rtl">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel ">
                <div class="panel-heading text-right ">تعديل  المستخدمين  </div>
                <div class="panel-body">
                    <form   class="form-horizontal"  method="post" action="<?php echo e(route('user.update', $user->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="PUT">

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
                            <label for="password-confirm" class="col-md-4 control-label">نوع المستخدم   </label>
                            <div class="col-md-6">
                                <select name="type"  class="form-control" >
                                    <option value="1"> مدير</option>
                                    <option value="0">مدخل بلاغات</option>

                                </select>
                            </div>
                        </div>
                        <button type="submit">تعديل بيانات المستخدمين
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>