<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php  $currentUrl = url()->current(); ?>
            <?php if($currentUrl == 'https://test.designtemplate.io/templates'): ?>
             Explore Unique Design Templates - Design Template
            <?php endif; ?> 
</title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style> 
.section-container{max-width: 1920px;}.material-symbols-outlined{color:#fe6076;}</style>
</head>
<body style="background:#eaeaef;">
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--Section 1-->
<section class="container-fluid px-5 pt-2" style="background:linear-gradient(180deg, rgba(23, 23, 23, 0) 0%, #eaeaef 100%), linear-gradient(270deg, #ef8cbd 0%, #b091ee 70%, #c9ddf8 90%);">
   <div class="container-fluid-sm p-2"> 
        <div class="dropdown d-flex justify-content-between align-item-center">
            <nav aria-label="breadcrumb">
             <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-center">
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>" style="color:#000000;"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <?php for($i = 1; $i <= count(Request::segments()) && $i!=2; $i++): ?>
              <li class="breadcrumb-item text-nowrap" style="color:#000000;text-transform: capitalize;" aria-current="page"><a class="text-nowrap" href="<?php echo e(URL::to('/templates')); ?>" style="color:#000000;"><?php echo e((Request::segment($i))); ?></a></li>
              <?php endfor; ?>
              <?php for($i = 3; $i <= count(Request::segments()); $i++): ?>
              <li class="breadcrumb-item text-nowrap active" style="color:#000000;text-transform: capitalize;" aria-current="page"><?php echo e(str_replace('-',' ',(Request::segment($i)))); ?></li>
              <?php endfor; ?>
             </ol>
            </nav>
        </div>
    </div>

    <div class="container text-center align-items-center justify-content-center">
             <h1 class="heading text-center text-wrap px-2" style="font-size:3rem;">Explore Unique Design Templates</h1>
              <p class="sm-heading text-center py-1 px-3">Elevate your videos with high-quality, easy-to-use After Effects templates. Discover the perfect premiere pro template for your project with intuitive search filters, including everything from intros to transitions, logo reveals, titles, graphic design, motion graphic and more. Subscribe today to unlock and download unlimited templates.</p>
            <a href="<?php echo e(URL::to('/pricing')); ?>"><button class="get_licence m-2 py-1 px-5"> Become a Pro </button></a>
    </div>
</section>
<section class="container section-container px-5 py-2">
    <div class="d-flex justify-content-end align-item-center">
        <button class="btn dropdown-toggle m-0 py-1 px-4 mb-2 justify-content-right" style="background:none;border-color:gray;color:#000000;" type="button" data-toggle="dropdown">Filters<span class="caret"></span></button>
            <ul class="dropdown-menu" >
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(URL::to('/')); ?>/popular-items"><?php echo e(Helper::translation(3181,$translate,'')); ?></a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(URL::to('/')); ?>/featured-items"><?php echo e(Helper::translation(3033,$translate,'')); ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(URL::to('/new-releases')); ?>"><?php echo e(Helper::translation(4842,$translate,'')); ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(URL::to('/free-items')); ?>"><?php echo e(Helper::translation(3016,$translate,'')); ?></a>
                </li>
                <!--<li class="nav-item dropdown">-->
                <!--    <a class="dropdown-item toggle" href="<?php echo e(URL::to('/flash-sale')); ?>"><?php echo e(Helper::translation(2993,$translate,'')); ?></a>-->
                <!--</li>-->
            </ul>
    </div>
    <div class="row pt-0">
        <div class="col-lg-2">
          <!-- Sidebar-->
          <form action="<?php echo e(route('shop')); ?>" id="search_form2" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

          <div class="cz-sidebar " id="shop-sidebar" style="background:#f4f4f4;" >
            <div class="cz-sidebar-header">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle"><?php echo e(Helper::translation(6069,$translate,'')); ?></span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body" data-simplebar data-simplebar-auto-hide="true">
              <!-- Filter by Brand-->
              <div class="widget cz-filter">
                <!--<h3 class="widget-title"><?php echo e(Helper::translation(2937,$translate,'')); ?></h3>-->
                <!--<?php if(count($getWell['type']) != 0): ?>-->
                <!--<ul class="widget-list cz-filter-list list-unstyled pt-1" data-simplebar data-simplebar-auto-hide="false">-->
                <!--  <?php $__currentLoopData = $getWell['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                  <!--<li class="cz-filter-item d-flex justify-content-between align-items-center">-->
                  <!--  <div class="form-group">-->
                  <!--    <input type="checkbox" class="cat_checkbox"  id="<?php echo e($value->item_type_slug); ?>" name="item_type[]" value="<?php echo e($value->item_type_slug); ?>">-->
                  <!--    <label for="<?php echo e($value->item_type_slug); ?>" class="mb-0 pb-0" style="text-transform: capitalize;"><?php echo e($value->item_type_name); ?></label>-->
                  <!--  </div>-->
                  <!--</li>-->
                <!--  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!-- </ul>-->
                <!--<?php endif; ?> -->
              </div>
              <!-- Categories-->
              <div class="widget cz-filter mb-1 pb-1 border-bottom">
                <h3 class="widget-title"><?php echo e(Helper::translation(2879,$translate,'')); ?></h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" name="product_item" placeholder="<?php echo e(Helper::translation(4857,$translate,'')); ?>">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                </div>
                <?php if(count($category['view']) != 0): ?>
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 35rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php $__currentLoopData = $category['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox" style="font-size: .8125rem;">
                      <input type="checkbox" class="cat_checkbox" id="<?php echo e($cat->cat_id); ?>" name="category_names[]" value="<?php echo e($cat->cat_id); ?>">
                      <label class="cz-filter-item-text" for="<?php echo e($cat->cat_id); ?>"><b><?php echo e($cat->category_name); ?></b></label>
                      <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <br/>
                      <span class="ml-3"><input type="checkbox" class="cat_checkbox" id="<?php echo e($sub_category->subcat_id); ?>" name="subcategory_names[]" value="<?php echo e('subcategory_'.$sub_category->subcat_id); ?>">
                      <label class="cz-filter-item-text" for="<?php echo e($sub_category->subcat_id); ?>"><?php echo e($sub_category->subcategory_name); ?></label>
                      </span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </ul>
                <?php endif; ?>
              </div>
              <div class="text-center pt-4">
                  <button class="btn contactbuttons-first justify-item-center px-9 py-2" style="color:#fff;" type="submit"><?php echo e(Helper::translation(4857,$translate,'')); ?></button>
             </div>
              <!-- Filter by Brand-->
           </div>
          </div>
         </form>
        </div>
        <div class="col-lg-10">
            <?php if($product_item != ""): ?>
             <p class="sm-heading mb-0 pb-3">Search Result for "<a style="color:#3F57EF"><?php echo e($product_item); ?></a>"</p>
            <?php endif; ?>
          <div class="row equal-height justify-content-center">
             <!-- Product-->

            <?php $no = 1; ?>
            <?php $__currentLoopData = $itemname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $price = Helper::price_info($featured->item_flash,$featured->regular_price);
            $count_rating = Helper::count_rating($featured->ratings);
            ?>
                <div class="col-lg-4 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
                            <div class="product-thumb">
                                <div class="product-card-actions">
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
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->user_type == 'admin'): ?>
                                    <?php if($featured->free_download == 0): ?>
                                        <figure>
                                            <a href="templates/1/2/3/4/<?php echo e($featured->item_token); ?>"> <span class="edit-span">Edit</span></a>
                                            <?php if($featured->item_featured == 'yes'): ?>
                                                <a href="templates/<?php echo e($featured->item_featured); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="done-span">Done</span></a>
                                            <?php else: ?>
                                                <a href="templates/<?php echo e($featured->item_featured); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="featured-span">Per Pro</span></a>
                                            <?php endif; ?>
                                            <a href="templates/<?php echo e($featured->free_download); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="pro-span">Pro</span></a>
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
                                    <?php else: ?>
                                        <figure>
                                            <a href="templates/1/2/3/4/<?php echo e($featured->item_token); ?>"> <span class="edit-span">Edit</span></a>
                                            <?php if($featured->item_featured == 'yes'): ?>
                                                <a href="templates/<?php echo e($featured->item_featured); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="done-span">Done</span></a>
                                            <?php else: ?>
                                                <a href="templates/<?php echo e($featured->item_featured); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="featured-span">Per Pro</span></a>
                                            <?php endif; ?>
                                            <a href="templates/<?php echo e($featured->free_download); ?>/<?php echo e($featured->item_token); ?>/<?php echo e($featured->item_token); ?>"> <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> </a>
                                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                             <?php if($featured->preview_video!=''): ?>
                                               <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                   <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                               </video>
                                             <?php else: ?>  
                                                <?php if($featured->item_preview!=''): ?>
                                                   <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                                <?php else: ?>
                                                    <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                                <?php endif; ?>
                                             <?php endif; ?>
                                            </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php elseif(Auth::guest()): ?>
                                    <?php if($featured->free_download == 0): ?>
                                        <figure>
                                            <span class="pro-span">Pro</span> 
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
                                    <?php else: ?>
                                        <figure>
                                            <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                              <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                                <?php if($featured->preview_video!=''): ?>
                                                  <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                                  </video>
                                                <?php else: ?> 
                                                    <?php if($featured->item_preview!=''): ?>
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                              </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($featured->free_download == 0): ?>
                                        <figure>
                                            <span class="pro-span">Pro</span>
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
                                    <?php else: ?>
                                        <figure>
                                            <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                              <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                                  <?php if($featured->preview_video!=''): ?>
                                                    <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                                    </video>
                                                  <?php else: ?>
                                                    <?php if($featured->item_preview!=''): ?>
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                              </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if($featured->free_download == 0): ?>
                                    <figure>
                                        <span class="pro-span">Pro</span>
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
                                <?php else: ?>
                                    <figure>
                                        <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                        <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                          <?php if($featured->preview_video!=''): ?>
                                             <video class="videoPreview" muted poster="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" loop>
                                                     <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($featured->preview_video); ?>" type="video/mp4">
                                             </video>
                                          <?php else: ?>
                                            <?php if($featured->item_preview!=''): ?>
                                               <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($featured->item_name); ?>">
                                            <?php else: ?>
                                                <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                                            <?php endif; ?>
                                          <?php endif; ?>
                                      </a>
                                    </figure>
                                <?php endif; ?>
                            <?php endif; ?> 
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
				                </a>
                                <div class="ml-auto text-nowrap">
                                   
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                <?php if(Auth::guest()): ?> 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
                                <?php endif; ?>
                                <?php if(Auth::check()): ?>
                                    <?php if($featured->user_id != Auth::user()->id): ?>
                                        <a href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i class="material-symbols-outlined">favorite</i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                  <?php if($featured->free_download == 0): ?>
                                   <?php if(Auth::user()): ?>
                                     <?php if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                       <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"> <i class="material-symbols-outlined pl-2">download</i></a>
                                     <?php else: ?>
                                      <a href="<?php echo e(URL::to('/pricing')); ?>"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     <?php endif; ?>
                                   <?php else: ?>
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                   <?php endif; ?>
                  
                                  <?php else: ?>
                                     <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     <?php elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                        <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="material-symbols-outlined pl-2">download</i></a>
                                     <?php else: ?>
                                        <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for license</p><a class='popup_button btn btn-primary' href='<?php echo e(URL::to('/pricing')); ?>'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='<?php echo e(URL::to('/privacy-policy')); ?>'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            <?php $no++; ?>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        
      
	 <?php if(count($itemname) < 44): ?>       
	        <?php if(count($itemTags['item']) != 0): ?>
        <div class="container d-flex flex-wrap text-left  py-3 px-0">
         <p class="sm-heading mb-0 pb-3">Similar Search for "<a style="color:#3F57EF"><?php echo e($product_item); ?></a>" Templates</p>
        </div>
            <?php $no = 1; ?>
            <?php $__currentLoopData = $itemTags['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $price = Helper::price_info($search->item_flash,$search->regular_price);
            $count_rating = Helper::count_rating($search->ratings);
            ?>
                <div class="col-lg-4 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
                            <div class="product-thumb">
                                <div class="product-card-actions">
                                    <?php
                                    $checkif_purchased = Helper::if_purchased($search->item_token);
                                    ?>
                                    <?php if($checkif_purchased == 0): ?>
                                    <?php if($search->free_download == 0): ?>
                                    <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->id != 1 && $search->user_id != Auth::user()->id): ?>
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($search->item_slug); ?>"><i class="dwg-cart"></i></a>-->
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($search->item_slug); ?>"><i class="dwg-cart"></i></a>-->
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if(Auth::guest()): ?>
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="javascript:void(0)"><i class="material-symbols-outlined">download</i></a>
                                    <?php else: ?>
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base" href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($search->item_token)); ?>"><i class="material-symbols-outlined">download</i></a>
                                    <?php endif; ?>
                                    <?php endif; ?> 
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->user_type == 'admin'): ?>
                                    <?php if($search->free_download == 0): ?>
                                        <figure>
                                            <a href="templates/1/2/3/4/<?php echo e($search->item_token); ?>"> <span class="edit-span">Edit</span></a>
                                            <?php if($search->item_featured == 'yes'): ?>
                                                <a href="templates/<?php echo e($search->item_featured); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="done-span">Done</span></a>
                                            <?php else: ?>
                                                <a href="templates/<?php echo e($search->item_featured); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="featured-span">Per Pro</span></a>
                                            <?php endif; ?>
                                            <a href="templates/<?php echo e($search->free_download); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="pro-span">Pro</span></a>
                                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                            <?php if($search->preview_video!=''): ?>
                                               <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                   <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                               </video>
                                            <?php else: ?>   
                                                <?php if($search->item_preview!=''): ?>
                                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                <?php else: ?>
                                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>   
                                            </a>
                                        </figure>
                                    <?php else: ?>
                                        <figure>
                                            <a href="templates/1/2/3/4/<?php echo e($search->item_token); ?>"> <span class="edit-span">Edit</span></a>
                                            <?php if($search->item_featured == 'yes'): ?>
                                                <a href="templates/<?php echo e($search->item_featured); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="done-span">Done</span></a>
                                            <?php else: ?>
                                                <a href="templates/<?php echo e($search->item_featured); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="featured-span">Per Pro</span></a>
                                            <?php endif; ?>
                                            <a href="templates/<?php echo e($search->free_download); ?>/<?php echo e($search->item_token); ?>/<?php echo e($search->item_token); ?>"> <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> </a>
                                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                             <?php if($search->preview_video!=''): ?>
                                               <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                   <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                               </video>
                                             <?php else: ?>  
                                                <?php if($search->item_preview!=''): ?>
                                                   <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                <?php else: ?>
                                                    <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                <?php endif; ?>
                                             <?php endif; ?>
                                            </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php elseif(Auth::guest()): ?>
                                    <?php if($search->free_download == 0): ?>
                                        <figure>
                                            <span class="pro-span">Pro</span> 
                                              <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                                <?php if($search->preview_video!=''): ?>
                                                  <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                                  </video>
                                                <?php else: ?> 
                                                    <?php if($search->item_preview!=''): ?>
                                                        <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                              </a>
                                        </figure>
                                    <?php else: ?>
                                        <figure>
                                            <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                              <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                                <?php if($search->preview_video!=''): ?>
                                                  <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                                  </video>
                                                <?php else: ?> 
                                                    <?php if($search->item_preview!=''): ?>
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                              </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($search->free_download == 0): ?>
                                        <figure>
                                            <span class="pro-span">Pro</span>
                                               <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                                  <?php if($search->preview_video!=''): ?>
                                                    <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                                    </video>
                                                  <?php else: ?> 
                                                    <?php if($search->item_preview!=''): ?>
                                                        <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                    <?php endif; ?>
                                                  <?php endif; ?>    
                                                </a>
                                        </figure>
                                    <?php else: ?>
                                        <figure>
                                            <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                              <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                                  <?php if($search->preview_video!=''): ?>
                                                    <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                                    </video>
                                                  <?php else: ?>
                                                    <?php if($search->item_preview!=''): ?>
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                    <?php else: ?>
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                              </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if($search->free_download == 0): ?>
                                    <figure>
                                        <span class="pro-span">Pro</span>
                                        <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                              <?php if($search->preview_video!=''): ?>
                                                    <video class="videoPreview" muted loop poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>">
                                                      <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                                    </video>
                                              <?php else: ?>
                                                <?php if($search->item_preview!=''): ?>
                                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                                <?php else: ?>
                                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                                <?php endif; ?>
                                              <?php endif; ?>
                                        </a>
                                    </figure>
                                <?php else: ?>
                                    <figure>
                                        <span class="free"><?php echo e(Helper::translation(2992,$translate,'')); ?> For Today</span> 
                                        <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                          <?php if($search->preview_video!=''): ?>
                                             <video class="videoPreview" muted poster="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" loop>
                                                     <source src="<?php echo e(url('/')); ?>/storage/app/videos/<?php echo e($search->preview_video); ?>" type="video/mp4">
                                             </video>
                                          <?php else: ?>
                                            <?php if($search->item_preview!=''): ?>
                                               <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="<?php echo e(url('/')); ?>/public/img/lazy_load_thumbnail.webp" data-src="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>"  data-srcset="<?php echo e(Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp')); ?>" alt="<?php echo e($search->item_name); ?>">
                                            <?php else: ?>
                                                <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($search->item_name); ?>">
                                            <?php endif; ?>
                                          <?php endif; ?>
                                      </a>
                                    </figure>
                                <?php endif; ?>
                            <?php endif; ?> 
                            <div class="card-body pt-0 mx-2 m-0 p-0" >
                                <h2 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($search->item_slug); ?>">
                                        <?php if($addition_settings->item_name_limit != 0): ?>
			                                <?php echo e(mb_substr($search->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

		                                <?php else: ?>
			                                <?php echo e($search->item_name); ?>	  
			                            <?php endif; ?>
			                        </a>
			                    </h2>
			                </div>
			  
                            <div class="card-footer d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($search->username); ?>" style="font-size: .8125rem;">
				                    <?php if($addition_settings->author_name_limit != 0): ?>
				                        By <?php echo e(mb_substr($search->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

				                    <?php else: ?>
				                        By <?php echo e($search->username); ?>	  
				                    <?php endif; ?>
				                </a>
                                <div class="ml-auto text-nowrap">
                                   
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                <?php if(Auth::guest()): ?> 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
                                <?php endif; ?>
                                <?php if(Auth::check()): ?>
                                    <?php if($search->user_id != Auth::user()->id): ?>
                                        <a href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($search->item_id)); ?>/favorite/<?php echo e(base64_encode($search->item_liked)); ?>"><i class="material-symbols-outlined">favorite</i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                    $checkif_purchased = Helper::if_purchased($search->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                  <?php if($search->free_download == 0): ?>
                                   <?php if(Auth::user()): ?>
                                     <?php if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                       <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($search->item_token)); ?>"> <i class="material-symbols-outlined pl-2">download</i></a>
                                     <?php else: ?>
                                      <a href="<?php echo e(URL::to('/pricing')); ?>"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     <?php endif; ?>
                                   <?php else: ?>
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class='material-symbols-outlined pl-2'>download</i></a>
                                   <?php endif; ?>
                  
                                  <?php else: ?>
                                     <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     <?php elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin'): ?>
                                        <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($search->item_token)); ?>"><i class="material-symbols-outlined pl-2">download</i></a>
                                     <?php else: ?>
                                        <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for license</p><a class='popup_button btn btn-primary' href='<?php echo e(URL::to('/pricing')); ?>'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($search->item_token)); ?>'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='<?php echo e(URL::to('/privacy-policy')); ?>'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     <?php endif; ?>
                                  <?php endif; ?> 
                                 <?php endif; ?>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <!--<div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i><?php echo e($search->item_sold); ?><span class="font-size-xs ml-1"><?php echo e(Helper::translation(2930,$translate,'')); ?></span>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--<?php if($search->free_download == 0): ?>-->
                                <!--<?php if($search->item_flash == 1): ?><del class="price-old"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($search->regular_price); ?></del><?php endif; ?> <span class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($price); ?></span>-->
                                <!--<?php else: ?>-->
                                <!--<span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate,'')); ?></span> -->
                                <!--<?php endif; ?>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            <?php $no++; ?>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
	    <?php endif; ?>  
    <?php endif; ?>       
           
         <?php if( count($itemname) == 0 && count($itemTags['item']) == 0): ?>
            <?php if(Auth::check()): ?>
               <div class="text-center">
                 <h2>Sorry, we couldn't find any results for "<?php echo e($product_item); ?>"</h2> 
                 <h3><a href="#" id="mySizeChart" data-toggle="modal" data-target="#largeModal">Suggest </a> if any...</h3>
               </div>
            <?php endif; ?>
            <?php if(Auth::guest()): ?>
               <div class="text-center">
                 <h2>Sorry, we couldn't find any results for "<?php echo e($product_item); ?>"</h2>
                 <h3><a href="javascript:void(0)" style="color:#3f57ef;" data-toggle="modal" data-target="#exampleModal">Suggest </a> if any...</h3>
               </div>
            <?php endif; ?>
            <div class="card-deck py-5 text-center">
              <div class="card">
                <div class="text-center py-4">
                </div>
                <div class="card-body">
                     <h5 class="card-title"><?php echo e(Helper::translation(3016,$translate,'')); ?></h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">Enjoy many free design templates available for you. Grab it now.</p>
                     <a class="btn btn-primary px-1" href="<?php echo e(URL::to('/')); ?>/free-items">See <?php echo e(Helper::translation(3016,$translate,'')); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
              </div>
      
              <div class="card">
                <div class="text-center py-4">
                </div>
                <div class="card-body">
                     <h5 class="card-title"><?php echo e(Helper::translation(3181,$translate,'')); ?></h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">We have most popular items because people trust our templates.</p>
                     <a class="btn btn-primary px-1" href="<?php echo e(URL::to('/')); ?>/popular-items">See <?php echo e(Helper::translation(3181,$translate,'')); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
              </div>
              <div class="card">
                 <div class="text-center py-4">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title"><?php echo e(Helper::translation(4842,$translate,'')); ?></h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">Fresh and newly design templates are released every hour.</p>
                     <a class="btn btn-primary px-1" href="<?php echo e(URL::to('/new-releases')); ?>">See <?php echo e(Helper::translation(4842,$translate,'')); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                  </div>
              </div>
              <div class="card">
                 <div class="text-center py-4">
                 </div>
                 <div class="card-body">
                    <h5 class="card-title"><?php echo e(Helper::translation(3033,$translate,'')); ?></h5>
                    <hr class="hrline">
                    <p class="card-text pt-4 px-1">The most creative design templates suggested for your project.</p>
                    <a class="btn btn-primary px-1" href="<?php echo e(URL::to('/')); ?>/featured-items">See <?php echo e(Helper::translation(3033,$translate,'')); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                 </div>
              </div>
            </div>
       <?php endif; ?>
        
       </div>  
       </div>
      </div>
    </div>
</section>
<div class="container text-center align-items-center justify-content-center">
            <p class="sm-heading text-center pt-5 px-3">Design templates are pre-designed frameworks or layouts that can be used to graphic design, web design templates, motion graphic, after effects, and premiere pro templates. Using templates can save time, ensure consistency in design and branding, and provide a professional and cost-effective solution for businesses and individuals.</p>
</div>
            
<section class="container-fluid">
    <h2 class="heading_unlimited text-center py-4">Frequently asked questions</h2> 
    <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What template means?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>In the context of digital media, a template is a pre-designed asset that can be used as a starting point for creating a new project. A template can be a file or a set of files that contain pre-designed elements, such as graphics, text, and layouts. Templates can be used in a variety of digital mediums, including video editing, graphic design, website design, and more. They can save time and effort by providing a pre-designed starting point that can be customized to suit the specific needs of the project.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What is template or design template?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>A template or design template is a pre-designed framework or layout that can be used as a starting point for creating a new design or document. Templates are commonly used in graphic design, web design, and document creation, and they can be created using a variety of software programs. Using a template can save time and effort, especially for those who may not have the design skills or expertise to create a design or document from scratch. Templates can also ensure consistency in design and branding across multiple documents or projects.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What is template types?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are various types of templates available that are designed for different purposes and industries. Here are some common types of templates: After Effects and Premiere Pro templates are video editing templates that can help you to create professional-grade video projects quickly and efficiently. Motion Graphic Design templates are animated designs that can be used for a variety of digital mediums, including social media, websites, and video projects. Graphic Design Templates: Graphic design templates are pre-designed files that can be used to create designs for marketing materials such as business cards, flyers, brochures, social media posts, and more.</p>
            </div>
            <div class="question">
                <button>
                    <span>4 . Why use design templates?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are several benefits to using design templates. Time savings: Design templates can save time by providing a pre-designed starting point that can be customized to suit your specific needs. Consistency: Using design templates ensures consistency in design and branding across multiple documents or projects. Professionalism: Design templates are often created by professional designers and are designed to look visually appealing and professional. Cost-effective: Design templates are often more cost-effective than hiring a professional designer to create a custom design from scratch. Flexibility: Design templates can be customized to suit your specific needs, allowing you to add your own content, images, and branding. Overall, using design templates can be a great way to save time and effort while ensuring that your designs look professional and consistent.</p>
            </div>
        </div>
    <div class="mt-12 text-center lg:mt-10">
      <div class="text-black">
        Still have questions? We’re here to help you
      </div> 
      <div class="text-center pb-5">
             <a class="dropdown-item" href="<?php echo e(URL::to('/contact')); ?>"> 
             <button class="btn btn-primary" type="submit">Contact Us</button>
             </a>
      </div>
     </div>
</div>
</section>
<!-- Suggestion Box modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Suggestion Box</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="main-form" action="<?php echo e(route('suggestion')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

          <div class="row">
            <div class="col-6">
              <label>Which Template You Want</label><br>
              <input type="text" placeholder="Type Here" name="name" id="suggestion" required>
            </div>
             <div class="col-6">
              <label>Add Description</label>
              <textarea class="form-control rounded-0" placeholder="Give Your Discription.." id="description" name="description" rows="2"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label>Select Item Type</label>
              <?php if(count($getWell['type']) != 0): ?>
              <ul class="list-unstyled">
                <?php $__currentLoopData = $getWell['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="pb-0">
                  <input type="checkbox" class="m-0" id="" name="item_type" value="<?php echo e($value->item_type_slug); ?>" required>
                  <label class="m-0" for="<?php echo e($value->item_type_slug); ?>"><?php echo e($value->item_type_name); ?> </label>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </div>
            <!--<div class="col-6">-->
            <!--  <label>Attachment </label>-->
            <!--  <input type="file" class="inputfile form-control" name="upload_file">-->
            <!--</div>-->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Suggestion Box modal-->
</div>
</div>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--For FAQ JS script-->
<script>
    const buttons = document.querySelectorAll('button');
buttons.forEach( button =>{
    button.addEventListener('click',()=>{
        const faq = button.nextElementSibling;
        const icon = button.children[1];
        faq.classList.toggle('show');
        icon.classList.toggle('rotate'); })} )
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/search.blade.php ENDPATH**/ ?>