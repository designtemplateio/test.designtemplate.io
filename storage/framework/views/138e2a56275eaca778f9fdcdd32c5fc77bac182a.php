<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(Helper::translation(2860,$translate,'')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(2860,$translate,'')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation(2860,$translate,'')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<div class="container mb-lg-3">
      <div class="row justify-content-center pt-lg-4 text-center">
        <div class="col-lg-5 col-md-7 col-sm-9">
          <!--<h1 class="display-404"><?php echo e(Helper::translation(2863,$translate,'')); ?></h1>-->
          <img src="https://designtemlate.s3.us-west-1.wasabisys.com/tue-jan-10-2023-1-15-pm82536.webp">
          <h2 class="h3 mb-4"><?php echo e(Helper::translation(2864,$translate,'')); ?></h2>
          <button type="button" class="btn contactbuttons-first justify-item-center">
                      <a class="navbar-tool p-0 my-n1" href="<?php echo e(URL::to('/')); ?>" style="color:#fff;">Go To Homepage</a>
                    </button>
        </div>
        
      </div>
  </div>    
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views//404.blade.php ENDPATH**/ ?>