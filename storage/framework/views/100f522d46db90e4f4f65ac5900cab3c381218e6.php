  
<?php $__env->startSection('title' , 'بلاغ جديد'); ?>
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
                    <div class="col-md-3">
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

                    <div class="col-md-3">
                        <label> التاريخ    : </label>
                        <input id="report_date" name="date" type="date" readonly="true"  class="form-control" required>
                    </div>

                    <div class="col-md-3">
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
                    <div class="col-md-4">
                        <label for="">اسم الشخص المبلغ</label>
                        <input id="" type="text" name="name" class="form-control" required pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z\s]{1,300}"
				                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم الشخص المبلغ ')"
					            oninput="this.setCustomValidity('')"
					            title="يجب ان يحتوي على حروف ">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="">رقم الهاتف</label>
                        <input type="tel" name="phone1" class="form-control phone_number"  
						        maxlength="10" placeholder="رقم الهاتف" required pattern="(0[1 9]\d{8})" 
				                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
					            oninput="this.setCustomValidity('')" title="يجب ان يحتوي على  ارقام">
                    </div>
                </div>
                <hr>

                <div class="row">

                    <div class="col-md-3">
                        <label for="">المدينة</label>
                        <select name="town_id" class="selectpicker form-control"   data-live-search="true" 
                            id="town_id" required
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المدينة   ')"
                            oninput="this.setCustomValidity('')" >
                                <option value="<?php echo e(null); ?>">اختر</option>
                                
                                <?php $__currentLoopData = $towns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $town): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($town->id); ?>">
                                        <?php echo e($town->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="">مربع</label>
                        <select name="square_id" class="form-control" id="square_id" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم مربع    ')"
								   oninput="this.setCustomValidity('')"></select>
                    </div>

                    <div class="col-md-2">
                        <label for="">رقم المنزل</label>
                        <input type="number" class="form-control" id="house_number" name="house_number"
						placeholder="رقم المنزل" required pattern="([0-9])" title="ادخل رقم المنزل ">
                    </div>
                    <div class="col-md-1" id=""></div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-3">
                        <label for="">المنطقة الكبرى</label>
                        <select id="city_id" class="form-control" name="city_id" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
								   oninput="this.setCustomValidity('')">
                            
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="">المحلية</label>
                        <select name="locality_id" class="form-control" id="locality_id" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المحلية  ')"
								   oninput="this.setCustomValidity('')"></select>
                    </div>

                    <div class="col-md-3">
                        <label for="">المكتب الفرعي</label>
                        <select name="office_id" class="form-control" id="office_id" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المكتب الفرعي  ')"
								   oninput="this.setCustomValidity('')"></select>
                    </div>
                    <div class="col-md-12"><br></div>

                    <div class="col-md-12" id="reporting_status" style="display:none;">
                        <div class="col-md-6" id="reporting_name"></div>
                        <div class="col-md-6" id="reporting_phone"></div>
                        <div class="col-md-6" id="reporting_date"></div>
                        <div class="col-md-6" id="reporting_id"></div>
                    </div>
                    <div class="col-md-12">
                        <h5 id=""></h5>
                    </div>

                    <div class="col-md-6">
                        <label for="">وصف المنزل</label>
                        <textarea name="house_description" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">مدير الصيانة</label>
                        <input type="text" class="form-control" name="manager_name" id="manager_name" >
                    </div>
                    <div class="col-md-3">
                        <label for="">رقم الهاتف</label>
                        <input type="text" class="form-control" name="manager_phone" id="manager_phone" >
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <label for="">نوع البلاغ</label>
                        <select name="report_type" id="report_type" class="form-control"  required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر نوع البلاغ  ')"
								   oninput="this.setCustomValidity('')">
                            <option value="<?php echo e(null); ?>"></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div> 

                    <div class="col-md-3">
                        <label for="">البند الفرعي</label>
                        <select name="report_sub_type" id="report_sub_type" class="form-control" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر البند الفرعي  ')"
								   oninput="this.setCustomValidity('')"></select>
                    </div>

                    <div class="col-md-3">
                        <label for="">تفاصيل نوع البلاغ</label>
                        <select name="report_detail" id="report_detail" class="form-control" required
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر تفاصيل نوع البلاغ  ')"
								   oninput="this.setCustomValidity('')"></select>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="submit-report"> حفظ البلاغ</button>
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
            
            $('.selectpicker').selectpicker({
                  
            });
            /*
            $("#city_id").change(
                function () {
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
                    $('#locality_id , #office_id , #town_id , #square_id , #house_number').val(' ');
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
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
                    $('#office_id , #town_id , #square_id , #house_number').val(' ');
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
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
                    $('#town_id , #square_id , #house_number').val(' ');
                    var id = $(this).val();
                    $.getJSON('/office-towns-list/'+id,
                        function(data){
							//console.log(data);
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
            */

            $("#town_id").change(
                function () {
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
                    $('#square_id , #house_number').val(' ');
                    var id = $(this).val();
                    $.get('/town-squares-list/'+id,
                        function(data){
                            
                            var city = data.city , 
                                locality = data.locality , 
                                office = data.office , 
                                squares = data.squares ;

                            var name = data.manager_name, phone = data.manager_phone ;
                                $('#manager_name').val(name) ;
                                $('#manager_phone').val(phone);
                            
                            var options = '<option></option>' ;
                            $.each(squares , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#square_id').html(options);

                            var city_option = '<option value="'+city.id+'">'+city.name+'</option>' ;
                            var loc_option = '<option value="'+locality.id+'">'+locality.name+'</option>' ;
                            var off_option = '<option value="'+office.id+'">'+office.name+'</option>' ;

                            $('#office_id').html(off_option).attr('readonly' , true);
                            $('#locality_id').html(loc_option).attr('readonly' , true);
                            $('#city_id').html(city_option).attr('readonly' , true);

                        });

                }
            ); 

            $("#report_type").change(
                function () {
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
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

            $("#report_sub_type").change(
                function () {
                    $('#reporting_status').hide();
                    //$('#reporting_status').html('');
                    $('#submit-report').prop('disabled' , false);
                    var id = $(this).val();
                    $.get('/report-sub-detail-list/'+id,
                        function(data){
                            var options = '<option></option>' ;
                            $.each(data , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#report_detail').html(options);
                        });

                }
            );

            $('#report_status').html('');

            $("#house_number").keyup(function () {

                    var id = $(this).val() , office_id = $('#office_id').val() ,
                    town_id = $('#town_id').val() , square_id = $('#square_id').val();
                   
                    var data = {
                                _token : $('input[name=_token]').val() ,
                                house_id : id , 
                                square_id : square_id , 
                                town_id : town_id , 
                                office_id
                    } ;
                    
                    if(id > 0 && square_id > 0 && town_id > 0 && office_id > 0){
                        $.ajax({
                            type:'get' ,
                            url : '/check-house-number' ,
                            dataType:'json' ,
                            data    : data ,
                            success:function(data){
                               
                                if(data.report_id){
                                    var link = 'يوجد بلاغ مسجل بنفس رقم المنزل';
                                    alert(link);
                                    $('#reporting_status').show();
                                    $('#reporting_name').html('<h5><strong>اسم المبلغ</strong> : '+data.reporter_name+'</h5>');
                                    $('#reporting_phone').html('<h5><strong> رقم الهاتف</strong> : '+data.reporter_phone+'</h5>');
                                    $('#reporting_date').html('<h5><strong>تاريخ البلاغ</strong> : '+data.report_date.date+'</h5>');
                                    $('#reporting_id').html('<h5><strong>رقم البلاغ</strong> :'+data.report_id+'</h5>');
                                    //disable submit button
                                    $('#submit-report').prop('disabled' , true);
                                }else{
                                    $('#reporting_status').hide();
                                    //$('#reporting_status').html('');
                                    $('#submit-report').prop('disabled' , false);
                                }
                            } ,
                            error:function(error){
                                $('#reporting_status').hide();
                                //$('#reporting_status').html('');
                                $('#submit-report').prop('disabled' , false);
                            }
                        });
                    }
                });

        });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>