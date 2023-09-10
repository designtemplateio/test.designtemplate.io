@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>@php  $currentUrl = url()->current(); @endphp
            @if($currentUrl == 'https://test.designtemplate.io/templates')
             Explore Unique Design Templates - Design Template
            @endif 
</title>
@include('meta')
@include('style')

<style> 
.section-container{max-width: 1920px;}.material-symbols-outlined{color:#fe6076;}</style>
</head>
<body style="background:#eaeaef;">
@include('header')
<!--Section 1-->
<section class="container-fluid px-5 pt-2" style="background:linear-gradient(180deg, rgba(23, 23, 23, 0) 0%, #eaeaef 100%), linear-gradient(270deg, #ef8cbd 0%, #b091ee 70%, #c9ddf8 90%);">
   <div class="container-fluid-sm p-2"> 
        <div class="dropdown d-flex justify-content-between align-item-center">
            <nav aria-label="breadcrumb">
             <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-center">
              <li class="breadcrumb-item text-dark"><a class="text-nowrap" href="{{ URL::to('/') }}" style="color:#000000;"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              @for($i = 1; $i <= count(Request::segments()) && $i!=2; $i++)
              <li class="breadcrumb-item text-nowrap" style="color:#000000;text-transform: capitalize;" aria-current="page"><a class="text-nowrap" href="{{ URL::to('/templates') }}" style="color:#000000;">{{(Request::segment($i))}}</a></li>
              @endfor
              @for($i = 3; $i <= count(Request::segments()); $i++)
              <li class="breadcrumb-item text-nowrap active" style="color:#000000;text-transform: capitalize;" aria-current="page">{{str_replace('-',' ',(Request::segment($i)))}}</li>
              @endfor
             </ol>
            </nav>
        </div>
    </div>

    <div class="container text-center align-items-center justify-content-center">
             <h1 class="heading text-center text-wrap px-2" style="font-size:3rem;">Explore Unique Design Templates</h1>
              <p class="sm-heading text-center py-1 px-3">Elevate your videos with high-quality, easy-to-use After Effects templates. Discover the perfect premiere pro template for your project with intuitive search filters, including everything from intros to transitions, logo reveals, titles, graphic design, motion graphic and more. Subscribe today to unlock and download unlimited templates.</p>
            <a href="{{ URL::to('/pricing') }}"><button class="get_licence m-2 py-1 px-5"> Become a Pro </button></a>
    </div>
</section>
<section class="container section-container px-5 py-2">
    <div class="d-flex justify-content-end align-item-center">
        <button class="btn dropdown-toggle m-0 py-1 px-4 mb-2 justify-content-right" style="background:none;border-color:gray;color:#000000;" type="button" data-toggle="dropdown">Filters<span class="caret"></span></button>
            <ul class="dropdown-menu" >
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="{{ URL::to('/') }}/popular-items">{{ Helper::translation(3181,$translate,'') }}</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="{{ URL::to('/') }}/featured-items">{{ Helper::translation(3033,$translate,'') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-item toggle" href="{{ URL::to('/new-releases') }}">{{ Helper::translation(4842,$translate,'') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-item toggle" href="{{ URL::to('/free-items') }}">{{ Helper::translation(3016,$translate,'') }}</a>
                </li>
                <!--<li class="nav-item dropdown">-->
                <!--    <a class="dropdown-item toggle" href="{{ URL::to('/flash-sale') }}">{{ Helper::translation(2993,$translate,'') }}</a>-->
                <!--</li>-->
            </ul>
    </div>
    <div class="row pt-0">
        <div class="col-lg-2">
          <!-- Sidebar-->
          <form action="{{ route('shop') }}" id="search_form2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="cz-sidebar " id="shop-sidebar" style="background:#f4f4f4;" >
            <div class="cz-sidebar-header">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">{{ Helper::translation(6069,$translate,'') }}</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body" data-simplebar data-simplebar-auto-hide="true">
              <!-- Filter by Brand-->
              <div class="widget cz-filter">
                <!--<h3 class="widget-title">{{ Helper::translation(2937,$translate,'') }}</h3>-->
                <!--@if(count($getWell['type']) != 0)-->
                <!--<ul class="widget-list cz-filter-list list-unstyled pt-1" data-simplebar data-simplebar-auto-hide="false">-->
                <!--  @foreach($getWell['type'] as $value)-->
                  <!--<li class="cz-filter-item d-flex justify-content-between align-items-center">-->
                  <!--  <div class="form-group">-->
                  <!--    <input type="checkbox" class="cat_checkbox"  id="{{ $value->item_type_slug }}" name="item_type[]" value="{{ $value->item_type_slug }}">-->
                  <!--    <label for="{{ $value->item_type_slug }}" class="mb-0 pb-0" style="text-transform: capitalize;">{{ $value->item_type_name }}</label>-->
                  <!--  </div>-->
                  <!--</li>-->
                <!--  @endforeach-->
                <!-- </ul>-->
                <!--@endif -->
              </div>
              <!-- Categories-->
              <div class="widget cz-filter mb-1 pb-1 border-bottom">
                <h3 class="widget-title">{{ Helper::translation(2879,$translate,'') }}</h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" name="product_item" placeholder="{{ Helper::translation(4857,$translate,'') }}">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                </div>
                @if(count($category['view']) != 0)
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 35rem;" data-simplebar data-simplebar-auto-hide="false">
                  @foreach($category['view'] as $cat)
                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox" style="font-size: .8125rem;">
                      <input type="checkbox" class="cat_checkbox" id="{{ $cat->cat_id }}" name="category_names[]" value="{{ $cat->cat_id }}">
                      <label class="cz-filter-item-text" for="{{ $cat->cat_id }}"><b>{{ $cat->category_name }}</b></label>
                      @foreach($cat->subcategory as $sub_category)
                      <br/>
                      <span class="ml-3"><input type="checkbox" class="cat_checkbox" id="{{ $sub_category->subcat_id }}" name="subcategory_names[]" value="{{ 'subcategory_'.$sub_category->subcat_id }}">
                      <label class="cz-filter-item-text" for="{{ $sub_category->subcat_id }}">{{ $sub_category->subcategory_name }}</label>
                      </span>
                      @endforeach
                    </div>
                  </li>
                  @endforeach 
                </ul>
                @endif
              </div>
              <div class="text-center pt-4">
                  <button class="btn contactbuttons-first justify-item-center px-9 py-2" style="color:#fff;" type="submit">{{ Helper::translation(4857,$translate,'') }}</button>
             </div>
              <!-- Filter by Brand-->
           </div>
          </div>
         </form>
        </div>
        <div class="col-lg-10">
            @if($product_item != "")
             <p class="sm-heading mb-0 pb-3">Search Result for "<a style="color:#3F57EF">{{ $product_item }}</a>"</p>
            @endif
          <div class="row equal-height justify-content-center">
             <!-- Product-->

            @php $no = 1; @endphp
            @foreach($itemname as $featured)
            @php
            $price = Helper::price_info($featured->item_flash,$featured->regular_price);
            $count_rating = Helper::count_rating($featured->ratings);
            @endphp
                <div class="col-lg-4 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
                            <div class="product-thumb">
                                <div class="product-card-actions">
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
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="javascript:void(0)"><i class="material-symbols-outlined">download</i></a>
                                    @else
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined">download</i></a>
                                    @endif
                                    @endif 
                                    @endif
                                </div>
                            </div>
                            @if (Auth::check())
                                @if(Auth::user()->user_type == 'admin')
                                    @if($featured->free_download == 0)
                                        <figure>
                                            <a href="templates/1/2/3/4/{{ $featured->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($featured->item_featured == 'yes')
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="templates/{{ $featured->free_download}}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="pro-span">Pro</span></a>
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
                                    @else
                                        <figure>
                                            <a href="templates/1/2/3/4/{{ $featured->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($featured->item_featured == 'yes')
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="templates/{{ $featured->free_download}}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> </a>
                                            <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                             @if($featured->preview_video!='')
                                               <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                                   <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                               </video>
                                             @else  
                                                @if($featured->item_preview!='')
                                                   <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                                @else
                                                    <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                                @endif
                                             @endif
                                            </a>
                                        </figure>
                                    @endif
                                @elseif(Auth::guest())
                                    @if($featured->free_download == 0)
                                        <figure>
                                            <span class="pro-span">Pro</span> 
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
                                    @else
                                        <figure>
                                            <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                              <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                                @if($featured->preview_video!='')
                                                  <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                                  </video>
                                                @else 
                                                    @if($featured->item_preview!='')
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                                    @else
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                                    @endif
                                                @endif
                                              </a>
                                        </figure>
                                    @endif
                                @else
                                    @if($featured->free_download == 0)
                                        <figure>
                                            <span class="pro-span">Pro</span>
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
                                    @else
                                        <figure>
                                            <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                              <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                                  @if($featured->preview_video!='')
                                                    <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                                    </video>
                                                  @else
                                                    @if($featured->item_preview!='')
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                                    @else
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                                    @endif
                                                  @endif
                                              </a>
                                        </figure>
                                    @endif
                                @endif
                                @else
                                @if($featured->free_download == 0)
                                    <figure>
                                        <span class="pro-span">Pro</span>
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
                                @else
                                    <figure>
                                        <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                        <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                          @if($featured->preview_video!='')
                                             <video class="videoPreview" muted poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" loop>
                                                     <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                             </video>
                                          @else
                                            @if($featured->item_preview!='')
                                               <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                            @else
                                                <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                            @endif
                                          @endif
                                      </a>
                                    </figure>
                                @endif
                            @endif 
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
				                </a>
                                <div class="ml-auto text-nowrap">
                                   
                                </div>
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
                                        <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for license</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            @php $no++; @endphp
	        @endforeach
	        
      
	 @if(count($itemname) < 44)       
	        @if(count($itemTags['item']) != 0)
        <div class="container d-flex flex-wrap text-left  py-3 px-0">
         <p class="sm-heading mb-0 pb-3">Similar Search for "<a style="color:#3F57EF">{{ $product_item }}</a>" Templates</p>
        </div>
            @php $no = 1; @endphp
            @foreach($itemTags['item'] as $search)
            @php
            $price = Helper::price_info($search->item_flash,$search->regular_price);
            $count_rating = Helper::count_rating($search->ratings);
            @endphp
                <div class="col-lg-4 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
                            <div class="product-thumb">
                                <div class="product-card-actions">
                                    @php
                                    $checkif_purchased = Helper::if_purchased($search->item_token);
                                    @endphp
                                    @if($checkif_purchased == 0)
                                    @if($search->free_download == 0)
                                    @if (Auth::check())
                                    @if(Auth::user()->id != 1 && $search->user_id != Auth::user()->id)
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $search->item_slug }}"><i class="dwg-cart"></i></a>-->
                                    @endif
                                    @else
                                    <!--<a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/add-to-cart') }}/{{ $search->item_slug }}"><i class="dwg-cart"></i></a>-->
                                    @endif
                                    @else
                                    @if(Auth::guest())
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="javascript:void(0)"><i class="material-symbols-outlined">download</i></a>
                                    @else
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/download/{{ base64_encode($search->item_token) }}"><i class="material-symbols-outlined">download</i></a>
                                    @endif
                                    @endif 
                                    @endif
                                </div>
                            </div>
                            @if (Auth::check())
                                @if(Auth::user()->user_type == 'admin')
                                    @if($search->free_download == 0)
                                        <figure>
                                            <a href="templates/1/2/3/4/{{ $search->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($search->item_featured == 'yes')
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="templates/{{ $search->free_download}}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="pro-span">Pro</span></a>
                                            <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                            @if($search->preview_video!='')
                                               <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                   <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                               </video>
                                            @else   
                                                @if($search->item_preview!='')
                                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                @else
                                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                @endif
                                            @endif   
                                            </a>
                                        </figure>
                                    @else
                                        <figure>
                                            <a href="templates/1/2/3/4/{{ $search->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($search->item_featured == 'yes')
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="templates/{{ $search->free_download}}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> </a>
                                            <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                             @if($search->preview_video!='')
                                               <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                   <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                               </video>
                                             @else  
                                                @if($search->item_preview!='')
                                                   <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                @else
                                                    <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                @endif
                                             @endif
                                            </a>
                                        </figure>
                                    @endif
                                @elseif(Auth::guest())
                                    @if($search->free_download == 0)
                                        <figure>
                                            <span class="pro-span">Pro</span> 
                                              <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                                @if($search->preview_video!='')
                                                  <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                                  </video>
                                                @else 
                                                    @if($search->item_preview!='')
                                                        <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                    @else
                                                        <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                    @endif
                                                @endif
                                              </a>
                                        </figure>
                                    @else
                                        <figure>
                                            <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                              <a  href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                                @if($search->preview_video!='')
                                                  <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                                  </video>
                                                @else 
                                                    @if($search->item_preview!='')
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                    @else
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                    @endif
                                                @endif
                                              </a>
                                        </figure>
                                    @endif
                                @else
                                    @if($search->free_download == 0)
                                        <figure>
                                            <span class="pro-span">Pro</span>
                                               <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                                  @if($search->preview_video!='')
                                                    <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                                    </video>
                                                  @else 
                                                    @if($search->item_preview!='')
                                                        <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                    @else
                                                        <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                    @endif
                                                  @endif    
                                                </a>
                                        </figure>
                                    @else
                                        <figure>
                                            <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                              <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                                  @if($search->preview_video!='')
                                                    <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                                    </video>
                                                  @else
                                                    @if($search->item_preview!='')
                                                       <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                    @else
                                                        <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                    @endif
                                                  @endif
                                              </a>
                                        </figure>
                                    @endif
                                @endif
                                @else
                                @if($search->free_download == 0)
                                    <figure>
                                        <span class="pro-span">Pro</span>
                                        <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                              @if($search->preview_video!='')
                                                    <video class="videoPreview" muted loop poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}">
                                                      <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                                    </video>
                                              @else
                                                @if($search->item_preview!='')
                                                    <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                                @else
                                                    <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                                @endif
                                              @endif
                                        </a>
                                    </figure>
                                @else
                                    <figure>
                                        <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> 
                                        <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                          @if($search->preview_video!='')
                                             <video class="videoPreview" muted poster="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" loop>
                                                     <source src="{{ url('/') }}/storage/app/videos/{{$search->preview_video}}" type="video/mp4">
                                             </video>
                                          @else
                                            @if($search->item_preview!='')
                                               <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($search->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $search->item_name }}">
                                            @else
                                                <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $search->item_name }}">
                                            @endif
                                          @endif
                                      </a>
                                    </figure>
                                @endif
                            @endif 
                            <div class="card-body pt-0 mx-2 m-0 p-0" >
                                <h2 class="product-title mb-0 mt-2 pb-0 align-item-center">
                                    <a href="{{ URL::to('/item') }}/{{ $search->item_slug }}">
                                        @if($addition_settings->item_name_limit != 0)
			                                {{ mb_substr($search->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
		                                @else
			                                {{ $search->item_name }}	  
			                            @endif
			                        </a>
			                    </h2>
			                </div>
			  
                            <div class="card-footer d-flex my-0 mx-2 py-0">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $search->username }}" style="font-size: .8125rem;">
				                    @if($addition_settings->author_name_limit != 0)
				                        By {{ mb_substr($search->username,0,$addition_settings->author_name_limit,'utf-8') }}
				                    @else
				                        By {{ $search->username }}	  
				                    @endif
				                </a>
                                <div class="ml-auto text-nowrap">
                                   
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="material-symbols-outlined">favorite</i></a>
                                @endif
                                @if (Auth::check())
                                    @if($search->user_id != Auth::user()->id)
                                        <a href="{{ url('/item') }}/{{ base64_encode($search->item_id) }}/favorite/{{ base64_encode($search->item_liked) }}"><i class="material-symbols-outlined">favorite</i></a>
                                    @endif
                                @endif
                                @php
                                    $checkif_purchased = Helper::if_purchased($search->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                  @if($search->free_download == 0)
                                   @if(Auth::user())
                                     @if(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                       <a href="{{ URL::to('/item') }}/download/{{ base64_encode($search->item_token) }}"> <i class="material-symbols-outlined pl-2">download</i></a>
                                     @else
                                      <a href="{{ URL::to('/pricing') }}"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     @endif
                                   @else
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class='material-symbols-outlined pl-2'>download</i></a>
                                   @endif
                  
                                  @else
                                     @if(Auth::guest())
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"> <i class='material-symbols-outlined pl-2'>download</i></a>
                                     @elseif(((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed') || Auth::user()->user_type == 'admin')
                                        <a href="{{ URL::to('/item') }}/download/{{ base64_encode($search->item_token) }}"><i class="material-symbols-outlined pl-2">download</i></a>
                                     @else
                                        <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for license</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($search->item_token) }}'>Free Download</a></div><br><div class='text-center'><p>If Free download then read <a href='{{ URL::to('/privacy-policy') }}'>Privacy Policy</a>.</p></div>"><i class="material-symbols-outlined pl-2 cursor-pointer">download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <!--<div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i>{{ $search->item_sold }}<span class="font-size-xs ml-1">{{ Helper::translation(2930,$translate,'') }}</span>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--@if($search->free_download == 0)-->
                                <!--@if($search->item_flash == 1)<del class="price-old">{{ $allsettings->site_currency_symbol }}{{ $search->regular_price }}</del>@endif <span class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ $allsettings->site_currency_symbol }}{{ $price }}</span>-->
                                <!--@else-->
                                <!--<span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate,'') }}</span> -->
                                <!--@endif-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            @php $no++; @endphp
	        @endforeach
               
	    @endif  
    @endif       
           
         @if( count($itemname) == 0 && count($itemTags['item']) == 0)
            @if (Auth::check())
               <div class="text-center">
                 <h2>Sorry, we couldn't find any results for "{{ $product_item }}"</h2> 
                 <h3><a href="#" id="mySizeChart" data-toggle="modal" data-target="#largeModal">Suggest </a> if any...</h3>
               </div>
            @endif
            @if(Auth::guest())
               <div class="text-center">
                 <h2>Sorry, we couldn't find any results for "{{ $product_item }}"</h2>
                 <h3><a href="javascript:void(0)" style="color:#3f57ef;" data-toggle="modal" data-target="#exampleModal">Suggest </a> if any...</h3>
               </div>
            @endif
            <div class="card-deck py-5 text-center">
              <div class="card">
                <div class="text-center py-4">
                </div>
                <div class="card-body">
                     <h5 class="card-title">{{ Helper::translation(3016,$translate,'') }}</h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">Enjoy many free design templates available for you. Grab it now.</p>
                     <a class="btn btn-primary px-1" href="{{ URL::to('/') }}/free-items">See {{ Helper::translation(3016,$translate,'') }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
              </div>
      
              <div class="card">
                <div class="text-center py-4">
                </div>
                <div class="card-body">
                     <h5 class="card-title">{{ Helper::translation(3181,$translate,'') }}</h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">We have most popular items because people trust our templates.</p>
                     <a class="btn btn-primary px-1" href="{{ URL::to('/') }}/popular-items">See {{ Helper::translation(3181,$translate,'') }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
              </div>
              <div class="card">
                 <div class="text-center py-4">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title">{{ Helper::translation(4842,$translate,'') }}</h5>
                     <hr class="hrline">
                     <p class="card-text pt-4 px-1">Fresh and newly design templates are released every hour.</p>
                     <a class="btn btn-primary px-1" href="{{ URL::to('/new-releases') }}">See {{ Helper::translation(4842,$translate,'') }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                  </div>
              </div>
              <div class="card">
                 <div class="text-center py-4">
                 </div>
                 <div class="card-body">
                    <h5 class="card-title">{{ Helper::translation(3033,$translate,'') }}</h5>
                    <hr class="hrline">
                    <p class="card-text pt-4 px-1">The most creative design templates suggested for your project.</p>
                    <a class="btn btn-primary px-1" href="{{ URL::to('/') }}/featured-items">See {{ Helper::translation(3033,$translate,'') }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
                 </div>
              </div>
            </div>
       @endif
        
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
             <a class="dropdown-item" href="{{ URL::to('/contact') }}"> 
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
        <form id="main-form" action="{{ route('suggestion') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
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
              @if(count($getWell['type']) != 0)
              <ul class="list-unstyled">
                @foreach($getWell['type'] as $value)
                <li class="pb-0">
                  <input type="checkbox" class="m-0" id="" name="item_type" value="{{ $value->item_type_slug }}" required>
                  <label class="m-0" for="{{ $value->item_type_slug }}">{{ $value->item_type_name }} </label>
                </li>
                @endforeach
              </ul>
              @endif
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

@include('footer')
@include('script')
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
@else
@include('503')
@endif