<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php if($check_if_item != 0): ?>
<title><?php echo e($item['item']->item_name); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php if($item_slug != ''): ?>
<?php if($item['item']->item_allow_seo == 1): ?>
<meta name="Description" content="<?php echo e($item['item']->item_seo_desc); ?>">
<meta name="Keywords" content="<?php echo e($item['item']->item_seo_keyword); ?>">
<?php else: ?>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<title><?php echo e(Helper::translation(2860,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta property="og:image" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>"/>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>"/>
<meta name="twitter:image:src" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>">
<meta name="twitter:image:width" content= "280" />
<meta name="twitter:image:height" content= "480" />
<style>
.hidden {
      display: none;
    }
</style>
</head>
<body style="background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(254,254,255,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 23%, rgba(234,234,239,1) 27%, rgba(234,234,239,1) 31%, rgba(234,234,239,1) 36%, rgba(234,234,239,1) 48%, rgba(234,234,239,1) 100%);">
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($check_if_item != 0): ?>
<div class="container-fluid-sm px-5 d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" style="color:#000000;" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" style="color:#000000;" href="<?php echo e(URL::to('/templates')); ?>">Templates</a></li>
              <li class="breadcrumb-item text-nowrap" style="text-transform: capitalize;"><?php echo e(str_replace('-',' ',$item['item']->item_type)); ?></li>
              <li class="breadcrumb-item text-nowrap" aria-current="page"><a class="text-nowrap" style="color:#000000;text-transform: capitalize;" href="<?php echo e(URL::to('/templates/subcategory/')); ?>/<?php echo e(str_replace(' ','-',$category_name)); ?>"><?php echo e($category_name); ?></a></li>
              </li>
             </ol>
          </nav>
        </div>
      </div>
<div class="page-title-overlap text-center px-1">
      <div class="center py-2">
      <div class="order-lg-1 pr-lg-4  text-center text-lg-center">
          <h1 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;"><?php echo e($item['item']->item_name); ?></h1>
      </div>
      </div>
</div>
<section class="container p-2">
      <div class="bg-light rounded-lg overflow-hidden" style="border: 0.5px solid #CCCCCC;border-radius: 12px;">
        <div class="row">
          <!-- Content-->
          <section class="col-lg-8 py-0 py-lg-0 px-1 pb-n5 mb-n5">
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <!-- Product gallery-->
              <div class="cz-gallery text-center">
                      <?php if($item['item']->video_preview_type!=''): ?>
                      <?php if($item['item']->video_preview_type == 'youtube'): ?>
                      <?php if($item['item']->video_url != ''): ?>
                      <?php
                      $url = $item['item']->video_url;
                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                      $video_id = $match[1];
                      ?>
                      <iframe width="760" height="428" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?loop=1&modestbranding=1&autoplay=1&loop=1&rel=0&showinfo=0&fs=0&autohide=2&controls=0&cc_load_policy=1&iv_load_policy=3" frameborder="0" class="" allow="autoplay" scrolling="no"></iframe> 
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="760" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" data-original="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($item['item']->video_preview_type == 'mp4'): ?>
                      <?php if($item['item']->video_file != ''): ?>
					  <video width="762" height="428" src="<?php echo e(Helper::Image_Path($item['item']->video_file,'no-video.png')); ?>" controls> <?php echo e(Helper::translation(5979,$translate,'')); ?> </video>	  
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" data-original="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($item['item']->video_preview_type == 'mp3'): ?>
                      <?php if($item['item']->audio_file != ''): ?>
					  <audio controls="controls"><source src="<?php echo e(Helper::Image_Path($item['item']->audio_file,'no-audio.png')); ?>" type="audio/mpeg" /></audio>	  
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-audio.png" data-original="<?php echo e(url('/')); ?>/resources/views/assets/no-audio.png" alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php else: ?>  
                      <?php if($item['item']->item_preview!=''): ?>
                      <a class="gallery-item rounded-lg mb-grid-gutter" href="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" data-sub-html="<?php echo e($item['item']->item_name); ?>">
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" data-original="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" alt="<?php echo e($item['item']->item_name); ?>">
                      <span class="gallery-item-caption"><?php echo e($item['item']->item_name); ?></span>
                      </a>
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/public/img/no-image.png" data-original="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                   <?php if($getcount != 0): ?>
                   <div class="row">
                    <?php $__currentLoopData = $item_allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="col-sm-2"><a class="gallery-item rounded-lg mb-grid-gutter thumber" href="<?php echo e(Helper::Image_Path($image->item_image,'no-image.png')); ?>" data-sub-html="<?php echo e($item['item']->item_name); ?>"><img class="lazy" width="762" height="430" src="<?php echo e(Helper::Image_Path($image->item_image,'no-image.png')); ?>" data-original="<?php echo e(Helper::Image_Path($image->item_image,'no-image.png')); ?>" alt="<?php echo e($image->item_image); ?>"/><span class="gallery-item-caption"><?php echo e($item['item']->item_name); ?></span></a></div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
                <?php endif; ?>
              </div>
              <!-- Wishlist + Sharing-->
              <div class="d-flex flex-wrap justify-content-between align-items-center py-1">
                <div class="py-2 mr-2">
                  <?php if($item['item']->demo_url != ''): ?> 
                  <a class="btn btn-outline-accent btn-sm" href="<?php echo e(url('/preview')); ?>/<?php echo e($item['item']->item_slug); ?>" target="_blank"><i class="dwg-eye font-size-sm mr-2"></i><?php echo e(Helper::translation(3049,$translate,'')); ?></a>
                  <?php endif; ?>
                  <?php if(Auth::guest()): ?>
                  <a class="btn btn-favorites btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="dwg-heart font-size-lg mr-2"></i><?php echo e(Helper::translation(3051,$translate,'')); ?></a>
                  <?php endif; ?>
                  <?php if(Auth::check()): ?>
                  <?php if($item['item']->user_id != Auth::user()->id): ?>
                  <a class="btn btn-favorites btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item['item']->item_id)); ?>/favorite/<?php echo e(base64_encode($item['item']->item_liked)); ?>"><i class="dwg-heart font-size-lg mr-2"></i><?php echo e(Helper::translation(3051,$translate,'')); ?></a>
                  <?php endif; ?>
                  <?php endif; ?>
                  </div>
                <div class="py-2"><i class="dwg-share-alt font-size-lg align-middle text-muted mr-2"></i>
                <a class="social-btn sb-outline sb-facebook sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="facebook" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-facebook"></i></a>
                <a class="social-btn sb-outline sb-twitter sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="twitter" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-twitter"></i></a>
                <a class="social-btn sb-outline sb-pinterest sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="pinterest" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-pinterest"></i></a>
                <a class="social-btn sb-outline sb-linkedin sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="linkedin" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-linkedin"></i></a>
                </div>
              </div>
              <div class="mb-4 mb-lg-5">
      <!-- Nav tabs-->
      <div class="tab-content pt-0 mt-0">
        <div class="tab-pane fade" id="suppport" role="tabpanel">
           <div class="row">
            <div class="col-lg-12">
               <h4><?php echo e(Helper::translation(3060,$translate,'')); ?></h4>
               <?php if(Auth::guest()): ?>
                    <p><?php echo e(Helper::translation(3061,$translate,'')); ?>

                    <a href="javascript:void(0)" class="theme-color" data-toggle="modal" data-target="#exampleModal"><?php echo e(Helper::translation(3020,$translate,'')); ?></a> <?php echo e(Helper::translation(3062,$translate,'')); ?></p>
                    <?php endif; ?>
                    <?php if(Auth::check()): ?>
                    <form action="<?php echo e(route('support')); ?>" class="support_form media-body needs-validation" id="support_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                  <label for="subj"><?php echo e(Helper::translation(3063,$translate,'')); ?></label>
                                  <input type="text" id="support_subject" name="support_subject" class="form-control" placeholder="Enter your subject" data-bvalidator="required">
                            </div>
                                <div class="form-group">
                                    <label for="supmsg"><?php echo e(Helper::translation(2918,$translate,'')); ?> </label>
                                    <textarea class="form-control" id="support_msg" name="support_msg" rows="5" placeholder="Enter your message" data-bvalidator="required"></textarea>
                                </div>
                                    <input type="hidden" name="to_address" value="<?php echo e($item['item']->email); ?>">
                                    <input type="hidden" name="to_id" value="<?php echo e($item['item']->id); ?>">
                                    <input type="hidden" name="to_name" value="<?php echo e($item['item']->username); ?>">
                                    <input type="hidden" name="from_address" value="<?php echo e(Auth::user()->email); ?>">
                                    <input type="hidden" name="from_name" value="<?php echo e(Auth::user()->username); ?>">
                                    <input type="hidden" name="item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"><?php echo e(Helper::translation(3064,$translate,'')); ?></button>
                    </form>
                    <?php endif; ?>
            </div>
           </div> 
        </div>
      </div>
                 <?php if($item['item']->item_tags != ''): ?>
                 <li class="justify-content-between pt-2" style="list-style-type: none;"><span class="text-dark font-weight-medium"><?php echo e(Helper::translation(2974,$translate,'')); ?></span>
                 <?php if(Auth::check()): ?>
                 <?php if(Auth::user()->user_type == 'admin'): ?>
                 <a href="/templates/1/2/3/4/<?php echo e($item['item']->item_token); ?>"> <span class="edit-span">Edit</span></a>
                 <?php endif; ?>
                 <?php endif; ?>
                 <br/>
                 <?php $item_tags = str_replace(', ', ',', $item['item']->item_tags);
	                  $item_tags = explode(',',$item_tags);?>
                 <div id="nameList text-justify">
                 <?php $__currentLoopData = $item_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($index < 14): ?>
                 <span class="text-right"><a href="<?php echo e(url('/tag')); ?>/item/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>" class="link-color btn-tag mr-2 my-1 py-1"><?php echo e($tags.' '); ?></a></span>
                 <?php else: ?>
                 <span class="text-right hidden"><a href="<?php echo e(url('/tag')); ?>/item/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>" class="link-color btn-tag mr-2 my-1 py-1"><?php echo e($tags.' '); ?></a></span>
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <span class="text-right link-color btn-tag mr-2 my-1 py-1 btn" id="showMoreButton" onclick="showMore()">See More...</span>
                 </div>
                 </li>
                 <?php endif; ?>
                 
                 <div class="panel panel-default">
                    <div class="panel-heading pt-4">
                         <li style="list-style-type: none;"><span class="text-dark font-weight-medium panel-title" data-toggle="collapse" data-target="#collapseOne">See More Details <i class="fa fa-arrow-down" aria-hidden="true"></i></span></li>
                     </div>
                 </div>
         </div>
        </div> 
</section>
          
<!-- Sidebar-->
<section class="col-lg-4 pt-2">
    <!--<hr class="d-lg-none">-->
    <form action="<?php echo e(route('cart')); ?>" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?> 
              <div class="cz-sidebar-static h-100 border-left mx-2 px-4" style="max-width:28rem">
               <?php if($item['item']->free_download == 1): ?>
               <div class="bg-secondary rounded p-3 mb-4">
               <p><?php echo e(Helper::translation(3065,$translate,'')); ?> <strong><?php echo e(Helper::translation(3040,$translate,'')); ?></strong>. <?php echo e(Helper::translation(3066,$translate,'')); ?></p>
               <?php if(Auth::guest()): ?>
               <div align="center">
                <a href="javascript:void(0)" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-download"></i> <?php echo e($additional->download_button_after_text); ?></a>
               </div>
               <?php else: ?>
               <div align="center">
               <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($item['item']->item_token)); ?>" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> <?php echo e($additional->download_button_after_text); ?></a>
               </div>
               <?php endif; ?>
               </div>
               <?php else: ?>
               <?php if($addition_settings->subscription_mode == 1): ?>
               <?php if($item['item']->subscription_item == 1): ?>
               <div class="bg-secondary rounded p-3 mb-4">
               <?php if(Auth::guest()): ?>
               <p><?php echo e(Helper::translation('62eb75242a704',$translate,'Subscribe to unlock this item, plus millions of creative assets with unlimited downloads.')); ?></p>
               
               <?php endif; ?>
               <?php if($item['item']->download_count == "") { $dcount = 0; } else { $dcount = $item['item']->download_count; } ?>
               <div>
                   <?php if(Auth::check()): ?>
                   <?php if(Auth::user()->user_subscr_date >= date('Y-m-d') && Auth::user()->user_subscr_payment_status == 'completed'): ?>
                   <p><?php echo e(Helper::translation('62eba3b4bf733',$translate,'This item is one of the Subscribe Users Free Download Files. You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.')); ?></p>
                   <div align="center">
                   <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($item['item']->item_token)); ?>" class="btn btn-custom btn-block btn-sm"> <i class="fa fa-download"></i> <?php echo e($additional->download_button_after_text); ?></a>
                   </div>
                   <?php else: ?>
                   <p><?php echo e(Helper::translation('62eb75242a704',$translate,'Subscribe to unlock this item, plus millions of creative assets with unlimited downloads.')); ?></p>
                   <div align="center">
                   <a href="<?php echo e(URL::to('/pricing')); ?>" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> <?php echo e($additional->download_button_before_text); ?></a>
                   </div>
                   <?php endif; ?>
                   <?php /*?>@if($addition_settings->subscription_mode == 0)<?php */?>
                   
                   <?php /*?>@else
                   @if(Auth::user()->user_type == 'vendor')
                   @if(Auth::user()->user_subscr_date >= date('Y-m-d'))
                   <a href="{{ URL::to('/item') }}/download/{{ base64_encode($item['item']->item_token) }}" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate,'') }} ({{ $dcount }})</a>
                   @else
                   <a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Your subscription has been expired. Please renewal your subscription')"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate,'') }} ({{ $dcount }})</a>
                   @endif
                   @else<?php */?>
                   <?php /*?><a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Subscription user only')"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate,'') }} ({{ $dcount }})</a>
                   @endif
                   @endif<?php */?>
                   <?php endif; ?>
                   <?php if(Auth::guest()): ?>
                   <div align="center">
                   <a href="javascript:void(0);" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-download"></i> <?php echo e($additional->download_button_before_text); ?></a>
                   <?php /*?><a href="{{ URL::to('/login') }}" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate,'') }} ({{ $dcount }})</a><?php */?>
                   </div>
                   <?php endif; ?>
                </div>
               </div>
               <?php endif; ?>
               <?php endif; ?>
               <?php endif; ?> 
               
               <?php if($item['item']->free_download == 1): ?>
                <?php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                ?>
              <div class="accordion px-3" id="licenses">
                <div class="card border-top-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-2 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" value="<?php echo e(base64_encode($item_price)); ?>_regular" id="license-std" checked>
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-std" data-toggle="collapse" data-target="#standard-license"><?php echo e(Helper::translation(3072,$translate,'')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($item_price); ?></h5>
                  </div>
                  <div class="collapse" id="standard-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->regular_license); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->regular_license); ?></span></li>
                        <?php endif; ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Commercial Usage up to 3 times</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php if($item['item']->extended_price != 0): ?>
                <div class="card border-bottom-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="<?php echo e(base64_encode($extend_item_price)); ?>_extended">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-ext" data-toggle="collapse" data-target="#extended-license"><?php echo e(Helper::translation(3073,$translate,'')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($extend_item_price); ?></h5>
                  </div>
                  <div class="collapse" id="extended-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->extended_license); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->extended_license); ?></span></li>
                        <?php endif; ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">No limits on Commercial Usage</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
               <?php else: ?>
                <?php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                ?>
              <div class="accordion px-3" id="licenses">
                <div class="card border-top-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" value="<?php echo e(base64_encode($item_price)); ?>_regular" id="license-std" checked style="position:relative;">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-std" data-toggle="collapse" data-target="#standard-license"><?php echo e(Helper::translation(3072,$translate,'')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($item_price); ?></h5>
                  </div>
                  <div class="collapse" id="standard-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->regular_license); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->regular_license); ?></span></li>
                        <?php endif; ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Commercial Usage up to 3 times</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php if($item['item']->extended_price != 0): ?>
                <div class="card border-bottom-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="<?php echo e(base64_encode($extend_item_price)); ?>_extended" style="position:relative;">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-ext" data-toggle="collapse" data-target="#extended-license"><?php echo e(Helper::translation(3073,$translate,'')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($extend_item_price); ?></h5>
                  </div>
                  <div class="collapse" id="extended-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->extended_license); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for <?php echo e($additional->extended_license); ?></span></li>
                        <?php endif; ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">No limits on Commercial Usage</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            
              <?php if($allsettings->item_support_link !=''): ?>
              <?php if($item['item']->free_download == 1): ?>
              <p class="m-2 px-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs"><?php echo e($page['view']->page_title); ?></a></p>
              <?php else: ?>
              <p class="m-2 px-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs"><?php echo e($page['view']->page_title); ?></a></p>
              <?php endif; ?>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                         <div class="modal-header">
                          <h4 class="modal-title"><?php echo e($page['view']->page_title); ?></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                         <?php echo html_entity_decode($page['view']->page_desc); ?>
                        </div>
                       </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php /*?><input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><?php */?>
                <input type="hidden" name="item_id" value="<?php echo e($item['item']->item_id); ?>">
                <input type="hidden" name="item_name" value="<?php echo e($item['item']->item_name); ?>">
                <input type="hidden" name="item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                <input type="hidden" name="item_token" value="<?php echo e($item['item']->item_token); ?>">
                <?php if($item['item']->free_download == 1): ?>
                <?php if(Auth::guest()): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-4" href="<?php echo e(URL::to('/cart')); ?>"> <i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(3074,$translate,'')); ?></button>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <?php if($item['item']->user_id == Auth::user()->id): ?>
                <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($item['item']->item_token); ?>" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(2935,$translate,'')); ?></a>
                <?php else: ?>
                
                <?php if($checkif_purchased == 0): ?>
                <?php if(Auth::user()->id != 1): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(3074,$translate,'')); ?></button>
                <?php endif; ?>
                <?php else: ?>
                <a class="btn btn-primary btn-shadow btn-block mt-2" href="<?php echo e(URL::to('/purchases')); ?>"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(6264,$translate,'')); ?></a> 
                <?php endif; ?>    
                <?php endif; ?>
                <?php endif; ?>
                <?php else: ?>
                <?php if(Auth::guest()): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2" href="<?php echo e(URL::to('/cart')); ?>">
                    <i class="dwg-cart font-size-lg mr-2"></i>
                <?php echo e(Helper::translation(3074,$translate,'')); ?></button>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <?php if($item['item']->user_id == Auth::user()->id): ?>
                <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($item['item']->item_token); ?>" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(2935,$translate,'')); ?></a>
                <?php else: ?>
                
                <?php if($checkif_purchased == 0): ?>
                <?php if(Auth::user()->id != 1): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(3074,$translate,'')); ?></button>
                <?php endif; ?>
                <?php else: ?>
                <a class="btn btn-primary btn-shadow btn-block mt-2" href="<?php echo e(URL::to('/purchases')); ?>"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(Helper::translation(6264,$translate,'')); ?></a> 
                <?php endif; ?>    
                <?php endif; ?>
                <?php endif; ?> 
                <?php endif; ?>
               
                <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                <div class="bg-secondary rounded p-3 mt-2">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>" border="0" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : <?php echo e(Helper::translation(5982,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>"> <?php echo e($badges['setting']->author_sold_level_six_label); ?></span>
                </div>
                <?php endif; ?>
                <div class="bg-secondary rounded p-2 my-2">
                <a class="media" href="<?php echo e(url('/user')); ?>/<?php echo e($item['item']->username); ?>">
                <?php if($item['item']->user_photo != ''): ?>
                <!--<img class="lazy rounded-circle vertical-img" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item['item']->user_photo); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item['item']->user_photo); ?>" alt="<?php echo e($item['item']->name); ?>">-->
                <?php else: ?>
                <!--<img class="lazy rounded-circle vertical-img" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png" data-original="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($item['item']->name); ?>">-->
                <?php endif; ?>
                <div class="media-body pl-2 item-details">
                    <h6 class="font-size-sm mb-0 py-2 px-0">By <?php echo e($item['item']->username); ?></h6>
                </div></a>
                </div>
              <div class="bg-secondary rounded p-3 my-1 pb-1">
                      <li class="justify-content-between py-1 font-weight-medium font-size-sm" style="list-style-type: none;"><span class="text-dark pr-2"> <?php echo e(Helper::translation(2937,$translate,'')); ?> </span><span class="text-muted"><?php echo e(str_replace('-',' ',$item['item']->item_type)); ?></span></li>
                      <?php if(count($viewattribute['details']) != 0): ?>
                      <?php $__currentLoopData = $viewattribute['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="justify-content-between py-1 font-weight-medium font-size-sm" style="list-style-type: none;"><span class="text-dark pr-2"> <?php echo e($view_attribute->item_attribute_label); ?> </span><span class="text-muted"><?php echo str_replace(',', ',', $view_attribute->item_attribute_values); ?> </span></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </div>
            </div>
            </form>
          </section>
        </div>
        <div class="row">
          <!-- Details-->
          <section class="col-lg-12 py-0 py-lg-0 px-1 pb-n4 mb-n4">
              <div class="px-4 pr-lg-0 pl-xl-5 pb-5 pt-2">
               <div class="panel panel-default">
                     <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                        <div class="col-lg-8">
                         <p class="font-size-md mb-1"><?php echo html_entity_decode($item['item']->item_desc); ?></p>
                         </div>
                         <div class="col-lg-4">
                             <?php if($item['item']->item_sold !=0): ?>
                             <div class="bg-secondary rounded p-3 mt-2 mb-2 mx-4"><i class="dwg-download h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($item['item']->item_sold); ?></span><span class="font-size-sm"><?php echo e(Helper::translation(2930,$translate,'')); ?></span></div>
                             <?php endif; ?>
               <div class="bg-secondary rounded p-3 mt-2 mb-2 mx-4"><i class="dwg-heart h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($item['item']->item_liked); ?></span><span class="font-size-sm"><?php echo e(Helper::translation(2989,$translate,'')); ?></span></div>
              <ul class="list-unstyled font-size-sm  mx-4">
                <!--<li class="d-flex justify-content-between mb-3 py-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(Helper::translation(3082,$translate,'')); ?></span><span class="text-muted"><?php echo e(date("d F Y", strtotime($item['item']->created_item))); ?></span></li>-->
                <!--<li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(Helper::translation(3083,$translate,'')); ?></span><span class="text-muted"><?php echo e(date("d F Y", strtotime($item['item']->updated_item))); ?></span></li>-->
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(Helper::translation(3084,$translate,'')); ?></span><span class="text-muted"><?php echo e($category_name); ?></span></li>
              </ul>
               <?php if($item['item']->item_featured == 'no'): ?>
               <?php else: ?>
                <div class="bg-secondary rounded p-3 mt-2">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>" border="0" title="<?php echo e(Helper::translation(5466,$translate,'')); ?>"> <?php echo e(Helper::translation(3075,$translate,'')); ?> <?php echo e($allsettings->site_title); ?></span>
                </div>
                <?php endif; ?>
                </div>
                         </div>
                        </div>
                     </div>
                 </div>
                 </div>
          </section>
          
        </div>
      </div>
    </section>
        </div>
      </div>
    </section>

    <section class="container-fluid-sm px-5 pt-2 pb-0">
      <div class="d-flex flex-wrap justify-content-between align-items-center p-2">
        <h2 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;"><?php echo e(Helper::translation(3087,$translate,'')); ?> from <a href="<?php echo e(URL::to('/templates')); ?>/subcategory/<?php echo e($subcat_slug); ?>"><?php echo e($category_name); ?></a></h2>
        <div class="float-right">
          <a class="btn btn-outline-none" href="<?php echo e(URL::to('/templates')); ?>/subcategory/<?php echo e($subcat_slug); ?>"> <h2 style="font-weight: 300;font-size: 18px;color:blue;">See More...  <i class='far fa-arrow-alt-circle-right'></i></h2></a>
        </div>
      </div>
      <div class="row p-2 pb-0">
        <!-- Product-->
        <?php $no = 1; ?>
        <?php $__currentLoopData = $related['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            
              <!--<a class="product-thumb-overlay"  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>-->
             <?php if($featured->free_download == 0 ): ?>
             <figure>
                    <span class="pro-span">Pro</span> 
                            <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
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
             <?php endif; ?>       
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
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
   </section>
   
   
  <?php if($category_name != 'Illustrations'): ?>
    <section class="container-fluid-sm px-5 pb-2">
      <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
        <h2 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;"><?php echo e(Helper::translation(3087,$translate,'')); ?> <?php echo e(Helper::translation(3034,$translate,'')); ?>  <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>"><?php echo e($item['item']->username); ?> </a></h2>
        <div class="float-right">
          <a class="btn btn-outline-none" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>"> <h2 style="font-weight: 300;font-size: 18px;color:blue;">See More...  <i class='far fa-arrow-alt-circle-right'></i></h2></a>
        </div>
      </div>
      <div class="row p-2">
        <!-- Product-->
        <?php $no = 1; ?>
        <?php $__currentLoopData = $author['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            
             
             <?php if($featured->free_download == 0): ?>
             <figure>
                    <span class="pro-span">Pro</span> 
                            <a  href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
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
             <?php endif; ?>       
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
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
   </section>
   <?php endif; ?>

   </section>   
   <?php else: ?>
   <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function showMore() {
      var hiddenNames = document.getElementsByClassName("hidden");
      var showMoreButton = document.getElementById("showMoreButton");
      
      // Display the hidden names
      for (var i = 0; i < hiddenNames.length; i++) {
        hiddenNames[i].style.display = "inline";
      }
      style="display: inline;"
      
      // Hide the "Show More" button
      if (showMoreButton.innerHTML === "See More...") {
                    showMoreButton.innerHTML = "Show Less";
  } else {
    showMoreButton.innerHTML = "See More...";
    for (var i = 0; i < hiddenNames.length; i++) {
        hiddenNames[i].style.display = "none";
      }
  }
     
    }
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/item.blade.php ENDPATH**/ ?>