<div class="col-lg-4">
    <lebel>  المحلية : </lebel>
    <select id="regional"  class="form-control" name="regional_id">
        <option value="<?php echo e(null); ?>" selected> اختر</option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-lg-4" id="sub" >

</div>

    <script>

        $("#regional").change(


            function () {
                $("#sub").empty();
                id = $(this).val();
                $.get('/sub2/'+id,
                    function(data){
                        $('#sub').append(data);
                    });

            }
        )
    </script>
