<style>
.popup-heading{
    text-align: center;
    
font-weight: 500;
font-size: 25px;
color: #4D4D4D;
}
 .register
 {
     
font-weight: 300;
font-size: 15px;
color: #4D4D4D;
}
.profile-pic {
  width: 90%;
  height: 90%;
  background-color: #3f57ef;
  border-radius: 50%;
  text-align: center;
  font-size: 25px;
  color: #fff;
}

</style>
<?php  $currentUrl = url()->current(); ?>
<?php echo e(Session::put('loginUrl',$currentUrl)); ?>

<header class="bg-light box-shadow-sm navbar-sticky" style="width:100%;">
      <!-- Topbar-->
      <?php if($allsettings->site_header_top_bar == 1): ?>
    
      <?php endif; ?>
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      
      <div class="navbar-sticky">
        <div class="navbar navbar-expand-lg py-0" style="background:#fff;height:-10%">
            <!--<div class="navbar navbar-expand-lg navbar-#d9d9d9 bg-light" style="background-image: linear-gradient(180deg,#FFFCF1,#F8F2FF);color:#d9d9d9;height:60%">-->
          <div class="container-fluid p-n5" style="width:100%;">
          <?php if($allsettings->site_logo != ''): ?>
          <a class="navbar-brand d-none d-sm-block order-lg-1 mr-0" href="<?php echo e(URL::to('/')); ?>">
             <img class="lazy" width="170" height="25" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>"/> 
          </a>
          <?php endif; ?>
          <?php if($allsettings->site_logo != ''): ?>
          <a class="navbar-brand d-sm-none mr-0 order-lg-1" href="<?php echo e(URL::to('/')); ?>" style="min-width: 4.625rem;">
             <img class="lazy" width="95" height="35" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>"/>
          </a>
          <?php endif; ?>
          <div>
          </div>
           <div class="navbar-toolbar d-flex align-items-center order-lg-3 gap-x-1">
            <!--<div class="input-group input-group-sm">-->
            <!--    <form action="<?php echo e(route('shop')); ?>" id="search_form2" method="post" enctype="multipart/form-data">-->
            <!--         <?php echo e(csrf_field()); ?>-->
            <!--        <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="<?php echo e(Helper::translation(3030,$translate,'')); ?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 350px;">-->
            <!--    </form> -->
            <!--    <div class="input-group-prepend">-->
            <!--       <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-search"></i></span>-->
            <!--    </div>-->
            <!--</div>-->


               <button class="navbar-toggler px-0" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"><i class="fa fa-bars ham_menu pt-1" aria-hidden="true"></i></span></button>
               <a class="navbar-tool d-none d-lg-flex" href="#searchBox" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="searchBox"><span class="navbar-tool-tooltip"><?php echo e(Helper::translation(4857,$translate,'')); ?></span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon dwg-search" style="color:#454545;"></i></div></a>
               <?php if(Auth::user()): ?>
                  <?php if((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed'): ?>
                    
                    <button type="button" class="btn contactbuttons-first justify-item-center ml-2 m-0 d-none d-lg-block " style="background:#03a84e;">
                      <a class="navbar-tool p-0 px-n5 my-n1" href="<?php echo e(URL::to('/pricing')); ?>" style="color:#fff;font-weight:500;">Subscribed</a>
                    </button>
                  <?php else: ?>
                    <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0">
                      <a class="navbar-tool p-0 px-n5 my-n1" href="<?php echo e(URL::to('/pricing')); ?>" style="color:#fff;">Enjoy Unlimited Downloads</a>
                    </button>
                    <button type="button" class="btn contactbuttons-first d-lg-none p-1 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="<?php echo e(URL::to('/pricing')); ?>" style="color:#fff;">Subscribe</a>
                  </button>
                  <?php endif; ?>
                <?php else: ?>
                  
                  <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="<?php echo e(URL::to('/')); ?>/free-items" style="color:#fff;">Get Free Template</a>
                  </button>
                  <button type="button" class="btn contactbuttons-first d-lg-none p-1 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="<?php echo e(URL::to('/pricing')); ?>" style="color:#fff;">Subscribe</a>
                  </button>
                <?php endif; ?>
               
                <?php if(Auth::guest()): ?>
                    <button type="button" class="btn contactbuttons-first justify-item-center d-lg-none p-2 m-0" style="background:#FF4E6E;">
                      <a href="javascript:void(0)" class="navbar-tool p-0 px-n5 my-n1" style="color:#fff;" data-toggle="modal" data-target="#exampleModal">
                     <i class="dwg-user"></i></a>
                    </button>
                    <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0" style="background:#FF4E6E;">
                      <a href="javascript:void(0)" class="navbar-tool p-0 px-n5 my-n1" style="color:#fff;" data-toggle="modal" data-target="#exampleModal">
                      <span class="navbar-tool-tooltip">Account</span>Login</a>
                    </button>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <div class="navbar-tool dropdown ml-2">
                <a class="navbar-tool-icon-box" style="color:#454545;font-size:20px;" data-toggle="dropdown" <?php if(Auth::user()->id == 1): ?> href="<?php echo e(url('/admin')); ?>" target="_blank" <?php else: ?> href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>" <?php endif; ?>>
                <?php if(!empty(Auth::user()->user_photo)): ?>
                <img class="lazy" width="32" height="32" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->name); ?>"/>
                <?php else: ?>
                <?php $firstLetter = ucfirst(Auth::user()->name); ?>
                <div class="profile-pic p-n2 m-1"><?php echo e($firstLetter[0]); ?></div>
                <?php endif; ?>
                </a>
                <a class="navbar-tool-text pl-0" style="color:#454545;" <?php if(Auth::user()->id == 1): ?> href="<?php echo e(url('/admin')); ?>" target="_blank" <?php else: ?> href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>" <?php endif; ?>>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 4rem;">
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <a class="dropdown-item d-flex border-bottom align-items-center"><i class="dwg-user opacity-60 mr-2"></i><?php echo e(Auth::user()->name); ?><small class="pl-2"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e(Auth::user()->earnings); ?></small></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>"><i class="dwg-home opacity-60 mr-2"></i>Portfolio</a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/profile-settings')); ?>"><i class="dwg-settings opacity-60 mr-2"></i>Profile Settings</a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/purchases')); ?>"><i class="dwg-basket opacity-60 mr-2"></i><?php echo e(Helper::translation(2928,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/favourites')); ?>"><i class="dwg-heart opacity-60 mr-2"></i><?php echo e(Helper::translation(2929,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/cart')); ?>"><i class="dwg-cart opacity-60 mr-2"></i>My Cart</a>
                <!--<a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/coupon')); ?>"><i class="dwg-gift opacity-60 mr-2"></i><?php echo e(Helper::translation(2919,$translate,'')); ?></a>-->
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/affiliates')); ?>/<?php echo e(Auth::user()->username); ?>"><i class="dwg-money-bag opacity-60 mr-2"></i>Affiliate Program</a>
                <?php if(Auth::user()->exclusive_author == 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/sales')); ?>"><i class="dwg-cart opacity-60 mr-2"></i><?php echo e(Helper::translation(2930,$translate,'')); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->exclusive_author == 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/manage-item')); ?>"><i class="dwg-briefcase opacity-60 mr-2"></i><?php echo e(Helper::translation(2932,$translate,'')); ?></a>
                <?php else: ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/manage-item')); ?>"><i class="dwg-briefcase opacity-60 mr-2"></i>Become Author</a>
                <?php endif; ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/deposit')); ?>"><i class="dwg-money-bag opacity-60 mr-2"></i><?php echo e(Helper::translation('61b32a5049abd',$translate,'Deposit')); ?></a>
                <?php if(Auth::user()->exclusive_author == 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/withdrawal')); ?>"><i class="dwg-currency-exchange opacity-60 mr-2"></i><?php echo e(Helper::translation(2933,$translate,'')); ?></a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(3023,$translate,'')); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->user_type == 'customer'): ?>
                <a class="dropdown-item d-flex border-bottom align-items-center"><i class="dwg-user opacity-60 mr-2"></i><?php echo e(Auth::user()->name); ?><br><small class="pl-2"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e(Auth::user()->earnings); ?></small></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>"><i class="dwg-home opacity-60 mr-2"></i>Portfolio</a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/profile-settings')); ?>"><i class="dwg-settings opacity-60 mr-2"></i>Profile Settings</a> 
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/purchases')); ?>"><i class="dwg-basket opacity-60 mr-2"></i><?php echo e(Helper::translation(2928,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/favourites')); ?>"><i class="dwg-heart opacity-60 mr-2"></i><?php echo e(Helper::translation(2929,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/cart')); ?>"><i class="dwg-cart opacity-60 mr-2"></i>My Cart</a>
                <!--<a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/coupon')); ?>"><i class="dwg-gift opacity-60 mr-2"></i><?php echo e(Helper::translation(2919,$translate,'')); ?></a>-->
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/affiliates')); ?>/<?php echo e(Auth::user()->username); ?>"><i class="dwg-money-bag opacity-60 mr-2"></i>Affiliate Program</a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/manage-item')); ?>"><i class="dwg-briefcase opacity-60 mr-2"></i>Become Author</a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/deposit')); ?>"><i class="dwg-money-bag opacity-60 mr-2"></i><?php echo e(Helper::translation('61b32a5049abd',$translate,'Deposit')); ?></a>
                <!--<a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/withdrawal')); ?>"><i class="dwg-currency-exchange opacity-60 mr-2"></i><?php echo e(Helper::translation(2933,$translate,'')); ?></a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(3023,$translate,'')); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->user_type == 'admin'): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/admin')); ?>"><i class="dwg-settings opacity-60 mr-2"></i><?php echo e(Helper::translation(3022,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(3023,$translate,'')); ?></a>
                <?php endif; ?>
              </div>
              </div>
              <?php endif; ?>
              <?php if(Auth::check()): ?>
              <?php if(Auth::user()->user_type != 'admin'): ?>
              <?php if($additional->conversation_mode == 1): ?>
              <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo e(URL::to('/messages')); ?>"><span class="navbar-tool-label"><?php echo e($msgcount); ?></span><i class="navbar-tool-icon dwg-chat"></i></a>
                <!-- Cart dropdown-->
                <?php if($msgcount != 0): ?>
                <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                  <div class="widget widget-cart px-3 pt-2 pb-3">
                    <div data-simplebar data-simplebar-auto-hide="false">
                      <?php $__currentLoopData = $smsdata['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="widget-cart-item pb-2 border-bottom">
                        <div class="media align-items-center">
                        <a class="d-block mr-2" href="<?php echo e(url('/messages')); ?>/type/<?php echo e($msg->username); ?>">
                        <?php if($msg->user_photo!=''): ?>
                        <img class="lazy rounded-circle" width="40" height="40" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($msg->user_photo); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($msg->user_photo); ?>" alt="<?php echo e($msg->username); ?>"/>
                        <?php else: ?>
                        <img  class="lazy rounded-circle" width="40" height="40" src="<?php echo e(url('/')); ?>/public/img/no-image.png" data-original="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($msg->username); ?>"/>
                        <?php endif; ?>
                        </a>
                          <div class="media-body">
                            <h6 class="widget-product-title"><a href="<?php echo e(url('/messages')); ?>/type/<?php echo e($msg->username); ?>"><?php echo e($msg->username); ?></a></h6>
                            <div class="widget-product-meta"><span class="mr-2"><?php echo e(Helper::timeAgo(strtotime($msg->conver_date))); ?></span></div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                    <a class="btn btn-primary btn-sm btn-block" href="<?php echo e(url('/messages')); ?>"><i class="dwg-chat mr-2 font-size-base align-middle"></i><?php echo e(Helper::translation(6375,$translate,'')); ?></a>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
      <!--<div class="navbar-tool"><a class="navbar-tool-icon-box" href="<?php echo e(url('/cart')); ?>"><span class="navbar-tool-label"><?php echo e($cartcount); ?></span><i class="navbar-tool-icon dwg-cart"></i></a></div>-->
            </div>
            <div class="collapse navbar-collapse mr-0 px-1 order-lg-2 justify-content-left" id="navbarCollapse" style="background:none;">
                <div class="input-group-overlay d-lg-none my-3">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="<?php echo e(route('shop')); ?>" id="search_form1" method="post"  enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                 <input class="form-control prepended-form-control" type="text" name="product_item" placeholder="<?php echo e(Helper::translation(3030,$translate,'')); ?>">
                </form>
              </div>
              <!-- Primary menu-->
              <ul class="navbar-nav ml-0 pl-0">
                      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle headname" style="color:#454545;font-size:14px;" href="javascript:void(0)" target="_parent" onclick="window.open('<?php echo e(url('/templates')); ?>','_self');" data-toggle="dropdown">Templates</a>
                  <ul class="dropdown-menu">
                    <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($menu->cat_id==14 || $menu->cat_id==15): ?>
                    <li class="nav-item dropdown border-bottom">
                    <a <?php if(count($menu->subcategory) != 0): ?>  class="mobiledev dropdown-item dropdown-toggle" data-toggle="dropdown" <?php else: ?> class="mobiledev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/templates/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>
                    <a <?php if(count($menu->subcategory) != 0): ?>  class="desktopdev dropdown-item dropdown-toggle"  <?php else: ?> class="desktopdev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/templates/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>
                      <?php if(count($menu->subcategory) != 0): ?>
                      <ul class="dropdown-menu">
                        <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(URL::to('/templates/subcategory/')); ?>/<?php echo e($sub_category->subcategory_slug); ?>"><?php echo e($sub_category->subcategory_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </ul>
                </li>
                <?php if(count($allpages['pages']) != 0): ?>
                <?php /* ?><li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">{{ Helper::translation(3029,$translate,'') }}</a>
                  <ul class="dropdown-menu">
                    @foreach($allpages['pages'] as $pages)
                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a></li>
                    @endforeach
                  </ul>
                </li><?php */ ?>
                <?php endif; ?>
                <!--<li class="nav-item dropdown"><a class="nav-link" style="color:#454545;" href="https://doographics.com">DooGraphics</a></li>-->
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="<?php echo e(URL::to('/templates/subcategory/')); ?>/illustrations">Illustrations</a></li>
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="<?php echo e(URL::to('/templates/subcategory/')); ?>/overlay-elements">Motion Graphics</a></li>
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="<?php echo e(URL::to('/')); ?>/free-items"><i class="fa fa-gift" aria-hidden="true" style="color:#69b3fe;"></i> Free Templates</a></li>
                <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle headname" style="color:#454545;font-size:14px;" href="javascript:void(0)" target="_parent" onclick="window.open('<?php echo e(url('/free-items')); ?>','_self');" data-toggle="dropdown"><i class="fa fa-gift" aria-hidden="true" style="color:#69b3fe;"></i> Free Templates</a>-->
                <!--  <ul class="dropdown-menu">-->
                <!--    <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--    <?php if($menu->cat_id==14 || $menu->cat_id==15): ?>-->
                <!--    <li class="nav-item dropdown border-bottom">-->
                <!--    <a <?php if(count($menu->subcategory) != 0): ?>  class="mobiledev dropdown-item" data-toggle="dropdown" <?php else: ?> class="mobiledev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/free-items/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>-->
                <!--    <a <?php if(count($menu->subcategory) != 0): ?>  class="desktopdev dropdown-item"  <?php else: ?> class="desktopdev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/free-items/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>-->
                <!--    </li>-->
                <!--    <?php endif; ?>-->
                <!--   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                <!--  </ul>-->
                <!--</li>-->
                <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle headname" style="color:#454545;font-size:14px;" href="javascript:void(0)" target="_parent" data-toggle="dropdown">Product</a>-->
                <!--  <ul class="dropdown-menu">-->
                <!--    <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--    <?php if($menu->cat_id==14 || $menu->cat_id==15): ?>-->
                <!--    <li class="nav-item dropdown border-bottom">-->
                <!--    <a <?php if(count($menu->subcategory) != 0): ?>  class="mobiledev dropdown-item dropdown-toggle" data-toggle="dropdown" <?php else: ?> class="mobiledev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/templates/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>-->
                <!--    <a <?php if(count($menu->subcategory) != 0): ?>  class="desktopdev dropdown-item dropdown-toggle"  <?php else: ?> class="desktopdev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/templates/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>-->
                <!--      <?php if(count($menu->subcategory) != 0): ?>-->
                <!--      <ul class="dropdown-menu">-->
                <!--        <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--        <li><a class="dropdown-item" href="<?php echo e(URL::to('/templates/subcategory/')); ?>/<?php echo e($sub_category->subcategory_slug); ?>"><?php echo e($sub_category->subcategory_name); ?></a></li>-->
                <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--      </ul>-->
                <!--      <?php endif; ?>-->
                <!--    </li>-->
                <!--    <?php endif; ?>-->
                <!--   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                <!--  </ul>-->
                <!--</li>-->
                <?php if(Auth::guest()): ?>
                <?php else: ?>
                <?php if($addition_settings->subscription_mode == 1): ?>
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="<?php echo e(url('/pricing')); ?>"><?php echo e(Helper::translation(6105,$translate,'')); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
         <!-- Search collapse-->
        <div class="search-box collapse" id="searchBox">
          <div class="card pt-2 pb-4 border-0 rounded-0">
            <div class="container">
              <div class="input-group-overlay">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="<?php echo e(route('shop')); ?>" id="search_form2" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="<?php echo e(Helper::translation(3030,$translate,'')); ?>">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </header>
   <!--Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h3 class="popup-heading mb-0 py-2">Welcome back to DesignTemplate!</h3>
      </div>
      <div class="modal-body">
          <div class="Border-bottom">
         <?php if($allsettings->display_social_login == 1): ?>
            <div class="py-1 px-3 border-bottom mb-3">
                <div class="row d-flex flex-wrap justify-content-between align-middle">
                    <div class="col-5 input-group-overlay form-group text-center mr-1 ml-3 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                      <a href="<?php echo e(url('/login/google')); ?>">
                         <img class="lazy" width="120" height="120" src="<?php echo e(url('/')); ?>/public/img/google.webp" alt="name"/>
                      </a>
                    </div>
                    <div class="col-5 input-group-overlay form-group text-center mr-3 ml-1 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                       <a href="<?php echo e(url('/login/facebook')); ?>">
                          <img class="lazy" width="120" height="120" src="<?php echo e(url('/')); ?>/public/img/facebook.webp" alt="name"/>
                       </a>
                    </div>
                </div>
            </div>
         <?php endif; ?>
         </div>
              <form action="<?php echo e(route('login')); ?>" method="POST" id="login_form" class="<?php if($allsettings->display_social_login == 0): ?> py-3 <?php endif; ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="text" name="email" placeholder="<?php echo e(Helper::translation(3228,$translate,'')); ?>" data-bvalidator="required">
                </div>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-locked"></i></span></div>
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" name="password" placeholder="<?php echo e(Helper::translation(3113,$translate,'')); ?>" data-bvalidator="required">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(Helper::translation(4866,$translate,'')); ?></span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end">
                       <a class="card-text" data-toggle="tab" href="#forgot"><?php echo e(Helper::translation(3009,$translate,'')); ?>?</a>
                </div>
                <div class="modal-footer justify-content-center" style="border:none;">  
                   <div class="text-center">
                       <button class="contactbuttons-first btn" style="color:#fff;" type="submit"><i class="dwg-sign-in mr-2 ml-n21"></i>Sign In</button>
                    </div>
                     <?php  $currentUrl = url()->current(); ?>
                <input type="hidden" name="currentUrl" value="<?php echo e($currentUrl); ?>">
                </form>
                </div>
                <div class="text-center">
                  <span class="text15"><?php echo e(Helper::translation(4875,$translate,'')); ?></span>
                  <a href="javascript:void(0)" class="nav-link-inline font-size-sm p-0 px-n5 my-n1" data-toggle="modal" data-target="#registerModal">Sign Up</a>
                  <!--<a data-toggle="tab" href="#register" class="nav-link-inline font-size-sm">Sign Up</a>-->
                </div>
      </div>
      <div class="tab-content px-5">
        <section class="tab-pane fade" id="forgot">
            <h3 class="popup-heading mb-0"><?php echo e(Helper::translation(3013,$translate,'')); ?></h3>
            <div class="pt-2 px-4 text-center">
              <div class="align-items-center py-4 border-bottom prod-item">
                    <div class="card py-2 px-4 m-2">
                        <form method="POST" action="<?php echo e(route('forgot')); ?>"  id="login_form" class="card-body needs-validation">
                           <?php echo csrf_field(); ?> 
                          <div class="form-group">
                            <label for="recover-email"><?php echo e(Helper::translation(3011,$translate,'')); ?></label>
                            <input class="form-control" type="text" id="recover-email" name="email" data-bvalidator="email,required">
                            <div class="invalid-feedback"><?php echo e(Helper::translation(5955,$translate,'')); ?></div>
                          </div>
                          <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation(3012,$translate,'')); ?></button>
                        </form>
                    </div>
              </div>
        </section>
        </div>
      
    </div>
  </div>
    </div>
  </div>
</div>
<!-- End Login modal-->


   <!--Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center d-inline">
        <h3 class="popup-heading mb-0 pt-3">It's fantastic to see you here!</h3>
        <p class="register text-center py-2">Let's embark on a journey of inspiration and design excellence together!</p>
      </div>
      <div class="modal-body">
            <div class="px-2">
            <?php if($allsettings->display_social_login == 1): ?>
            <div class="py-1 px-3 border-bottom mb-3">
                <div class="row d-flex flex-wrap justify-content-between align-middle">
                    <div class="col-5 input-group-overlay form-group text-center mr-1 ml-3 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                      <a href="<?php echo e(url('/login/google')); ?>">
                         <img class="lazy" width="120" height="120" src="<?php echo e(url('/')); ?>/public/img/google.webp" alt="Google"/>
                      </a>
                    </div>
                    <div class="col-5 input-group-overlay form-group text-center mr-3 ml-1 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                       <a href="<?php echo e(url('/login/facebook')); ?>">
                          <img class="lazy" width="120" height="120" src="<?php echo e(url('/')); ?>/public/img/facebook.webp" alt="Facebook"/>
                       </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
              <div class="align-items-center py-2 prod-item">
                <div class="card p-3">
                    <form method="POST" action="<?php echo e(route('register')); ?>" id="login_form" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(3237,$translate,'')); ?> <span class="required">*</span></label>
                  <input id="name" type="text" class="form-control" name="name" placeholder="<?php echo e(Helper::translation(3238,$translate,'')); ?>" value="<?php echo e(old('name')); ?>" data-bvalidator="required" autocomplete="name" autofocus>    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-ln"><?php echo e(Helper::translation(3111,$translate,'')); ?> <span class="required">*</span></label>
                  <input id="username" type="text" name="username" class="form-control" placeholder="<?php echo e(Helper::translation(3239,$translate,'')); ?>" data-bvalidator="required">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-email"><?php echo e(Helper::translation(3240,$translate,'')); ?> <span class="required">*</span></label>
                  <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(Helper::translation(3241,$translate,'')); ?>"  autocomplete="email" data-bvalidator="email,required">
                         <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-pass"><?php echo e(Helper::translation(3113,$translate,'')); ?> <span class="required">*</span></label>
                  <div class="password-toggle">
                    <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(Helper::translation(3242,$translate,'')); ?>" autocomplete="new-password" data-bvalidator="required,minlen[6]"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                             <strong><?php echo e($message); ?></strong>
                       </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(Helper::translation(4866,$translate,'')); ?></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-confirm-pass"><?php echo e(Helper::translation(3114,$translate,'')); ?> <span class="required">*</span></label>
                  <div class="password-toggle">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(Helper::translation(3243,$translate,'')); ?>" data-bvalidator="equal[password],required,minlen[6]" autocomplete="new-password">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(Helper::translation(4866,$translate,'')); ?></span>
                    </label>
                  </div>
                </div>
              </div>
              <?php if($additional->site_google_recaptcha == 1): ?>
              <!--<div class="col-sm-12">-->
              <!--<div class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">-->
              <!--  <label><?php echo e(Helper::translation(3244,$translate,'')); ?> <span class="required">*</span></label>-->
              <!--  <?php echo app('captcha')->display(); ?>-->
              <!--                  <?php if($errors->has('g-recaptcha-response')): ?>-->
              <!--                      <span class="help-block">-->
              <!--                   <strong class="red"><?php echo e($errors->first('g-recaptcha-response')); ?></strong>-->
              <!--              </span>-->
              <!--       <?php endif; ?>-->
              <!--</div>-->
              <!--</div>-->
              <?php endif; ?>
              <div class="col-12 text-center">
                <div class="align-items-center">
                  <button class="btn btn-primary mt-3" type="submit">Create account</button>
                </div>
                <div class="custom-checkbox d-block pt-3">
                   <?php echo e(Helper::translation(3245,$translate,'')); ?> <a href="<?php echo e(URL::to('/login')); ?>" class="nav-link-inline font-size-sm">Sign In</a>
                  </div>
              </div>
            </div>
              </form>
                </div>
              </div>
              </div>
        </div>
    </div>
  </div>
    </div>
  </div>
</div>
<!-- End Login modal-->
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
<!--For Telegram Logo-->
<div class="elfsight-app-9b495655-72d5-4e8d-91d0-2e80dc46b1a6"></div><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/header.blade.php ENDPATH**/ ?>