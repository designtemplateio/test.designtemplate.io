@php $no = 1; @endphp
@foreach($items as $featured)
@php
$price = Helper::price_info($featured->item_flash,$featured->regular_price);
$count_rating = Helper::count_rating($featured->ratings);
@endphp
<div class="col-lg-4 col-md-4 mb-grid-gutter">
          <!-- Product-->
          <div class="equal-col">
             <div class="hover_img">
          <div class="card product-card-alt" style="background:#ffffff;">
            <div class="product-thumb">
              <div class="product-card-actions">
              @php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              @endphp
              </div>
            @if($featured->free_download == 0)
                            <figure>
                                <span class="pro-span">Pro</span> 
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                     @if($featured->preview_video!='')
                                        <video class="videoPreview" muted poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" loop>
                                            <source src="{{ url('/') }}/storage/app/videos/{{$featured->preview_video}}" type="video/mp4">
                                        </video>
                                     @else
                                        @if($featured->item_preview!='')
                                            <img class="lazy_load img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                                        @else
                                            <img class="img-fluid card-img-top" width="60%" height="60%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                                        @endif
                                     @endif
                                  </a>
                            </figure>
                            @else
                            <figure>
                                <span class="free">{{ Helper::translation(2992,$translate,'') }}</span> 
                                  <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                    @if($featured->preview_video!='')
                                        <video class="videoPreview" muted poster="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" loop>
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
           
      
            </div>
              <div class="card-body pt-0 mx-2 m-0 p-0" >
                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                
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
                                         <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Become a Pro </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p><a class='btn btn-danger popup_button' href='{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}'>Free Download</a></div>"><i class="material-symbols-outlined pl-2 cursor-pointer" style='color:#fe6076'>download</i></a>
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
       
@php $no++; @endphp
@endforeach
