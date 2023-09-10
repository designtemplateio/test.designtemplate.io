<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php if($addition_settings->verify_mode == 1): ?> <?php echo e(Helper::translation('614d4f7745243',$translate,'Verify Purchase')); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate,'')); ?> <?php endif; ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($addition_settings->verify_mode == 1): ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation('614d4f7745243',$translate,'Verify Purchase')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation('614d4f7745243',$translate,'Verify Purchase')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<div class="container py-4 py-lg-5 my-4">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card py-2 mt-4">
            <form method="POST" action="<?php echo e(route('verify')); ?>"  id="login_form" class="card-body needs-validation">
               <?php echo csrf_field(); ?> 
              <div class="form-group">
                <label for="recover-email"><?php echo e(Helper::translation('614d589c73a20',$translate,'Enter Purchase Code')); ?></label>
                <input class="form-control" type="text" id="recover-email" name="purchase_code" data-bvalidator="required">
              </div>
              <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('614d4f7745243',$translate,'Verify Purchase')); ?></button>
            </form>
          </div>
          <?php if($checkverify != 0): ?>
          <div class="mt-4">
          <table class="table table-bordered">
             <thead>
             <tr>
                 <th><?php echo e(Helper::translation(5025,$translate,'Title')); ?></th>
                 <th><?php echo e(Helper::translation(2867,$translate,'Value')); ?></th>
             </tr> 
             </thead>
             <tbody>
             <tr>
             <td><?php echo e(Helper::translation(2938,$translate,'Item Name')); ?></td>
             <td><?php echo e($sold->item_name); ?></td>
             </tr>
             <tr>
             <td><?php echo e(Helper::translation(3173,$translate,'Order ID')); ?></td><td><?php echo e($sold->purchase_token); ?></td>
             </tr>
             <tr><td><?php echo e(Helper::translation(3102,$translate,'Purchase Date')); ?></td><td><?php echo e(date("d F Y", strtotime($sold->start_date))); ?></td>
             </tr>
             <tr>
             <td><?php echo e(Helper::translation('614da54e23863',$translate,'Buyer Name')); ?></td><td><?php echo e($sold->name); ?></td>
             </tr>
             <tr>
             <td><?php echo e(Helper::translation('614da543a4824',$translate,'License Type')); ?></td><td><?php echo e($sold->license); ?> <?php echo e(Helper::translation(3105,$translate,'License')); ?></td>
             </tr>
             <tr>
             <td><?php echo e(Helper::translation('614da53348009',$translate,'Supported Until')); ?></td><td><?php echo e(date("d F Y", strtotime($sold->end_date))); ?></td>
             </tr>
             </tbody>
             </table>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
<?php else: ?>
<?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>    
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/verify.blade.php ENDPATH**/ ?>