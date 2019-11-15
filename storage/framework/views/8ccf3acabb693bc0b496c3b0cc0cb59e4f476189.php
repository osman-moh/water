<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center"><?php echo e(Session::get('message')); ?></div>
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

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> االمدن  </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo e(route('City.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
مدنية جديدة
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<span>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" width="1000" height="311" >

</span>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
                <table  class="table table-bordered" id="myTable" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th >المدنية</th>
                        <th>المنطقة الكبري </th>
                        <th>المحلية  </th>
                        <th>المكتب الفرعي  </th>
                        <th > انشاء     </th>
                        <th > تحديث     </th>
                        <th colspan="2"> الاجراء     </th>
                    </tr>
                    </thead>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td><?php echo e($value['Lloction']->name); ?></td>
                            <td><?php echo e($value['Lloction']->name); ?></td>
                            <td><?php echo e($value['Lloction']->name); ?></td>
                            <td><?php echo e($value->created_at); ?></td>
                            <td><?php echo e($value->updated_at); ?></td>
                            <td>
                                <a class="btn btn-success" href="<?php echo e(route('City.edit',$value->id)); ?>">
                                  تعديل

                                </a>
                                <a class="btn btn-danger">
                                    <form action="<?php echo e(route('City.destroy',$value->id)); ?>"method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                            <i class="fa fa-fw fa-remove"></i>

                                    </form>
                                </a>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>
        <div class="box-footer">
               <?php echo e($data->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>