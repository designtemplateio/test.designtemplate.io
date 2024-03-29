<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>{{ $product_name }}</title>
@if($translate == 'ar')
<style type="text/css">
body {
    font-family: DejaVu Sans;
	direction:rtl !important;
    text-align:right !important;
}
</style>
@else
<style type="text/css">
body {
    font-family: DejaVu Sans;
	}
</style>	
@endif
@if($addition_settings->site_invoice == 1)
@php $translate = $translate; @endphp
@else
@php $translate = 'en'; @endphp
@endif
</head>
<body>
  <table width="100%" border="0">
      <tr>
        <td colspan="3">
          @if($allsettings->site_logo != '')
          <a href="{{ URL::to('/') }}" target="_blank">
          <img class="lazy" width="200" height="56" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"  alt="{{ $allsettings->site_title }}"/>
          </a>
          @endif
        </td>
      </tr>
      <tr>
        <td colspan="3">
        <h3>{{ Helper::translation(6039,$translate,'') }}</h3>
        <p>{{ Helper::translation(6042,$translate,'') }}<strong>{{ $license }}</strong><br/>
        {{ Helper::translation(6045,$translate,'') }}
        </p>
        </td>
      </tr> 
      <tr>
       <td colspan="3">
         <table cellpadding="0" cellspacing="10">
          <tr>
            <td><strong>{{ Helper::translation(2938,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $product_name }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(2908,$translate,'') }}</strong></td>
            <td>:</td>
            <td><a href="{{ URL::to('/') }}/item/{{ $product_slug }}" target="_blank">{{ URL::to('/') }}/item/{{ $product_slug }}</a></td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(2888,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $allsettings->site_currency }} {{ $product_price }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(6048,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $username }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(3173,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $order_id }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(6051,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $purchase_id }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(3102,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ date("d M Y", strtotime($purchase_date)) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(3103,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ date("d M Y", strtotime($expiry_date)) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(3175,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $payment_type }}</td>
          </tr>
          <tr>
            <td><strong>{{ Helper::translation(6054,$translate,'') }}</strong></td>
            <td>:</td>
            <td>{{ $payment_token }}</td>
          </tr>
        </table>
      </td>
    </tr>  
    <tr>
      <td colspan="3">
      <p>{{ Helper::translation(6057,$translate,'') }} <a href="{{ URL::to('/') }}" target="_blank"><strong>{{ URL::to('/') }}</strong></a></p>
      </td>
    </tr>      
    </table>
</body>
</body>
</html>