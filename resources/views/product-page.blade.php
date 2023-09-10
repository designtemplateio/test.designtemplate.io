@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Product Page-{{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
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
@include('header')
<!--Section 1!-->

@php $no = 1; @endphp
 @foreach($pageData['item'] as $item)
 
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image" >
     <div class="row h-100 align-items-center p-3 mt-0">
        <div class="col-lg-6 my-auto ">
              <h1 class="product-page-heading text-left text-wrap px-2">DesignTemplate<br><p>{{ $item->heading }} Maker</p></h1>
              <p class="product-page-para py-1 px-3">{{ $item->heading_desc }}</p>
              <div class="text-left d-none d-lg-block p-3">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Get Designs Now</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
               <img src="{{ url('/') }}/public/storage/product_page/{{ $item->banner_image1 }}" class="img-fluid mt-3" width="100%" height="100%" alt="{{ $item->banner_image1 }}">
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
       @if(count($itemData['item']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($itemData['item'] as $featured)
        @php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        @endphp
       <div class="col-lg-3 col-md-4 mb-grid-gutter">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt">
            <div class="product-thumb">
              <div class="product-card-actions">
              @php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              @endphp
              @if($checkif_purchased == 0)
              @if($featured->free_download == 0)
              @if (Auth::check())
              @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
              @endif
              @else
              @endif
              @else
              @endif 
              @endif
              </div>
            @if($featured->free_download == 0)
                            <figure>
                                <span class="pro-span">Pro</span> 
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                      @if($featured->preview_video!='')
                                        <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                                <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                        </video>
                                      @else
                                        @if($featured->item_preview!='')
                                             <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"  alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                      @endif
                                  </a>
                            </figure>
                            @else
                            <figure>
                                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                      @if($featured->preview_video!='')
                                        <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                                <source src="/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                        </video>
                                      @else
                                        @if($featured->item_preview!='')
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"  alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                      @endif
                                  </a>
                            </figure>
                            @endif
            </div>
                          <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end"> </div>
                                    <h3 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($addition_settings->item_name_limit != 0)
			                                {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
		                                @else
			                                {{ $featured->item_name }}	  
			                            @endif
			                        </a>
			                        </h3>
			                </div>
			  
                            <div class="card-footer border-none d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}" style="font-size: .8125rem;">
				                    @if($addition_settings->author_name_limit != 0)
				                        By {{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
				                    @else
				                        By {{ $featured->username }}	  
				                    @endif 
				                </a>
				                
                                <div class="ml-auto text-nowrap"></div>
                               <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
                                        <!--<a href="javascript:void(0)" class="lastLogUrlCheck"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>-->
                                @endif
                                @if (Auth::check())
                                    @if($featured->user_id != Auth::user()->id)
                                        <a href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i class="material-symbols-outlined">favorite</i></a>
                                    @endif
                                @endif
                                @php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                  @if($featured->free_download == 0)
                                   @if(Auth::user())
                                     @if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                       <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"> <i class="material-symbols-outlined pl-2">download</i></a>
                                     @else
                                      <a href="{{ URL::to('/pricing') }}"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     @endif
                                   @else
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                   @endif
                  
                                  @else
                                     @if(Auth::guest())
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     @elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                        <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined pl-2">download</i></a>
                                     @else
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for license</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get License </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                            </div>
            </div>
          </div>
         </div>
        </div>
        
        <!-- Product-->
        @php $no++; @endphp
	    @endforeach
       </div>
       </div>
    @endif
      <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <div class="p-2 text-center">
          <a href="{{ URL::to('/') }}/tag/item/{{ $slug }}"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
    </div>
  </section>
  
  <!--Section 3-->
<section class="container-fluid text-center justify-content-center"> 
<img src="{{ url('/') }}/public/storage/product_page/{{ $item->banner_image2 }}" class="img-fluid py-5" width="1920" alt="{{ $item->banner_image2 }}">
</section>

<!--Section 4-->
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image" >
    <div class="container d-flex flex-wrap justify-content-center align-items-center">
     <div class="row h-100 align-items-center mt-0">
         <div class="col-lg-6 text-center">
               <img src="{{ url('/') }}/public/storage/product_page/{{ $item->product_image1 }}" class="img-fluid mt-3" width="100%" height="100%" alt="{{ $item->product_image1 }}">
        </div>
        <div class="col-lg-6 my-auto">
              <h2 class="product-features-heading mb-0 pb-1">No Advance design skills are needed</h2>
              <p class="product-features-para px-3">Design templates are pre-made designs that can be easily customized  by anyone, regardless of their design skills. These templates provide a quick and simple solution for creating professional-looking designs without the need for any design expertise.</p>
              <h2 class="product-features-heading mb-0 pb-1">{{ $item->sub_heading }}</h2>
              <p class="product-features-para px-3">{{ $item->subheading_desc }}</p>
         </div>
      </div>
      <div class="row h-100 align-items-center">
          <div class="col-lg-8 logo-heading m-3">
            <h2 class="logo-banner-heading">{{ $item->para_heading }}</h2>
            </div>
        <div class="col-lg-6 my-auto ">
             <p class="product-features-para py-1 px-3">@php echo html_entity_decode($item->para_desc); @endphp</p>
              <div class="text-left d-none d-lg-block p-3">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Get Now</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
              <img src="{{ url('/') }}/public/storage/product_page/{{ $item->product_image2 }}" class="img-fluid mt-3" width="100%" height="100%" alt="{{ $item->product_image2 }}">
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
                    <span>1 . {{ $item->faq1 }}     </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>{{ $item->answer1 }}</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . {{ $item->faq2 }}  </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>{{ $item->answer2 }}</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . {{ $item->faq3 }}</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>{{ $item->answer3 }}</p>
            </div>
        </div>
  <div class="mt-12 text-center lg:mt-10">
      <div class="text-black">
        Still have questions? We’re here to help you
      </div> 
      <div class="text-center pb-5">
             <a class="dropdown-item" href="{{ URL::to('/contact') }}"> 
             <button class="btn btn-primary" type="submit">Contact Us</button>
             </a>
      </div>
  </div>
</section>
@php $no++; @endphp
@endforeach
@include('footer')
@include('script')
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
@else
@include('503')
@endif
 
