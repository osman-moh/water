  

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
            <h2 class="box-title"> بلاغ جديد  </h2>
        </div>

        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('reports.store')); ?>">
               
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-lg-3">
                        <label> مكان استقبال  البلاغ : </label>
                        <select class="form-control" name="location" required 
                        oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر مكان استقبال  البلاغ')" 
                        oninput="this.setCustomValidity('')" >

                            <option value="<?php echo e(null); ?>"> اختر</option>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>"> <?php echo e($location->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label> التاريخ    : </label>
                        <input id="report_date" name="date" type="date"   class="form-control" required>
                    </div>

                    <div class="col-lg-3">
                        <label>الجهة المبلغة  :</label>
                        <select class="form-control" name="reporter_type"   required
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختيار نوع الجهة المبلغة ')"
                                oninput="this.setCustomValidity('')">
                            
                            <option value="<?php echo e(null); ?>"> اختر</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>    
                <hr>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="">اسم الشخص المبلغ</label>
                        <input id="" type="text" name="name" class="form-control" required pattern="[أ-يa-zA-Z\s]{1,300}"
				                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم الشخص المبلغ ')"
					            oninput="this.setCustomValidity('')"
					            title="يجب ان يحتوي على حروف ">
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3">
                        <label for="">رقم الهاتف</label>
                        <input type="tel" name="phone1" class="form-control phone_number" required  min="10"  max="10"
				                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
					            oninput="this.setCustomValidity('')"title="يجب ان يحتوي على  ارقام">
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
                                <option value="<?php echo e($city->id); ?>"> <?php echo e($city->name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">المحلية</label>
                        <select name="locality_id" class="form-control" id="locality_id"></select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">المكتب الفرعي</label>
                        <select name="office_id" class="form-control" id="office_id"></select>
                    </div>

                    <div class="col-lg-12"><br></div>

                    <div class="col-lg-3">
                        <label for="">المدينة</label>
                        <select name="town_id" class="form-control" id="town_id"></select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">مربع</label>
                        <select name="square_id" class="form-control" id="square_id"></select>
                    </div>

                    <div class="col-lg-2">
                        <label for="">رقم المنزل</label>
                        <input type="number" class="form-control" id="house_number" name="house_number">
                    </div>
                    <div class="col-lg-1" id=""></div>
                    <div class="col-lg-12">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6" id="report_status"></div>
                        
                    </div>
                    <div class="col-lg-12"><br></div>

                    <div class="col-lg-6">
                        <label for="">وصف المنزل</label>
                        <textarea name="house_description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">مدير الصيانة</label>
                        <input type="text" class="form-control" name="manager_name" id="manager_name">
                    </div>
                    <div class="col-lg-3">
                        <label for="">رقم الهاتف</label>
                        <input type="text" class="form-control" name="manager_phone" id="manager_phone">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">نوع البلاغ</label>
                        <select name="report_type" id="report_type" class="form-control">
                            <option value="<?php echo e(null); ?>"></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">البند الفرعي</label>
                        <select name="report_sub_type" id="report_sub_type" class="form-control"></select>
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
        $(document).ready(function(){
            
            // setting date format to yyyy-mm-dd
            var day = new Date().getDate().toString() , month = new Date().getMonth()+1 , year = new Date().getFullYear().toString();
            month = (month.toString().length == 1) ? '0'+month.toString() : month.toString() ;
            day   = (day.length == 1) ? '0'+day : day ;
            $('#report_date').val(year.trim()+'-'+month.trim()+'-'+day.trim());
            
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
                    $.getJSON('/office-towns-list/'+id,
                        function(data){
                            //set manager name&phone
                            var name = data.manager_name, phone = data.manager_phone ;
                            $('#manager_name').val(name) ;
                            $('#manager_phone').val(phone);
                            var options = '<option></option>' ;
                            $.each(data.towns , function (key , value) {
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

            $("#house_number").keyup(
                function () {
                    var id = $(this).val();
                    $.getJSON('/check-house-number/'+id,
                        function(data){
                            if(data.report_id){
                                //alert('in');
                                var link = '<h4>يوجد بلاغ مسجل بنفس رقم المنزل<a href="/reports/'+data.report_id+'" class="btn">عرض البلاغ</a></h4>';
                                $('#report_status').html(link);
                                // $('#report_sub_type').html(options);
                            }
                        });

                }
            );

        });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>