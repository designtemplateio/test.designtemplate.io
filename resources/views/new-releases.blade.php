@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(4842,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
 <style>.section-container{max-width: 1920px;}</style>
</head>
<body style="background:#eaeaef;">
@include('header')
<!--Section 1-->
<section class="container-fluid px-5 pt-2" style="background:linear-gradient(180deg, rgba(23, 23, 23, 0) 0%, #eaeaef 100%), linear-gradient(270deg, #ef8cbd 0%, #b091ee 70%, #c9ddf8 90%);">
   <div class="container-fluid-sm p-2"> 
        <div class="dropdown d-flex justify-content-between align-item-center">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"  style="color:#000000;"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"style="color:#000000;">{{ Helper::translation(4842,$translate,'') }}</li>
            </ol>
          </nav>
        </div>
    </div>

    <div class="container text-center align-items-center justify-content-center">
             <h1 class="heading text-center text-wrap px-2" style="font-size:3rem;">Newly  Crafted Designs: Your Passport to Visual Excellence!</h1>
              <p class="sm-heading text-center py-1 px-3">Dive into  our latest design treasures on designtemplate.io! Discover captivating illustrations, dynamic image slideshows, and kinetic typography wonders. Elevate your brand with mesmerizing logo animations in After Effects. Add flair to your projects with light overlays. </p>
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
             
            @include('featured-data')
               {{ $items->links('pagination::bootstrap-4') }}
         </div>  
        </div>
    </div>
</section>
<div class="container text-center align-items-center justify-content-center">
        <p class="sm-heading text-justify py-5 px-3"> View our latest additions to our collection on designtemplate.io! Elevate your projects with captivating illustrations, dynamic image slideshows, and engaging kinetic typography. Explore the art of logo animation in After Effects and add flair with light overlays. Unleash creativity with comic strip templates and master the craft of video editing. Design impactful logos using After Effects, infuse fun with emoji animations, and create stunning collages effortlessly. Stay ahead with our new releases, embracing a world of design possibilities that cater to every visual need. Upgrade your creations and make a lasting impression with these innovative tools and templates.</p>
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
             <a class="dropdown-item" href="{{ URL::to('/contact') }}"> 
             <button class="btn btn-primary" type="submit">Contact Us</button>
             </a>
      </div>
     </div>
</section>
@include('footer')
@include('script')
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