@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - {{ Helper::translation(2934,$translate,'') }} </title>
@include('meta')
@include('style')
</head>
<body class="coupon">
@include('header')
@if($addition_settings->subscription_mode == 0)
	@include('edit-my-coupon')
@else
	
            @include('edit-my-coupon')
        
@endif
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif