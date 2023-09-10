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
    <?php if(Auth::user()->id == 1): ?> 
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(6138,$translate,'')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/vendor')); ?>" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> <?php echo e(Helper::translation(5175,$translate,'')); ?></a>
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText"><?php echo e(Helper::translation(6138,$translate,'')); ?></strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                        
                                        <td>
                                            <?php echo e($userData['data']->username); ?>

                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(6156,$translate,'')); ?>

                                        </td>
                                        
                                        <td>
                                            <?php echo e($userData['data']->user_subscr_type); ?> <?php if($userData['data']->user_subscr_date < date('Y-m-d')): ?><span class="badge badge-danger"><?php echo e(Helper::translation(6225,$translate,'')); ?></span><?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php if($userData['data']->user_subscr_payment_type == 'localbank'): ?>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(6219,$translate,'')); ?>

                                            <small>(<?php echo e(Helper::translation(6222,$translate,'')); ?>)</small>
                                        </td>
                                        
                                        <td>
                                            <?php if($userData['data']->user_purchase_token != ''): ?> <?php echo e($userData['data']->user_purchase_token); ?> <?php else: ?> <span>---</span> <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(5670,$translate,'')); ?>

                                            <small>(<?php echo e(Helper::translation(6222,$translate,'')); ?>)</small>
                                        </td>
                                        
                                        <td>
                                            <?php if($userData['data']->user_purchase_token != ''): ?> <a href="<?php echo e(URL::to('/admin/customer')); ?>/<?php echo e($userData['data']->user_token); ?>/<?php echo e($userData['data']->user_subscr_id); ?>" class="btn btn-success btn-sm" onClick="return confirm('<?php echo e(Helper::translation(6228,$translate,'')); ?>?');"><i class="fa fa-money"></i>&nbsp; <?php echo e(Helper::translation(5475,$translate,'')); ?></a> <?php else: ?> <span>---</span> <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(3103,$translate,'')); ?>

                                        </td>
                                        
                                        <td>
                                            <?php echo e(date('d M Y',strtotime($userData['data']->user_subscr_date))); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(3175,$translate,'')); ?>

                                        </td>
                                        
                                        <td>
                                            <?php echo e($userData['data']->user_subscr_payment_type); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(Helper::translation(5667,$translate,'')); ?>

                                        </td>
                                        
                                        <td>
                                            <?php if($userData['data']->user_subscr_payment_status == 'completed'): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5673,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5676,$translate,'')); ?></span> <?php endif; ?>
                                        </td>
                                    </tr>
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
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/subscription-payment-details.blade.php ENDPATH**/ ?>