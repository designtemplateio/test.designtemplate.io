<?php $no = 1; ?>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$price = Helper::price_info($featured->item_flash,$featured->regular_price);
$count_rating = Helper::count_rating($featured->ratings);
?>
        <div class="col-lg-4 col-md-4 mb-grid-gutter">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="background:#ffffff;">
            <div class="product-thumb">
              <div class="product-card-actions">
              <?php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              ?>
              </div>
            <figure>
                <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> 
              <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                    <?php if($featured->preview_video!=''): ?>
                        <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                            <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                        </video>
                    <?php else: ?>
                           <?php if($featured->item_preview!=''): ?>
                                <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                           <?php else: ?>
                                <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                           <?php endif; ?>
                    <?php endif; ?>
              </a>
            </figure>
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
                               <h2 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                        <?php if($addition_settings->item_name_limit != 0): ?>
			                                <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

		                                <?php else: ?>
			                                <?php echo e($featured->item_name); ?>	  
			                            <?php endif; ?>
			                        </a>
			                        </h2>
			                </div>
              
               <div class="card-footer d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>" style="font-size: .8125rem;">
				                    <?php if($addition_settings->author_name_limit != 0): ?>
				                        By <?php echo e(mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

				                    <?php else: ?>
				                        By <?php echo e($featured->username); ?>	  
				                    <?php endif; ?> 
					                <?php if($addition_settings->subscription_mode == 1): ?> 
					                    <?php if($featured->user_document_verified == 1): ?> 
				                        <?php endif; ?> 
				                    <?php endif; ?>
				                </a>
					    
                  <div class="ml-auto text-nowrap font-size-xs">
                     <div class="float-right text-center" style="font-size:20px;">
                                <?php if(Auth::guest()): ?> 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                <?php endif; ?>
                                <?php if(Auth::check()): ?>
                                    <?php if($featured->user_id != Auth::user()->id): ?>
                                        <a href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                  <?php if($featured->free_download == 0): ?>
                                   <?php if(Auth::user()): ?>
                                     <?php if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                       <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"> <i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php else: ?>
                                      <a href="<?php echo e(URL::to('/pricing')); ?>"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     <?php endif; ?>
                                   <?php else: ?>
                                      <a href="<?php echo e(URL::to('/pricing')); ?>"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   <?php endif; ?>
                  
                                  <?php else: ?>
                                     <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     <?php elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                        <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php else: ?>
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='<?php echo e(URL::to('/pricing')); ?>'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
                                </div>
                      </div>
                </div>
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                
                <div>
                </div>
              </div>
            </div>
          </div>
         </div>
        </div>
        
<?php $no++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    $('[data-toggle="popover"]').popover({
  html: true,
  content: function() {
    var id = $(this).attr('id')
    return $('#po' + id).html();
  }
});

</script><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/free-data.blade.php ENDPATH**/ ?>