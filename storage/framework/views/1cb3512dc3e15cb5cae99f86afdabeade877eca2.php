<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(3181,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .section-container{max-width: 1920px;}
</style>
</head>
<body style="background:#eaeaef;"> 
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--Section 1-->
<section class="container-fluid px-5 pt-2" style="background:linear-gradient(180deg, rgba(23, 23, 23, 0) 0%, #eaeaef 100%), linear-gradient(270deg, #ef8cbd 0%, #b091ee 70%, #c9ddf8 90%);">
   <div class="container-fluid-sm p-2"> 
        <div class="dropdown d-flex justify-content-between align-item-center">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"  style="color:#000000;"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"style="color:#000000;"><?php echo e(Helper::translation(3181,$translate,'')); ?></li>
            </ol>
          </nav>
        </div>
    </div>

    <div class="container text-center align-items-center justify-content-center">
             <h1 class="heading text-center text-wrap px-2" style="font-size:3rem;">Creating Marvels with Our popular  Design Templates - Dive In!</h1>
              <p class="sm-heading text-center py-1 px-3">Our popular collection of top-rated After Effects templates on designtemplate.io. Elevate your projects with motion designs, mesmerizing logo animations, and dynamic slideshow templates. Make an impactful entrance with our intro templates, engage on social media with Instagram story templates, and add a touch of creativity with our stunning illustrations.</p>
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
          <div class="row equal-height justify-content-center">
             <!-- Product-->
               <?php echo $__env->make('featured-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo e($items->links('pagination::bootstrap-4')); ?>

         </div>  
        </div>
    </div>
</section>
<div class="container text-center align-items-center justify-content-center">
        <p class="sm-heading text-justify py-5 px-3">Discover our collection of popular items on designtemplate.io, where creativity comes to life. From mesmerizing After Effects templates that redefine motion design to captivating logo animations that leave a lasting impression, we have the tools to elevate your projects. Dive into a world of possibilities with stunning slideshow and intro templates, or craft engaging Instagram story templates that steal the spotlight. Explore a plethora of illustrations that spark imagination, and create unforgettable moments with our elegant wedding invitations. With dynamic text animations, powerful logo reveals, and seamless Adobe Premiere Pro integration, your visions find their perfect canvas here.</p>
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
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/popular-items.blade.php ENDPATH**/ ?>