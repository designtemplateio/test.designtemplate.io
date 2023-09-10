@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>@php  $currentUrl = url()->current(); @endphp
            @if($currentUrl == 'https://designtemplate.io/templates')
             Explore Unique Design Templates - Design Template
            @endif 
            @for($i = 3; $i <= count(Request::segments()); $i++)
            Unique {{str_replace('-',' ',(Request::segment($i)))}} Design Templates - Design Template 
            @endfor 
</title>
@include('meta')
@include('style')
<style>
    .section-container{max-width: 1920px;}
    .cat-title{font-size: 45px;text-transform: capitalize;}
</style>
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
            @php
            $currentUrl = url()->current();
            @endphp
           
            @if($currentUrl == 'https://designtemplate.io/templates')
            <!--<i class="material-symbols-outlined download-icon" id="downloadIcon">download</i>-->

             <h1 class="heading cat-title text-center text-wrap px-2">Design Templates For Make Your Video Content Shine!</h1>
              <p class="sm-heading text-center py-1 px-3">Innovative design templates, completely beginner-friendly experiment by exploring free after effects templates, ae free download is available if you are skeptical,  free ae templates to save your day, Try the free slideshow after effects template, our logo animation after Effects, Text animation After effectsTitles   Pro and free youtube intro extensive category of social media and find your niche.</p>
            @endif
            @for($i = 3; $i <= count(Request::segments()); $i++)
              @if((Request::segment($i))=='after-effects')
              <h1 class="heading cat-title text-center text-wrap px-2">Elevate Videos with After Effects Elements & Overlays!</h1>
              <p class="sm-heading text-center py-1 px-3">Add catchy visuals to your upcoming videos, we offer you a vast variety of motion design, motion graphics, animated graphics, lights overlays, twitch overlays, cartoon stickers, emoji animation, transitions after effects, video transitions, whiteboard animations, video overlay, explainer video, lights leak, light leak overlay, film burn overlay </p>
              @elseif((Request::segment($i))=='premiere-pro')
              <h1 class="heading cat-title text-center text-wrap px-2">Unlimited Premiere Pro Templates</h1>
              <p class="sm-heading text-center py-1 px-3">In the world of design and content creation, having the right tools is essential to bring your creative vision to life. "Premiere Pro" is a powerful video editing software that empowers designers and creators on DesignTemplate.io to craft stunning videos and visual masterpieces.</p>
              @elseif((Request::segment($i))=='motion-graphics')
              <h1 class="heading cat-title text-center text-wrap px-2">Magnetic Motion Graphic Overlay Elements</h1>
              <p class="sm-heading text-center py-1 px-3">Motion Graphics are  Transforming Video Editing with Dynamic Motion Design and Overlay elements, In the field of video editing, motion graphics prove to be a  game-changing tool that elevates visual storytelling to new heights. It involves carefully choreographing movement and timing to enhance the overall visual experience.</p>
              @elseif((Request::segment($i))=='graphic-design')
              <h1 class="heading cat-title text-center text-wrap px-2">Explore Unlimited Graphic Designs</h1>
              <p class="sm-heading text-center py-1 px-3">Unlock your creative potential with graphic design. Graphic Design offers the tools and resources to create stunning visuals for print, web, and mobile. we create basic graphic design to branding graphic design templates, also graphic design illustrations, graphic design firms, advertising graphic design, and retro graphic design.</p>
              <!--Subcategory-->
              @elseif((Request::segment($i))=='Elements')
              <h1 class="heading cat-title text-center text-wrap px-2">Elevate videos with After Effects elements & overlays!</h1>
              <p class="sm-heading text-center py-1 px-3">Treasure of creative assets that empower designers, filmmakers, and content creators to infuse magic into their projects.  Ace your next presentation using Twitch overlay and video effects. We will explore the versatility and significance of After Effects Elements and how they can be used to elevate your visual storytelling to new heights.</p>
              @elseif((Request::segment($i))=='Logo-Animation')
              <h1 class="heading cat-title text-center text-wrap px-2">Logo Animation Templates Perfect for Your Brand!</h1>
              <p class="sm-heading text-center py-1 px-3">Looking to uplift your brand's visual identity? Your customizable logo animation After Effect Templates here  to rescue any business logo design! Shoot your shot at our logo animation, logo animation after effects, logo intro animation for pitching clients, and dig into business logos such as real estate logos, and construction logos.</p>
              @elseif((Request::segment($i))=='Titles')
              <h1 class="heading cat-title text-center text-wrap px-2">Stand Out With Creative After Effect Title Templates</h1>
              <p class="sm-heading text-center py-1 px-3">Impress your clients with dynamic options of After Effects Text Animation, and typography that will boost your creative side, Typography font of your choice is available in both free and premium, make a choice today with us at Design Template. Witness trending text animations such as neon text title animation, and grunge paper titles.</p>
              @elseif((Request::segment($i))=='Slideshow')
              <h1 class="heading cat-title text-center text-wrap px-2">Ignite Engagement: Creative Slideshow Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">One-stop destination for all your slideshow needs, discover our dynamic slideshows, right from birthday slideshow to funeral slideshow we have got your back. Customize every aspect of your slideshow, from text animations to color schemes, ensuring it aligns with your brand and motto. </p>
              @elseif((Request::segment($i))=='Opener-&-Intro')
              <h1 class="heading cat-title text-center text-wrap px-2">Grab Attention : Stunning Opener & Intro Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Create stunning opener videos with After Effects. Our templates are designed by professional motion graphics artists and feature beautiful animations that grab attention. The first impression is the last impression that leaves a lasting impact on your audience try our well-crafted openers  to hook your audience and engage their views with impressive intros.</p>
              @elseif((Request::segment($i))=='social-media')
              <h1 class="heading cat-title text-center text-wrap px-2">Handcrafted After Effects Templates for Social Media!</h1>
              <p class="sm-heading text-center py-1 px-3"> Create amazing social media posts with after-effects. our easy to edit social media templates will help you to grow your social media accounts. you can get from our portfolio character animation Instagram story, wedding Instagram story, festivals social media posts, Diwali festival Facebook cover, birthday wishes posts, etc.</p>
              @elseif((Request::segment($i))=='invitation-and-wishes')
              <h1 class="heading cat-title text-center text-wrap px-2">Creative Wedding Invitation & Wishes Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Make it memorable, save the day, and save your date with easily accessible engagement invitations, wedding invitations, birthday invitations, party invitations, baby shower invitations, and housewarming invitations, celebrate your every occasion with us, your celebration is one download away, jump into the trend today and make your occasions talk of the town.</p>
              @elseif((Request::segment($i))=='elements-and-overlays')
              <h1 class="heading cat-title text-center text-wrap px-2">Creative Elements & Overlays Premier Pro Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Save your time and add a professional edge to your videos. With a diverse collection to choose from motion design, animated graphics, light overlays, and video effects, Take your storytelling to the next level and mesmerize your audience with stunning visual effects. Premiere Pro's Elements & Overlays.</p>
              @elseif((Request::segment($i))=='logo-reveal')
              <h1 class="heading cat-title text-center text-wrap px-2">Stunning Logo Animations & Intro Templates for Premier Pro</h1>
              <p class="sm-heading text-center py-1 px-3">Capturing your brand's essence with our professionally designed logo reveal animation, making an animated logo is few seconds away. Say goodbye to static logos and hello to the magic of motion. With Premiere Pro's Logo Reveal, make a lasting impression that leaves your viewers wanting more.</p>
              @elseif((Request::segment($i))=='text-and-title')
              <h1 class="heading cat-title text-center text-wrap px-2">Stand Out with Creative Text & Title Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Enrich your video edits to new heights with dynamic text animations. Text and Title features empower you to add flair and professionalism to every frame. With a user-friendly interface and endless customization options, the spotlight is on you to craft stunning visuals that leave a lasting impact. Premiere Pro's Text and Title.</p>
              @elseif((Request::segment($i))=='video-display-slideshow')
              <h1 class="heading cat-title text-center text-wrap px-2">Engaging Video Display & Slideshow Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Bring your memories to life with Premiere Pro's Slideshow magic! With seamless transitions, animated text, and beautiful effects, your photos and videos will blend smoothly  into a visual masterpieceImpress your audience and relive your cherished memories in a mesmerizing slideshow with Premiere Pro's Slideshow templates. </p>
              @elseif((Request::segment($i))=='invitation-and-greeting')
              <h1 class="heading cat-title text-center text-wrap px-2">Wedding Invitation & Greeting Templates!</h1>
              <p class="sm-heading text-center py-1 px-3">Invitation and greeting personalized with premiere pro! Charm your dear ones with personalized event invitations, be it a kitty party invitation,kitty party invitation , or corporate invitation. Share your joy with the world, and let Premiere Pro turn your heartfelt words into heartfelt messages that leave a lasting impression</p>
              @elseif((Request::segment($i))=='overlay-elements')
              <h1 class="heading cat-title text-center text-wrap px-2">Best Motion Graphic Overlay Elements</h1>
              <p class="sm-heading text-center py-1 px-3">Discover a world of motion graphic elements to help you create stunning motion graphic visuals. Our library includes thousands of high-quality 2D motion graphics and 3D motion graphic assets, perfect for any motion graphic animation project. Get inspired and start creating beautiful element motion graphics today!</p>
              @elseif((Request::segment($i))=='Transitions')
              <h1 class="heading cat-title text-center text-wrap px-2">Top Motion Graphics Transition</h1>
              <p class="sm-heading text-center py-1 px-3">Instantly add motion graphics transition to your videos with our selection of high-quality transition effects. Get creative and customize your graphic transitions after effects with just a few clicks. Improve the production value of your transition projects and create stunning visuals with motion graphic transitions.</p>
              @elseif((Request::segment($i))=='illustrations')
              <h1 class="heading cat-title text-center text-wrap px-2">Stunning Vector Illustrations to Elevate Your Content!</h1>
              <p class="sm-heading text-center py-1 px-3">Imagine and innovate illustrations with us at design template. Join the popular movement of redefined graphics and hop on a variety of vector illustrations, clip art, graphic vector, and premium vector.After Effects Illustrations are a gateway to heaven of animated creativity, where imagination knows no limitation.</p>
              @endif
              <!--Subcategory-->
            @endfor
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
          <div class="row equal-height justify-content-center">
             <!-- Product-->
             
            @if(count($itemData['item']) != 0)
            @php $no = 1; @endphp
            @foreach($itemData['item'] as $featured)

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
                                            <a href="{{ url('/') }}/templates/1/2/3/4/{{ $featured->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($featured->item_featured == 'yes')
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="{{ url('/') }}/templates/{{ $featured->free_download}}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="pro-span">Pro</span></a>
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
                                            <a href="{{ url('/') }}/templates/1/2/3/4/{{ $featured->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($featured->item_featured == 'yes')
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $featured->item_featured}}/{{ $featured->item_token }}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="{{ url('/') }}/templates/{{ $featured->free_download}}/{{ $featured->item_token }}/{{ $featured->item_token }}"> <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> </a>
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
                                <!--<div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i>{{ $featured->item_sold }}<span class="font-size-xs ml-1">{{ Helper::translation(2930,$translate,'') }}</span>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--@if($featured->free_download == 0)-->
                                <!--@if($featured->item_flash == 1)<del class="price-old">{{ $allsettings->site_currency_symbol }}{{ $featured->regular_price }}</del>@endif <span class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ $allsettings->site_currency_symbol }}{{ $price }}</span>-->
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
	        
            @if($method == 'get')
               {{ $itemData['item']->links('pagination::bootstrap-4') }}
            @endif
            
  @endif
       @if($method == 'post')
        @if(count($itemTags['item']) != 0)
        <div class="container d-flex flex-wrap text-left py-5">
         <h2 class="heading_unlimited new mb-0 pb-3">Similar Search for "{{ $product_item }}" Templates</h2>
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
                                            <a href="{{ url('/') }}/templates/1/2/3/4/{{ $search->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($search->item_featured == 'yes')
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="{{ url('/') }}/templates/{{ $search->free_download}}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="pro-span">Pro</span></a>
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
                                            <a href="{{ url('/') }}/templates/1/2/3/4/{{ $search->item_token }}"> <span class="edit-span">Edit</span></a>
                                            @if($search->item_featured == 'yes')
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="done-span">Done</span></a>
                                            @else
                                                <a href="templates/{{ $search->item_featured}}/{{ $search->item_token }}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="featured-span">Per Pro</span></a>
                                            @endif
                                            <a href="{{ url('/') }}/templates/{{ $search->free_download}}/{{ $search->item_token }}/{{ $search->item_token }}"> <span class="free">{{ Helper::translation(2992,$translate,'') }} For Today</span> </a>
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
	   
           
         
        
       </div>  
       </div>
      </div>
    </div>
</section>
<div class="container text-center align-items-center justify-content-center">
          @if($currentUrl == 'https://designtemplate.io/templates')
            <p class="sm-heading text-justify pt-5 px-3">Unlock your potential using the template design provided to you by design template, a wide range of free templates, and video templates that can polish your upcoming project, social media influencers can use Instagram templates to create more engaging stories and Instagram post templates for Instagram posts and reels. You can use it for sending eye-catching E-invites using invitation templates and exploring a range of wedding invitations, and birthday invitations. Youtubers can save ample amounts of time in video editing simply by using free youtube intro.</p>
          @endif
          @for($i = 3; $i <= count(Request::segments()); $i++)
            @if((Request::segment($i))=='after-effects')
            <p class="sm-heading text-justify pt-5 px-3">Illuminate your next design using motion graphics elements, and ace your next presentation using Twitch overlay and video effects ,  Are a You tuber and in the hassle of finding free templates, we have your solution, try your hands on video transitions and whiteboard animations using video overlays will compliment your style</p>
            @elseif((Request::segment($i))=='premiere-pro')
            <p class="sm-heading text-justify pt-5 px-3">At Designtemplate.io, we embrace the boundless creativity of Premiere Pro, offering a buffet of design templates that provide templates for diverse themes and occasions. From captivating slideshow templates, invitation templates, and intro templates, to enchanting Christmas invitation templates our templates infuse magic into your video editing journey. Explore how Premiere Pro takes the art of video editing to new heights, enhancing the user experience on DesignTemplate.io and enabling creators to unleash their full creative potential. Sticker templates can  spice up your posts by adding a funky element to your videos Adobe Premiere Pro,stands as the foundation of transformation in the world of video editing Collage templates to preserve memories, news templates to add a hint of Professionalism to your journalism journey, and fashion templates to polish your social media presence.</p>
            @elseif((Request::segment($i))=='motion-graphics')
            <p class="sm-heading text-justify pt-5 px-3">At the core of motion, graphics resides the art of motion design. Motion designers use their creativity and storytelling skills to craft animations that align with the video's narrative, evoking emotions and leaving a lasting impression on the audience by crafting impactful motion graphics video using funky elements such as cartoon smoke,cartoon fire, cartoon water ETC, Combining the art of design and the appeal of animation, motion graphics enrich videos with captivating video overlays and film overlay,film burn overlay and glitch overlays,stunning effects, and eye-catching overlays</p>
            @elseif((Request::segment($i))=='graphic-design')
            <p class="sm-heading text-justify pt-5 px-3">Bring your creative projects to life with professional graphic design services. Whether you need graphic design logos, branding, website graphic design, or graphic design illustrations, our experienced team of graphic designers can help create stunning visuals that capture your vision.</p>
            <!--Subcategory-->
            @elseif((Request::segment($i))=='Elements')
            <p class="sm-heading text-justify pt-5 px-3">Illuminate your next design using motion graphics elements, Are a You tuber and in the hassle of finding free templates, we have a satisfying  solution, try your hands on video transitions and whiteboard animations using video overlays that will compliment your style.Choose transitions that fit your style, infographics, stickers funky elements to your project, be a game changer in your team, explore the versatile range and synch with your artistic side.Craft captivating, professional-grade content with ease. By incorporating these versatile assets into your projects, you breathe life and brilliance into your visual storytelling.Add catchy visuals to your upcoming videos, we offer you a vast variety of motion design, motion graphics, animated graphics, lights overlays, twitch overlays, cartoon stickers, emoji animation, transitions after effects, video transitions, whiteboard animations, video overlay, explainer video, lights leak, light leak overlay, film burn overlay, handcraft it as per your requirements. </p>
            @elseif((Request::segment($i))=='Logo-Animation')
            <p class="sm-heading text-justify pt-5 px-3">Build your brand identity by making an animated logo using logo animation after effects or a 3D logo and design your business logo and company logo, Gaming You tubers can use gaming logos to be distinct from the crowd, and technology logos can be used by corporate companies, medical logo by medical professionals, popular styles such as a modern logo or minimalist logo could be your next calling, cinematographers extensively use the cinematic logo, retro logo, and abstract logo, have a look at popular amongst the community Christmas logo, tech logo and many more.Unsure about your style? Have a look at our abstract logos today and customize  them at your pace and requirements Establish a powerful presence in the minds of your audience with logo animation, the key to a successful animated logo lies in striking the right balance between creativity, brand alignment, and compelling storytelling, tell your story to the world with our dynamic options of Logo Animations. </p>
            @elseif((Request::segment($i))=='Titles')
            <p class="sm-heading text-justify pt-5 px-3">Bring to light your expressive side using various fonts and typography and text animation, use modern fashion titles to boom your thrift store or ripped grunge title to give it a Gen Z vibe, after effects text animation is one way to improve your presentation skills.Be a  video professional or just starting on your creative journey, our After Effects titles templates will add authenticity  to your videos that will leave a lasting impression on your audience Keep scrolling and find your style today! text animation covers a range of kinetic typography to usage for commercial purposes of titles such as wedding titles and cinematic, all after-effects text effects within easy reach By animating your text, you transform your video projects into memorable and compelling experiences. </p>
            @elseif((Request::segment($i))=='Slideshow')
            <p class="sm-heading text-justify pt-5 px-3">Empower your creative side with the design template, hosting a Christmas party this year? add charisma to the party by adding family photos to our Christmas slideshow and relive childhood memories of Christmas, make your special day extra special using our wedding slideshow, leave a mark behind in your history class, simply click on history slideshow and light up your graduation ceremony by editing the graduation slideshow. Insert image slideshows and easily design photo slideshows according to your needs.Slay your upcoming presentation and impress your audience with design template slideshows By harnessing the power of after effects slideshows, your slideshow becomes an immersive and memorable journey Use premade slideshows covering numerous slideshows of popular industries such as design, education, corporate, fitness, marketing, social media, influencer market, and many more.Create stunning slideshows in minutes with After Effects. Our intuitive tools and templates make it easy to customize text, images, and more to create eye-catching motion graphics for any project. we created a slideshow like the travel after effects template,love slideshow after effects free, parallax slideshow after effects, image slideshow after effects, slideshow animation after effects, slideshow transitions after effects, photo slideshow after effects,3d slideshow after effects, video slideshow template after effects, etc. </p>
            @elseif((Request::segment($i))=='Opener-&-Intro')
            <p class="sm-heading text-justify pt-5 px-3">Glamorous touch can be added to your videos and media with our range of openers and intro. Youtubers can use a Free Youtube intro, Gaming Intro download can be used by gamers,Navigate through intro after effect templates free and options such as  gaming intro, youtube openers, street style opener, and all this one step away just download free intro templates and give it a try Openers that resonate with your audience's interests, and preferences and align with your style, communicate your work effectively. The first impression is the last impression that leaves a lasting impact on your audience try our well-crafted openers  to hook your audience and engage their views with impressive intros.Get ready to wow your audience with an engaging opener video made in After Effects like as an opener after effects template, fast opener after effects, intro logo after effect free, gaming intro template after effects, etc.With After Effects Opener & Intro, you hold the authority to make a remarkable impact on your audience right from the beginning  By using these dynamic tools to create engaging title sequences, you can boost your video content to new levels, leaving a lasting impression on your viewers. Embrace the magic of After Effects Opener & Intro and unleash the full potential of your video creations.Embrace the power of animation and watch your brand soar to new heights, leaving an indelible mark on your audience's hearts and minds.</p>
            @elseif((Request::segment($i))=='social-media')
            <p class="sm-heading text-justify pt-5 px-3">Magnetic Charm is within a click for all professional work such as social media advertising and social media optimization as a  social marketer you can differentiate from the crowd use a range of funky Instagram stories, have a more enhanced presence on popular social media platforms such as LinkedIn, Facebook, Instagram, Twitter.After Effects for social media is a creative powerhouse that gives your brand a competitive edge in the digital landscape In the fast-paced world of social media, capturing the attention of your audience is a challenge worth embracing , we make it easier for you with  one download at a time. Instagram post templates, social media templates, social media post template can polish your grid and set you apart from the competition, template for an Instagram story will define your domain   Browse through free after effects social media templates, if you are an influencer, have a look at Influencer Instagram Story After Effects Template. Food bloggers  can promote their page on Instagram stories using Funky Food Instagram Story Template, and small business owners can give a professional touch to their stories using Special Products Sale Instagram Story.</p>
            @elseif((Request::segment($i))=='invitation-and-wishes')
            <p class="sm-heading text-justify pt-5 px-3">Upscale your visuals with a variety of online invitations, elegant wedding invitations, Christmas party invitations, Indian wedding invitations, wedding card designs, marriage invitation cards, and naming ceremony invitations. have a stunning bachelorette with our bridal shower invitations, make your toddler's 1st birthday invitation card thematic with our dinosaur invitations and coco melon invitation,and  find your next event invitation with us. Customize each message with names, dates, and personal touches, making your recipients feel cherished and valued, the emotional depth is a click away Using After Effects, your invitations and wishes become more than words – they become heartfelt expressions that touch lives.We believe that every moment deserves to be celebrated with style and heart, and our Invitation and Wishes templates are here to help you do just that. Make your events extra special and leave a lasting impression on your loved ones. After Effects Invitation and Wishes pave the way for heartfelt connections and cherished memories. By utilizing these creative tools, you transcend traditional messages and create experiences that linger in the hearts of your loved ones. </p>
            @elseif((Request::segment($i))=='elements-and-overlays')
            <p class="sm-heading text-justify pt-5 px-3">Be passionate with Premiere Pro's Elements & Overlays! , Captivating graphics, eye-catching video overlays, light leak overlay, film burn overlay, twitch overlay, and cartoon stickers. To add vibrancy to your videos simply click on video effects, video transitions, and explainer videos. Animations to make you feel like an animation artist by simply adding funky elements such as emoji animation and whiteboard animations ,  Whether you're a motion graphics expert or just starting your creative journey, these pre-designed visual assets seamlessly integrate into your projects,Your key to unlocking video magic!</p>
            @elseif((Request::segment($i))=='logo-reveal')
            <p class="sm-heading text-justify pt-5 px-3">Make your mark with Premiere Pro's Logo Reveal!  From sleek and professional company logos, and 3Dlogo  to whimsical gaming logos, dynamic modern logos, and technology logos for the booming IT industry, minimalist modern logos our logo reveal templates offer a perfect match for your brand's personality. When creativity meets impact, the brand shines like never before, making your brand shine with retro logos and abstract logos.Give an aesthetic touch to your brand identity with cinematic logo. </p>
            @elseif((Request::segment($i))=='text-and-title')
            <p class="sm-heading text-justify pt-5 px-3">Whether you're crafting an engaging intro or stunning captions, our beginner-friendly interface makes it convenient to create by using professional typography. Don't settle for ordinary text – let Premiere Pro's Text and Title features transform your content into a visual masterpiece simply try kinetic typography, wedding titles, and cinematic titles for your upcoming projects. Elevate your storytelling, captivate your audience, and make every word count with Premiere Pro's Text and Title capabilities. Get ready to make a statement that leaves a lasting impression! </p>
            @elseif((Request::segment($i))=='video-display-slideshow')
            <p class="sm-heading text-justify pt-5 px-3">Relive your memories and put a smile on your family's face this holiday season with our Christmas slideshow or photo slideshow. Customize our wedding slideshow and sent your wishes with a sweet gesture to the bride and groom. Say Happy birthday to your loved ones with the happening birthday slideshows, Say cheers to new beginnings and mark your academic excellence in style with our graduation slideshow. Diverse dynamic slideshows at your service, Click to get started now! </p>
            @elseif((Request::segment($i))=='invitation-and-greeting')
            <p class="sm-heading text-justify pt-5 px-3">Make the bride blush, host a bridal shower, and invite loved ones with bridal shower invitations. Finally, it is happening, you are getting engaged! Invite your family and friends with personalized engagement invitations. We are here to checklist your top wedding task, yes! Save the date with wedding invitations try numerous options of elegant wedding invitations and marriage invitation cards. Hindu wedding card designs are specially crafted, make a choice tailored to cater to your specific requirements.Make your apartment your home by sending personalized housewarming invitations. Say goodbye with retirement party invitations or farewell invitation card.</p>
            @elseif((Request::segment($i))=='overlay-elements')
            <p class="sm-heading text-justify pt-5 px-3">Unlock the power of motion graphics with our library of customizable motion design elements. Choose from hundreds of motion graphic animation templates for logos, transitions, backgrounds, and more,  all designed motion graphics elements to make your motion graphic videos stand out. Get creative with motion graphics today!</p>
            @elseif((Request::segment($i))=='Transitions')
            <p class="sm-heading text-justify pt-5 px-3">Create stunning motion graphics transitions with ease. Choose from a wide selection of motion graphics explainer video templates and customize them with your own colors, text, and effects. Easily share your creations with friends and colleagues for instant feedback. Get the perfect motion graphic transition for your project. </p>
            @elseif((Request::segment($i))=='illustrations')
            <p class="sm-heading text-justify pt-5 px-3">Add visual interest to your content explain complex concepts, or simply make something more lively to look at. By  blending motion into illustrations,  create  unforgettable, immersive visual experiences that grab attention of your audience. Illustrations have the capacity to evoke emotions, create connections, and ignite the imagination of the audience. Illustrations are a modern way to put out the word of your work, illustrations are not merely images they are the portals to a world of creativity and storytelling, bringing magic and meaning to the visual landscape. universal form of expression as it is visual making it an  efficient way to communicate.Find a never-ending stock of free illustrations, clip art  images, clip art designs ,free clip art images, free vector images,From HR professionals to stock traders we go it all and  indulge in stock vectors and free hiring illustrations.</p>
            @endif
            <!--Subcategory-->
          @endfor
</div>
            
<section class="container-fluid">
    <h2 class="heading_unlimited text-center py-4">Frequently asked questions</h2> 
    @if($currentUrl == 'https://designtemplate.io/templates')
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
    @endif
     @for($i = 3; $i <= count(Request::segments()); $i++)
        @if((Request::segment($i))=='after-effects')
        <div class="questions-container">
             <div class="question">
                <button>
                    <span>1 . What is the use of after effect? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Adobe After Effects is a digital visual effect, motion graphics, and compositing software used in the post-production processes of filmmaking, video games, and television production. some templates create in Adobe after effects, are transitions after effects, video templates after effects, slideshow after effects, intro after effects free, ae project files, after effects titles, after effects text animation free, after effects infographic template free, after effects lower thirds templates, after effects animation.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is After Effects best for animation?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Adobe After Effects is an excellent tool for creating animation, particularly for motion graphics and special effects. Its powerful features allow users to create complex after effects animations, visual after effects, and composites that can be used in a wide range of after effects video projects. After Effects software is particularly useful for creating animation that requires a lot of motion and visual effects, such as after effects kinetic typography, after effects explainer videos, and after effects character animations.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . Which Is Better After Effects or Premiere?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After Effects or Premiere Pro is better for you depending on your specific needs and the type of video project you are working on. While both applications are powerful tools in their own right, they excel at different aspects of post-production. some after effects versions after effects cs6, after effects cc, adobe after effects cc, adobe after effects cs6, ae cs6, and after effects cs4.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='premiere-pro')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is Premiere Pro used for? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Adobe Premiere Pro is a video editing software that is used for professional-level video editing and post-production. It is designed to be used in the filmmaking, television production, and video game development. Premiere Pro is a versatile tool that allows users to edit, organize, and output video footage in a variety of formats. some premiere pro versions adobe premiere pro 2020, adobe premiere pro cc 2020, adobe premiere pro 2021, premiere pro 2021, adobe premiere pro cc 2019, adobe premiere pro cc 2018, adobe premiere pro cc 2021, adobe premiere pro 2017, adobe premiere pro 2015. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is Premiere good for beginners? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>While Adobe Premiere Pro is a powerful and professional-level video editing software, it can be a good choice for beginners who are looking to get into video editing. The software has a user-friendly interface that is relatively easy to navigate and understand, making it a good option for those who are new to video editing. premiere pro wedding invitation, premiere pro festival templates, corporate premiere pro templates, fashion premiere pro templates, education premiere pro templates, etc these types of premiere pro templates beginners edit easily.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . Do YouTubers use Premiere?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, many YouTubers use Adobe Premiere Pro for video editing. Premiere Pro is a popular choice among content creators on YouTube because of its advanced video editing features, flexibility, and ability to work with a wide range of video file formats. Additionally, Premiere Pro integrates seamlessly with other Adobe software such as After Effects, Photoshop, and Audition, making it easy for creators to add visual effects, graphics, and audio to their videos.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='motion-graphics')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What motion graphics do?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Motion graphics are digital animations and graphics that create the illusion of motion or rotation, often used in video production, filmmaking, and other forms of multimedia design. They are a combination of visual design, typography, and animation that bring static graphics to life, and can communicate complex ideas and concepts in an engaging and visually appealing way. some examples of motion graphics are 3d motion graphics, motion graphics after effects, 2d motion graphics, motion graphics premiere pro, logo motion graphics, text motion graphics, stop motion graphics, ae motion graphics, and fusion motion graphics.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is motion graphics 2D or 3D?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Motion graphics can be both 2D Motion graphics and 3D Motion graphics. 2D motion graphics are flat, two-dimensional animations that move and change over time. 3D motion graphics, on the other hand, are three-dimensional animations that can be manipulated and viewed from different angles. 2D motion graphics are often used for titles, lower thirds, logos, and other simple animated graphics. 3D motion graphics are often used for more complex animations, such as character animations, product visualizations, and special effects.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What are some examples of motion graphics?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are many examples of motion graphics, and they can be found in a wide range of media, including film, television, online videos, advertisements, and more. Here are a few examples of motion graphics: motion graphics animation, blender motion graphics, adobe motion graphics, motion graphic character, simple motion graphics, motion graphics video, unreal motion graphics, motion graphics for premiere pro, adobe after effects motion graphics, social media motion graphics, c4d motion graphics, photoshop motion graphics, visual effects, and motion graphics, happy birthday motion graphics, infographic motion graphics, etc. </p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='graphic-design')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What graphic design means?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Graphic design is the art and practice of creating visual content that communicates a message or idea to a specific audience. It involves using a combination of typography, images, colors, and other design elements to create a visual representation of a concept or idea. some examples of graphic design are 3d graphic design, graphic design posters, visual graphic design, modern graphic design, visual identity graphic design, creative graphic design, web graphic design, graphic design illustration, wall graphic design, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is a graphic design career good?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>A graphic design career can be a good choice for individuals who have a passion for creativity and design. The field of graphic design offers a wide range of opportunities for those who are interested in using their skills to create visual communication materials. graphic design short courses, graphic design colleage, and the best online graphic design courses are available.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What are the 3 basic products of graphic design?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>The 3 basic products of graphic design are:    1. graphic design website - They can include a variety of graphic design elements, such as logos, typography, images, and interactive features.   2. graphic design logo- Logos are graphic symbols or icons that represent a brand or company.    3. graphic design poster- Posters are large, eye-catching designs that are used to promote events, products, or services.</p>
            </div>
        </div>
        @endif
        <!--Subcategory-->
        @if((Request::segment($i))=='Elements')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is element 3d in after effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Element 3D is a plugin for Adobe After Effects that allows users to import and create 3D models, as well as add 3D textures and lighting effects to their motion graphics and visual effects projects. It was developed by Video Copilot and is widely used in the film and television industry. it is used for creating logo after effects animation, crack element 3d after effects, element license after effects free, element preset after effects, element 3d text after effects, and liquid element after effects.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do I install missing elements in After Effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Installing missing elements in After Effects is simple. Open your file in After Effects, and in the Project window type 'missing' into the search window. Click on Missing Footage, Missing element 3d text after effects, or Missing element after Effects. Click the missing items to relink. Download and install any missing fonts. Follow these easy steps and get back to creating using element 3d in after effects. </p>
            </div>
            <div class="question">
                <button>
                    <span>3 . How do I create a 3D element in After Effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Learn how to create 3D elements in After Effects with tutorials and tips. Discover tricks for working with 3D layers, creating dynamic animations, and more. Get started now to create your own stunning 3D visuals with texture element 3d after effects, crack element 3d after effects, shape element after effects, and liquid element after effects.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='Logo-Animation')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is logo animation after effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>The Logo Animation After Effects template is a fantastic and unique logo reveal that sets a brand apart from the rest. It is easy to customize and create an amazing logo animation, just drop the logo into the timeline and render. you can create 3d logo after effects, simple logo animations after effects, after effects spinning logos, make logo 3d after effects, text logo animations in after effects, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do you animate a logo in after effect?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Logo animation is an engaging way to bring your logo to life. Learn how you can use this technique to capture the attention of viewers and create an unforgettable visual experience. Discover the different types of logo animation such as logo reveal animation after effects, minimal logo reveals after effects, moving logo after effects, 3d logo rotation after effects, and fire logo reveal after effects.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . How do you animate a shape in after effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Learn how to animate a shape in After Effects without the hassle. Follow step-by-step guide and discover the best techniques for creating stunning shapes, logos, and motion graphics. Get ready to bring your designs to life with After Effects! there are various types of logos like 2d logo animation after effects, fire logo reveals after effects free, neon logo reveals after effects, cool logo animation after effects, 3d rotating logo after effects, transition logo after effects, logo morph after effects, etc. </p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='Titles')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is cinematic title in after effect?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>A cinematic title in After Effects is a type of text animation which is commonly used in film, movies, TV shows, and other video productions to introduce a film's title, opening credits, or other important information. there are varoius types of titles created in after effects such as after effects title templates, shareae titles, text presets after effects, after effects title animation, motion title after effects, wedding title after effects project free, callout titles after effects free, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do you make a title in After Effects? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Basic steps of creating titles are below. open after effect, click on create a new composition then add tex layer. customize your text after that apply effects and animation. export your title. in this way you can create diffrent types of titles like as after effects text animation templates, text presets after effects, glitch titles after effects, gold title after effects, title opener template free, artificial intelligence titles after effects, wedding title animation after effects, name title after effects, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What are good after effects title names?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Choosing a good title name for an After Effects project depends on several factors, such as the theme of your project, the type of title you want to create, and your target audience. Here are some suggestions for After Effects title names based on different themes: cinematic title animation in after effects, horror title after effects templates free, glitch title after effects, free titles for after effects, 3d title after effects template free, title opener template free, after effects title animation presets, free adobe after effects, text animation templates, after effects animated titles, etc.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='Slideshow')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . How do I make a slideshow in after effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Learn how to make stunning slideshows with Adobe After Effects. here basic step-by-step guide: open after Effects import your images then create a new composition, set size, duration & frame. go to create a new solid in the layer, and add your images, transition, text, animation & music. now export your slideshow. in this way you can create various styles of slideshow like a corporate slideshow after effects template, wedding slideshow after effects template, photo animation after effects, simple slideshow after effects template free, photo after effects template, love slideshow after effects template, ink slideshow after effects template, memories slideshow after effects, simple slideshow after effects, video slideshow template after effects, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do you make a 3d slideshow in after effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Learn how to make 3D slideshows with Adobe After Effects. here basic step-by-step guide: open after Effects create a new composition, add your images, create a 3D layer then arrange  3D layers & add a camera layer. add your images, transition, text, animation & music. now export your slideshow. in this way you can create various styles of 3D slideshow such as 3d picture gallery slideshow in after effects, 3D slideshow ae, 3d photo slideshow after effects template free, travel after effects template free, 3d slideshow after effects, 3d slideshow after effects template, etc. </p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What is after effects slideshow? </span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After Effects slideshow is a type of video project created using Adobe After Effects software that allows users to create dynamic and visually appealing presentations of images, videos, and text. some examples of after effects slideshow are ink slideshow after effects template, adobe after effects slideshow template, after effects photo collage template, parallax slideshow after effects template, ae slideshow free, and image slideshow after effects.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='Opener-&-Intro')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . Where are after effects intro templates?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Designtemplate.io is home to the best place for After Effects Intro and Opener templates to meet your project's unique needs. All are professionally made, flexible, and designed to help you save time and money. Our collection includes everything from after effects intro templates to star wars intro after effects. news opener after effects template, ink opener after effects template, after effects gaming intro template, intro title after effects, fast opener after effects, Christmas intro template, 3d logo intro after effects template free, vlog intro after effects template are also available. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do I use an After Effects Intro Template?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Get started easily with After Effects Intro Templates. Learn how to customize them and create amazing animations in minutes. From video editing basics to advanced techniques, this guide will help you create stunning visuals for your projects.logo intro template after effects, after effects neon logo intro template, after effects gaming intro template free, dynamic opener after effects template these are some examples of our creation.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What is after effect intro?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>An After Effects intro is a short video sequence that typically appears at the beginning of a video project or presentation. It is used to introduce the topic, set the tone for the project, and grab the viewer's attention. After Effects is a powerful software used to create motion graphics and visual effects, and it is often used to create intro sequences for videos. some examples of intros are after effects marvel intro, cinema intro after effects template, ink opener after effects template, after effects news intro. </p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='social-media')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is After Effects media?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After Effects is a popular video editing software developed by Adobe that allows users to create visual effects and motion graphics for film, video, and online media. While After Effects itself is not a social media platform, its features and capabilities are often used by social media content creators to create engaging and visually appealing content for social media platforms like Instagram, Facebook, and Twitter. Social media content creators may use After Effects to add special effects to videos, create animated text overlays, design custom graphics and logos, and more. After Effects offers a wide range of tools and plugins that can be used to enhance social media content and help it stand out from the crowd.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Why do Youtubers use After Effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Youtubers use After Effects for a variety of reasons. After Effects is a powerful video editing software that allows creators to add special effects, motion graphics, and visual enhancements to their videos. Some of the specific reasons why Youtubers use After Effects include: Adding special effects, Creating animations, Enhancing footage, and Adding text and graphics. Overall, Youtubers use After Effects because it offers a wide range of tools and features that can help them create high-quality, engaging videos.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='invitation-and-wishes')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What are after effects invitation?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After Effects invitations refer to digital invitations or announcements that are created using Adobe After Effects, a professional-level software used for creating motion graphics and visual effects. With After Effects, you can create custom digital invitations that can include animated text, graphics, and special effects to make your invitation stand out and look more engaging.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Can I create an invitation in After Effects?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, you can create an invitation in After Effects. After Effects is a powerful video editing software that can be used to create custom digital invitations with animated text, graphics, and special effects. some examples of invitation templates are wedding invitation after effects, invitation after effects templates, invitation card after effects, WhatsApp wedding invitation templates after effects, free birthday invitation cards for WhatsApp, etc.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='elements-and-overlays')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What are Adobe Premiere Elements?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Adobe Premiere Elements is a good option for those who are new to video editing or those who want a more simplified and user-friendly interface for creating basic video projects. premiere pro elements included premiere pro overlays, color overlay premiere pro, smoke overlay premiere pro, glitch overlay premiere pro, film burn overlay premiere pro, PowerDirector premiere elements, etc.Is Adobe Premiere Elements good for YouTube videos?</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is Adobe Premiere Elements good for YouTube videos?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, Adobe Premiere Elements can be a good choice for creating YouTube videos, especially for those who are just starting out or have limited video editing experience. Premiere Elements offers a range of video editing tools and features that can help you create professional-looking YouTube videos, such as trimming, cutting, merging, and rearranging clips, adding transitions, applying color correction and effects, and adding titles and graphics.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='logo-reveal')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . How do I make a logo reveal video?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>To make a logo reveal video in Premiere Pro, you can follow these steps: Open Premiere Pro and create a new project. import your logo after that add animation, text, effects & music. export your video. These are the basic steps to make a logo reveal video in Premiere Pro. some examples of logo reveal are simple logo reveal premiere pro, premiere logo reveal, adobe premiere logo reveal, logo reveals in premiere pro, etc. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What is premiere pro logo reveal?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Premiere Pro logo reveal refers to the process of creating a video that reveals a logo or brand identity in a creative and engaging way using Adobe Premiere Pro, a professional video editing software. A logo reveal video can be used for various purposes, such as video intros, social media ads, corporate videos, and more. The process typically involves importing a logo file into Premiere Pro, adding effects and animations to reveal the logo in a creative way, and adding music and sound effects to enhance the impact of the video. </p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='text-and-title')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . How do you add a title in Premiere Pro?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>You can create titles in premiere pro by selecting "New Item" in the "File" menu and choosing "Title". This will open the "Title" dialog box where you can create a new title with your own text and design. insert text in premiere pro or add text in premiere pro. our some titles add text premiere pro, scrolling text premiere pro, transparent text premiere pro, cinematic title premiere pro, glitch title premiere pro, etc. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Does Premiere Pro have title templates?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, Premiere Pro has title templates that you can use to create professional-looking titles for your videos.  Premiere Pro comes with a library of built-in title templates that you can access from the Essential Graphics panel. To use a template, simply drag and drop premiere pro text effects into your sequence, and then customize the typewriter effect premiere pro preset. You can also download the title motion graphics premiere pro templates. Using title templates can save you time and effort when creating titles for your videos, as you don't have to start from scratch every time.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='video-display-slideshow')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . Does Premiere Pro have slideshow?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, Adobe Premiere Pro does have a slideshow feature. You can use the software to create a slideshow by importing your photos, arranging them in the order you want, and adding transitions, music, and other effects to create a dynamic presentation. you can create a slideshow in premiere pro like a birthday slideshow template premiere pro free, shareae premiere pro slideshow, dynamic slideshow premiere pro free, premiere rush slideshow, slide show premiere pro, etc. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How to make a slideshow in Premiere?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>To make a slideshow in Premiere Pro, follow these steps: Create a new project and import your photos, and Add transitions, music, visual effects, and text titles. export your slideshow. These are the basic steps to make a slideshow in Premiere Pro. adobe premiere slideshow template, photo slideshow template premiere pro, funeral slideshow template premiere pro free, premiere pro photo montage template free, premiere pro picture slideshow template free, slideshow preset premiere pro,  you can create these types of slideshows in premiere pro software.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='invitation-and-greeting')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . How do I download free templates for Premiere Pro?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>design template is the best online invitation video site to download free Premiere Pro & after effects templates. Choose free Premiere Pro templates. All our Elements are royalty-free, so you can use them in multiple projects across any media worldwide. some premiere pro free download templates premiere pro invitation templates, premiere pro wedding invitations, wedding invitations, baby shower invitations, wedding invitation cards, birthday invitations, house warming invitations, new year greeting cards, Halloween party invitations, etc.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How do I make an invitation video?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>To make an invitation video in Premiere Pro, you can follow these steps: Start by creating a new project in Premiere Pro. Import the footage and audio, Drag the footage and audio clips into the timeline, Add text to your invitation video, and Use the Motion controls to animate your text, such as moving it across the screen or zooming in and out. Add any additional graphics or effects to your invitation video, Export your video, Save your final invitation video, and share it with your guests! some templates of our creations are Indian wedding invitation video templates premiere pro free, wedding invitation premiere pro, baby shower invitations, house warming invitation, happy birthday greeting card, etc. </p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='overlay-elements')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What are the elements of motion graphics?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>The elements of motion graphics are the building blocks that make up a moving visual graphic design. Here are some of the key elements of motion graphics: Motion graphics often use text to convey a message, Motion graphics can incorporate various types of graphic elements such as icons, symbols, logos, or other visual elements, Motion graphics rely heavily on animation to create movement and visual interest. Color can be used to evoke emotions, create contrast, and add visual interest to motion graphics.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What are the 3 types of motion graphics?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>There are several types of motion graphics, but here are three common categories: 2D Motion Graphics: 2D motion graphics are the most common type of motion graphics elements. 3D Motion Graphics: 3D motion graphics use three-dimensional objects and environments to create animations that move and rotate in three-dimensional space. Stock Motion Graphics: stock motion graphics are a valuable resource for video creators and designers looking to enhance their visual content quickly and easily.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='Transitions')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is mean motion graphic transition?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>A motion graphic transition is a type of visual effect used to smoothly move between two or more scenes or elements in a video or animation. It can be used to create a seamless transition between different shots, sections, or elements in a project. like motion graphics transitions after effects, motion graphics transition premiere pro, etc, these types of transitions are used. </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What are the motion graphic transition examples?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Here are some examples of motion graphics transitions: glitch transition, motion graphics explainer video, conclusion transitions, paragraph transitions, transitions and motion graphics for premiere pro, freemotion graphic transition, explosive particle transitions for motion graphics. These are just a few examples of the many motion graphics transitions that can be used to create visual interest and continuity in a video or animation project.</p>
            </div>
        </div>
        @endif
        @if((Request::segment($i))=='illustrations')
        <div class="questions-container">
            <div class="question">
                <button>
                    <span>1 . What is graphic design illustration?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Graphic design illustration is a form of visual communication that combines graphic design and illustration to convey a message or idea to the viewer. It is the process of creating images, designs, and visual representations using various techniques, including digital or traditional methods such as drawing, painting, or collage.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Is there illustration in graphic design?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes, illustration is often an integral part of graphic design. While graphic design and illustration are two distinct disciplines, they frequently overlap in practice, and many graphic design projects incorporate some form of illustration. Illustration can be used to communicate complex ideas, evoke emotions, and add visual interest to a design. It can take many forms, including hand-drawn sketches, digital illustrations, vector graphics, and more.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What is graphic illustration example?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>A graphic illustration example might include a poster for a music festival that incorporates a variety of graphic design elements and illustrations. Another example of graphic illustration could be a children's book that incorporates illustrations into the design to help tell the story. Graphic illustrations are often used on book covers. Graphic illustrations are commonly used in packaging design. Graphic illustrations can be used in advertising campaigns. Graphic illustrations are used on social media platforms to create visually appealing posts.</p>
            </div>
        </div>
        @endif
     @endfor
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
    const downloadIcon = document.getElementById('downloadIcon');

    downloadIcon.addEventListener('click', function() {
        // Change the color when the icon is clicked
        downloadIcon.style.color = '#000'; // Change to the desired color
    });
</script>
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