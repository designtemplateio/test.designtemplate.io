@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>@if($cart_count != 0){{ Helper::translation(2885,$translate,'') }} - {{ $allsettings->site_title }} @else Yearly Subscription today's offer 10%off - {{ $allsettings->site_title }} @endif</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($cart_count != 0) 
<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2885,$translate,'') }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ Helper::translation(2885,$translate,'') }}</h1>
        </div>
      </div>
</div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
      <form action="{{ route('coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
        <div class="row">
          <!-- Content-->
          @if($cart_count != 0)
          <section class="col-lg-7 pt-2 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <!-- Header-->
              <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3">
                <div class="py-1"><a class="btn btn-outline-accent btn-sm" href="{{ url('/templates') }}"><i class="dwg-arrow-left mr-1 ml-n1"></i>{{ Helper::translation(4884,$translate,'') }}</a></div>
                <div class="d-none d-sm-block py-1 font-size-ms">{{ Helper::translation(4887,$translate,'') }} {{ $cart_count }} {{ Helper::translation(4890,$translate,'') }}</div>
                <div class="py-1"><a class="btn btn-outline-danger btn-sm" href="{{ url('/clear-cart') }}" onClick="return confirm('{{ Helper::translation(2892,$translate,'') }}');"><i class="dwg-close font-size-xs mr-1 ml-n1"></i>{{ Helper::translation(4893,$translate,'') }}</a></div>
              </div>
              <!-- Product-->
              @php 
              $subtotal = 0;
              $coupon_code = ""; 
              $new_price = 0;
              @endphp
              @foreach($cart['item'] as $cart)
              <div class="media d-block d-sm-flex align-items-center py-4 border-bottom">
              <a class="d-block position-relative mb-3 mb-sm-0 mr-sm-4 mx-auto cart-img" href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" onClick="return confirm('{{ Helper::translation(2892,$translate,'') }}');">
              @if($cart->item_thumbnail!='')
              <img class="lazy rounded-lg" width="70" height="54" src="{{ Helper::Image_Path($cart->item_thumbnail,'no-image.png') }}"  alt="{{ $cart->item_name }}">
              @else
              <img class="lazy rounded-lg" width="70" height="54" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $cart->item_name }}">
              @endif
              <span class="close-floating" data-toggle="tooltip" title="{{ Helper::translation(5934,$translate,'') }}"><i class="dwg-close"></i></span></a>
                <div class="media-body text-center text-sm-left">
                  <h3 class="h6 product-title mb-2"><a href="{{ url('/item') }}/{{ $cart->item_slug }}">{{ $cart->item_name }}</a></h3>
                  @php
                  if($cart->discount_price != 0)
                  {
                    $price = $cart->discount_price;
                    $new_price += $cart->discount_price;
                    $coupon_code = $cart->coupon_code;
                  }
                  else
                  {
                     $price = $cart->item_price;
                     $new_price += $cart->item_price;
                  }
                  @endphp 
                  <div class="d-inline-block text-accent">
                  @if($cart->discount_price != 0)
                  {{ $allsettings->site_currency_symbol }} {{ $price }}
                  @endif
                  <span @if($cart->discount_price != 0) class="cross-line" @endif>{{ $allsettings->site_currency_symbol }} {{ $cart->item_price }}</span></div><a class="d-inline-block text-accent font-size-ms border-left ml-2 pl-2" href="{{ url('/item') }}/{{ $cart->item_slug }}">{{ $cart->license }} @if($cart->license == 'regular') ( {{ $additional->regular_license }} @if($cart->item_support == 1) {{ Helper::translation(3055,$translate,'') }} @else {{ Helper::translation(6261,$translate,'') }} @endif) @elseif($cart->license == 'extended') ( {{ $additional->extended_license }} @if($cart->item_support == 1) {{ Helper::translation(3055,$translate,'') }} @else {{ Helper::translation(6261,$translate,'') }} @endif) @endif</a>
                </div>
              </div>
              @php $subtotal += $cart->item_price; @endphp
              @endforeach
            </div>
          </section>
          <!-- Sidebar-->
          <aside class="col-lg-5">
            <hr class="d-lg-none">
            <div class="cz-sidebar-static h-100 ml-auto border-left">
              <ul class="list-unstyled font-size-sm pt-3 pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2894,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $subtotal }}</span></li>
                  @php
                  if($addition_settings->site_extra_fee_type == 'fixed')
                  {
                     $extra_fee = $allsettings->site_extra_fee;
                  }
                  else
                  {
                     $extra_fee = ($allsettings->site_extra_fee * $subtotal) / 100;
                  }
                  @endphp
                  @if($extra_fee != 0)
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2901,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $extra_fee }}</span></li>
                  @endif
                  @if($coupon_code != "")
                  @php 
                  $coupon_discount = $subtotal - $new_price;
                  $final = $new_price+$extra_fee; 
                  @endphp 
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2895,$translate,'') }}</span><span class="text-right"><strong class="green">( {{ $coupon_code }} )</strong> <a href="{{ URL::to('/cart/') }}/remove/{{ $coupon_code }}" class="red fs14" onClick="return confirm('{{ Helper::translation(2892,$translate,'') }}');" title="{{ Helper::translation(2889,$translate,'') }}"> <i class="dwg-close font-size-xs"></i> </a></span>{{ $allsettings->site_currency_symbol }} {{ $coupon_discount }}</span></li>
                  @else
                  @php $final = $subtotal+$extra_fee; @endphp
                  @endif
                </ul>
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 my-1 py-1">{{ Helper::translation(2896,$translate,'') }}</h2>
                <h3 class="font-weight-normal">{{ $allsettings->site_currency_symbol }} {{ $final }}</h3>
              </div>
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 my-1 py-1">{{ Helper::translation(2866,$translate,'') }}</h2>
                  <div class="form-group">
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" placeholder="{{ Helper::translation(2866,$translate,'') }}" id="coupon" name="coupon" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                  </div>
                  <button class="btn btn-secondary btn-block" type="submit">{{ Helper::translation(2893,$translate,'') }}</button>
              </div>
              <a class="btn btn-primary btn-shadow btn-block mt-2 clickCheckout" href="javascript:void(0);"><i class="dwg-locked font-size-lg mr-2"></i>{{ Helper::translation(2897,$translate,'') }}</a>
              <?php /*?><div class="text-center pt-2"><small class="text-form text-muted">{{ Helper::translation(4896,$translate,'') }}</small></div><?php */?>
            </div>
          </aside>
          @endif
        </div>
        </form>
      </div>
    </div>
    @else
  
    @endif
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif