@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $addition_settings->subscription_title }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
<style>
label.active {
  font-weight: bold;
  color: blue;
}
.month
{
    border: 1px solid #CDCDCD;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    background:#fff;
}
.sub-name
{
    color: #000;
font-size: 18px;
font-weight: 500;
}
.sub-para
{
    font-weight: 300;
    font-size: 14px;
    text-align: center;
    color: #909090;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .sub_col{max-width:100%;}
}

</style>

</head>
<body>
@include('header')
@php  $currentUrl = URL::previous(); $clientIP = request()->ip();
 @endphp
{{ Session::put('login',$currentUrl);}}
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
@if($addition_settings->subscription_mode == 1)
 <!--Section 1-->
<div class="container-fluid bg-position-center-top-banner bg-hero-pricing-image" style="background-image: url('{{ url('/') }}/public/img/Pricing.webp');">
		<div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-lg-10 text-center">
                  @if($addition_settings->subscription_title != "")
                  <h1 class="heading text-wrap px-3 pt-1">{{ $addition_settings->subscription_title }}</h1>
                  @endif
                  @if($addition_settings->subscription_desc != "")
                  <p class="sm-heading py-1 px-5 mx-5 mb-0">@php echo html_entity_decode($addition_settings->subscription_desc); @endphp</p>
                  @endif
                 </div>
              </div>
              
              
<div class="row justify-content-center my-5">
  <div class="col-5 month pt-4 m-3 d-none d-md-block">
      <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">   </p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"> Free </p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"> Pro </p></li>
    </ul>
    <hr>
    <ul class="nav row pt-2">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">Thousands of free templates</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>Daily Downloads</p></b></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2">1</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2">20</p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>On Demand Template</p></b></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>Premium Illustrations</b></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">Priority support</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
  </div>
  <div class="col-12 month pt-4 m-3 d-block d-md-none">
      <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">   </p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"> Free </p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"> Pro </p></li>
    </ul>
    <hr>
    <ul class="nav row pt-2">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">Thousands of free templates</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>Daily Downloads</p></b></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2">1</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2">20</p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>On Demand Template</p></b></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2"><b>Premium Illustrations</b></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
    <ul class="nav row">
      <li class="px-5 col-8"><p class="card-text px-2 p-2">Priority support</p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-times" aria-hidden="true"></i></p></li>
      <li class="px-5 col-2"><p class="card-text px-2 p-2"><i class="fa fa-check" aria-hidden="true"></i></p></li>
    </ul>
  </div>
  <div class="col-5 sub_col">
       @foreach($subscription['view'] as $subscription)
         <div class="row justify-content-center m-4 d-none d-md-block">
              @if($subscription->subscr_name != "Monthly")
       <button class="btn contactbuttons-first pt-1 mx-10" style="position:absolute;margin-top: -3%;z-index: 1;background:#FF4E6E;height: 32px;">Save 50%</button>
       @endif
       @if($country == 'India')
          @if($subscription->subscr_name == "Monthly")
                @php  $subscription->subscr_price = $convert1;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @else
                @php  $subscription->subscr_price = $convert2;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @endif
       @endif
		        <div class="col-12 month pt-2">
		            <div class="row">
		            <div class="col-6 custom-control custom-radio">
                      <label class="font-weight-medium text-dark cursor-pointer"><h6 class="sub-name"><b>{{$subscription->subscr_name}}</b></h6>
                        @if($subscription->subscr_name == "Monthly")
                        @if($country == 'India')
                            <span class="text-2xl" data-config-id="03_price">₹1299</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">₹1299 every month</p>
                        @else
                            <span class="text-2xl" data-config-id="03_price">$19.99</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">$19.99 every month</p>
                        @endif
		                @else
		                @if($country == 'India')
                            <span class="text-2xl" data-config-id="03_price">₹649</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">₹7788 every 12 months</p>
                        @else
		                    <span class="text-2xl" data-config-id="03_price">$9.49</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span>
		                    <p class="sub-para">$113 every 12 months</p>
		                @endif
		                @endif
		            </label>
		            </div>
		            <div class="col-6">
		                 @if(Auth::guest())
                        <a class="btn inline-block text-center contactbuttons-first mx-2 mt-5 py-2 px-5 my-3" data-toggle="modal" data-target="#exampleModal" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};" href="{{ URL::to('/confirm-subscription') }}/{{ base64_encode($subscription->subscr_id) }}">Subscribe Now</a>
                        @else
                        @if(Auth::user()->id != 1)
                         @if(Auth::user()->user_subscr_id == $subscription->subscr_id && Auth::user()->user_subscr_payment_status == 'completed')
                         <a class="btn inline-block text-center contactbuttons-first mx-2 mt-5 py-2 px-5 my-3" href="javascript:void(0)" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};">Purchased</a>
                         @else
                         <a class="btn inline-block text-center contactbuttons-first mx-2 py-2 mt-5 px-5 my-3" data-toggle="modal" data-target="#pricingModal{{$subscription->subscr_id}}" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};">Subscribe Now</a>
                         @endif
                        @endif
                        @endif
		            </div>
		            </div>
		        </div>
		    </div>
		 <div class="row justify-content-center m-4 d-block d-md-none">
              @if($subscription->subscr_name != "Monthly")
       <button class="btn contactbuttons-first mx-5 pt-1 mb-0" style="position:absolute;margin-top: -5%;z-index: 1;background:#FF4E6E;height: 32px;">Save 50%</button>
       @endif
       @if($country == 'India')
          @if($subscription->subscr_name == "Monthly")
                @php  $subscription->subscr_price = $convert1;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @else
                @php  $subscription->subscr_price = $convert2;
                      $allsettings->site_currency_symbol = '₹'; @endphp
          @endif
       @endif
		        <div class="col-12 month pt-2">
		            <div class="row">
		            <div class="col-12 custom-control custom-radio">
                      <label class="font-weight-medium text-dark cursor-pointer"><h6 class="sub-name pt-3"><b>{{$subscription->subscr_name}}</b></h6>
                        @if($subscription->subscr_name == "Monthly")
                        @if($country == 'India')
                            <span class="text-2xl" data-config-id="03_price">₹1299</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">₹1299 every month</p>
                        @else
                            <span class="text-2xl" data-config-id="03_price">$19.99</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">$19.99 every month</p>
                        @endif
		                @else
		                @if($country == 'India')
                            <span class="text-2xl" data-config-id="03_price">₹649</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span> 
                            <p class="sub-para">₹7788 every 12 months</p>
                        @else
		                    <span class="text-2xl" data-config-id="03_price">$9.49</span>  
                            <span class="text-1xs" data-config-id="03_note">/month</span>
		                    <p class="sub-para">$113 every 12 months</p>
		                @endif
		                @endif
		            </label>
		            </div>
		            <div class="col-12">
		                 @if(Auth::guest())
                        <a class="btn inline-block text-center contactbuttons-first mx-2 mt-1 py-2 px-5 my-3" data-toggle="modal" data-target="#exampleModal" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};" href="{{ URL::to('/confirm-subscription') }}/{{ base64_encode($subscription->subscr_id) }}">Subscribe Now</a>
                        @else
                        @if(Auth::user()->id != 1)
                         @if(Auth::user()->user_subscr_id == $subscription->subscr_id && Auth::user()->user_subscr_payment_status == 'completed')
                         <a class="btn inline-block text-center contactbuttons-first mx-2 mt-1 py-2 px-5 my-3" href="javascript:void(0)" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};">Purchased</a>
                         @else
                         <a class="btn inline-block text-center contactbuttons-first mx-2 py-2 mt-1 px-5 my-3" data-toggle="modal" data-target="#pricingModal{{$subscription->subscr_id}}" style="background: {{ $subscription->button_bg_color }}; color:{{ $subscription->button_text_color }};">Subscribe Now</a>
                         @endif
                        @endif
                        @endif
		            </div>
		            </div>
		        </div>
		    </div>
		   
		     <!--Pricing Modal -->
    <div class="modal fade text-left" id="pricingModal{{$subscription->subscr_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="my-2 px-3">{{$subscription->subscr_name}} Plan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="subscriptionPlans">
         <div class="faq-section section-padding subscribe-details" data-aos="fade-up" data-aos-delay="200">
		<div class="container">
			<div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12 subscribe-details">
            <div class="mb-3">
                <div class="card-body">
                    @if($country == 'India')
                      @if($subscription->subscr_name == "Monthly")
                      <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}1299</p>
                      @else
                      <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}7788</p>
                      @endif
                    @else
                    <p class="m-0"><label>{{ Helper::translation(2888,$translate,'') }} :</label> {{ $allsettings->site_currency_symbol }}{{ $subscription->subscr_price }}</p>
                    @endif
                    <p class="m-0"><label>{{ Helper::translation(6144,$translate,'') }} :</label> {{ $subscription->subscr_duration }}</p>
                    <p class="m-0"><label>Daily Limit :</label> 20 </p>
                    <!--<p class="m-0"><label>{{ Helper::translation(6147,$translate,'') }} :</label> Unlimited Downloads</p>-->
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
                            @endif
                </div>
            </div>
        </div>
        </div>
     <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12 text-center">
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
                    <!--<label class="password-toggle-btn">-->
                    <!--  <input class="custom-control-input" type="checkbox"><i class="dwg-eye "></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>-->
                    <!--</label>-->
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
                   @if($subscription->subscr_name == "Monthly")
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
                    <input class="form-control prepended-form-control" type="text" placeholder="Enter {{ Helper::translation(2866,$translate,'') }}" id="coupon_sub" name="coupon_sub" required>
                    <!-- <label class="password-toggle-btn">-->
                    <!--  <input class="custom-control-input" type="checkbox"><i class="dwg-eye"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>-->
                    <!--</label>-->
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
                   @if($subscription->subscr_name == "Monthly")
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
                    <input class="form-control prepended-form-control" type="text" placeholder="Enter {{ Helper::translation(2866,$translate,'') }}" id="coupon_sub" name="coupon_sub" required>
                    <!-- <label class="password-toggle-btn">-->
                    <!--  <input class="custom-control-input" type="checkbox"><i class="dwg-eye"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>-->
                    <!--</label>-->
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
          </div>
          <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div>
                <p><label>{{ Helper::translation(2902,$translate,'') }}</label></p>
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
                                <input type="hidden" name="user_subscr_id" value="{{ $subscription->subscr_id }}">
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
                                  <input type="hidden" name="user_subscr_price" value="{{ $subscription->subscr_price }}">
                                  <input type="hidden" name="user_coupon_code" value="">
                                  <input type="hidden" name="user_subscr_discount_value" value="0">
                                 @endif
                                <input type="hidden" name="user_subscr_type" value="{{ $subscription->subscr_name }}">
                                <input type="hidden" name="user_subscr_date" value="{{ $subscription->subscr_duration }}">
                                <input type="hidden" name="user_subscr_item_level" value="{{ $subscription->subscr_item_level }}">
                                <input type="hidden" name="user_subscr_item" value="{{ $subscription->subscr_item }}">
                                <input type="hidden" name="user_subscr_download_item" value="{{ $subscription->subscr_download_item }}">
                                <input type="hidden" name="user_subscr_space_level" value="{{ $subscription->subscr_space_level }}">
                                <input type="hidden" name="user_subscr_space" value="{{ $subscription->subscr_space }}">
                                <input type="hidden" name="user_subscr_space_type" value="{{ $subscription->subscr_space_type }}">
                                <input type="hidden" name="token" class="token">
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                         <div class="text-center">
                            <button class="btn btn-primary" style="height: 45px;width:200px;"type="submit">Pay Now</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
                
        </div>
      </div>
	</div>
      </div>
      
    </div>
  </div>
</div>
<!-- End Pricing modal-->
                  
                    
                    @endforeach
                    
                      @if (session()->has('coupon_data'))
                 @php
                     Session::forget('coupon_data');
                 @endphp
                @else 
                @endif  
  </div>
  
                   
                    
</div>
</div>
            
</div>


	
	
<!--Section 2-->
<section class="container-fluid py-5 my-5">
<div class="container happ-cust-banner text-center py-5">
    <div class="center">
       <h2 class="heading_unlimited">1,00,000+ Happy Customers</h2>
       <p class="text-center">We are a company , which design the best product for your visual pleasure.<br>Design template is part of  digital design platform by Dadasaheb Bhagat.</p>
     </div>
    <div class="row justify-content-center align-items-center pt-4">
        <div class="col-lg-12">
          <img src="{{ url('/') }}/public/img/Clients_logo.webp" loading="lazy" alt="Clients_logo">
        </div>
    </div>
</div>
</section>
 
 <!--Section 3-->
<section class="container-fluid product-banner pb-5">
  <div class="container logo-container text-center py-4">
    <h2 class="heading_unlimited">Featured By</h2>
    <img width="auto" src="{{ url('/') }}/public/img/featured_by_image.webp" alt="featured_image" class="img-fluid Featured-img">
  </div>
</section>   
    
<!--Section 4-->
<section class="container">
    <h2 class="heading_unlimited text-center py-4">Frequently asked questions</h2> 
        <div class="questions-container">
             <div class="question">
                <button id="faqbutton">
                    <span>1 . What is Designtemplate.io? Which type of products is available in it?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p> Designtemplate.io is the world's first original content platform for design templates like after effects templates, premiere pro, illustration, and motion graphics design templates. These templates are uniquely designed. Customers can get unlimited & different innovative templates. All are premium design templates with original content by “DesignTemplate” no worry of Copyright issues.</p>
            </div>
            <div class="question">
                <button id="faqbutton">
                    <span>2 . What is included in Membership? What is the pricing plan of designtemplate.io?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>  For Monthly $19.99 Customers can download 10 items per day for 1 month. The annual plan is $9.49/Monthly,In this, you get unlimited templates per day for one year. Designtemplate.io is a Digital Platform with unlimited design templates. Downloads premiere pro, AE templates, Graphics Design and Motion Graphic. you can get original unique content, we create original content according to customers future requirements.</p>
            </div>
            <div class="question">
                <button id="faqbutton">
                    <span>3 . How does a Subscription plan work?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>  A paid member can use unlimited assets from the designtemplate.io marketplace of your choice. If you cancel your paid membership then you can no longer use downloaded assets in new projects. There are 2 subscription plans, $19.99 for one month, $113 for one year. You get unlimited assets for the annual plan.</p>
            </div>
            <div class="question">
                <button id="faqbutton">
                    <span>4 . Why do customers trust designtemplate.io? What differentiates your website from others?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>  Designtemplate.io platform provides original Design Content in form of templates, Illustrations, Motion Graphics. It also provides relevant & Helpful, meaningful design templates. Ninth Motion has been a world leader for the last 6 years in the motion Graphics Industry.</p>
            </div>
        </div>
        <div class="mt-12 text-center lg:mt-10">
            <div class="text-black"> Still have questions? We’re here to help you   </div> 
            <div class="text-center pb-5">
               <a class="dropdown-item" href="{{ URL::to('/contact') }}"> 
                 <button class="btn btn-primary" type="submit">Contact Us</button>
               </a>
            </div>
        </div>
</section>



    @else
    @include('not-found')
    @endif
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


