<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->
    <?php if(in_array('items',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(5067,$translate,'')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-attribute')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> <?php echo e(Helper::translation(5070,$translate,'')); ?></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
         <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(Helper::translation(5067,$translate,'')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                              <th><?php echo e(Helper::translation(2920,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(2937,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(4968,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(5073,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(4971,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(2873,$translate,'')); ?></th>
                                              <th><?php echo e(Helper::translation(2922,$translate,'')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php $no = 1; ?>
                                  <?php $__currentLoopData = $attributeData['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                      <td><?php echo e($no); ?></td>
                                      <td><?php echo e($attribute->item_type_name); ?></td>
                                      <td><?php echo e($attribute->attr_label); ?></td>
                                      <td><?php echo e($attribute->attr_field_type); ?></td>
                                      <td><?php echo e($attribute->attr_field_order); ?></td>
                                      <td><?php if($attribute->attr_field_status == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(2874,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(2875,$translate,'')); ?></span> <?php endif; ?></td>
                                      <td><a href="edit-attribute/<?php echo e($attribute->attr_id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(2923,$translate,'')); ?></a> 
                                      <?php if($demo_mode == 'on'): ?> 
                                      <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate,'')); ?></a>
                                      <?php else: ?> 
                                      <a href="attributes/<?php echo e($attribute->attr_id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(5064,$translate,'')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate,'')); ?></a><?php endif; ?></td>
                                      </tr>
                                      <?php $no++; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/attributes.blade.php ENDPATH**/ ?>