 
<?php $__env->startSection('title' , 'تعديل بيانات مربع'); ?>

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
        <div class="box-header">
            <h3 class="box-title"> مربع جديد   </h3>
        </div>
        <div class="box-body">
           
                <form id="send"  method="POST" action="/squares/<?php echo e($square->id); ?>">
                   <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                                <lebel>اسم المربع  : </lebel>
                            <input placeholder="اسم المربع" name="name" class="form-control" value="<?php echo e($square->name); ?>" 
                            required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"      
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم المربع')"
                                oninput="this.setCustomValidity('')" 
                                title="يجب ان يحتوي على حروف وارقام">
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                                <lebel>اسم المنطقة الكبري : </lebel>
                                <select id="city_id" class="form-control" name="city_id" 
                                required=""    
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
                                oninput="this.setCustomValidity('')">
                            
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->id); ?>" <?php echo e($square->city_id==$city->id?'selected':''); ?>> 
                                        <?php echo e($city->name); ?>

                                    </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                    <lebel>المحلية : </lebel> 
                                <select id="locality_id" class="form-control" name="locality_id" required  
                                    oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المحلية  ')"
                                    oninput="this.setCustomValidity('')">
                                    <?php $__currentLoopData = $localities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($locality->id); ?>" <?php echo e($square->locality_id==$locality->id?'selected':''); ?>>
                                            <?php echo e($locality->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <label for="">المكتب الفرعي</label>
                            <select name="office_id" class="form-control" id="office_id">
                                    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($office->id); ?>" <?php echo e($square->office_id==$office->id?'selected':''); ?>>
                                        <?php echo e($office->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">المدينة</label>
                            <select name="town_id" class="form-control" id="town_id">
                                    <?php $__currentLoopData = $towns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $town): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($town->id); ?>" <?php echo e($square->town_id==$town->id?'selected':''); ?>>
                                        <?php echo e($town->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <button type="submit" class="btn btn-primary"> حفظ المربع </button>
                    </div>
                </form>

  
            </div>
       
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  <script>
      $(document).ready(function(){ 
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
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>