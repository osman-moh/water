
<div class="col-lg-12">
    <lebel>   المدينة  : </lebel>
    <select id="cities_id" class="form-control" name="cities_id">
        <option value="<?php echo e(null); ?>" selected> اختر</option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>
<div id="square">

</div>
<script>

    $("#cities_id").change(
        function () {
                    $('#square').empty();
            id = $(this).val();
            $.get('/square/'+id,
                function(data){
                    $('#square').append(data);
                });

        }
    )
</script>