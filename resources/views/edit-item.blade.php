@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>@if(Auth::user()->user_type == 'vendor' || Auth::user()->user_type == 'customer') {{ Helper::translation(2935,$translate,'') }} @else {{ Helper::translation(2860,$translate,'') }} @endif - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($addition_settings->subscription_mode == 0)
	@include('edit-my-item')
@else
	@if(Auth::user()->user_type == 'vendor' || Auth::user()->user_type == 'customer')
            @include('edit-my-item')
   @else
        @include('not-found')
   @endif
@endif
@include('footer')
@include('script')
<script type="text/javascript">
	$(document).ready(function()
	{
	'use strict';
	$('#video_preview_type1').on('change', function() {
      if ( this.value == 'youtube')
      
      {
	     $("#youtube").show();
		 $("#mp4").hide();
		 $("#mp3").hide();
	  }	
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
		 $("#mp3").hide();
	  }
	  else if ( this.value == 'mp3')
	  {
	     $("#mp3").show();
		 $("#youtube").hide();
		 $("#mp4").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
		  $("#mp4").hide();
	  }
	  
	 });
});
</script>
@include('upload-size')
</body>
</html>
@else
@include('503')
@endif