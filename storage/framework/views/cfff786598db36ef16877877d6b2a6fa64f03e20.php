<div class="col-lg-12">
    <lebel>  المكتب الفرعي : </lebel>
    <select id="suboffices" class="form-control" name="suboffices_id">
        <option value="<?php echo e(null); ?>" selected> اختر</option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>
<br>
<div id="city">

</div>


<script>

    $("#suboffices").change(
        function () {
            $('#city').empty();

            id = $(this).val();
            $.get('/city2/'+id,
                function(data){
                    $('#city').append(data);
                });

        }
    )
</script>