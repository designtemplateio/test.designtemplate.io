@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(2899,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2899,$translate,'') }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ Helper::translation(2899,$translate,'') }}</h1>
        </div>
      </div>
    </div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row mx-5 px-5 text-center">
         
          <!-- Content-->
          @if($cart_count != 0)
          <section class="col-lg-6 pt-2 pt-lg-4 pb-4 mb-3">
              <form action="{{ route('checkout') }}" method="POST" class="needs-validation" id="checkout_form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="pt-5 px-4 pr-lg-0 pl-xl-5 mt-5">
             
              <!--Login Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="faq-section section-padding subscribe-details">
		   <div class="container">
              @if($allsettings->display_social_login == 1)
                <div class="py-1 px-3 border-bottom mb-3">
                <div class="row d-flex flex-wrap justify-content-between align-middle">
                    <div class="col-5 input-group-overlay form-group text-center mr-1 ml-3 p-1 py-2" style="border: 1px solid #000000;border-radius: 5px;">
                      <a href="{{ url('/checkout-social-login/google') }}">
                         <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/google.webp" alt="name"/>
                      </a>
                    </div>
                    <div class="col-5 input-group-overlay form-group text-center mr-3 ml-1 p-1 py-2" style="border: 1px solid #000000;border-radius: 5px;">
                       <a href="{{ url('/checkout-social-login/facebook') }}">
                          <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/facebook.webp" alt="name"/>
                       </a>
                    </div>
                </div>
                </div>
              @endif
              <!-- Billing detail-->
              <div class="row pb-4">
                <div class="col-6 form-group">
                  <label for="mc-email">{{ Helper::translation(3011,$translate,'') }}  <span class='text-danger'>*</span></label>
                  <input type="text" id="email" class="form-control" name="email" data-bvalidator="required,email">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="mc-company">{{ Helper::translation(3113,$translate,'') }} <span class='text-danger'>*</span></label>
                  <input type="password" id="password" class="form-control" name="password" data-bvalidator="required,minlen[6]">
                </div>
              </div>
               <div class="text-center">
                    <button class="contactbuttons-first btn" style="color:#fff;" type="submit"><i class="dwg-sign-in mr-2 ml-n21"></i>Sign In</button>
                </div>
           </div>
	    </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login modal-->
              @if (Auth::check())
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              @endif
             <div class="widget mb-3 d-lg-none">
                <h2 class="widget-title">{{ Helper::translation(2900,$translate,'') }}</h2>
                @php 
                $subtotal = 0;
                $order_id = '';
                $item_price = '';
                $item_userid = '';
                $item_user_type = '';
                $commission = 0;
                $vendor_amount = 0;
                $single_price = 0;
                $coupon_code = ""; 
                $new_price = 0;
                @endphp
                @foreach($cart['item'] as $cart)
                <div class="media align-items-center pb-2 border-bottom">
                <a class="d-block mr-2" href="{{ url('/item') }}/{{ $cart->item_slug }}">
                @if($cart->item_thumbnail!='')
                <img class="lazy rounded-sm" width="64" height="49" src="{{ Helper::Image_Path($cart->item_thumbnail,'no-image.png') }}"  alt="{{ $cart->item_name }}"/>
                @else
                <img class="lazy rounded-sm" width="64" height="49" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $cart->item_name }}"/>
                @endif
                </a>
                  <div class="media-body pl-1">
                    <h6 class="widget-product-title"><a href="{{ url('/item') }}/{{ $cart->item_slug }}">{{ $cart->item_name }}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent border-right pr-2 mr-2">{{ $allsettings->site_currency_symbol }}{{ $cart->item_price }}</span><span class="font-size-xs text-muted">{{ $cart->license }}@if($cart->license == 'regular') ({{ $additional->regular_license }}) @elseif($cart->license == 'extended') ({{ $additional->extended_license }}) @endif</span></div>
                  </div>
                </div>
                @php 
                $subtotal += sprintf("%0.2f",$cart->item_price);
                $order_id .= $cart->ord_id.',';
                $item_price .= $cart->item_price.','; 
                $item_userid .= $cart->item_user_id.','; 
                $item_user_type .= $cart->exclusive_author; 
                $amount_price = $subtotal;
                $single_price += $cart->item_price;
                if($cart->discount_price != 0)
                {
                    $price = sprintf("%0.2f",$cart->discount_price);
                    $new_price += sprintf("%0.2f",$cart->discount_price);
                    $coupon_code = $cart->coupon_code;
                }
                else
                {
                   $price = sprintf("%0.2f",$cart->item_price);
                   $new_price += sprintf("%0.2f",$cart->item_price);
                   $coupon_code = "";
                }
				if($item_user_type == 1)
                {
                   $commission +=($price * $allsettings->site_exclusive_commission) / 100;
                }
                else
                {
                   $commission +=($price * $allsettings->site_non_exclusive_commission) / 100;
                }
                @endphp
                @endforeach
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
                <ul class="list-unstyled font-size-sm py-3">
                
                  @if($coupon_code != "")
                  @php 
                  $coupon_discount = sprintf("%0.2f",$subtotal - $new_price);
                  $final = sprintf("%0.2f",$new_price + $extra_fee);
                  $last_price =  sprintf("%0.2f",$new_price);
                  $priceamount = sprintf("%0.2f",$new_price);
                  @endphp
                  <li class="d-flex justify-content-between align-items-center font-size-base"><span class="mr-2">{{ Helper::translation(2895,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency}}{{ $coupon_discount }}</span></li>
                  @else
                  @php 
                  $final = sprintf("%0.2f",$subtotal+$extra_fee); 
                  $last_price =  sprintf("%0.2f",$subtotal);
                  $priceamount = sprintf("%0.2f",$subtotal);
                  @endphp
                  @endif 
                  @if($country_percent != 0)
                  @php
                  $vat_price = sprintf("%0.2f",($single_price * $country_percent) / 100);
                  @endphp
                  <li class="d-flex justify-content-between align-items-center font-size-base"><span class="mr-2">{{ Helper::translation('61e663812887f',$translate,'VAT') }} (%)</span><span class="text-right">{{ $allsettings->site_currency_symbol }}{{ $vat_price }}</span></li>
                  @else
                  @php
                  $vat_price = 0;
                  @endphp
                  @endif 
                  <li class="d-flex justify-content-between align-items-center font-size-base"><span class="mr-2">{{ Helper::translation(2896,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }}{{ $final+$vat_price }}</span></li>
                </ul>
                @php
                $vendor_amount = $priceamount - $commission;
                @endphp
                <input type="hidden" name="order_id" value="{{ rtrim($order_id,',') }}">
                <input type="hidden" name="item_prices" value="{{ base64_encode(rtrim($item_price,',')) }}">
                <input type="hidden" name="item_user_id" value="{{ rtrim($item_userid,',') }}">
                <input type="hidden" name="vat_price" value="{{ base64_encode($vat_price) }}">
                <input type="hidden" name="amount" value="{{ base64_encode($last_price) }}">
                <input type="hidden" name="processing_fee" value="{{ base64_encode($extra_fee) }}">
                <input type="hidden" name="website_url" value="{{ url('/') }}">
                <input type="hidden" name="admin_amount" value="{{ base64_encode($commission) }}">
                <input type="hidden" name="vendor_amount" value="{{ base64_encode($vendor_amount) }}">
                <input type="hidden" name="token" class="token">
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
               </div>
              <div class="accordion mb-2" id="payment-method" role="tablist">
                @php $no = 1; @endphp
                @foreach($get_payment as $payment)
                @php 
                if($payment == '2checkout')
                {
                $payment = 'twocheckout';
                }
                else
                {
                $payment = $payment;
                }
                @endphp
                <div class="text-left">
                  <div class="show" id="{{ $payment }}" data-parent="#payment-method" role="tabpanel">
                  @if($payment == 'paypal')
                    <div class="card-body font-size-sm custom-control custom-radio border mx-2 mt-4 p-2" style="background:#F7F8FD;border-radius:7px;">
                      <span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"><img src="/public/img/paypal.webp" height="400" width="400"></span>
                      
                    </div>
                    @endif
                  @if($payment == 'stripe')
                    <div class="card-body font-size-sm custom-radio custom-control">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio"  value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation(5940,$translate,'') }}</span> - {{ Helper::translation(2903,$translate,'') }}</p>
                      <div class="stripebox mb-3" id="ifYes" style="display:none;">
                        <label for="card-element">{{ Helper::translation(2903,$translate,'') }}</label>
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(4911,$translate,'') }}</button>
                    </div> 
                    @endif
                    @if (Auth::check())
                    @if($payment == 'wallet')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation(5943,$translate,'') }}</span> - ({{ $allsettings->site_currency }} {{ Auth::user()->earnings }})</p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(4914,$translate,'') }}</button>
                    </div>
                    @endif
                    @endif
                    @if($payment == 'twocheckout')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation(4902,$translate,'') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(4917,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'paystack')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation(5946,$translate,'') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(4920,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'localbank')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation(5949,$translate,'') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(4923,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'razorpay')
                    <div class="card-body font-size-sm custom-control custom-radio border mx-2 my-4 p-2" style="background:#F7F8FD;border-radius:7px;">
                      <span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"><img src="/public/img/razorpay.webp" height="400" width="400"></span>
                      <!--<button class="btn btn-primary" type="submit">{{ Helper::translation('61e663ece3b09',$translate,'Checkout with Razorpay') }}</button>-->
                    </div>
                    @endif
                    @if($payment == 'payhere')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b3cd8ac27',$translate,'Payhere') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e663f988601',$translate,'Checkout with Payhere') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payumoney')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b3da527e2',$translate,'Payumoney') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e66402e3368',$translate,'Checkout with Payumoney') }}</button>
                    </div>
                    @endif
                    @if($payment == 'iyzico')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b3e6aeffc',$translate,'Iyzico') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e6640b08583',$translate,'Checkout with Iyzico') }}</button>
                    </div>
                    @endif
                    @if($payment == 'flutterwave')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b3f11e0a6',$translate,'Flutterwave') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e6641460cc4',$translate,'Checkout with Flutterwave') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coingate')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b402f32fd',$translate,'Coingate') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e6641e704b8',$translate,'Checkout with Coingate') }}</button>
                    </div>
                    @endif
                    @if($payment == 'ipay')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b4103dfd2',$translate,'iPay') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('61e66427b4b8a',$translate,'Checkout with iPay') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payfast')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6218b59ab7951',$translate,'PayFast') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6218b5e25058d',$translate,'Checkout with PayFast') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coinpayments')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('6239aeec916f7',$translate,'CoinPayments') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('623c029fc0a46',$translate,'Checkout with CoinPayments') }}</button>
                    </div>
                    @endif
                    @if($payment == 'mercadopago')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('62764b43c0675',$translate,'Mercadopago') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('62764b9431975',$translate,'Checkout with Mercadopago') }}</button>
                    </div>
                    @endif
                    @if($payment == 'sslcommerz')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('62e4d9e62756c',$translate,'SSLCommerz') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('62e4d9fad8b8f',$translate,'Checkout with SSLCommerz') }}</button>
                    </div>
                    @endif
                    @if($payment == 'instamojo')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('62e7ac5690b85',$translate,'Instamojo') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('62e7ac932f34f',$translate,'Checkout with Instamojo') }}</button>
                    </div>
                    @endif
                  </div>
                  
                </div>
                
                @php $no++; @endphp
                @endforeach
                @if(Auth::guest())
                  <button class="btn contactbuttons-first mt-5" style="height: 45px;width:200px;"type="submit">
                    <a class="navbar-tool pr-15 pl-9" href="javascript:void(0)" data-toggle="modal" data-target="#checkoutModal" style="color:#fff;">Pay Now</a>
                    </button>
                    @else
                    <button class="btn btn-primary mt-5" style="height: 45px;width:200px;"type="submit">Pay Now</button>
                    @endif
              </div>
            </div>
            </form>
          </section>
          <aside class="col-lg-6 d-none d-lg-block">
            <hr class="d-lg-none">
            <div class="cz-sidebar-static h-100 ml-auto border-left">
              <div class="widget mb-3">
                <h2 class="widget-title text-center">{{ Helper::translation(2900,$translate,'') }}</h2>
                @php 
                $subtotal = 0;
                $order_id = '';
                $item_price = '';
                $item_userid = '';
                $item_user_type = '';
                $commission = 0;
                $vendor_amount = 0;
                $single_price = 0;
                $coupon_code = ""; 
                $new_price = 0;
                @endphp
                @foreach($mobile['item'] as $cart)
                <div class="media align-items-center">
                <a class="d-block mr-2" href="{{ url('/item') }}/{{ $cart->item_slug }}">
                @if($cart->item_thumbnail!='')
                <img class="lazy rounded-sm" width="64" height="49" src="{{ Helper::Image_Path($cart->item_thumbnail,'no-image.png') }}"  alt="{{ $cart->item_name }}"/>
                @else
                <img class="lazy rounded-sm" width="64" height="49" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $cart->item_name }}"/>
                @endif
                </a>
                  <div class="media-body pl-2 text-left">
                    <h6 class="widget-product-title"><a href="{{ url('/item') }}/{{ $cart->item_slug }}">{{ $cart->item_name }}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent border-right pr-2 mr-2">{{ $allsettings->site_currency_symbol }}{{ $cart->item_price }}</span><span class="font-size-xs text-muted">{{ $cart->license }}@if($cart->license == 'regular') - {{ $additional->regular_license }} @if($cart->item_support == 1) {{ Helper::translation(3055,$translate,'') }} @else {{ Helper::translation(6261,$translate,'') }} @endif @elseif($cart->license == 'extended') - {{ $additional->extended_license }} @if($cart->item_support == 1) {{ Helper::translation(3055,$translate,'') }} @else {{ Helper::translation(6261,$translate,'') }} @endif @endif</span></div>
                  </div>
                </div>
                @php 
                $subtotal += sprintf("%0.2f",$cart->item_price);
                $order_id .= $cart->ord_id.',';
                $item_price .= $cart->item_price.','; 
                $item_userid .= $cart->item_user_id.','; 
                $item_user_type .= $cart->exclusive_author; 
                $amount_price = sprintf("%0.2f",$subtotal);
                $single_price += sprintf("%0.2f",$cart->item_price);
                $subtotal = sprintf("%0.2f",$subtotal);
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
                   $coupon_code = "";
                }
				if($item_user_type == 1)
                {
                   $commission +=($price * $allsettings->site_exclusive_commission) / 100;
                }
                else
                {
                   $commission +=($price * $allsettings->site_non_exclusive_commission) / 100;
                }
                @endphp
                @endforeach
                @php
                if($addition_settings->site_extra_fee_type == 'fixed')
                {
                   $extra_fee = sprintf("%0.2f",$allsettings->site_extra_fee);
                }
                else
                {
                   $extra_fee = sprintf("%0.2f",($allsettings->site_extra_fee * $subtotal) / 100);
                }
                @endphp
                
               </div>
               
                <form action="{{ route('coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
        <div class="row">
          <!-- Content-->
          @if($cart_count != 0)
         
          <!-- Sidebar-->
          
            <hr class="d-lg-none">
            <div class="cz-sidebar-static h-100 ml-auto pt-1">
              <ul class="list-unstyled font-size-sm pt-3 pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2894,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }}{{ $subtotal }}</span></li>
                  @php
                  if($addition_settings->site_extra_fee_type == 'fixed')
                  {
                     $extra_fee = sprintf("%0.2f",$allsettings->site_extra_fee);
                  }
                  else
                  {
                     $extra_fee = sprintf("%0.2f",($allsettings->site_extra_fee * $subtotal) / 100);
                  }
                  @endphp
                  @if($extra_fee != 0)
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2901,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }}{{ $extra_fee }}</span></li>
                  @endif
                  @if($country_percent != 0)
                  @php
                  $vat_price = sprintf("%0.2f",($single_price * $country_percent) / 100);
                  @endphp
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation('61e663812887f',$translate,'VAT') }} (%)</span><span class="text-right">{{ $allsettings->site_currency_symbol }}{{ $vat_price }}</span></li>
                  @else
                  @php
                  $vat_price = 0;
                  @endphp
                  @endif
                  @if($coupon_code != "")
                  @php 
                  $coupon_discount = sprintf("%0.2f",$subtotal - $new_price);
                  $final = sprintf("%0.2f",$new_price+$extra_fee+$vat_price); 
                  @endphp 
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(2895,$translate,'') }}</span><span class="text-right"><strong class="green">( {{ $coupon_code }} )</strong> <a href="{{ URL::to('/cart/') }}/remove/{{ $coupon_code }}" class="red fs14" onClick="return confirm('{{ Helper::translation(2892,$translate,'') }}');" title="{{ Helper::translation(2889,$translate,'') }}"> <i class="dwg-close font-size-xs"></i> </a></span>{{ $allsettings->site_currency_symbol }}{{ $coupon_discount }}</span></li>
                  @else
                  @php $final = sprintf("%0.2f",$subtotal+$extra_fee+$vat_price); @endphp
                  @endif
                </ul>
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 mb-3 pb-1">{{ Helper::translation(2896,$translate,'') }}</h2>
                <h3 class="font-weight-normal">USD {{ $allsettings->site_currency_symbol }}{{ $final }}</h3>
              </div>
              <span class="font-size-xs text-muted cursor-pointer mb-3 pb-1" data-toggle="collapse" data-target="#collapseTags">Do you have coupon code?</span>
              <div class="text-center mt-4 panel-collapse collapse" id="collapseTags">
                  <div class="form-group">
                    <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" placeholder="{{ Helper::translation(2866,$translate,'') }}" id="coupon" name="coupon" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                  </div>
                  <button class="btn btn-primary btn-block" type="submit">{{ Helper::translation(2893,$translate,'') }}</button>
              </div>
              <input type="hidden" value="{{ $item_userid }}" name="item_userid">
            </div>
          
          @endif
        </div>
        </form>
            </div>
          </aside>
          @else
          <section class="col-lg-12 pt-2 pt-lg-4 pb-4 mb-3">
          <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
          <div class="font-size-md">{{ Helper::translation(2898,$translate,'') }}</div>
          </div>
          </div>
          </section>
          @endif
        </div>
      </div>
    </div>
    
    
   
@include('footer')
@include('script')
<!-- stripe code -->
@if(!empty($stripe_publish))
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
$(function () {
'use strict';
		$("#ifYes").hide();
        $('#stripe').click(function(){
            var value = "stripe";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
		
            if ($("#opt1-stripe").is(":checked")) {
                $("#ifYes").show();
var publishable_key = '{{ $stripe_publish_key }}';

// Create a Stripe client.
var stripe = Stripe(publishable_key);
  
// Create an instance of Elements.
var elements = stripe.elements();
  
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
	
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
  
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
  
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
  
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
  
// Handle form submission.
var form = document.getElementById('checkout_form');
form.addEventListener('submit', function(event) {
    //event.preventDefault();
    if ($("#opt1-stripe").is(":checked")) { event.preventDefault(); }
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});
  
// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('checkout_form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
}


} else {
                $("#ifYes").hide();
            }
        });
    });
</script>
@endif
<script type="text/javascript">
$(document).ready(function(){
        'use strict';
		$('#paypal').click(function(){
            var value = "paypal";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
         $('#wallet').click(function(){
            var value = "wallet";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
  
        $('#twocheckout').click(function(){
            var value = "twocheckout";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#paystack').click(function(){
            var value = "paystack";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#localbank').click(function(){
            var value = "localbank";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#razorpay').click(function(){
            var value = "razorpay";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payhere').click(function(){
            var value = "payhere";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payumoney').click(function(){
            var value = "payumoney";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#iyzico').click(function(){
            var value = "iyzico";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#flutterwave').click(function(){
            var value = "flutterwave";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#coingate').click(function(){
            var value = "coingate";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#ipay').click(function(){
            var value = "ipay";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payfast').click(function(){
            var value = "payfast";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#coinpayments').click(function(){
            var value = "coinpayments";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
        $('#mercadopago').click(function(){
            var value = "mercadopago";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		$('#sslcommerz').click(function(){
            var value = "sslcommerz";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		$('#instamojo').click(function(){
            var value = "instamojo";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
});		
</script>
<!-- stripe code -->
</body>
</html>
@else
@include('503')
@endif