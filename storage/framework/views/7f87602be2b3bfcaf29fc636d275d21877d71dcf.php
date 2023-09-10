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
                        <h1><?php echo e(Helper::translation(2934,$translate,'Edit Coupon')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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
        <?php if($errors->any()): ?>
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                        <form action="<?php echo e(route('admin.edit-coupon')); ?>" method="post" id="checkout_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                         <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2866,$translate,'Coupon Code')); ?> <span class="require">*</span></label>
                                                <input id="coupon_code" name="coupon_code" type="text" class="form-control noscroll_textarea" value="<?php echo e($edit['value']->coupon_code); ?>" data-bvalidator="required"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2868,$translate,'Start Date')); ?> <span class="require">*</span></label>
                                                <input id="site_flash_end_date" name="coupon_start_date" type="text" class="form-control noscroll_textarea" value="<?php echo e($edit['value']->coupon_start_date); ?>" data-bvalidator="required"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2869,$translate,'End Date')); ?> <span class="require">*</span></label>
                                                <input id="site_free_end_date" name="coupon_end_date" type="text" class="form-control noscroll_textarea" value="<?php echo e($edit['value']->coupon_end_date); ?>" data-bvalidator="required"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2873,$translate,'Status')); ?> <span class="require">*</span></label>
                                                <select name="coupon_status" class="form-control" data-bvalidator="required">
                                                 <option value=""></option>
                                                 <option value="1" <?php if($edit['value']->coupon_status == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2874,$translate,'Active')); ?></option>
                                                 <option value="0" <?php if($edit['value']->coupon_status == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2875,$translate,'InActive')); ?></option>
                                                 </select>
                                            </div>
                                     </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2921,$translate,'Type')); ?> <span class="require">*</span></label>
                                                <select name="discount_type" class="form-control" data-bvalidator="required">
                                                 <option value=""></option>
                                                 <option value="percentage" <?php if($edit['value']->discount_type == 'percentage'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2871,$translate,'Percentage')); ?></option>
                                                 <option value="fixed" <?php if($edit['value']->discount_type == 'fixed'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2872,$translate,'Fixed')); ?></option>
                                                 </select>
                                            </div>
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2867,$translate,'Value')); ?> <span class="require">*</span></label>
                                                <input id="coupon_value" name="coupon_value" type="text" class="form-control noscroll_textarea" value="<?php echo e($edit['value']->coupon_value); ?>" data-bvalidator="required,min[1]">
                                            </div>
                                       
                                            
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3142,$translate,'Vendor')); ?> <span class="require">*</span></label>
                                                <select name="user_id" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getvendor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" <?php if($edit['value']->user_id == $user->id): ?> selected <?php endif; ?>><?php echo e($user->username); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            
                                           
                                     </div>
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="coupon_id" value="<?php echo e(base64_encode($edit['value']->coupon_id)); ?>">
                            <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> <?php echo e(Helper::translation(2876,$translate,'')); ?></button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> <?php echo e(Helper::translation(4962,$translate,'')); ?> </button>
                             </div>
                             </div>
                    </form> 
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
</html><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/edit-coupon.blade.php ENDPATH**/ ?>