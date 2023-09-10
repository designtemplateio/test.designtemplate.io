@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(6135,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@php  $currentUrl = URL::previous(); $clientIP = request()->ip();
 @endphp
<?php
function getIP($ipadr) {
    if(isset($ipadr)) {
        $details = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ipadr);
        $json = json_decode($details);
        if($json->geoplugin_status == '200')
            return $json->geoplugin_countryName;
        else
            return 'Error getting country name.';
    } else {
        return 'IP is empty.';
    }
}
$country=getIP($clientIP);
?>
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
         <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(6135,$translate,'') }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ Helper::translation(6135,$translate,'') }}</h1>
        </div>
      </div>
      </div>
    </section>
<div class="faq-section section-padding subscribe-details" data-aos="fade-up" data-aos-delay="200">
		<div class="container py-5 mt-md-2 mb-2">
			<div class="row">
         <div class="col-sm-3 col-md-3 col-lg-3 subscribe-details">
            <div class="mb-3">
                <h4 class="mb-3">{{ Helper::translation(6138,$translate,'') }}</h4>
                
                @foreach($subscription['view'] as $subscription)
                
                <div class="card-body">
                    <p><label>{{ Helper::translation(6141,$translate,'') }} :</label> {{ $subscr['view']->subscr_name }}</p>
                    @if($country == 'India')
                      @if($subscr['view']->subscr_name == "Monthly")
                      <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}1299</p>
                      @else
                      <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}7788</p>
                      @endif
                    @else
                    <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}{{ $subscription->subscr_price }}</p>
                    @endif
                    <p><label>{{ Helper::translation(6144,$translate,'') }} :</label> {{ $subscr['view']->subscr_duration }}</p>
                    @if($subscr['view']->subscr_item_level == 'limited')
                    <!--<p><label>{{ Helper::translation(6147,$translate,'') }} :</label> {{ $subscr['view']->subscr_item }} {{ Helper::translation(5442,$translate,'')}}</p>-->
                    @else
                    <!--<p><label>{{ Helper::translation(6147,$translate,'') }} :</label> {{ Helper::translation(6165,$translate,'') }}</p>-->
                    @endif
                    @if($subscr['view']->subscr_space_level == 'limited')
                    <!--<p><label>{{ Helper::translation(6150,$translate,'') }} :</label> {{ $subscr['view']->subscr_space }}{{ $subscr['view']->subscr_space_type }}</p>-->
                    @else
                    <!--<p><label>{{ Helper::translation(6150,$translate,'') }} :</label> {{ Helper::translation(6165,$translate,'') }}</p>-->
                    @endif
                            @if(session()->has('coupon_data'))
                                 @php $no = 1; @endphp
                                    @foreach($couponValue as $value)
                                    <input type="hidden" name="couponvalues" value="{{ $value }}">
                                 @php $no++; @endphp
                                    @endforeach
                            @else
                            @endif
                          
                </div>
                @endforeach
                @if($country == 'India')
          @if($subscr['view']->subscr_name == "Monthly")
                @php  $subscription->subscr_price = $convert1;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @else
                @php  $subscription->subscr_price = $convert2;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @endif
       @endif
            </div>
        </div>
     
         <div class="col-sm-5 col-md-5 col-lg-5 text-center">
         <form action="{{ route('coupon_sub') }}" class="setting_form" id="coupon_sub_form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
            @php $sid = $subscription->subscr_id @endphp
             @if(session()->has('coupon_data'))
             @php $a=str_replace('"', '', json_encode($couponValue['subscr_id'])); @endphp
             @if($a == $sid)
             <div class="row">
             <div class="col-sm-6 col-md-6 col-lg-6">
                 <div class="text-center my-1 py-1">
                    @if($country == 'India')
                      <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">{{ Helper::translation(2896,$translate,'') }} : {{ $allsettings->site_currency_symbol }}{{str_replace('"', '', json_encode($couponValue['dis_convert2']))}} <i class="fas fa-check" style="color:green;"></i></h3>
                    @else
                    <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">{{ Helper::translation(2896,$translate,'') }} : {{ $allsettings->site_currency_symbol }}{{str_replace('"', '', json_encode($couponValue['discount_price']))}} <i class="fas fa-check" style="color:green;"></i></h3>
                    @endif
                  </div>
                <div class="text-center mb-4 pb-3">
                <h2 class="h6 mb-3 pb-1">Change the {{ Helper::translation(2866,$translate,'') }}</h2>
                  <div class="form-group">
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="text" placeholder="Enter {{ Helper::translation(2866,$translate,'') }}" id="coupon_sub" name="coupon_sub" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye "></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                    <input type="hidden" name="user_subscr_id" value="{{  $subscription->subscr_id }}">
                    <input type="hidden" name="user_subscr_price" value="{{ $subscription->subscr_price }}">
                  </div>
                  <button class="btn btn-primary btn-block" type="submit">{{ Helper::translation(2893,$translate,'') }}</button>
                </div>
               </div> 
               <div class="col-sm-6 col-md-6 col-lg-6"> 
                    <div class="discount-badges"><br>
                        <p>
                            <span class="fourthLine">Coupon Code Added Successfully...</span><br>
                            <span class="firstLine">YOU GET</span><br>
                            <span class="secondLine">{{ $allsettings->site_currency_symbol }}{{str_replace('"', '', json_encode($couponValue['dis_convert1']))}}</span><br> 
                            <span class="thirdLine">DISCOUNT</span><br>        
                        </p> 
                    </div>
               </div> 
              </div>
             @else
             <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="text-center mb-4 pb-3 border-bottom">
                   <h2 class="h6 mb-1 pb-1">{{ Helper::translation(2896,$translate,'') }}</h2>
                   @if($country == 'India')
                   @if($subscr['view']->subscr_name == "Monthly")
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">INR {{ $allsettings->site_currency_symbol }} 1299</h3>
                   @else
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">INR {{ $allsettings->site_currency_symbol }} 7788</h3>
                   @endif
                   @else
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">USD {{ $allsettings->site_currency_symbol }}{{ $subscription->subscr_price }}</h3>
                   @endif
                </div>
                <div class="text-center mb-4 pb-3">
                <span class="font-size-xs text-muted cursor-pointer mb-3 pb-1" data-toggle="collapse" data-target="#collapseTags">Do you have coupon code?</span>
              <div class="text-center mt-4 panel-collapse collapse" id="collapseTags">
                  <div class="form-group">
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" placeholder="Enter {{ Helper::translation(2866,$translate,'') }}" id="coupon_sub" name="coupon_sub" required>
                     <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                    <input type="hidden" name="user_subscr_id" value="{{ $subscription->subscr_id }}">
                    <input type="hidden" name="user_subscr_price" value="{{ $subscription->subscr_price }}">
                  </div>
                  <button class="btn btn-primary btn-block" type="submit">{{ Helper::translation(2893,$translate,'') }}</button>
                </div>
                </div>
                </div>
             @endif
             @else
             <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="text-center mb-4 pb-3 border-bottom">
                   <h2 class="h6 mb-1 pb-1">{{ Helper::translation(2896,$translate,'') }}</h2>
                   @if($country == 'India')
                   @if($subscr['view']->subscr_name == "Monthly")
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">INR {{ $allsettings->site_currency_symbol }} 1299</h3>
                   @else
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">INR {{ $allsettings->site_currency_symbol }} 7788</h3>
                   @endif
                   @else
                   <h3 class="font-weight-normal" id="subscr_value" name="subscr_value">USD {{ $allsettings->site_currency_symbol }}{{ $subscription->subscr_price }}</h3>
                   @endif
                </div>
                <div class="text-center mb-4 pb-3">
                <span class="font-size-xs text-muted cursor-pointer mb-3 pb-1" data-toggle="collapse" data-target="#collapseTags">Do you have coupon code?</span>
              <div class="text-center mt-4 panel-collapse collapse" id="collapseTags">
                  <div class="form-group">
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" placeholder="Enter {{ Helper::translation(2866,$translate,'') }}" id="coupon_sub" name="coupon_sub" required>
                     <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                    <input type="hidden" name="user_subscr_id" value="{{ $subscription->subscr_id }}">
                    <input type="hidden" name="user_subscr_price" value="{{ $subscription->subscr_price }}">
                  </div>
                  <button class="btn btn-primary btn-block" type="submit">{{ Helper::translation(2893,$translate,'') }}</button>
                </div>
                </div>
                </div>
             @endif
             
          </form>
          </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div>
                <h4 class="mb-3">{{ Helper::translation(2902,$translate,'') }}</h4>
                <div class="card-body">
                    <form action="{{ route('confirm-subscription') }}" class="needs-validation" id="checkout_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    @php $no = 1; @endphp
                        @foreach($get_payment as $payment)
                        <div class="lebel border my-3 p-2" style="background:#F7F8FD;">
                           <input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="auto-width" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required">
                          @if($payment == "razorpay")
                          <img src="/public/img/razorpay.webp" height="350" width="350">
                          @else
                          <img src="/public/img/paypal.webp" height="350" width="350">
                         @endif
                        </div>
                        @if($payment == 'stripe')
                                <div class="row" id="ifYes" style="display:none;">
                                    <div class="col-md-12 mb-3">
                                        <div class="stripebox"> 
                                        <label for="card-element">{{ Helper::translation(2903,$translate,'') }}</label>
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                        </div>
                                    </div>    
                                </div>        
                                @endif
                                @php $no++; @endphp
                                @endforeach
                                <input type="hidden" name="website_url" value="{{ url('/') }}">
                                <input type="hidden" name="user_subscr_id" value="{{ $subscr['view']->subscr_id }}">
                                 @if(session()->has('coupon_data'))
                                 @php 
                                   $price=str_replace('"', '', json_encode($couponValue['discount_price']));
                                   $coupon=str_replace('"', '', json_encode($couponValue['coupon_code']));
                                   $discount=str_replace('"', '', json_encode($couponValue['discount']))
                                 @endphp
                                  <input type="hidden" name="user_subscr_price" value=" {{ $price }}">
                                  <input type="hidden" name="user_coupon_code" value=" {{ $coupon}}">
                                  <input type="hidden" name="user_subscr_discount_value" value=" {{ $discount }}">
                                 @else
                                  <input type="hidden" name="user_subscr_price" value="{{ $subscr['view']->subscr_price }}">
                                  <input type="hidden" name="user_coupon_code" value="">
                                  <input type="hidden" name="user_subscr_discount_value" value="0">
                                 @endif
                                <input type="hidden" name="user_subscr_type" value="{{ $subscr['view']->subscr_name }}">
                                <input type="hidden" name="user_subscr_date" value="{{ $subscr['view']->subscr_duration }}">
                                <input type="hidden" name="user_subscr_item_level" value="{{ $subscr['view']->subscr_item_level }}">
                                <input type="hidden" name="user_subscr_item" value="{{ $subscr['view']->subscr_item }}">
                                <input type="hidden" name="user_subscr_download_item" value="{{ $subscr['view']->subscr_download_item }}">
                                <input type="hidden" name="user_subscr_space_level" value="{{ $subscr['view']->subscr_space_level }}">
                                <input type="hidden" name="user_subscr_space" value="{{ $subscr['view']->subscr_space }}">
                                <input type="hidden" name="user_subscr_space_type" value="{{ $subscr['view']->subscr_space_type }}">
                                <input type="hidden" name="token" class="token">
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                         <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">{{ Helper::translation(2876,$translate,'') }}</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
                @if (session()->has('coupon_data'))
                 @php
                     Session::forget('coupon_data');
                 @endphp
                @else 
                @endif
        </div>
      </div>
	</div>
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif