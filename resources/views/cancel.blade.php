@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - {{ Helper::translation(2882,$translate,'') }}</title>
@include('meta')
@include('style')
<style>
      body {
        text-align: center;
      }
    </style>
</head>
<body>
@include('header')
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2882,$translate,'') }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ Helper::translation(2883,$translate,'') }}</h1>
        </div>
      </div>
      </div>
    </section>
<!--<div class="container py-5 mt-md-2 mb-2">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200" align="center">-->
<!--          <h4>{{ Helper::translation(2884,$translate,'') }}</h4>-->
<!--         </div>-->
<!--      </div>-->
<!--    </div>-->
    <div class="cancel-card">
      <div class="payment-card">
        <i class="fa fa-times cancel-icon" aria-hidden="true"></i>
      </div>
        <h1 class="cancel-heading">Failed</h1> 
        <p class="cancel-para">Sorry!!<br>{{ Helper::translation(2884,$translate,'') }}<br> Please try again...</p>
      </div>
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif