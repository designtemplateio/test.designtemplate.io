@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Create Thrilling Videos with Ease - {{ $allsettings->site_title }}</title>
@include('meta')
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '594825145792249');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=594825145792249&ev=PageView&noscript=1"
/></noscript>
<meta name="facebook-domain-verification" content="mipf05vwwz2uckl8fa6zq8wipq3pwz" />
<!-- End Meta Pixel Code -->
<meta name="google-site-verification" content="g9sCPtVMQN7iEp5xBibrVPwkBloH4aMVc_wfBr6c9_A" />
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
.search-input
{
    background: #F7F8FD;
    border: 1.5px solid #C6C6C6;
}
.card-title{color: #fff;}
.card-text{color: #fff;}
</style>
</head>
<body class="">
@include('header')
@if(Auth::guest())

@php  $currentUrl = url()->current(); @endphp
{{ Session::put('loginUrl',$currentUrl);}}
<!--Section 1!-->
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image">
     <div class="row h-100 align-items-center p-3 mt-0">
        <div class="col-lg-6 my-auto ">
              <h1 class="heading text-left text-wrap px-2">{{ $allsettings->site_banner_heading }}</h1>
              <p class="sm-heading py-1 pt-3 px-3">{{ $allsettings->site_banner_subheading }}</p>
              <div class="text-left d-none d-lg-block p-3">
                  <!--<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" style="width:300px;">Download Free Templates</button></a>-->
                <a href="{{ URL::to('/') }}/free-items"><button class="get_licence py-2 px-5" style="width:300px;">Download Free Templates</button></a>
             </div>
         </div>
        <div class="col-lg-6 text-center my-auto">
            <div class="video-wrapper ">
              <video preload="metadata" class="img-fluid" autoplay="" playsinline="" muted="" loop="">
	           <source src="{{ url('/') }}/public/video/Home-slider-video1.webm" type="video/webm">
              </video>
             </div>
            <div class="d-lg-none">
               <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><button class="get_licence py-2 px-5" >Start Free</button></a>
            </div>
        </div>
      </div>
</section>

<!--Section 2 --> 
<section class="container-fluid search-banner pt-5 mt-5">
<div class="container tabs-style-bar">
  <ul class="nav active-tab text-center justify-content-center px-5">
    <li class="active px-5">
        <a data-toggle="tab" href="#allTemplates" class="hello">
            <div class="alltemplate">
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">All Designs</p>
            <img src="https://img.icons8.com/?size=512&id=46874&format=png" height="60" width="60" class="img-circle" alt="Alltemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#AEtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">AE Templates</p>
            <img src="https://img.icons8.com/?size=512&id=86672&format=png" height="60" width="60" class="img-circle" alt="AEtemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#PRtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">PR Templates</p>
            <img src="https://img.icons8.com/?size=512&id=111595&format=png" height="60" width="60" class="img-circle" alt="PRtemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#AItemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">Illustrations</p>
            <img src="https://img.icons8.com/?size=512&id=106997&format=png" height="60" width="60" class="img-circle" alt="AItemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#MGtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">Motion Graphics</p>
            <img src="https://img.icons8.com/?size=512&id=V6jsd74jR29Q&format=png" height="60" width="60" class="img-circle" alt="MGtemplates"/>
            </div>
        </a>
    </li>
  </ul>
</div>
</section>
<div class="tab-content">
<section class="product-banner pb-5 pt-3 tab-pane fade in active" id="allTemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Explore motion graphics design Templates for Stuning Video</p>
        @if(count($all['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($all['items']->take(8) as $featured)
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
          <a href="{{ URL::to('/templates') }}"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="AEtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Get Started with Free After Effects Templates Today</p>
        @if(count($aetemplate['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($aetemplate['items']->take(8) as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
          <a href="{{ URL::to('/templates') }}/category/after-effects"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section> 
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="PRtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Free Premiere Pro Templates: Where Creativity Takes Flight in a Click!</p>
        @if(count($flash['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($flash['items']->take(8) as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
          <a href="{{ URL::to('/templates') }}/category/premiere-pro"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="AItemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Illustrate Your Imagination: Free Illustrations that Bring Your Ideas to Life!</p>
        @if(count($illustration['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($illustration['items']->take(8) as $featured)
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
                                        @if($featured->item_preview!='')
                                             <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"  alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                  </a>
                            </figure>
                            @else
                            <figure>
                                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                                  <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($featured->item_preview!='')
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"  alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="/img/no-image.png"  alt="{{ $featured->item_name }}">
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
          <a href="{{ URL::to('/templates') }}/category/graphic-design"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="MGtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Motion Graphics Wonderland for Stunning Videos by design template!</p>
        @if(count($popular['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($popular['items']->take(8) as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
          <a href="{{ URL::to('/templates') }}/category/motion-graphics"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
</div>
@else
<!--Section 2 --> 
<section class="container-fluid bg-position-center-top-banner bg-hero-section-image pb-0 justify-content-center" style="min-height:16rem;">
    <div class="justify-content-center p-3 pb-0 mt-2">
        <h1 class="heading text-center text-wrap pb-3">Fuel your creativity with Design Template!</h1>
        <p class="sm-heading text-center pt-2 px-10">Unlock Your Creative Potential with Our Vast Collection of Free After Effects Templates, Free Premiere pro templates, motion graphics and Free Illustrations by Design Template</p>
    </div>
        <div class="row justify-content-center">
    <div class="col-6 justify-content-center">
        <form action="{{ route('shop') }}" id="search_form2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!--<div class="input-group-overlay input-group-sm mb-2 search-input">-->
            <!--      <input class="form-control" type="text" name="product_item" placeholder="{{ Helper::translation(4857,$translate,'') }} All Assets">-->
            <!--      <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>-->
            <!--    </div>-->
                <div class="input-group mb-4 mt-2 search-input">
                  <input class="form-control border-0" type="text" name="product_item" placeholder="{{ Helper::translation(4857,$translate,'') }} All Assets">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                </div>
        </form>
    </div><br>
    </div>
    <div class="row justify-content-center mt-n3">
    <div class="col-6 text-center">
        
                 @foreach($firstSixTags as $tags)
                 <span class="text-right"><a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tags)) }}" class="btn-tag mr-2 my-1 py-1" style="border-radius: 6.907px;border: 1.151px solid #7D879C;background: #F7F8FD;">{{ $tags }}</a></span>
                 @endforeach
    </div>
    </div>
<div class="container-fluid search-banner pt-5 mt-5">
  <ul class="nav active-login text-center justify-content-center px-5">
    <li class="active px-5">
        <a data-toggle="tab" href="#allTemplates">
          <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">All Designs</p>
            <img src="https://img.icons8.com/?size=512&id=46874&format=png" height="60" width="60" class="img-circle" alt="Alltemplates"/>
          </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#AEtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">AE Templates</p>
            <img src="https://img.icons8.com/?size=512&id=86672&format=png" height="60" width="60" class="img-circle" alt="AEtemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#PRtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">PR Templates</p>
            <img src="https://img.icons8.com/?size=512&id=111595&format=png" height="60" width="60" class="img-circle" alt="PRtemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#AItemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">Illustrations</p>
            <img src="https://img.icons8.com/?size=512&id=106997&format=png" height="60" width="60" class="img-circle" alt="AItemplates"/>
            </div>
        </a>
    </li>
    <li class="px-5">
        <a data-toggle="tab" href="#MGtemplates">
            <div>
            <p class="card-text cat-name px-2 pb-0 mb-0 pb-2">Motion Graphics</p>
            <img src="https://img.icons8.com/?size=512&id=V6jsd74jR29Q&format=png" height="60" width="60" class="img-circle" alt="MGtemplates"/>
            </div>
        </a>
    </li>
  </ul>
</div>
</section>
<div class="tab-content">
    <section class="product-banner pb-5 pt-3 tab-pane fade in active" id="allTemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Explore motion graphics design Templates for Stuning Video</p>
        @if(count($all['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($all['items'] as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
        <div class="pt-3 pb-1 text-center">
          <a href="{{ URL::to('/templates') }}"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="AEtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Get Started with Free After Effects Templates Today</p>
        @if(count($aetemplate['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($aetemplate['items'] as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
        <div class="pt-3 pb-1 text-center">
          <a href="{{ URL::to('/templates') }}/category/after-effects"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section> 
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="PRtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Free Premiere Pro Templates: Where Creativity Takes Flight in a Click!</p>
        @if(count($flash['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($flash['items'] as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
        <div class="pt-3 pb-1 text-center">
          <a href="{{ URL::to('/templates') }}/category/premiere-pro"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="AItemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Illustrate Your Imagination: Free Illustrations that Bring Your Ideas to Life!</p>
        @if(count($illustration['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($illustration['items'] as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
        <div class="pt-3 pb-1 text-center">
          <a href="{{ URL::to('/templates') }}/category/graphic-design"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
    <section class="product-banner pb-5 pt-3 tab-pane fade" id="MGtemplates">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
      <p class="sm-heading text-center pb-2 mb-0 px-10 d-none d-lg-block">Motion Graphics Wonderland for Stunning Videos by design template!</p>
        @if(count($popular['items']) != 0)
        <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($popular['items'] as $featured)
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
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
        <div class="pt-3 pb-1 text-center">
          <a href="{{ URL::to('/templates') }}/category/motion-graphics"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  
  </section>
</div>
@endif
<!--Section 3-->
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
                  
                  @if(!Auth::guest())
                  <p class="starting_at pt-2">Starting at <del class="price-old">$19</del> $9.49/month</p>
                  @endif
                <a href="{{ URL::to('/pricing') }}"><button class="d-none d-lg-block mt-4 get_licence py-2 px-1" style="width:300px;"> Get Unlimited Downloads </button></a>
             </div>
             </div>
          </div>
          <div class="my-auto col-lg-8 text-center">
                <img src="{{ url('/') }}/public/img/technology_image.webp" loading="lazy" class="img-fluid" alt="Creative-image">
                <a href="{{ URL::to('/pricing') }}"><button class="d-lg-none get_licence mt-4 py-2 px-1" style="width:100%;"> Get Unlimited Downloads </button></a>
          </div>
     </div>
  </div>
</section>

<!--Section 5-->
<section class="container-fluid product-banner py-5">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
        @if(count($free['items']) != 0)
            <div class="mx-auto text-center">
               <h2 class="heading_unlimited new mb-0">Free new template every day</h2>
                <p class="sm-heading pb-3 pt-1">Express your creativity with our vast library of  Free assets</p>
            </div>
    <div class="d-flex flex-wrap justify-content-end align-items-center pt-2">
       <div class="row equal-height justify-content-center">
        @if(Auth::guest())
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($free['items']->take(4) as $featured)
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
              @if(Auth::guest()) 
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>-->
              @endif
              @if (Auth::check())
              @if($featured->user_id != Auth::user()->id)
              @endif
              @endif
              <figure>
                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                    <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                        @if($featured->preview_video!='')
                            <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                            </video>
                        @else   
                            @if($featured->item_preview!='')
                                <img class="lazy_load img-fluid card-img-top" loading="lazy" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                            @else
                                <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                            @endif
                        @endif
                       
                    </a>
              </figure>
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end"></div>
                                    <h2 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($addition_settings->item_name_limit != 0)
			                                {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
		                                @else
			                                {{ $featured->item_name }}	  
			                            @endif
			                        </a>
			                        </h2>
			                </div>
              
               <div class="card-footer border-none d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}" style="font-size: .8125rem;">
				                    @if($addition_settings->author_name_limit != 0)
				                        By {{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
				                    @else
				                        By {{ $featured->username }}	  
				                    @endif 
					                @if($addition_settings->subscription_mode == 1) 
					                    @if($featured->user_document_verified == 1) 
				                        @endif 
				                    @endif
				                </a>
					    
                  <div class="ml-auto text-nowrap font-size-xs">
                     <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                      </div>
             </div>   
          </div>
        </div>
        </div>
        </div>
        
        <!-- Product-->
        @php $no++; @endphp
	    @endforeach
	    @else
	    <!-- Product-->
        @php $no = 1; @endphp
        @foreach($free['items'] as $featured)
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
              @if(Auth::guest()) 
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>-->
              @endif
              @if (Auth::check())
              @if($featured->user_id != Auth::user()->id)
              @endif
              @endif
              <figure>
                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                    <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                        @if($featured->preview_video!='')
                            <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                            </video>
                        @else   
                            @if($featured->item_preview!='')
                                <img class="lazy_load img-fluid card-img-top" loading="lazy" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                            @else
                                <img class="img-fluid card-img-top" loading="lazy" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                            @endif
                        @endif
                       
                    </a>
              </figure>
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end"></div>
                                    <h2 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($addition_settings->item_name_limit != 0)
			                                {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
		                                @else
			                                {{ $featured->item_name }}	  
			                            @endif
			                        </a>
			                        </h2>
			                </div>
              
               <div class="card-footer border-none d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}" style="font-size: .8125rem;">
				                    @if($addition_settings->author_name_limit != 0)
				                        By {{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
				                    @else
				                        By {{ $featured->username }}	  
				                    @endif 
					                @if($addition_settings->subscription_mode == 1) 
					                    @if($featured->user_document_verified == 1) 
				                        @endif 
				                    @endif
				                </a>
					    
                  <div class="ml-auto text-nowrap font-size-xs">
                     <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                      </div>
             </div>   
          </div>
        </div>
        </div>
        </div>
        
        <!-- Product-->
        @php $no++; @endphp
	    @endforeach
	    @endif
       </div>
       </div>
    @endif
      <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <div class="p-2 text-center">
          <a href="{{ URL::to('/') }}/free-items"><button class="get_licence py-2 px-5" >Explore More</button></a>
        </div>
      </div>
      </div>
  </section>
  
  
  <!-- Section -->
  <div class="py-5">
    <div class="container">
      <div class="row hidden-md-up">
        <div class="col-md-4">
          <a href="{{ URL::to('/') }}/tag/item/festival"> <div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Festival.webp" alt="Festival">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
         <h4 class="card-title">Festival</h4>
          <p class="card-text">Capture the essence of the festive season with Indian festive illustrations</p>
        </div>
          </div></a>
        </div>
        <div class="col-md-4">
         <a href="{{ URL::to('/') }}/tag/item/food"> <div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Food.webp" alt="Food">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Food</h4>
          <p class="card-text">Enhance your culinary content with vibrant food presentation template, animated dish templates</p>
        </div>
          </div></a>
        </div>
        <div class="col-md-4">
          <a href="{{ URL::to('/') }}/tag/item/social-media"><div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Social_Media.webp" alt="Social Media">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Social Media</h4>
          <p class="card-text">Step up  your social media strategy with a customizable social media marketing template</p>
        </div>
          </div></a>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-4">
         <a href="{{ URL::to('/') }}/tag/item/fashion"> <div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Fashion.webp" alt="Fashion">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Fashion</h4>
          <p class="card-text">Create captivating fashion promo videos with our video design for fashion offers.</p>
        </div></a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center pt-5 mt-5 border-0">
          <div class="heading_unlimited">Ultimate  Design Guide</div>
          <p>Design solutions to cater all your needs</p>
          </div>
        </div>
        <div class="col-md-4">
          <a href="{{ URL::to('/') }}/tag/item/real-estate"><div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Real_Estate.webp" alt="Real Estate">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Real Estate</h4>
          <p class="card-text">Create stunning real estate presentations with our professional real estate slideshow templates</p>
        </div>
          </div></a>
        </div>
      </div><br>
       <div class="row">
        <div class="col-md-4">
          <a href="{{ URL::to('/') }}/tag/item/business"><div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Business.webp" alt="Business">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Business</h4>
          <p class="card-text">Scale business with our branding logo, and marketing motion graphics templates</p>
        </div>
          </div></a>
        </div>
        <div class="col-md-4">
         <a href="{{ URL::to('/') }}/tag/item/education"> <div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Education.webp" alt="Education">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Education</h4>
          <p class="card-text">Create captivating learning advertisements, featuring education character animations</p>
        </div>
          </div>
        </div></a>
        <div class="col-md-4">
          <a href="{{ URL::to('/') }}/tag/item/sports"><div class="card">
            <img class="card-img" src="{{ URL::to('/') }}/public/img/Sports.webp" alt="Sports">
        <div class="card-img-overlay text-white d-flex flex-column justify-content-center pt-5 mt-5 pb-n5 mb-n5">
          <h4 class="card-title">Sports / Fitness</h4>
          <p class="card-text">Create a catchy fitness center promotion with our sports event advertisement template</p>
        </div>
          </div></a>
        </div>
      </div>
    </div>
  </div>
  
    <div class="slideshow">
  <input type="radio" id="bouton-1" name="radio-set" class="selecteur-1" checked="checked" />
  <input type="radio" id="bouton-2" name="radio-set" class="selecteur-2" />
  <input type="radio" id="bouton-3" name="radio-set" class="selecteur-3" />
  <input type="radio" id="bouton-4" name="radio-set" class="selecteur-4" />

  
  <div class="contenu">
    <ul class="slider"> <!--clearfix-->
      <li><img src="https://designtemplate.io/public/img/slider_wedding.webp" alt="image01"/></li>
      <li><img src="https://designtemplate.io/public/img/slider_festival.webp" alt="image03"/></li>
      <li><img src="https://designtemplate.io/public/img/slider_wedding.webp" alt="image04"/></li>
      <li><img src="https://designtemplate.io/public/img/slider_festival.webp" alt="image02"/></li>
    </ul>
  </div> 
</div> 
  
 <!--Section 5 --> 
<section class="container-fluid py-5">
<div class="container happ-cust-banner text-center justify-content-center py-3">
    <div class="center">
       <h2 class="heading_unlimited">1,00,000+ Happy Customers</h2>
       <p class="text-center">We are a company , which design the best product for your visual pleasure.<br>Design template is part of  digital design platform by Dadasaheb Bhagat.</p>
    </div>
    <div class="row justify-content-center align-items-center pt-3">
        <div class="col-lg-12">
          <img src="{{ url('/') }}/public/img/Clients_logo.webp" loading="lazy" alt="Clients_logo">
        </div>
    </div>
</div>
</section>

  <!--Section 6-->
<section class="container-fluid product-banner py-5" style="background-image: url(http://designtemplate.io/public/img/request.webp);background-size: cover;">
  <div class="container logo-container text-center">
    <h2 class="heading_unlimited text-white">Bring Your Vision to Life: Request a Custom Design</h2>
    @if(!Auth::guest())
    <div class="text-center pt-4">
        <a href="#" id="mySizeChart" data-toggle="modal" data-target="#largeModal"><button class="get_licence px-5">Submit Request</button></a>
      </div>
    @else
      <div class="text-center pt-4">
        <a href="javascript:void(0)" id="mySizeChart" data-toggle="modal" data-target="#exampleModal"><button class="get_licence px-5">Submit Request</button></a>
      </div>
    @endif
  </div>
</section>
  
<!--Section 6-->  
<section class="container-fluid product-banner py-3">
  <div class="container logo-container text-center pt-1 pb-0">
    <h2 class="heading_unlimited">Featured By</h2>
        <img width="auto" src="{{ url('/') }}/public/img/featured_by_image.webp" alt="featured_image" class="img-fluid Featured-img">
  </div>
</section>
<!--Section 7-->
<section class="container-fluid">
<h2 class="heading_unlimited text-center py-4">Frequently asked questions</h2> 
<div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is the design template? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Design template is a premade design which helps to create eye catchy & stunning visuals quickely. designtemplate, you can choose from our templates of free graphic design templates to business designtemplate. Choose from a variety of design styles, including business, graphic, and downloadable designs.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What is the function of design template?  </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Function of a design template is to provide a pre designed framework & create stunning designs that stand out from the crowd. some functions of designtemplate.io are consistency, Time Saving, branding, design quality , accessibility etc. From our website you can get unlimited design template access such as business design templates, pdf designs templates, free layout design templates, free creative design templates, visual design templates, free document design templates.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . How can I download free design templates?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are many free design templates are available in our website, like free graphic design templates, free layout design templates, free creative design templates, free document design templates,free art design templates, free marketing design templates, festivals designtemplate etc. Just login our website, get license and download free  template.</p>
            </div>
            <div class="question">
                <button>
                    <span>4 . How can I make my own design template?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Open designtemplate.io website & login. Download your own choice visual design templates. All are editable design template. Its  easy to edit, you can change colour, text, animation & images. Free editable graphic design templates are available on it. </p>
            </div>
            <div class="question">
                <button>
                    <span>5 . What are the 3 kinds of design templates?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are many different kinds of design templates, but here are three common types: Layout templates: These templates provide a pre-designed layout for a document or web page, including things like margins, text boxes, and image placeholders. Branding templates: These templates provide a consistent set of design elements that can be used across different materials to reinforce a brand's visual identity.  Content templates: These templates provide a structure for presenting specific types of content, such as resumes, presentations, or social media posts. </p>
            </div>
            <div class="question">
                <button>
                    <span>6 . What is the purpose of a design template?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Design templates can be used for a variety of purposes, such as creating documents, presentations, websites, or marketing materials. The main benefits of using design templates include: Saving time: Templates can help designers or non-designers save time by providing a pre-designed structure or layout to work with.  Consistency: Templates can ensure consistency in design elements such as colors, fonts, and layout, which is important for creating a professional and cohesive look. Efficiency: Templates can also help streamline the design process by eliminating the need to start from scratch, which can be particularly helpful for those with limited design experience. Branding: Templates can be used to create a consistent brand identity by incorporating the company's logo, colors, and fonts. </p>
            </div>
            <div class="question">
                <button>
                    <span>7 . Where to get design template?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are many places to get design templates, depending on the type of template you need.  designtemplate.io is best marketplace for getting unlimited unique templates. all types af design templates are available. our collection included after effects, premiere pro, motion graphics and graphic design templates, wedding invitation etc. this templates save your time and also money. </p>
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
</div>
</section>
@include('footer')
@include('script')
<script>
    $(document).ready(function() {
  setInterval(slider, 7000);
  var i = 1;

  function slider() {
   i = $('input[name=radio-set]:checked').attr('id');
      
      
   i = (parseInt(i.slice(-1)) % 4)+1;
     
      
   $('#bouton-' + i).prop('checked', true);
      
  }
});
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
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
 
