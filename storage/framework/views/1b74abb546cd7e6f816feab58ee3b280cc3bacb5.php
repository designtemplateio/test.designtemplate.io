<?php $no = 1; ?>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$price = Helper::price_info($featured->item_flash,$featured->regular_price);
$count_rating = Helper::count_rating($featured->ratings);
?>
 <div class="col-lg-3 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
                            <div class="product-thumb">
                                <!--<?php if(Auth::guest()): ?> -->
                                <!--<a class="btn-wishlist btn-sm" href="<?php echo e(url('/')); ?>/login"><i class="dwg-heart"></i></a>-->
                                <!--<?php endif; ?>-->
                                <!--<?php if(Auth::check()): ?>-->
                                <!--<?php if($featured->user_id != Auth::user()->id): ?>-->
                                <!--<a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i class="dwg-heart"></i></a>-->
                                <!--<?php endif; ?>-->
                                <!--<?php endif; ?>-->
                                <div class="product-card-actions">
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-eye"></i></a>-->
                                    <?php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                    ?>
                                    <?php if($checkif_purchased == 0): ?>
                                    <?php if($featured->free_download == 0): ?>
                                    <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id): ?>
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-cart"></i></a>-->
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-cart"></i></a>-->
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if(Auth::guest()): ?>
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="javascript:void(0)"><i class="material-symbols-outlined">download</i></a>
                                    <?php else: ?>
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined">download</i></a>
                                    <?php endif; ?>
                                    <?php endif; ?> 
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!--<a class="product-thumb-overlay"  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>-->
                            <?php if($featured->free_download == 0): ?>
                            <figure>
                                <span class="pro-span">Pro</span> 
                                  <a class="product-thumb-overlay"  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>
                                  <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                        <?php if($featured->item_preview!=''): ?>
                                            <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                        <?php else: ?>
                                            <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                        <?php endif; ?>
                                  </a>
                            </figure>
                            <?php else: ?>
                            <figure>
                                <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> 
                                  <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                        <?php if($featured->item_preview!=''): ?>
                                           <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                        <?php else: ?>
                                            <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                        <?php endif; ?>
                                  </a>
                            </figure>
                            <?php endif; ?>
                
                <!--<img class="lazy_load" src="<?php echo e(url('/')); ?>/public/img/no-image.png" data-src="<?php echo e(url('/')); ?>/public/img/review1.png" data-srcset="image-to-lazy-load-2x.jpg 2x, <?php echo e(url('/')); ?>/public/img/review1.png" alt="I'm an image!">-->
                            <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                <!--<div class="text-muted" style="font-size:10px;"><a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a></div>-->
                                <!--<div class="star-rating">-->
                                <!--    <?php if($count_rating == 0): ?>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--    <?php if($count_rating == 1): ?>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--    <?php if($count_rating == 2): ?>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--    <?php if($count_rating == 3): ?>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--    <?php if($count_rating == 4): ?>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--    <?php if($count_rating == 5): ?>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <?php endif; ?>-->
                                <!--</div>-->
                            </div>
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
                                    <!--<div class="blog-entry-author-ava">-->
                                    <!--<?php if($featured->user_photo!=''): ?>-->
                                    <!--<img class="lazy" width="26" height="26" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($featured->user_photo); ?>"  alt="<?php echo e($featured->username); ?>">-->
                                    <!--<?php else: ?>-->
                                    <!--<img class="lazy" width="26" height="26" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($featured->username); ?>">-->
                                    <!--<?php endif; ?>-->
                                    <!--</div>-->
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
				                <!--<i class="fa fa-check-circle px-1" style="color:#4734CB;"></i>-->
                                <div class="ml-auto text-nowrap">
                                    <!--<i class="dwg-time"></i> <?php echo e(date('d M Y',strtotime($featured->updated_item))); ?>-->
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                <?php if(Auth::guest()): ?> 
                                        <a href="javascript:void(0)" class="lastLogUrlCheck"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
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
                                       <a href="javascript:void(0)" class="lastLogUrlCheck"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php else: ?>
                                       <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <!--<div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span class="font-size-xs ml-1"><?php echo e(Helper::translation(2930,$translate,'')); ?></span>-->
                                <!--</div>-->
                                <div>
                                <!--<?php if($featured->free_download == 0): ?>-->
                                <!--<?php if($featured->item_flash == 1): ?><del class="price-old"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($featured->regular_price); ?></del><?php endif; ?> <span class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($price); ?></span>-->
                                <!--<?php else: ?>-->
                                <!--<span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> -->
                                <!--<?php endif; ?>-->
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
<?php $no++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/flash-data.blade.php ENDPATH**/ ?>