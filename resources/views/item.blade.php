@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
@if($check_if_item != 0)
<title>{{ $item['item']->item_name }} - {{ $allsettings->site_title }}</title>
@if($item_slug != '')
@if($item['item']->item_allow_seo == 1)
<meta name="Description" content="{{ $item['item']->item_seo_desc }}">
<meta name="Keywords" content="{{ $item['item']->item_seo_keyword }}">
@else
@include('meta')
@endif
@else
@include('meta')
@endif
@else
<title>{{ Helper::translation(2860,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
<meta property="og:image" content="{{ Helper::Image_Path($item['item']->item_thumbnail,'no-image.png') }}"/>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ Helper::Image_Path($item['item']->item_thumbnail,'no-image.png') }}"/>
<meta name="twitter:image:src" content="{{ Helper::Image_Path($item['item']->item_thumbnail,'no-image.png') }}">
<meta name="twitter:image:width" content= "280" />
<meta name="twitter:image:height" content= "480" />
<style>
.hidden {
      display: none;
    }
</style>
</head>
<body style="background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(254,254,255,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 23%, rgba(234,234,239,1) 27%, rgba(234,234,239,1) 31%, rgba(234,234,239,1) 36%, rgba(234,234,239,1) 48%, rgba(234,234,239,1) 100%);">
@include('header')

@if($check_if_item != 0)
<div class="container-fluid-sm px-5 d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" style="color:#000000;" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" style="color:#000000;" href="{{ URL::to('/templates') }}">Templates</a></li>
              <li class="breadcrumb-item text-nowrap" style="text-transform: capitalize;">{{ str_replace('-',' ',$item['item']->item_type) }}</li>
              <li class="breadcrumb-item text-nowrap" aria-current="page"><a class="text-nowrap" style="color:#000000;text-transform: capitalize;" href="{{ URL::to('/templates/subcategory/') }}/{{ str_replace(' ','-',$category_name) }}">{{ $category_name }}</a></li>
              </li>
             </ol>
          </nav>
        </div>
      </div>
<div class="page-title-overlap text-center px-1">
      <div class="center py-2">
      <div class="order-lg-1 pr-lg-4  text-center text-lg-center">
          <h1 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;">{{ $item['item']->item_name }}</h1>
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
                      @if($item['item']->video_preview_type!='')
                      @if($item['item']->video_preview_type == 'youtube')
                      @if($item['item']->video_url != '')
                      @php
                      $url = $item['item']->video_url;
                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                      $video_id = $match[1];
                      @endphp
                      <iframe width="760" height="428" src="https://www.youtube.com/embed/{{ $video_id }}?loop=1&modestbranding=1&autoplay=1&loop=1&rel=0&showinfo=0&fs=0&autohide=2&controls=0&cc_load_policy=1&iv_load_policy=3" frameborder="0" class="" allow="autoplay" scrolling="no"></iframe> 
                      @else
                      <img class="lazy single-thumbnail" width="760" height="430" src="{{ url('/') }}/resources/views/assets/no-video.png" data-original="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}">
                      @endif
                      @endif
                      @if($item['item']->video_preview_type == 'mp4')
                      @if($item['item']->video_file != '')
					  <video width="762" height="428" src="{{ Helper::Image_Path($item['item']->video_file,'no-video.png') }}" controls> {{ Helper::translation(5979,$translate,'') }} </video>	  
                      @else
                      <img class="lazy single-thumbnail" width="762" height="430" src="{{ url('/') }}/resources/views/assets/no-video.png" data-original="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}">
                      @endif
                      @endif
                      @if($item['item']->video_preview_type == 'mp3')
                      @if($item['item']->audio_file != '')
					  <audio controls="controls"><source src="{{ Helper::Image_Path($item['item']->audio_file,'no-audio.png') }}" type="audio/mpeg" /></audio>	  
                      @else
                      <img class="lazy single-thumbnail" width="762" height="430" src="{{ url('/') }}/resources/views/assets/no-audio.png" data-original="{{ url('/') }}/resources/views/assets/no-audio.png" alt="{{ $item['item']->item_name }}">
                      @endif
                      @endif
                      @else  
                      @if($item['item']->item_preview!='')
                      <a class="gallery-item rounded-lg mb-grid-gutter" href="{{ Helper::Image_Path($item['item']->item_preview,'no-image.png') }}" data-sub-html="{{ $item['item']->item_name }}">
                      <img class="lazy single-thumbnail" width="762" height="430" src="{{ Helper::Image_Path($item['item']->item_preview,'no-image.png') }}" data-original="{{ Helper::Image_Path($item['item']->item_preview,'no-image.png') }}" alt="{{ $item['item']->item_name }}">
                      <span class="gallery-item-caption">{{ $item['item']->item_name }}</span>
                      </a>
                      @else
                      <img class="lazy single-thumbnail" width="762" height="430" src="{{ url('/') }}/public/img/no-image.png" data-original="{{ url('/') }}/public/img/no-image.png" alt="{{ $item['item']->item_name }}">
                      @endif
                      @endif
                   @if($getcount != 0)
                   <div class="row">
                    @foreach($item_allimage as $image)
                   <div class="col-sm-2"><a class="gallery-item rounded-lg mb-grid-gutter thumber" href="{{ Helper::Image_Path($image->item_image,'no-image.png') }}" data-sub-html="{{ $item['item']->item_name }}"><img class="lazy" width="762" height="430" src="{{ Helper::Image_Path($image->item_image,'no-image.png') }}" data-original="{{ Helper::Image_Path($image->item_image,'no-image.png') }}" alt="{{ $image->item_image }}"/><span class="gallery-item-caption">{{ $item['item']->item_name }}</span></a></div>
                   @endforeach 
                </div>
                @endif
              </div>
              <!-- Wishlist + Sharing-->
              <div class="d-flex flex-wrap justify-content-between align-items-center py-1">
                <div class="py-2 mr-2">
                  @if($item['item']->demo_url != '') 
                  <a class="btn btn-outline-accent btn-sm" href="{{ url('/preview') }}/{{ $item['item']->item_slug }}" target="_blank"><i class="dwg-eye font-size-sm mr-2"></i>{{ Helper::translation(3049,$translate,'') }}</a>
                  @endif
                  @if(Auth::guest())
                  <a class="btn btn-favorites btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="dwg-heart font-size-lg mr-2"></i>{{ Helper::translation(3051,$translate,'') }}</a>
                  @endif
                  @if (Auth::check())
                  @if($item['item']->user_id != Auth::user()->id)
                  <a class="btn btn-favorites btn-sm" href="{{ url('/item') }}/{{ base64_encode($item['item']->item_id) }}/favorite/{{ base64_encode($item['item']->item_liked) }}"><i class="dwg-heart font-size-lg mr-2"></i>{{ Helper::translation(3051,$translate,'') }}</a>
                  @endif
                  @endif
                  </div>
                <div class="py-2"><i class="dwg-share-alt font-size-lg align-middle text-muted mr-2"></i>
                <a class="social-btn sb-outline sb-facebook sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}" data-share-network="facebook" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ Helper::Image_Path($item['item']->item_thumbnail,'no-image.png') }}" href="javascript:void(0)"><i class="dwg-facebook"></i></a>
                <a class="social-btn sb-outline sb-twitter sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}" data-share-network="twitter" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ Helper::Image_Path($item['item']->item_thumbnail,'no-image.png') }}" href="javascript:void(0)"><i class="dwg-twitter"></i></a>
                <a class="social-btn sb-outline sb-pinterest sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}" data-share-network="pinterest" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ Helper::Image_Path($item['item']->item_preview,'no-image.png') }}" href="javascript:void(0)"><i class="dwg-pinterest"></i></a>
                <a class="social-btn sb-outline sb-linkedin sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}" data-share-network="linkedin" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ Helper::Image_Path($item['item']->item_preview,'no-image.png') }}" href="javascript:void(0)"><i class="dwg-linkedin"></i></a>
                </div>
              </div>
              <div class="mb-4 mb-lg-5">
      <!-- Nav tabs-->
      <div class="tab-content pt-0 mt-0">
        <div class="tab-pane fade" id="suppport" role="tabpanel">
           <div class="row">
            <div class="col-lg-12">
               <h4>{{ Helper::translation(3060,$translate,'') }}</h4>
               @if(Auth::guest())
                    <p>{{ Helper::translation(3061,$translate,'') }}
                    <a href="javascript:void(0)" class="theme-color" data-toggle="modal" data-target="#exampleModal">{{ Helper::translation(3020,$translate,'') }}</a> {{ Helper::translation(3062,$translate,'') }}</p>
                    @endif
                    @if (Auth::check())
                    <form action="{{ route('support') }}" class="support_form media-body needs-validation" id="support_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                  <label for="subj">{{ Helper::translation(3063,$translate,'') }}</label>
                                  <input type="text" id="support_subject" name="support_subject" class="form-control" placeholder="Enter your subject" data-bvalidator="required">
                            </div>
                                <div class="form-group">
                                    <label for="supmsg">{{ Helper::translation(2918,$translate,'') }} </label>
                                    <textarea class="form-control" id="support_msg" name="support_msg" rows="5" placeholder="Enter your message" data-bvalidator="required"></textarea>
                                </div>
                                    <input type="hidden" name="to_address" value="{{ $item['item']->email }}">
                                    <input type="hidden" name="to_id" value="{{ $item['item']->id }}">
                                    <input type="hidden" name="to_name" value="{{ $item['item']->username }}">
                                    <input type="hidden" name="from_address" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="from_name" value="{{ Auth::user()->username }}">
                                    <input type="hidden" name="item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ Helper::translation(3064,$translate,'') }}</button>
                    </form>
                    @endif
            </div>
           </div> 
        </div>
      </div>
                 @if($item['item']->item_tags != '')
                 <li class="justify-content-between pt-2" style="list-style-type: none;"><span class="text-dark font-weight-medium">{{ Helper::translation(2974,$translate,'') }}</span>
                 @if (Auth::check())
                 @if(Auth::user()->user_type == 'admin')
                 <a href="/templates/1/2/3/4/{{ $item['item']->item_token }}"> <span class="edit-span">Edit</span></a>
                 @endif
                 @endif
                 <br/>
                 @php $item_tags = str_replace(', ', ',', $item['item']->item_tags);
	                  $item_tags = explode(',',$item_tags);@endphp
                 <div id="nameList text-justify">
                 @foreach($item_tags as $index => $tags)
                 @if($index < 14)
                 <span class="text-right"><a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tags)) }}" class="link-color btn-tag mr-2 my-1 py-1">{{ $tags.' ' }}</a></span>
                 @else
                 <span class="text-right hidden"><a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tags)) }}" class="link-color btn-tag mr-2 my-1 py-1">{{ $tags.' ' }}</a></span>
                 @endif
                 @endforeach
                 <span class="text-right link-color btn-tag mr-2 my-1 py-1 btn" id="showMoreButton" onclick="showMore()">See More...</span>
                 </div>
                 </li>
                 @endif
                 
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
    <form action="{{ route('cart') }}" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
            {{ csrf_field() }} 
              <div class="cz-sidebar-static h-100 border-left mx-2 px-4" style="max-width:28rem">
               @if($item['item']->free_download == 1)
               <div class="bg-secondary rounded p-3 mb-4">
               <p>{{ Helper::translation(3065,$translate,'') }} <strong>{{ Helper::translation(3040,$translate,'') }}</strong>. {{ Helper::translation(3066,$translate,'') }}</p>
               @if(Auth::guest())
               <div align="center">
                <a href="javascript:void(0)" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-download"></i> {{ $additional->download_button_after_text }}</a>
               </div>
               @else
               <div align="center">
               <a href="{{ URL::to('/item') }}/download/{{ base64_encode($item['item']->item_token) }}" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> {{ $additional->download_button_after_text }}</a>
               </div>
               @endif
               </div>
               @else
               @if($addition_settings->subscription_mode == 1)
               @if($item['item']->subscription_item == 1)
               <div class="bg-secondary rounded p-3 mb-4">
               @if(Auth::guest())
               <p>{{ Helper::translation('62eb75242a704',$translate,'Subscribe to unlock this item, plus millions of creative assets with unlimited downloads.') }}</p>
               
               @endif
               @php if($item['item']->download_count == "") { $dcount = 0; } else { $dcount = $item['item']->download_count; } @endphp
               <div>
                   @if (Auth::check())
                   @if(Auth::user()->user_subscr_date >= date('Y-m-d') && Auth::user()->user_subscr_payment_status == 'completed')
                   <p>{{ Helper::translation('62eba3b4bf733',$translate,'This item is one of the Subscribe Users Free Download Files. You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.') }}</p>
                   <div align="center">
                   <a href="{{ URL::to('/item') }}/download/{{ base64_encode($item['item']->item_token) }}" class="btn btn-custom btn-block btn-sm"> <i class="fa fa-download"></i> {{ $additional->download_button_after_text }}</a>
                   </div>
                   @else
                   <p>{{ Helper::translation('62eb75242a704',$translate,'Subscribe to unlock this item, plus millions of creative assets with unlimited downloads.') }}</p>
                   <div align="center">
                   <a href="{{ URL::to('/pricing') }}" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> {{ $additional->download_button_before_text }}</a>
                   </div>
                   @endif
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
                   @endif
                   @if(Auth::guest())
                   <div align="center">
                   <a href="javascript:void(0);" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-download"></i> {{ $additional->download_button_before_text }}</a>
                   <?php /*?><a href="{{ URL::to('/login') }}" class="btn btn-custom btn-sm"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate,'') }} ({{ $dcount }})</a><?php */?>
                   </div>
                   @endif
                </div>
               </div>
               @endif
               @endif
               @endif 
               
               @if($item['item']->free_download == 1)
                @php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                @endphp
              <div class="accordion px-3" id="licenses">
                <div class="card border-top-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-2 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" value="{{ base64_encode($item_price) }}_regular" id="license-std" checked>
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-std" data-toggle="collapse" data-target="#standard-license">{{ Helper::translation(3072,$translate,'') }}</label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency_symbol }}{{ $item_price }}</h5>
                  </div>
                  <div class="collapse" id="standard-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        @if($item['item']->item_support == 1)
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->regular_license }}</span></li>
                        @else
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->regular_license }}</span></li>
                        @endif
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Commercial Usage up to 3 times</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                @if($item['item']->extended_price != 0)
                <div class="card border-bottom-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="{{ base64_encode($extend_item_price) }}_extended">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-ext" data-toggle="collapse" data-target="#extended-license">{{ Helper::translation(3073,$translate,'') }}</label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency_symbol }}{{ $extend_item_price }}</h5>
                  </div>
                  <div class="collapse" id="extended-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        @if($item['item']->item_support == 1)
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->extended_license }}</span></li>
                        @else
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->extended_license }}</span></li>
                        @endif
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">No limits on Commercial Usage</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                @endif
              </div>
               @else
                @php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                @endphp
              <div class="accordion px-3" id="licenses">
                <div class="card border-top-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" value="{{ base64_encode($item_price) }}_regular" id="license-std" checked style="position:relative;">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-std" data-toggle="collapse" data-target="#standard-license">{{ Helper::translation(3072,$translate,'') }}</label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency_symbol }}{{ $item_price }}</h5>
                  </div>
                  <div class="collapse" id="standard-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        @if($item['item']->item_support == 1)
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->regular_license }}</span></li>
                        @else
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->regular_license }}</span></li>
                        @endif
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Commercial Usage up to 3 times</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                @if($item['item']->extended_price != 0)
                <div class="card border-bottom-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 mx-2 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="{{ base64_encode($extend_item_price) }}_extended" style="position:relative;">
                      <label class="custom-control-label font-weight-medium text-dark cursor-pointer" for="license-ext" data-toggle="collapse" data-target="#extended-license">{{ Helper::translation(3073,$translate,'') }}</label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency_symbol }}{{ $extend_item_price }}</h5>
                  </div>
                  <div class="collapse" id="extended-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        @if($item['item']->item_support == 1)
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->extended_license }}</span></li>
                        @else
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms">Get updates for {{ $additional->extended_license }}</span></li>
                        @endif
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms">No limits on Commercial Usage</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                @endif
              </div>
              @endif
            
              @if($allsettings->item_support_link !='')
              @if($item['item']->free_download == 1)
              <p class="m-2 px-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs">{{ $page['view']->page_title }}</a></p>
              @else
              <p class="m-2 px-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs">{{ $page['view']->page_title }}</a></p>
              @endif
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                         <div class="modal-header">
                          <h4 class="modal-title">{{ $page['view']->page_title }}</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                         @php echo html_entity_decode($page['view']->page_desc); @endphp
                        </div>
                       </div>
                    </div>
                  </div>
                @endif
                <?php /*?><input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><?php */?>
                <input type="hidden" name="item_id" value="{{ $item['item']->item_id }}">
                <input type="hidden" name="item_name" value="{{ $item['item']->item_name }}">
                <input type="hidden" name="item_user_id" value="{{ $item['item']->user_id }}">
                <input type="hidden" name="item_token" value="{{ $item['item']->item_token }}">
                @if($item['item']->free_download == 1)
                @if(Auth::guest())
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-4" href="{{ URL::to('/cart') }}"> <i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(3074,$translate,'') }}</button>
                @endif
                @if (Auth::check())
                @if($item['item']->user_id == Auth::user()->id)
                <a href="{{ URL::to('/edit-item') }}/{{ $item['item']->item_token }}" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(2935,$translate,'') }}</a>
                @else
                
                @if($checkif_purchased == 0)
                @if(Auth::user()->id != 1)
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(3074,$translate,'') }}</button>
                @endif
                @else
                <a class="btn btn-primary btn-shadow btn-block mt-2" href="{{ URL::to('/purchases') }}"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(6264,$translate,'') }}</a> 
                @endif    
                @endif
                @endif
                @else
                @if(Auth::guest())
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2" href="{{ URL::to('/cart') }}">
                    <i class="dwg-cart font-size-lg mr-2"></i>
                {{ Helper::translation(3074,$translate,'') }}</button>
                @endif
                @if (Auth::check())
                @if($item['item']->user_id == Auth::user()->id)
                <a href="{{ URL::to('/edit-item') }}/{{ $item['item']->item_token }}" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(2935,$translate,'') }}</a>
                @else
                
                @if($checkif_purchased == 0)
                @if(Auth::user()->id != 1)
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-2"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(3074,$translate,'') }}</button>
                @endif
                @else
                <a class="btn btn-primary btn-shadow btn-block mt-2" href="{{ URL::to('/purchases') }}"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(6264,$translate,'') }}</a> 
                @endif    
                @endif
                @endif 
                @endif
               
                @if($sold_amount >= $badges['setting']->author_sold_level_six)
                <div class="bg-secondary rounded p-3 mt-2">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" data-original="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" title="{{ $badges['setting']->author_sold_level_six_label }} : {{ Helper::translation(5982,$translate,'') }} {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ {{ Helper::translation(5325,$translate,'') }} {{ $allsettings->site_title }}"> {{ $badges['setting']->author_sold_level_six_label }}</span>
                </div>
                @endif
                <div class="bg-secondary rounded p-2 my-2">
                <a class="media" href="{{ url('/user') }}/{{ $item['item']->username }}">
                @if($item['item']->user_photo != '')
                <!--<img class="lazy rounded-circle vertical-img" width="50" height="50" src="{{ url('/') }}/public/storage/users/{{ $item['item']->user_photo }}" data-original="{{ url('/') }}/public/storage/users/{{ $item['item']->user_photo }}" alt="{{ $item['item']->name }}">-->
                @else
                <!--<img class="lazy rounded-circle vertical-img" width="50" height="50" src="{{ url('/') }}/public/img/no-user.png" data-original="{{ url('/') }}/public/img/no-user.png" alt="{{ $item['item']->name }}">-->
                @endif
                <div class="media-body pl-2 item-details">
                    <h6 class="font-size-sm mb-0 py-2 px-0">By {{ $item['item']->username }}</h6>
                </div></a>
                </div>
              <div class="bg-secondary rounded p-3 my-1 pb-1">
                      <li class="justify-content-between py-1 font-weight-medium font-size-sm" style="list-style-type: none;"><span class="text-dark pr-2"> {{ Helper::translation(2937,$translate,'') }} </span><span class="text-muted">{{ str_replace('-',' ',$item['item']->item_type) }}</span></li>
                      @if(count($viewattribute['details']) != 0)
                      @foreach($viewattribute['details'] as $view_attribute)
                      <li class="justify-content-between py-1 font-weight-medium font-size-sm" style="list-style-type: none;"><span class="text-dark pr-2"> {{ $view_attribute->item_attribute_label }} </span><span class="text-muted">@php echo str_replace(',', ',', $view_attribute->item_attribute_values); @endphp </span></li>
                      @endforeach
                      @endif
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
                         <p class="font-size-md mb-1">@php echo html_entity_decode($item['item']->item_desc); @endphp</p>
                         </div>
                         <div class="col-lg-4">
                             @if($item['item']->item_sold !=0)
                             <div class="bg-secondary rounded p-3 mt-2 mb-2 mx-4"><i class="dwg-download h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1">{{ $item['item']->item_sold }}</span><span class="font-size-sm">{{ Helper::translation(2930,$translate,'') }}</span></div>
                             @endif
               <div class="bg-secondary rounded p-3 mt-2 mb-2 mx-4"><i class="dwg-heart h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1">{{ $item['item']->item_liked }}</span><span class="font-size-sm">{{ Helper::translation(2989,$translate,'') }}</span></div>
              <ul class="list-unstyled font-size-sm  mx-4">
                <!--<li class="d-flex justify-content-between mb-3 py-3 border-bottom"><span class="text-dark font-weight-medium">{{ Helper::translation(3082,$translate,'') }}</span><span class="text-muted">{{ date("d F Y", strtotime($item['item']->created_item)) }}</span></li>-->
                <!--<li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium">{{ Helper::translation(3083,$translate,'') }}</span><span class="text-muted">{{ date("d F Y", strtotime($item['item']->updated_item)) }}</span></li>-->
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium">{{ Helper::translation(3084,$translate,'') }}</span><span class="text-muted">{{ $category_name }}</span></li>
              </ul>
               @if($item['item']->item_featured == 'no')
               @else
                <div class="bg-secondary rounded p-3 mt-2">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" data-original="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" title="{{ Helper::translation(5466,$translate,'') }}"> {{ Helper::translation(3075,$translate,'') }} {{ $allsettings->site_title }}</span>
                </div>
                @endif
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
        <h2 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;">{{ Helper::translation(3087,$translate,'') }} from <a href="{{ URL::to('/templates') }}/subcategory/{{ $subcat_slug }}">{{ $category_name }}</a></h2>
        <div class="float-right">
          <a class="btn btn-outline-none" href="{{ URL::to('/templates') }}/subcategory/{{ $subcat_slug }}"> <h2 style="font-weight: 300;font-size: 18px;color:blue;">See More...  <i class='far fa-arrow-alt-circle-right'></i></h2></a>
        </div>
      </div>
      <div class="row p-2 pb-0">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($related['items'] as $featured)
        @php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        @endphp
        <div class="col-lg-3 col-md-4 col-sm-8 mb-grid-gutter pt-0 prod-item">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="width:100%;height:100%;background:#ffffff;">
            <div class="product-thumb">
              <!--@if(Auth::guest()) -->
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>-->
              <!--@endif-->
              <!--@if (Auth::check())-->
              <!--@if($featured->user_id != Auth::user()->id)-->
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i class="dwg-heart"></i></a>-->
              <!--@endif-->
              <!--@endif-->
              <div class="product-card-actions">
                  <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"><i class="dwg-eye"></i></a>-->
              @php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              @endphp
              @if($checkif_purchased == 0)
              @if($featured->free_download == 0)
              @if (Auth::check())
              @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i class="dwg-cart"></i></a>-->
              @endif
              @else
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i class="dwg-cart"></i></a>-->
              @endif
              @else
              @if(Auth::guest())
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="lastLogUrlCheck"><i class="dwg-download"></i></a>-->
              @else
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="dwg-download"></i></a>-->
              @endif
              @endif 
              @endif
              </div>
            
              <!--<a class="product-thumb-overlay"  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>-->
             @if($featured->free_download == 0 )
             <figure>
                    <span class="pro-span">Pro</span> 
                            <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                            @if($featured->preview_video!='')
                                <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                        <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                </video>
                            @else
                                @if($featured->item_preview!='')
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                @else
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                @endif
                            @endif
                            </a>
             </figure>
             @else
             <figure>
                    <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                            <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                            @if($featured->preview_video!='')
                                <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                        <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                </video>
                            @else
                                @if($featured->item_preview!='')
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                @else
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                @endif
                            @endif
                            </a>
             </figure>
             @endif       
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
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
             <div class="card-footer d-flex my-0 mx-2 py-0">
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
				                <div class="ml-auto text-nowrap">
                                 </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                @endif
                                @if (Auth::check())
                                    @if($featured->user_id != Auth::user()->id)
                                        <a href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                    @endif
                                @endif
                                @php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                  @if($featured->free_download == 0)
                                   @if(Auth::user())
                                     @if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                       <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"> <i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @else
                                      <a href="{{ URL::to('/pricing') }}"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     @endif
                                   @else
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   @endif
                  
                                  @else
                                     @if(Auth::guest())
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     @elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                        <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @else
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
                                     @endif
                                  @endif 
                                 @endif
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
        @php $no++; @endphp
	    @endforeach
       </div>
   </section>
   
   
  @if($category_name != 'Illustrations')
    <section class="container-fluid-sm px-5 pb-2">
      <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
        <h2 class="mb-0" style="color:#000000;font-weight: 300;font-size: 24px;">{{ Helper::translation(3087,$translate,'') }} {{ Helper::translation(3034,$translate,'') }}  <a href="{{ URL::to('/user') }}/{{ $featured->username }}">{{ $item['item']->username }} </a></h2>
        <div class="float-right">
          <a class="btn btn-outline-none" href="{{ URL::to('/user') }}/{{ $featured->username }}"> <h2 style="font-weight: 300;font-size: 18px;color:blue;">See More...  <i class='far fa-arrow-alt-circle-right'></i></h2></a>
        </div>
      </div>
      <div class="row p-2">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($author['items'] as $featured)
        @php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        @endphp
        <div class="col-lg-3 col-md-4 col-sm-8 mb-grid-gutter pt-0 prod-item">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="width:100%;height:100%;background:#ffffff;">
            <div class="product-thumb">
              <!--@if(Auth::guest()) -->
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>-->
              <!--@endif-->
              <!--@if (Auth::check())-->
              <!--@if($featured->user_id != Auth::user()->id)-->
              <!--<a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i class="dwg-heart"></i></a>-->
              <!--@endif-->
              <!--@endif-->
              <div class="product-card-actions">
                  <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"><i class="dwg-eye"></i></a>-->
              @php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              @endphp
              @if($checkif_purchased == 0)
              @if($featured->free_download == 0)
              @if (Auth::check())
              @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i class="dwg-cart"></i></a>-->
              @endif
              @else
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i class="dwg-cart"></i></a>-->
              @endif
              @else
              @if(Auth::guest())
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="lastLogUrlCheck"><i class="dwg-download"></i></a>-->
              @else
              <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="dwg-download"></i></a>-->
              @endif
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
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                @else
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                @endif
                            @endif
                            </a>
             </figure>
             @else
             <figure>
                    <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                            <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                            @if($featured->preview_video!='')
                                <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                        <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                </video>
                            @else
                                @if($featured->item_preview!='')
                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                @else
                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                @endif
                            @endif
                            </a>
             </figure>
             @endif       
            </div>
             <div class="card-body pt-0 mx-2 m-0 p-0" >
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
             <div class="card-footer d-flex my-0 mx-2 py-0">
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
				                <div class="ml-auto text-nowrap">
                                   
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                @endif
                                @if (Auth::check())
                                    @if($featured->user_id != Auth::user()->id)
                                        <a href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
                                    @endif
                                @endif
                                @php
                                    $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                  @if($featured->free_download == 0)
                                   @if(Auth::user())
                                     @if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                       <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"> <i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @else
                                      <a href="{{ URL::to('/pricing') }}"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     @endif
                                   @else
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   @endif
                  
                                  @else
                                     @if(Auth::guest())
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                     @elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                        <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @else
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
                                     @endif
                                  @endif 
                                 @endif
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
        @php $no++; @endphp
	    @endforeach
       </div>
   </section>
   @endif

   </section>   
   @else
   @include('not-found')
   @endif
@include('footer')
@include('script')
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
@else
@include('503')
@endif