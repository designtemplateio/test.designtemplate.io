<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Product Page-<?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    video.videoPreview {
    width: 100%;
    margin-bottom: 0px;
    margin-top: 0px;
    background: #F5F3F0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.material-symbols-outlined
{
  color:#fe6076;  
}
.product-page-heading
{
font-weight: 800;
font-size: 50px;
line-height: 76px;
color: #3F57EF;
}
.product-page-para
{
text-align: justify;
font-weight: 300;
font-size: 20px;
line-height: 31px;
color: #4D4D4D;
}
.product-page-sm-heading
{
font-weight: 500;
font-size: 47px;
line-height: 31px;
color: #4D4D4D;
}
.product-features-heading
{
font-weight: 500;
font-size: 32px;
line-height: 76px;
color: #4D4D4D;
}
.product-features-para
{
text-align: justify;
font-weight: 300;
font-size: 18px;
line-height: 31px;
color: #4D4D4D;   
}
.logo-heading
{
background: #9999FF;
border-radius: 10px;
}
.logo-banner-heading
{
font-weight: 700;
font-size: 40px;
line-height: 58px;
color: #FFFFFF;
}
</style>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--Section 1!-->

<?php $no = 1; ?>
 <?php $__currentLoopData = $pageData['item']->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image" >
     <div class="row h-100 align-items-center p-3 mt-0">
        <div class="col-lg-6 my-auto ">
              <h1 class="product-page-heading text-left text-wrap px-2">DesignTemplate<br><p><?php echo e($item->heading); ?></p></h1>
              <p class="product-page-para py-1 px-3"><?php echo e($item->heading_desc); ?></p>
              <div class="text-left d-none d-lg-block p-3">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Get Designs Now</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
               <img src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($item->banner_image1); ?>" class="img-fluid mt-3" width="100%" height="100%" alt="<?php echo e($item->banner_image1); ?>">
             </div>
            <div class="d-lg-none">
               <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5">Get Designs Now</button></a>
            </div>
        </div>
      </div>
</section>


<!--Section 2-->
<section class="container-fluid product-banner py-5">
    <div class="container d-flex flex-wrap justify-content-center align-items-center">
     <div class="container d-flex flex-wrap justify-content-center align-items-center">
         <h2 class="product-page-sm-heading new mb-0 pb-3">Try Our New Template</h2>
         <p class="product-page-para py-1 px-5">Experience a fresh and modern look with our new design template that incorporates sleek lines and bold colors.</p>
      </div>
      <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <div class="p-2 text-center">
          <a href="<?php echo e(URL::to('/')); ?>/popular-items"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
    </div>
  </section>
  
  <!--Section 3-->
<section class="container-fluid text-center justify-content-center py-5"> 
<img src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($item->banner_image2); ?>" class="img-fluid pb-5" width="1920" alt="<?php echo e($item->banner_image2); ?>">
</section>

<!--Section 4-->
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image" >
    <div class="container d-flex flex-wrap justify-content-center align-items-center">
     <div class="row h-100 align-items-center mt-0">
         <div class="col-lg-6 text-center">
               <img src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($item->product_image1); ?>" class="img-fluid mt-3" width="100%" height="100%" alt="<?php echo e($item->product_image1); ?>">
        </div>
        <div class="col-lg-6 my-auto">
              <h2 class="product-features-heading mb-0 pb-1">No Advance design skills are needed</h2>
              <p class="product-features-para px-3">Design templates are pre-made designs that can be easily customized  by anyone, regardless of their design skills. These templates provide a quick and simple solution for creating professional-looking designs without the need for any design expertise.</p>
              <h2 class="product-features-heading mb-0 pb-1">Explore our huge library of <?php echo e($item->heading); ?></h2>
              <p class="product-features-para px-3">Our extensive library of Slideshows offers a vast collection of professionally designed presentations for various purposes. Whether you need to create a pitch deck, a training presentation, or a marketing campaign, our library has got you covered with a wide range of options to choose from.</p>
         </div>
      </div>
      <div class="row h-100 align-items-center">
          <div class="col-lg-12 logo-heading m-3">
            <h2 class="logo-banner-heading"><?php echo e($item->sub_heading); ?></h2>
            </div>
        <div class="col-lg-6 my-auto ">
             <p class="product-features-para py-1 px-3"><?php echo e($item->subheading_desc); ?></p>
              <div class="text-left d-none d-lg-block p-3">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Get Now</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
              <img src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($item->product_image2); ?>" class="img-fluid mt-3" width="100%" height="100%" alt="<?php echo e($item->product_image2); ?>">
            <div class="d-lg-none">
               <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Get Now</button></a>
            </div>
        </div>
      </div>
    </div>
</section>

<!--Section 5-->
<section class="container-fluid">
<h2 class="heading_unlimited text-center py-4">Frequently asked questions</h2> 
<div class="questions-container">
             <div class="question">
                <button>
                    <span>1 . <?php echo e($item->faq1); ?>     </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p><?php echo e($item->answer1); ?></p>
            </div>
            <div class="question">
                <button>
                    <span>2 . <?php echo e($item->faq2); ?>  </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p><?php echo e($item->answer2); ?></p>
            </div>
            <div class="question">
                <button>
                    <span>3 . <?php echo e($item->faq3); ?></span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p><?php echo e($item->answer3); ?></p>
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
<?php $no++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	
	
<script>
    const buttons = document.querySelectorAll('button');
buttons.forEach( button =>{
    button.addEventListener('click',()=>{
        const faq = button.nextElementSibling;
        const icon = button.children[1];
        faq.classList.toggle('show');
        icon.classList.toggle('rotate');})})
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
 
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/product-page.blade.php ENDPATH**/ ?>