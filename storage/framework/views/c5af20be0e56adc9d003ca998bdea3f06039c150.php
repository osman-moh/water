     
    <?php $__env->startSection('content'); ?>


        <?php if(Session::has('status')): ?>
            <div class="alert alert-info"><?php echo e(Session::get('status')); ?></div>
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

        <div class="box box-primary">

                <div class="box-header with-border">
                    <h2 class="box-title"> تعديل بلاغ رقم <u><b><?php echo e($report->id); ?></b></u> </h2>
                </div>
        
                <div class="box-body">
                    <form id="send"  method="POST" action="/reports/<?php echo e($report->id); ?>">
                       
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="col-lg-3">
                                <label> مكان استقبال  البلاغ : </label>
                                <select class="form-control" name="location" required 
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر مكان استقبال  البلاغ')" 
                                oninput="this.setCustomValidity('')" >
        
                                    <option value="<?php echo e(null); ?>"> اختر</option>
                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($location->id); ?>" <?php echo e($report->id==$location->id ?'selected' :''); ?>> 
                                            <?php echo e($location->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label> التاريخ    : </label>
                            <input id="" name="date" type="date"   class="form-control" required value="<?php echo e($report->date); ?>">
                            </div>
        
                            <div class="col-lg-3">
                                <label>الجهة المبلغة  :</label>
                                <select class="form-control" name="reporter_type"   required
                                        oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم الجهة المبلغة  ')"
                                        oninput="this.setCustomValidity('')">
                                    
                                    <option value="<?php echo e(null); ?>"> اختر</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($report->reporter_type==$category->id ?'selected' :''); ?>> 
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>    
                        <hr>
        
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">اسم الشخص المبلغ</label>
                                <input name="name" class="form-control" required pattern="[أ-يa-zA-Z\s]{1,300}"
                                        oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم الشخص المبلغ ')"
                                        oninput="this.setCustomValidity('')"
                                        title="يجب ان يحتوي على حروف " value="<?php echo e($report->name); ?>">
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3">
                                <label for="">رقم الهاتف</label>
                                <input type="number" name="phone1"    class="form-control" required  pattern="[0-9]{12}"   maxlength="10"
                                        oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
                                        oninput="this.setCustomValidity('')"title="يجب ان يحتوي على  ارقام" value="<?php echo e($report->phone1); ?>">
                            </div>
                        </div>
                        <hr>
        
                        <div class="row">
        
                            <div class="col-lg-3">
                                <label for="">المنطقة الكبرى</label>
                                <select id="city_id" class="form-control" name="city_id" required
                                           oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
                                           oninput="this.setCustomValidity('')">
                                    
                                    <option value="<?php echo e(null); ?>"> اختر</option>
                                     <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($report->city_id==$city->id?'selected':''); ?>> 
                                            <?php echo e($city->name); ?>

                                        </option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label for="">المحلية</label>
                                <select name="locality_id" class="form-control" id="locality_id">
                                    <?php $__currentLoopData = $localities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($locality->id); ?>" <?php echo e($report->locality_id==$locality->id?'selected':''); ?>>
                                            <?php echo e($locality->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label for="">المكتب الفرعي</label>
                                <select name="office_id" class="form-control" id="office_id">
                                    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($office->id); ?>" <?php echo e($report->office_id==$office->id?'selected':''); ?>>
                                            <?php echo e($office->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="col-lg-12"><br></div>
        
                            <div class="col-lg-3">
                                <label for="">المدينة</label>
                                <select name="town_id" class="form-control" id="town_id">
                                    <?php $__currentLoopData = $towns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $town): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($town->id); ?>" <?php echo e($report->town_id==$town->id?'selected':''); ?>>
                                            <?php echo e($town->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label for="">مربع</label>
                                <select name="square_id" class="form-control" id="square_id">
                                    <?php $__currentLoopData = $squares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $square): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($square->id); ?>" <?php echo e($report->square_id==$square->id?'selected':''); ?>>
                                            <?php echo e($square->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="col-lg-2">
                                <label for="">رقم المنزل</label>
                                <input type="number" class="form-control" name="house_number" value="<?php echo e($report->house_number); ?>">
                            </div>
                            <div class="col-lg-1"></div>
        
                            <div class="col-lg-12"><br></div>
        
                            <div class="col-lg-6">
                                <label for="">وصف المنزل</label>
                                <textarea name="house_description" id="" cols="30" rows="2" class="form-control">
                                    <?php echo e($report->house_description); ?>

                                </textarea>
                            </div>
        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">مدير الصيانة</label>
                                <input type="text" class="form-control" name="manager_phone" value="<?php echo e($report->manager_name); ?>">
                            </div>
                            <div class="col-lg-3">
                                <label for="">رقم الهاتف</label>
                                <input type="text" class="form-control" name="manager_name" value="<?php echo e($report->manager_phone); ?>">
                            </div>
                        </div>
                        <hr>
        
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">نوع البلاغ</label>
                                <select name="report_type" id="report_type" class="form-control">
                                    <option value="<?php echo e(null); ?>"></option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>" <?php echo e($report->report_type==$type->id?'selected' : ''); ?>>
                                            <?php echo e($type->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label for="">البند الفرعي</label>
                                <select name="report_sub_type" id="report_sub_type" class="form-control">
                                        <option value="<?php echo e($report->report_sub_type); ?>"><?php echo e(empty($report->sub_type->name) ? '' : $report->sub_type->name); ?></option>
                                </select>
                            </div>
        
                            <div class="col-lg-3">
                                <label for="">تفاصيل نوع البلاغ</label>
                                <select name="report_detail" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="1">عطش منزل واحد</option>
                                    <option value="2">عطش أكثر من منزل</option>
                                    <option value="3">أخرى</option>
                                </select>
                            </div>
        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"> حفظ البلاغ</button>
                            </div>
                        </div>
                        <hr>
        
        
        
                    </form>
        
                </div><!-- ./body-box -->
        
            </div><!-- ./box -->
        
        
        
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('javascript'); ?>
          <script>
                $('.datepicker').datepicker({
                    dateFormat:"yy-mm-dd"
                });
        
                $("#city_id").change(
                    function () {
                        var id = $(this).val();
                        $.get('/city-localities-list/'+id,
                            function(data){
                                var options = '<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#locality_id').html(options);
                            });
        
                    }
                );
        
                $("#locality_id").change(
                    function () {
                        var id = $(this).val();
                        $.get('/locality-offices-list/'+id,
                            function(data){
                                var options = '<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#office_id').html(options);
                            });
        
                    }
                );
        
                $("#office_id").change(
                    function () {
                        var id = $(this).val();
                        $.get('/office-towns-list/'+id,
                            function(data){
                                var options = '<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#town_id').html(options);
                            });
        
                    }
                );
        
                $("#town_id").change(
                    function () {
                        var id = $(this).val();
                        $.get('/town-squares-list/'+id,
                            function(data){
                                var options = '<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#square_id').html(options);
                            });
        
                    }
                );
        
                $("#report_type").change(
                    function () {
                        var id = $(this).val();
                        $.get('/report-subtype-list/'+id,
                            function(data){
                                var options = '<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#report_sub_type').html(options);
                            });
        
                    }
                );
        
          </script>
        <?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>