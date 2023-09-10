<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2926,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo NoCaptcha::renderJs(); ?>

</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <?php echo $__env->make('user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- Content-->
          <section class="col-lg-8 pt-lg-4 pb-md-4">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
               <?php if($user['user']->user_banner == ''): ?>
                 <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
                    Add Cover Image
                    <a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="fa fa-plus"></i></a>
                <?php endif; ?>
              <?php endif; ?>
            <div class="profile-banner border-bottom pb-3" data-aos="fade-up" data-aos-delay="200">
            <?php if($user['user']->user_banner != ''): ?>
            <img class="lazy" width="762" height="313" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user['user']->user_banner); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user['user']->user_banner); ?>" alt="<?php echo e($user['user']->username); ?>">
            <?php else: ?>
            <img class="lazy" width="762" height="313" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" data-original="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($user['user']->username); ?>">
            <?php endif; ?>
            <?php echo e($user['user']->about); ?>

            </div>
            
            
            <?php if($user['user']->user_type == 'vendor'): ?>
              <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom"><?php echo e(Helper::translation(2886,$translate,'')); ?><span class="badge badge-secondary font-size-sm text-body align-middle ml-2"><?php echo e(count($itemData['item'])); ?></span></h2>
              <div class="row pt-2 mx-n2 flash-sale" id="post-data">
                <?php echo $__env->make('user-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <div class="ajax-load text-center" style="display:none">
               <p><img class="lazy" width="24" height="24" src="<?php echo e(url('/')); ?>/resources/views/theme/img/loader.gif" data-original="<?php echo e(url('/')); ?>/resources/views/theme/img/loader.gif"> <?php echo e(Helper::translation('6232d802b030f',$translate,'Loading More Items')); ?></p>
              </div>
           <?php endif; ?>
        </div>
        </section>
        </div>
      </div>
    </div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/user.blade.php ENDPATH**/ ?>