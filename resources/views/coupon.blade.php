@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(2919,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($addition_settings->subscription_mode == 0)
	@include('my-coupon')
@else
    @include('my-coupon')
@endif
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif