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
            <h3 class="box-title"> بلاغ جديد  </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('Comm.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="col-lg-6">
                    <lebel> مكان استقبال  البلاغ : </lebel>
                    <select class="form-control" name="loction"
					 required=""
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر مكان استقبال  البلاغ')"
					   oninput="this.setCustomValidity('')">

                      <option value="<?php echo e(null); ?>"> اختر</option>
                      <?php $__currentLoopData = $loction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($value->id); ?>"> <?php echo e($value->name); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                </div>
                <div class="col-lg-6">
                    <lebel> التاريخ    : </lebel>
                   <input id="datepicker" name="date"   class="form-control"
				     required=""
				       >


                </div>
                <div class="col-lg-12">
                    <br>
                    <br>

                  <fieldset>
                      <legend> بيانات الشخص المبلغ/ الجهة المبلغة</legend>
                      <div class="row">
                          <div class="col-lg-6">
                              <lebel> اسم الشخص المبلغ   : </lebel>
                              <input id="datepicker" name="name" class="form-control"
							  required="" pattern="[أ-يa-zA-Z\s]{1,300}"
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم الشخص المبلغ ')"
					   oninput="this.setCustomValidity('')"
					   title="يجب ان يحتوي على حروف "

							  >
                          </div>
                          <div class="col-lg-6">
                              <div class="text-center h3">
                                   تصنيف الجهة المبلغة :
                              </div>
                          </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-lg-2">
                              <lebel>   رقم الهاتف : </lebel>
                          </div>
                          <div class="col-lg-2">
                              <input type="text" name="phone1"    class="form-control"

							  required=""  pattern="[0-9]{12}"   maxlength="12"

				                 oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
					   oninput="this.setCustomValidity('')"
					   title="يجب ان يحتوي على  ارقام"

							  >
                          </div>
						  <div class="col-lg-2">
                              <lebel>   الجهة المبلغة  : </lebel>
                          </div>

                          <div class="col-lg-6">
                                   <select class="form-control" name="type"
								   required=""
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
								   oninput="this.setCustomValidity('')"
								   >
                                     <option value="<?php echo e(null); ?>"> اختر</option>
                                     <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($value->id); ?>"> <?php echo e($value->name); ?>

                                        </option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   </select>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <lebel>مدير الصيانة المعني   : </lebel>
                              <input  name="wokername" class="form-control"
							  required="" pattern="[أ-يa-zA-Z\s]{1,300}"
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم  مدير الصيانة المعني')"
					   oninput="this.setCustomValidity('')"
					   title="يجب ان يحتوي على حروف "
							  >
                          </div>
                          <div class="col-lg-6">
                              <div class="text-center ">
                                  <lebel>رقم الهاتف     : </lebel>
                                  <input  name="wokerphone" class="form-control"
								   required=""  pattern="[0-9]{12}"   maxlength="12"

				                 oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
								   oninput="this.setCustomValidity('')"
								   title="يجب ان يحتوي على  ارقام"
								  >
                              </div>
                          </div>
                      </div>
                  </fieldset>
                    <br>
                    <br>
                    <fieldset>
                         <legend> بيانات البلاغ </legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <lebel> المنطقة الكبرى   : </lebel>
                                <select id="Lloction" class="form-control" name="Lloction"
								required=""
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
								   oninput="this.setCustomValidity('')"
								>
                                    <option value="<?php echo e(null); ?>"> اختر</option>
                                    <?php $__currentLoopData = $Lloction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"> <?php echo e($value->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-8" id="or">

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-4">
                                <label>رقم المنزل :</label>
                                <input type="text" name="House_number" class="form-control"
								required=""  pattern="[0-9]{1,10}"   maxlength="20"

				                 oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم المنزل')"
								   oninput="this.setCustomValidity('')"
								   title="يجب ان يحتوي على  ارقام"
								>
                            </div>
                        </div>
                        <div class="row">

                                <label>الوصف/ معلم بارز  :</label>
                                <textarea  name="description" class="form-control"

								required="" pattern="[أ-يa-zA-Z0-9\s]{1,300}"
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  الوصف والمعالم البارزة')"
					   oninput="this.setCustomValidity('')"
					   title="يجب ان يحتوي على حروف وارقام"
								>
                                </textarea>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <label> نوع البلاغ:</label>

                                <select name="Type_communication" class="form-control"
								 required=""
							   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر  نوع البلاغ ')"
							   oninput="this.setCustomValidity('')"
										>
                                    <option value="1">   عطش </option>
                                    <option value="2">   كسر </option>
                                    <option value="3">   تلوث </option>
                                    <option value="4">   اخرى </option>
                                </select>
                            </div>
							 <div class="col-lg-6">
                                <label> البند الفرعي:</label>

                                <select name="Type_communication" class="form-control"

								 required=""
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
								   oninput="this.setCustomValidity('')"
								>
                                    <option value="1">   بند1 </option>
                                    <option value="2">   بند2 </option>
                                    <option value="3">   بند3 </option>
                                    <option value="4">   اخرى </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label> تفاصيل نوع البلاغ :</label>

                                <select name="Details_communication" class="form-control"

								 required=""
								   oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر تفاصيل نوع البلاغ ')"
								   oninput="this.setCustomValidity('')"
								>
                                    <option value="1">   عطش منزل واحد </option>
									<option value="2">   عطش اكثر من منزل </option>
									<option value="3">   اخرى</option>
                                </select>
                            </div>
                        </div>

                    </fieldset>
                </div>




 <div class="text-center">
     <button type="submit" class="btn btn-primary"> حفظ البلاغ</button>
 </div>



            </form>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  <script>
      $('#datepicker').datepicker({
          dateFormat:"yy-mm-dd",
      });
      $("#Lloction").change(
          function () {
              id = $(this).val();
              $.get('/regionaloption2/'+id,
                  function(data){
                      // alert(data)
                      html = "<select id='Lloction' class='form-control' name='regional_id'>";
                      html2 =html+data;
                      html3 = html2+ "<select>";
                      $('#or').html(data);
                  });

          }
      );
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>