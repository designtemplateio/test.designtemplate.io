@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Sales Page - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
<!--Section 1!-->
<section class="container-fluid bg-position-center-top-banner bg-hero-sales-page-image" id="videoSection">
     <div class="row h-100 align-items-center justify-content-center mt-0 text-center">
        <div class="col-lg-7">
              <h1 class="sales-page-heading text-wrap py-4">Create Stunning Motion Graphics with 100K+ Video Elements</h1>
                  <div class="video-wrapper">
                      <video preload="metadata" class="img-fluid salesVideoPreview" id="myVideo" autoplay="" playsinline="" muted="" loop=""> <source src="{{ url('/') }}/public/video/sales-page-video.mp4" type="video/webm"> </video>
                  </div>
                <p class="starting_at pt-4 px-1">Starting at <del class="price-old">$15</del> $6/month</p>
                <!--<p class="sm-heading pt-2 px-3 text-center">Get 20% off with coupon code <span style="color:#3D5FEB">“START09”</span> (limited time only).</p>-->
                <a href="https://designtemplate.io/confirm-subscription/NA=="><button class="get_licence">Buy Now</button></a>
        </div>
      </div>
</section>

<!--Section 2-->
<section class="text-center py-5">
        <img src="{{ url('/') }}/public/img/Clients_logo.webp" class="img-fluid" alt="Clients_logo">
</section>

<!--Section 3-->
<section class="container-fluid text-center justify-content-center pt-5" style="background:#FEDB32;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="my-auto col-md-7 text-center">
            <img src="{{ url('/') }}/public/img/Sales-page-banner1.avif" class="img-fluid" alt="Sales-page-banner">
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="mx-auto">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2">50,000+ Special video assets for influencers and video creators</h2>
               <div class="mx-auto">
                  <p class="pb-4">Discover a unique selection of video templates designed for influencers and social media creators. Our collection for Instagram,Facebook, and YouTube, featuring animated text, transitions, and graphics that are customizable to fit your personal brand.</p>
                   <a href="https://designtemplate.io/confirm-subscription/NA==" class="px-5"><button class="get_licence justify-item-center px-5 py-2 my-2">Get Access</button></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<!--Section 4-->
<section class="container py-5">
     <div class="row justify-content-center align-items-center py-5">
            <div class="col-md-6 col-lg-6">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Bring your message to life with our animation scenes.</h2>
               <div class="mx-auto">
                <p class="pb-4">Whether you're looking to explain a product, service, or concept,our explainer animation scenes are the perfect way to convey your message with clarity and creativity.</p>
               </div>
            </div>
            <div class="my-auto col-lg-6 text-center">
                <img src="{{ url('/') }}/public/img/slideshow-sales-page3.webp" class="img-fluid" alt="slideshow-sales-page">
            </div>
     </div>
     <div class="row justify-content-center align-items-center py-5">
            <div class="my-auto col-lg-6 text-center">
                <img src="{{ url('/') }}/public/img/slideshow-sales-page1.webp" class="img-fluid d-none d-lg-block" alt="slideshow-sales-page">
            </div>
            <div class="col-md-6 col-lg-6">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Enhance Your videos with stunning visual effects and elements.</h2>
               <div class="mx-auto">
                 <p class="pb-4">Our collection features a variety of video effects, text animations, transitions and animated stickers, all crafted with creativity and versatility in mind.</p>
                 <div class="text-center">
                 <img src="{{ url('/') }}/public/img/slideshow-sales-page1.webp" class="img-fluid d-lg-none" alt="slideshow-sales-page">
                  </div>
               </div>
            </div>
     </div>
    <div class="row justify-content-center align-items-center py-5">
            <div class="col-md-6 col-lg-6">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2 text-left">Extensive collection of logo animations and intros.</h2>
               <div class="mx-auto">
                 <p class="pb-4">Our logo animations and intros are fully customizable, allowing you to add your own text, images, and branding elements, ensuring that every video you create is uniquely yours.</p>
               </div>
            </div>
            <div class="my-auto col-lg-6 text-center">
                <img src="{{ url('/') }}/public/img/slideshow-sales-page2.webp" class="img-fluid" alt="slideshow-sales-page">
            </div>
     </div>
</section>

<!--Section 5-->
<section class="container-fluid text-center justify-content-center py-2" style="background:#FEDB32;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="my-auto col-md-7 text-center">
            <img src="{{ url('/') }}/public/img/Sales-page-banner2.webp" class="img-fluid" alt="Sales-page-banner">
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="mx-auto">
               <h2 class="heading_unlimited pt-3 pb-1 mt-2">5,000+ Incredible collection of sideshow and opener templates</h2>
               <div class="mx-auto">
                  <p class="pb-4">Our sideshow and opener templates are fully customizable, allowing you to add your own images, videos, and branding elements to create a personalized and professional-looking video.</p>
                  <a href="https://designtemplate.io/confirm-subscription/NA==" class="px-5"><button class="get_licence justify-item-center px-5 py-2 my-2">Subscribe Now</button></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<!--Section 6-->
<section class="container py-5">
     <h1 class="heading_unlimited text-center p-2">Recommended By Design Template</h1>
      <div class="row justify-content-center align-items-center">
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Logo Preview.jpg">
	           <source src="{{ url('/') }}/public/video/Logo Preview.mp4" type="video/mp4">
              </video>
             </div>
          </div>
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Sport Preview.webp">
	           <source src="{{ url('/') }}/public/video/Sport Preview.mp4" type="video/mp4">
              </video>
             </div>
          </div>
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Logo DT Preview.jpg">
	           <source src="{{ url('/') }}/public/video/Logo DT Preview.mp4" type="video/mp4">
              </video>
             </div>
          </div>
     </div>
     <div class="row justify-content-center align-items-center">
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Urban Intro folder Thumbnail.jpg">
	           <source src="{{ url('/') }}/public/video/Urban Intro folder Preview.mp4" type="video/mp4">
              </video>
             </div>
          </div> 
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Funky Colorful Intro folder Thumbnail.jpg">
	           <source src="{{ url('/') }}/public/video/Funky Colorful Intro folder Preview.mp4" type="video/mp4">
              </video>
             </div>
          </div>
          <div class="col-md-4 col-lg-4 py-2">
             <div class="video-wrapper">
              <video class="img-fluid salesVideoPreview videoPreview" muted loop poster="{{ url('/') }}/public/img/Paper Style Slideshow Thumbnail.jpg">
	           <source src="{{ url('/') }}/public/video/Paper Style Slideshow.mp4" type="video/mp4">
              </video>
             </div>
          </div>
     </div>
</section>
 
<!--Section 7-->
<section class="container-fluid text-center justify-content-center py-5" style="background:#f7f8fd;">
     <img src="{{ url('/') }}/public/img/Sale-Now-On-Banner.webp" class="img-fluid pb-5" width="1920" style="border-radius:5px;" alt="Sale-Now-On-Banner"><br>
     <a href="https://designtemplate.io/confirm-subscription/NA=="><button class="get_licence">Get Licence</button></a>
</section>

<!--Section 8-->
<section class="container py-5 text-center">
    <div class="row">
          <div class="col-md-4 col-lg-4">
              	<img src="{{ url('/') }}/public/img/Review1.webp" alt="review1">
          </div>
          <div class="col-md-4 col-lg-4">
              	<img src="{{ url('/') }}/public/img/review2.webp" alt="review2">
          </div>
          <div class="col-md-4 col-lg-4">
              	<img src="{{ url('/') }}/public/img/Review7.webp" alt="review7">
          </div>
    </div>
    <div class="row">
          <div class="col-md-4 col-lg-4">
              	<img src="{{ url('/') }}/public/img/Review4.webp" alt="review4">
          </div>
          <div class="col-md-4 col-lg-4">
                <img src="{{ url('/') }}/public/img/Review3.webp" alt="review3">
          </div>
          <div class="col-md-4 col-lg-4">
              	<img src="{{ url('/') }}/public/img/Review6.webp" alt="review6">
          </div>
    </div>
</section>

<!--Section 9-->
<section class="container-fluid text-center justify-content-center py-5" style="background:#000000;">
      <h2 class="heading_superb p-2">Let's Create</h2>
      <h2 class="heading_superb p-2">Superb Videos</h2>
      <a href="https://designtemplate.io/confirm-subscription/NA==" class="px-5"><button class="get_licence justify-item-center px-5 py-2 my-2"> Subscribe Now </button></a>
</section>

<!--Section 10-->
<section class="container-fluid py-5">
  <div class="container text-center pt-1 pb-4">
    <h1 class="heading_unlimited">Featured By</h1>
       <img width="auto" src="{{ url('/') }}/public/img/featured_by_image.webp" alt="featured_image" class="img-fluid Featured-img">
  </div>
</section>
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif