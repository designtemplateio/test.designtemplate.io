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
                        <h1><?php echo e(Helper::translation(5442,$translate,'')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/products-import-export')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> <?php echo e(Helper::translation(5457,$translate,'')); ?></a>&nbsp;
                            <a href="<?php echo e(url('/admin/trash-items')); ?>" class="btn btn-danger btn-sm"><i class="fa fa-location-arrow"></i> <?php echo e(Helper::translation('614dc2391d535',$translate,'Trash Items')); ?></a>
                            &nbsp;
                            <button onClick="myFunction()" class="btn btn-success btn-sm dropbtn"><i class="fa fa-plus"></i> <?php echo e(Helper::translation(5460,$translate,'')); ?></button>
                            <div id="myDropdown" class="dropdown-content">
                                <?php $__currentLoopData = $viewitem['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $encrypted = $encrypter->encrypt($item_type->item_type_id); ?>
                                <a href="<?php echo e(URL::to('/admin/upload-product-page')); ?>/<?php echo e($encrypted); ?>"><?php echo e($item_type->item_type_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                            
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
                                <strong class="card-title"><?php echo e(Helper::translation(5442,$translate,'')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export-items" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(2920,$translate,'')); ?></th>
                                            <th>Subcategory</th>
                                            <th>Titles</th>
                                            <th>Description</th>
                                            <th>Sub-heading</th>
                                            <th>Sub-description</th>
                                            <!--<th><?php echo e(Helper::translation(5469,$translate,'')); ?>?</th>-->
                                            <!--<th><?php echo e(Helper::translation(3142,$translate,'')); ?></th>-->
                                            <th><?php echo e(Helper::translation(2873,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(2922,$translate,'')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($item->heading); ?></td>
                                            <td><?php echo e($item->heading_desc); ?></td>
                                            <td><?php echo e($item->sub_heading); ?></td>
                                            <td><?php echo e($item->subheading_desc); ?></td>
                                            <td><?php if($item->drop_status == 1): ?> <span class="badge badge-success">Active</span>  <?php else: ?> <span class="badge badge-danger">Deactive</span> <?php endif; ?></td>
                                            <td><a href="edit-product-page/<?php echo e($item->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(2923,$translate,'')); ?></a>
                                            <a href="/admin/product-page-delete/<?php echo e($item->id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(5064,$translate,'')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate,'')); ?></a>
                                            </td> 
                                            
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </tbody>
                                </table>
                                <div>
                                <?php echo e($itemData['item']->links('pagination::bootstrap-4')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    
    
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/product-page.blade.php ENDPATH**/ ?>