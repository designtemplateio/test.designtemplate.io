<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(3016,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>.section-container{max-width: 1920px;}</style>
</head>
<body> 
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--Section 1-->
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image">
     <div class="row h-100 align-items-center p-3 mt-0">
        <div class="col-lg-6 my-auto ">
              <h1 class="heading text-left text-wrap px-2">Amazing Free Designs Templates for Every Need</h1>
              <p class="sm-heading py-1 pt-3 px-3"><?php echo e($allsettings->site_banner_subheading); ?></p>
              <div class="text-left d-none d-lg-block p-3">
                <a href="<?php echo e(URL::to('/')); ?>/free-items"><button class="get_licence py-2 px-5">See More</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
             <img src="<?php echo e(url('/')); ?>/public/img/Free-Template-Page.webp">
            <div class="d-lg-none">
               <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Explore More</button></a>
            </div>
        </div>
      </div>
</section>


<!--Section 2-->
<section class="container px-5 pb-2">
    <div class="row p-2">
    <div class="col-lg-3 p-5 my-2"><h2 class="mb-4" style="color:#4D4D4D;font-weight: 300;font-size: 24px;">200+ <?php echo e($slug); ?> 
Templates!</h2><a href="https://designtemplate.io/templates/category/<?php echo e($slug); ?>"><button class="get_licence py-2 px-5" >See More</button></a>
</div>  
    <div class="col-lg-9">
        <div class="row p-2">
        <!-- Product-->
        <?php $no = 1; ?>
        <?php $__currentLoopData = $itemData['item']->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        ?>
        <div class="col-lg-4 col-md-4 col-sm-8 mb-grid-gutter pt-0 prod-item">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="width:100%;height:100%;background:#ffffff;">
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
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="lastLogUrlCheck"><i class="dwg-download"></i></a>-->
              <?php else: ?>
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="dwg-download"></i></a>-->
              <?php endif; ?>
              <?php endif; ?> 
              <?php endif; ?>
              </div>
             
             <figure>
                    <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> 
                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                            <?php if($featured->preview_video!=''): ?>
                                <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                        <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                </video>
                            <?php else: ?>
                                <?php if($featured->item_preview!=''): ?>
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                <?php else: ?>
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            </a>
             </figure>
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
             <h3 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                        <?php if($addition_settings->item_name_limit != 0): ?>
			                                <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

		                                <?php else: ?>
			                                <?php echo e($featured->item_name); ?>	  
			                            <?php endif; ?>
			                        </a>
			                        </h3>
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
				                <div class="ml-auto text-nowrap">
                                   
                                </div>
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
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   <?php endif; ?>
                  
                                  <?php else: ?>
                                     <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     <?php elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                        <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php else: ?>
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='<?php echo e(URL::to('/pricing')); ?>'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
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
        <!-- Product-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $no++; ?>
        </div>
        
    </div>
    </div>
</section>
   
   
   
<section class="container px-5 pb-2">
    <?php $__currentLoopData = $category['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($categoryItem->category_slug == $slug): ?>
        <?php $__currentLoopData = $categoryItem->SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
        <h2 class="mb-0" style="color:#4D4D4D;font-weight: 300;font-size: 24px;"><?php echo e($subcategory['subcategory_name']); ?></h2>
        <div class="float-right">
          <a class="btn btn-outline-none" href="<?php echo e(URL::to('/templates')); ?>/subcategory/<?php echo e($subcategory['subcategory_slug']); ?>"> <h2 style="font-weight: 300;font-size: 18px;">See More...  <i class='far fa-arrow-alt-circle-right'></i></h2></a>
        </div>
      </div>
        <div class="row p-2">
        <!-- Product-->
        <?php $no = 1; ?>
        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($featured->item_category == $subcategory['subcat_id']): ?>
        <?php if($no < 5): ?>
        <?php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        ?>
        <div class="col-lg-3 col-md-4 col-sm-8 mb-grid-gutter pt-0 prod-item">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="width:100%;height:100%;background:#ffffff;">
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
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="lastLogUrlCheck"><i class="dwg-download"></i></a>-->
              <?php else: ?>
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="dwg-download"></i></a>-->
              <?php endif; ?>
              <?php endif; ?> 
              <?php endif; ?>
              </div>
             
             <figure>
                    <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> 
                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                            <?php if($featured->preview_video!=''): ?>
                                <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                        <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                </video>
                            <?php else: ?>
                                <?php if($featured->item_preview!=''): ?>
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                <?php else: ?>
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            </a>
             </figure>
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
             <h3 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                        <?php if($addition_settings->item_name_limit != 0): ?>
			                                <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

		                                <?php else: ?>
			                                <?php echo e($featured->item_name); ?>	  
			                            <?php endif; ?>
			                        </a>
			                        </h3>
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
				                <div class="ml-auto text-nowrap">
                                   
                                </div>
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
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   <?php endif; ?>
                  
                                  <?php else: ?>
                                     <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     <?php elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                        <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     <?php else: ?>
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='<?php echo e(URL::to('/pricing')); ?>'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
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
        <!-- Product-->
        <?php $no++; ?>
        
    <?php endif; ?>
        <?php endif; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   </section>
   
<!--Section 3-->   
<section class="container py-5">
      <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <h2 class="heading_unlimited new mb-0 pb-3">Trending Search</h2>
      </div>
       <div class="row justify-content-center">
        <div class="col-8 text-center">
                 <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <span class="text-right"><a href="<?php echo e(url('/tag')); ?>/item/<?php echo e(strtolower(str_replace(' ','-',$tag))); ?>" class="btn-tag m-2 my-1 py-1" style="border-radius: 6px;border: 1px solid #7D879C;background: #F7F8FD;"><?php echo e($tag); ?></a></span>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
</section>   

<!--Section 4-->   
<section class="container py-5">
   <div class="pricing-banner align-item-center p-5">
      <div class="row">
          <div class="col-md-4 col-lg-4 pl-8">
             <div class="mx-auto">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Join the Pro  <br>Community</h2>
              <div class="mx-auto">
                  <ul class="pl-3">
                      <li>Get your hands on any templates you <br>desire! Free & Premium</li>
                      <li>No copyright issues, licensed templates </li>
                      <li>24x7 Customer Support</li>
                      <li>Early Access</li>
                  </ul>
                  
                  <?php if(!Auth::guest()): ?>
                  <p class="starting_at pt-2">Starting at <del class="price-old">$19</del> $9.49/month</p>
                  <?php endif; ?>
                <a href="<?php echo e(URL::to('/pricing')); ?>"><button class="d-none d-lg-block mt-4 get_licence py-2 px-1" style="width:300px;"> Get Unlimited Downloads </button></a>
             </div>
             </div>
          </div>
          <div class="my-auto col-lg-8 text-center">
                <img src="<?php echo e(url('/')); ?>/public/img/technology_image.webp" loading="lazy" class="img-fluid" alt="Creative-image">
                <a href="<?php echo e(URL::to('/pricing')); ?>"><button class="d-lg-none get_licence mt-4 py-2 px-1" style="width:100%;"> Get Unlimited Downloads </button></a>
          </div>
     </div>
  </div>
</section>

<!--Section 5-->
<section class="container py-5">
     <div class="row justify-content-center align-items-center py-5">
            <div class="col-md-6 col-lg-6">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Bring your message to life with our animation scenes.</h2>
               <div class="mx-auto">
                <p class="pb-4">Whether you're looking to explain a product, service, or concept,our explainer animation scenes are the perfect way to convey your message with clarity and creativity.</p>
               </div>
            </div>
            <div class="my-auto col-lg-6 text-center">
                <img src="<?php echo e(url('/')); ?>/public/img/slideshow-sales-page3.webp" class="img-fluid" alt="slideshow-sales-page">
            </div>
     </div>
     <div class="row justify-content-center align-items-center py-5">
            <div class="my-auto col-lg-6 text-center">
                <img src="<?php echo e(url('/')); ?>/public/img/slideshow-sales-page1.webp" class="img-fluid d-none d-lg-block" alt="slideshow-sales-page">
            </div>
            <div class="col-md-6 col-lg-6">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Enhance Your videos with stunning visual effects and elements.</h2>
               <div class="mx-auto">
                 <p class="pb-4">Our collection features a variety of video effects, text animations, transitions and animated stickers, all crafted with creativity and versatility in mind.</p>
                 <div class="text-center">
                 <img src="<?php echo e(url('/')); ?>/public/img/slideshow-sales-page1.webp" class="img-fluid d-lg-none" alt="slideshow-sales-page">
                  </div>
               </div>
            </div>
     </div>
    
</section>

<!--Section 6-->
<?php if($allsettings->home_blog_display == 1): ?>
    <?php if(count($blog['data']) != 0): ?>
    <section class="container pb-4 pb-md-5 homeblog">
      <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <h2 class="heading_unlimited new mb-0 pb-3">From the Blogs</h2>
      </div>
        <div class="row">
          <?php $no = 1; ?>
          <?php $__currentLoopData = $blog['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-4 col-md-6 mb-grid-gutter">
            <div class="equal-col">
            <div class="hover_img">
            <div class="card product-card-alt p-2" style="background:#fffff;">
            <div class="right-column cz-gallery">
              <a class="blog-entry-thumb mb-2 rounded-lg" href="<?php echo e(URL::to('/blogs')); ?>/<?php echo e($post->post_slug); ?>">
              <?php if($post->post_image!=''): ?>
              <img  class="lazy" width="495" height="330" src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>"  alt="<?php echo e($post->post_title); ?>">
              <?php else: ?>
              <img class="lazy" width="495" height="330" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($post->post_title); ?>">
              <?php endif; ?>
              </a>
            </div>
            <div class="card-body pt-0 m-0 p-0">
            <div class="card-footer d-flex my-0 py-0">
             <div class="d-flex align-items-center font-size-sm mb-1">
                  
                  
                  </div>
            </div>
            <div class="left-column">
              <h6 class="blog-entry-title font-size-sm mb-0 product-title"><a href="<?php echo e(URL::to('/blogs')); ?>/<?php echo e($post->post_slug); ?>"><b><?php echo e($post->post_title); ?></b></a></h6>
            </div>
          </div>
            <?php if($addition_settings->post_short_desc_limit != 0): ?>
              <p class="font-size-sm mb-0"><?php echo e(mb_substr($post->post_short_desc,0,$addition_settings->post_short_desc_limit,'utf-8').'...'); ?></p>
		      <?php else: ?>
			  <p class="font-size-sm" style="text-align:justify;"><?php echo e($post->post_short_desc); ?></p>	  
			<?php endif; ?>
          </div>
          </div>
          </div>
          </div>
            <?php $no++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
        <!-- More button-->
     </section>
     <?php endif; ?> 
     <?php endif; ?>  
     
<!--Section 7-->
<section class="container product-banner p-5 mb-5" style="background-image: url(https://designtemplate.io/public/img/slider_festival.webp;background-size: cover;">
  <div class="container logo-container text-center">
    <h2 class="heading_unlimited">Bring Your Vision to Life: Request a Custom Design</h2>
    <div class="text-center pt-4">
                <?php if(Auth::guest()): ?>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" style="width:300px;">Sign up for DesignTemplate</button></a>
                <?php else: ?>
                  <a href="<?php echo e(URL::to('/pricing')); ?>"><button class="get_licence py-2 px-5" style="width:300px;">Get Unlimited Downloads</button></a>
                <?php endif; ?>
      </div>
  </div>
</section>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!empty($allsettings->site_free_end_date)): ?>
	<script type="text/javascript">
            $('#example').countdown({
                date: '<?php echo e(date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date))); ?>',
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
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/free-category.blade.php ENDPATH**/ ?>