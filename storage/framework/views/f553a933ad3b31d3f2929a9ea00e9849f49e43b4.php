<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php if($cart_count != 0): ?><?php echo e(Helper::translation(2885,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?> <?php else: ?> Yearly Subscription today's offer 10%off - <?php echo e($allsettings->site_title); ?> <?php endif; ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($cart_count != 0): ?> 
<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(2885,$translate,'')); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation(2885,$translate,'')); ?></h1>
        </div>
      </div>
</div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
      <form action="<?php echo e(route('coupon')); ?>" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?> 
        <div class="row">
          <!-- Content-->
          <?php if($cart_count != 0): ?>
          <section class="col-lg-7 pt-2 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <!-- Header-->
              <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3">
                <div class="py-1"><a class="btn btn-outline-accent btn-sm" href="<?php echo e(url('/templates')); ?>"><i class="dwg-arrow-left mr-1 ml-n1"></i><?php echo e(Helper::translation(4884,$translate,'')); ?></a></div>
                <div class="d-none d-sm-block py-1 font-size-ms"><?php echo e(Helper::translation(4887,$translate,'')); ?> <?php echo e($cart_count); ?> <?php echo e(Helper::translation(4890,$translate,'')); ?></div>
                <div class="py-1"><a class="btn btn-outline-danger btn-sm" href="<?php echo e(url('/clear-cart')); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate,'')); ?>');"><i class="dwg-close font-size-xs mr-1 ml-n1"></i><?php echo e(Helper::translation(4893,$translate,'')); ?></a></div>
              </div>
              <!-- Product-->
              <?php 
              $subtotal = 0;
              $coupon_code = ""; 
              $new_price = 0;
              ?>
              <?php $__currentLoopData = $cart['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="media d-block d-sm-flex align-items-center py-4 border-bottom">
              <a class="d-block position-relative mb-3 mb-sm-0 mr-sm-4 mx-auto cart-img" href="<?php echo e(url('/cart')); ?>/<?php echo e(base64_encode($cart->ord_id)); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate,'')); ?>');">
              <?php if($cart->item_thumbnail!=''): ?>
              <img class="lazy rounded-lg" width="70" height="54" src="<?php echo e(Helper::Image_Path($cart->item_thumbnail,'no-image.png')); ?>"  alt="<?php echo e($cart->item_name); ?>">
              <?php else: ?>
              <img class="lazy rounded-lg" width="70" height="54" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($cart->item_name); ?>">
              <?php endif; ?>
              <span class="close-floating" data-toggle="tooltip" title="<?php echo e(Helper::translation(5934,$translate,'')); ?>"><i class="dwg-close"></i></span></a>
                <div class="media-body text-center text-sm-left">
                  <h3 class="h6 product-title mb-2"><a href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>"><?php echo e($cart->item_name); ?></a></h3>
                  <?php
                  if($cart->discount_price != 0)
                  {
                    $price = $cart->discount_price;
                    $new_price += $cart->discount_price;
                    $coupon_code = $cart->coupon_code;
                  }
                  else
                  {
                     $price = $cart->item_price;
                     $new_price += $cart->item_price;
                  }
                  ?> 
                  <div class="d-inline-block text-accent">
                  <?php if($cart->discount_price != 0): ?>
                  <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($price); ?>

                  <?php endif; ?>
                  <span <?php if($cart->discount_price != 0): ?> class="cross-line" <?php endif; ?>><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($cart->item_price); ?></span></div><a class="d-inline-block text-accent font-size-ms border-left ml-2 pl-2" href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>"><?php echo e($cart->license); ?> <?php if($cart->license == 'regular'): ?> ( <?php echo e($additional->regular_license); ?> <?php if($cart->item_support == 1): ?> <?php echo e(Helper::translation(3055,$translate,'')); ?> <?php else: ?> <?php echo e(Helper::translation(6261,$translate,'')); ?> <?php endif; ?>) <?php elseif($cart->license == 'extended'): ?> ( <?php echo e($additional->extended_license); ?> <?php if($cart->item_support == 1): ?> <?php echo e(Helper::translation(3055,$translate,'')); ?> <?php else: ?> <?php echo e(Helper::translation(6261,$translate,'')); ?> <?php endif; ?>) <?php endif; ?></a>
                </div>
              </div>
              <?php $subtotal += $cart->item_price; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </section>
          <!-- Sidebar-->
          <aside class="col-lg-5">
            <hr class="d-lg-none">
            <div class="cz-sidebar-static h-100 ml-auto border-left">
              <ul class="list-unstyled font-size-sm pt-3 pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2"><?php echo e(Helper::translation(2894,$translate,'')); ?></span><span class="text-right"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($subtotal); ?></span></li>
                  <?php
                  if($addition_settings->site_extra_fee_type == 'fixed')
                  {
                     $extra_fee = $allsettings->site_extra_fee;
                  }
                  else
                  {
                     $extra_fee = ($allsettings->site_extra_fee * $subtotal) / 100;
                  }
                  ?>
                  <?php if($extra_fee != 0): ?>
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2"><?php echo e(Helper::translation(2901,$translate,'')); ?></span><span class="text-right"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($extra_fee); ?></span></li>
                  <?php endif; ?>
                  <?php if($coupon_code != ""): ?>
                  <?php 
                  $coupon_discount = $subtotal - $new_price;
                  $final = $new_price+$extra_fee; 
                  ?> 
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2"><?php echo e(Helper::translation(2895,$translate,'')); ?></span><span class="text-right"><strong class="green">( <?php echo e($coupon_code); ?> )</strong> <a href="<?php echo e(URL::to('/cart/')); ?>/remove/<?php echo e($coupon_code); ?>" class="red fs14" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate,'')); ?>');" title="<?php echo e(Helper::translation(2889,$translate,'')); ?>"> <i class="dwg-close font-size-xs"></i> </a></span><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($coupon_discount); ?></span></li>
                  <?php else: ?>
                  <?php $final = $subtotal+$extra_fee; ?>
                  <?php endif; ?>
                </ul>
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 my-1 py-1"><?php echo e(Helper::translation(2896,$translate,'')); ?></h2>
                <h3 class="font-weight-normal"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($final); ?></h3>
              </div>
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 my-1 py-1"><?php echo e(Helper::translation(2866,$translate,'')); ?></h2>
                  <div class="form-group">
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" placeholder="<?php echo e(Helper::translation(2866,$translate,'')); ?>" id="coupon" name="coupon" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(Helper::translation(4866,$translate,'')); ?></span>
                    </label>
                  </div>
                  </div>
                  <button class="btn btn-secondary btn-block" type="submit"><?php echo e(Helper::translation(2893,$translate,'')); ?></button>
              </div>
              <a class="btn btn-primary btn-shadow btn-block mt-2 clickCheckout" href="javascript:void(0);"><i class="dwg-locked font-size-lg mr-2"></i><?php echo e(Helper::translation(2897,$translate,'')); ?></a>
              <?php /*?><div class="text-center pt-2"><small class="text-form text-muted">{{ Helper::translation(4896,$translate,'') }}</small></div><?php */?>
            </div>
          </aside>
          <?php endif; ?>
        </div>
        </form>
      </div>
    </div>
    <?php else: ?>
  
    <?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/cart.blade.php ENDPATH**/ ?>