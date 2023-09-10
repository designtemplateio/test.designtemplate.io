@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(2974,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body style="background:#eaeaef;"> 
@include('header')
<section class="container-fluid px-5 pt-2" style="background:linear-gradient(180deg, rgba(23, 23, 23, 0) 0%, #eaeaef 100%), linear-gradient(270deg, #ef8cbd 0%, #b091ee 70%, #c9ddf8 90%);">
      <div class="py-2">
       <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2974,$translate,'') }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ ucfirst(str_replace("-"," ",$slug)) }}</h1>
        <div class="m-4">
         <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <p class="sm-heading text-center px-3">{{ $tag_header_desc }}</p>
            </div>
          </div>
         </div>
        </div>
      </div>
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
      <div class="row pt-2 justify-content-center">
        @include('featured-data')
        {{ $items->links('pagination::bootstrap-4') }}
       </div>
</section>
<div class="container text-center align-items-center justify-content-center">
            <p class="sm-heading text-justify py-5 px-3">{{ $tag_footer_desc }}</p>
</div>
    
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif