<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(Helper::translation(2993,$translate,'')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body style="background:#111927;"> 
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-flex flex-column">
        <div class="row mt-auto">
        <div class="col-lg-8 col-sm-12 text-center mx-auto">
        <h2 class="mb-4 pt-5 title-page"><?php echo e(Helper::translation(2993,$translate,'')); ?></h2>
        <h3 class="lead mb-5"><?php echo e(Helper::translation(2994,$translate,'')); ?></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 mx-auto text-center mb-3 pb-3">
        <div class="countdown-timer">
                        <ul id="example">
                                <li class="pt-2 pb-1 mb-2"><span class="days">00</span><div><?php echo e(Helper::translation(2995,$translate,'')); ?></div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="hours">00</span><div><?php echo e(Helper::translation(2996,$translate,'')); ?></div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span><div><?php echo e(Helper::translation(2997,$translate,'')); ?></div></li>
		                        <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span><div><?php echo e(Helper::translation(2998,$translate,'')); ?></div></li>
                           </ul>
               </div>
        </div>
    </div> 
</div>
</section>
<div class="container py-5 mt-md-2 mb-2">
      <div class="row pt-2 mx-n2 flash-sale" id="post-data">
        <?php echo $__env->make('flash-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       </div>
       <div class="ajax-load text-center" style="display:none">
	   <p><img class="lazy" width="24" height="24" src="<?php echo e(url('/')); ?>/resources/views/theme/img/loader.gif"> <?php echo e(Helper::translation('6232d802b030f',$translate,'Loading More Items')); ?></p>
      </div>
    </div>
    
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(!empty($allsettings->site_flash_end_date)): ?>
	<script type="text/javascript">
            $('#example').countdown({
                date: '<?php echo e(date("m/d/Y H:i:s", strtotime($allsettings->site_flash_end_date))); ?>',
                offset: -8,
                day: '<?php echo e(Helper::translation(5967,$translate,'')); ?>',
                days: '<?php echo e(Helper::translation(2995,$translate,'')); ?>'
            }, function () {
			'use strict';
                
            });
    </script>
    <?php endif; ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/flash-sale.blade.php ENDPATH**/ ?>