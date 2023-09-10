    <div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(2932,$translate,'')); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation(2932,$translate,'')); ?></h1>
        </div>
      </div>
    </div>
    <div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <aside class="col-lg-4">
            <!-- Account menu toggler (hidden on screens larger 992px)-->
            <div class="d-block d-lg-none p-4">
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i><?php echo e(Helper::translation(4878,$translate,'')); ?></a></div>
            <!-- Actual menu-->
            <?php if(Auth::user()->id != 1): ?>
            <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </aside>
          <!-- Content-->
          <?php if(Auth::user()->exclusive_author == 1): ?>
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <div class="row border-bottom">
              <h2 class="h3 pt-2 pb-4 mb-0 col pull-left"><?php echo e(Helper::translation(2932,$translate,'')); ?><?php /*?><span class="badge badge-secondary font-size-sm text-body align-middle ml-2">{{ count($itemData['item']) }}</span><?php */?></h2>    
              <div class="col pull-right">
              <button onClick="meFunction()" class="btn btn-primary btn-sm dropbtn"><span class="dwg-add"></span> <?php echo e(Helper::translation(2931,$translate,'')); ?></button>
                            <div id="myDropdown" class="dropdown-content">
                                <?php $__currentLoopData = $viewitem['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $encrypted = $encrypter->encrypt($item_type->item_type_id); ?>
                                <a href="<?php echo e(URL::to('/upload-item')); ?>/<?php echo e($encrypted); ?>"><?php echo e($item_type->item_type_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
               </div>                         
              </div>
              <!-- Product-->
                <?php $no = 1; ?>
                <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                ?>
              <div class="media d-block d-sm-flex align-items-center py-4 border-bottom">
              <?php if($featured->item_preview!=''): ?>
              <img class="lazy rounded-lg mr-sm-4 mx-auto cart-img" width="200" height="155" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"  alt="<?php echo e($featured->item_name); ?>">
              <?php else: ?>
              <img class="lazy rounded-lg mr-sm-4 mx-auto cart-img" width="200" height="155" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
              <?php endif; ?>
              <?php $encrypted = $encrypter->encrypt($featured->item_token); ?>
                <div class="media-body text-center text-sm-left">
                  <h3 class="h6 product-title mb-2"><a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
				  <?php if($addition_settings->item_name_limit != 0): ?>
				  <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

				  <?php else: ?>
				  <?php echo e($featured->item_name); ?>	  
				  <?php endif; ?>
				  </a> <?php if($featured->item_status == 0): ?> <span class="badge badge-pill badge-danger pull-right"><?php echo e(Helper::translation(3092,$translate,'')); ?></span> <?php endif; ?></h3>
                  <div class="d-inline-block text-accent"><?php if($featured->free_download == 0): ?><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($price); ?><?php else: ?><span><?php echo e(Helper::translation(2992,$translate,'')); ?></span><?php endif; ?></div><a class="d-inline-block text-accent font-size-ms border-left ml-2 pl-2" href="<?php echo e(URL::to('/templates')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a>
                  <div class="form-inline pt-2">
                    <?php echo e(mb_substr($featured->item_shortdesc,0,60,'utf-8').'...'); ?>

                  </div>
                  <div class="mt-2">
                    <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($featured->item_token); ?>" class="btn btn-success btn-sm mr-1"><i class="dwg-edit mr-1"></i><?php echo e(Helper::translation(2923,$translate,'')); ?></a>
                    <a class="btn btn-primary btn-sm mr-1" href="<?php echo e(URL::to('/manage-item')); ?>/<?php echo e($encrypted); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate,'')); ?>');"><i class="dwg-trash mr-1"></i><?php echo e(Helper::translation(2924,$translate,'')); ?></a>
                    <a href="<?php echo e(URL::to('/download')); ?>/<?php echo e($featured->item_token); ?>" class="btn btn-info btn-sm mr-3"><i class="dwg-download mr-1"></i><?php echo e(Helper::translation(3140,$translate,'')); ?></a>
                    </div>
                </div>
              </div>
              <?php $no++; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-2">
            <?php echo e($itemData['item']->links('pagination::bootstrap-4')); ?>

            </div>
          </section>
          <?php else: ?>
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <div class="row border-bottom">
                <h2 class="h3 pt-2 pb-4 mb-0 col pull-left"><?php echo e(Helper::translation(2932,$translate,'')); ?><?php /*?><span class="badge badge-secondary font-size-sm text-body align-middle ml-2">{{ count($itemData['item']) }}</span><?php */?></h2>        
                <div class="col pull-right"> </div>
             </div>
            </div>
            <?php if(Auth::user()->become_author != 1): ?>
            <div class="pt-5 px-4 pl-lg-0 pr-xl-5 text-center">
                <h5 class="modal-title" id="exampleModalLabel">Apply to Become a Author</h5>
                <p class="pt-3">First You have to apply to Become a Author. Then You can upload items and Start Earning. </p>
                <form action="<?php echo e(url('/')); ?>/become-author" method="POST">
                  <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e(Auth::user()->email); ?>" name="User_email">
                    <input type="hidden" value="<?php echo e(Auth::user()->name); ?>" name="User_name">
                    <input type="hidden" value="<?php echo e(Auth::user()->user_token); ?>" name="User_token">
                    <input type="hidden" value="<?php echo e(Auth::user()->exclusive_author); ?>" name="User_exclusive_author">
                 <div class="">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="request_to_become_author" required>
                        <label class="form-check-label" for="exampleCheck1">Yes, I want to become author.</label>
                    </div>
                 </div>
                 <div class="border-top-0 d-flex justify-content-center">
                   <button type="submit" class="btn btn-success">Submit Request</button>
                 </div>
                </form>
            </div>
            <?php else: ?>
            <div class="pt-5 px-4 pl-lg-0 pr-xl-5 text-center">
                <h5 class="modal-title" id="exampleModalLabel">You Apply to Become a Author</h5>
                <p class="pt-3">When Admin approves your request then You can upload items and Start Earning. </p>
            </div>
            <?php endif; ?>
          </section>
          <?php endif; ?>
        </div>
      </div>
    </div>

<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/my-items.blade.php ENDPATH**/ ?>