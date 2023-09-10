@php $no = 1; @endphp
@foreach($items as $featured)
@php
$price = Helper::price_info($featured->item_flash,$featured->regular_price);
$count_rating = Helper::count_rating($featured->ratings);
@endphp
 <div class="col-lg-3 col-md-4 mb-grid-gutter">
                        <!-- Product-->
                  <div class="equal-col">
                    <div class="hover_img">
                        <div class="card product-card-alt" style="background:#fffff;">
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
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base lastLogUrlCheck" href="javascript:void(0)"><i class="material-symbols-outlined">download</i></a>
                                    @else
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined">download</i></a>
                                    @endif
                                    @endif 
                                    @endif
                                </div>
                            </div>
                            <!--<a class="product-thumb-overlay"  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>-->
                            @if($featured->free_download == 0)
                            <figure>
                                <span class="pro-span">Pro</span> 
                                  <a class="product-thumb-overlay"  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($featured->item_preview!='')
                                            <img class="lazy_load img-fluid card-img-top" width="90%" height="90%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                  </a>
                            </figure>
                            @else
                            <figure>
                                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                        @if($featured->item_preview!='')
                                           <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="lazy img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                  </a>
                            </figure>
                            @endif
                
                <!--<img class="lazy_load" src="{{ url('/') }}/public/img/no-image.png" data-src="{{ url('/') }}/public/img/review1.png" data-srcset="image-to-lazy-load-2x.jpg 2x, {{ url('/') }}/public/img/review1.png" alt="I'm an image!">-->
                            <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                <!--<div class="text-muted" style="font-size:10px;"><a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $featured->item_type }}">{{ str_replace('-',' ',$featured->item_type) }}</a></div>-->
                                <!--<div class="star-rating">-->
                                <!--    @if($count_rating == 0)-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    @endif-->
                                <!--    @if($count_rating == 1)-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    @endif-->
                                <!--    @if($count_rating == 2)-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    @endif-->
                                <!--    @if($count_rating == 3)-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    @endif-->
                                <!--    @if($count_rating == 4)-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star"></i>-->
                                <!--    @endif-->
                                <!--    @if($count_rating == 5)-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    <i class="sr-star dwg-star-filled active"></i>-->
                                <!--    @endif-->
                                <!--</div>-->
                            </div>
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
                                    <!--<div class="blog-entry-author-ava">-->
                                    <!--@if($featured->user_photo!='')-->
                                    <!--<img class="lazy" width="26" height="26" src="{{ url('/') }}/public/storage/users/{{ $featured->user_photo }}"  alt="{{ $featured->username }}">-->
                                    <!--@else-->
                                    <!--<img class="lazy" width="26" height="26" src="{{ url('/') }}/public/img/no-user.png"  alt="{{ $featured->username }}">-->
                                    <!--@endif-->
                                    <!--</div>-->
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
				                <!--<i class="fa fa-check-circle px-1" style="color:#4734CB;"></i>-->
                                <div class="ml-auto text-nowrap">
                                    <!--<i class="dwg-time"></i> {{ date('d M Y',strtotime($featured->updated_item)) }}-->
                                </div>
                                <div class="float-right text-center" style="font-size:20px;">
                                @if(Auth::guest()) 
                                        <a href="javascript:void(0)" class="lastLogUrlCheck"><i class="material-symbols-outlined" style='color:#fe6076'>favorite</i></a>
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
                                      <a href="{{ URL::to('/pricing') }}"> <i class='material-symbols-outlined pl-2' style='color:#fe6076'>download</i></a>
                                   @endif
                  
                                  @else
                                     @if(Auth::guest())
                                       <a href="javascript:void(0)" class="lastLogUrlCheck"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @else
                                       <a href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i class="material-symbols-outlined pl-2" style='color:#fe6076'>download</i></a>
                                     @endif
                                  @endif 
                                 @endif
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <!--<div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i>{{ $featured->item_sold }}<span class="font-size-xs ml-1">{{ Helper::translation(2930,$translate,'') }}</span>-->
                                <!--</div>-->
                                <div>
                                <!--@if($featured->free_download == 0)-->
                                <!--@if($featured->item_flash == 1)<del class="price-old">{{ $allsettings->site_currency_symbol }}{{ $featured->regular_price }}</del>@endif <span class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ $allsettings->site_currency_symbol }}{{ $price }}</span>-->
                                <!--@else-->
                                <!--<span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate,'') }}</span> -->
                                <!--@endif-->
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
@php $no++; @endphp
@endforeach
