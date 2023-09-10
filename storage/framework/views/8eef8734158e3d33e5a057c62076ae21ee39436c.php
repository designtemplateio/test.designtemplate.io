<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(Helper::translation(3188,$translate,'')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
      body {
        text-align: center;
      }
    </style>
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
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(3188,$translate,'')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation(3188,$translate,'')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<!--<div class="container py-5 mt-md-2 mb-2">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200" align="center">-->
<!--          <h4><?php echo e(Helper::translation(3189,$translate,'')); ?></h4><br/>-->
<!--          <?php if(!empty($payment_token)): ?><h4> <?php echo e(Helper::translation(3190,$translate,'')); ?> : <?php echo e($payment_token); ?></h4><?php endif; ?>-->
<!--         </div>-->
<!--      </div>-->
<!--    </div>-->
<div class="success-card">
      <div class="payment-card">
        <i class="checkmark success-icon">✓</i>
      </div>
        <h1 class="success-heading">Success</h1> 
        <p class="success-para"><?php echo e(Helper::translation(3189,$translate,'')); ?><br/> We'll be in touch shortly!</p>
        <?php if(!empty($payment_token)): ?><p class="success-para"> <?php echo e(Helper::translation(3190,$translate,'')); ?> : <?php echo e($payment_token); ?></p><?php endif; ?>
      </div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/success.blade.php ENDPATH**/ ?>