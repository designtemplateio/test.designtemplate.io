@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - {{ Helper::translation(2865,$translate,'') }} </title>
@include('meta')
@include('style')
</head>
<body class="coupon">
@include('header')
@if($addition_settings->subscription_mode == 0)
	@include('add-my-coupon')
@else
	
       
            @include('add-my-coupon')
       
  
@endif
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif