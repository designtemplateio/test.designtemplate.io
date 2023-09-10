@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Audio Items - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
<style>
    .hero
{
  align-items: center;
  width:100%;
  height:100vh;
}
.thumbnail{
  width: 100px;
  border-radius: 10px;
}
.music
{
  border-radius: 10px;
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  background-color: #000000;
  display: flex;
}
.info
{
  color: #ffffff;
  margin-left: 30px;
  flex: 1;
}
.info p{
  font-size: 20px; 
}
.controls{
 display: flex;
 align-items: center;
}
.controls img{
 width: 20px;
 margin-right: 20px;
 cursor: pointer;
}
</style>
<script src="https://unpkg.com/wavesurfer.js"></script>
</head>
<body style="background:#eaeaef;"> 
@include('header')
<div class="container-fluid py-3">
    <div class="container-fluid py-2 mt-md-2 p-2">
      <div class="row pt-2 mx-n2 flash-sale" id="post-data">
        <!-- Product-->
        @php $no = 1; @endphp
        @foreach($items as $featured)
        @php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        @endphp
          <div class="hero">
             <div class="music">
                    <a  href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                        @if($featured->item_preview!='')
                          <img class="lazy_load thumbnail" width="30%" height="30%" src="{{ url('/') }}/public/img/lazy_load_thumbnail.webp" data-src="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}"  data-srcset="{{ Helper::Image_Path($featured->item_preview,'lazy_load_thumbnail.webp') }}" alt="{{ $featured->item_name }}">
                        @else
                          <img class="thumbnail" width="30%" height="30%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $featured->item_name }}">
                        @endif
                    </a>
                <div class="info">
                    <div class="controls">
                        <a href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                           @if($addition_settings->item_name_limit != 0)
			                     {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
		                   @else
			                     {{ $featured->item_name }}	  
			               @endif
			            </a><br>
                        <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}" style="font-size: .8125rem;">
				            @if($addition_settings->author_name_limit != 0)
				                By {{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
				            @else
				                By {{ $featured->username }}	  
				            @endif 
					           @if($addition_settings->subscription_mode == 1) 
					               @if($featured->user_document_verified == 1) 
				                @endif 
				            @endif
				        </a>
                       <img src="{{ url('/') }}/resources/views/theme/mp3/images/play.png" id="playBtn">
                       <img src="{{ url('/') }}/resources/views/theme/mp3/images/stop.png" id="stopBtn">
                       <img src="{{ url('/') }}/resources/views/theme/mp3/images/volume.png" id="volumeBtn">            
                    </div><br>
                    <div id="waveform"></div>
                </div>
            </div>
          </div>
        @php $no++; @endphp
        @endforeach
      </div>
      <div class="ajax-load text-center" style="display:none">
	    <p><img class="lazy" width="24" height="24" src="{{ url('/') }}/resources/views/theme/img/loader.gif"> {{ Helper::translation('6232d802b030f',$translate,'Loading More Items') }}</p>
      </div>
    </div>
</div>

<script>
      var playBtn = document.getElementById("playBtn");
      var stopBtn = document.getElementById("stopBtn");
      var volumeBtn = document.getElementById("volumeBtn");
      var wavesurfer = WaveSurfer.create({
        container: '#waveform',
        waveColor: '#fff',
        progressColor: '#03cebf',
        barWidth: 2,
        height: 40,
        responsive: true,
        hideScrollbar: true,
        barRadius: 1
      });
      wavesurfer.load('{{ url('/') }}/resources/views/theme/mp3/Audio.mp3');

      playBtn.onclick = function () {
        wavesurfer.playPause();
        if (playBtn.src.includes("{{ url('/') }}/resources/views/theme/mp3/images/play.png")) {
          playBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/pause.png";
        }
        else {
          playBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/play.png";
        }
      }
      stopBtn.onclick = function () {
        wavesurfer.stop();
        playBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/play.png";
      }
      volumeBtn.onclick = function () {
        wavesurfer.toggleMute();
        if (volumeBtn.src.includes("volume.png")) {
          volumeBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/mute.png";
        }
        else {
          volumeBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/volume.png";
        }
      }

      wavesurfer.on('finish', function () {
        playBtn.src = "{{ url('/') }}/resources/views/theme/mp3/images/play.png";
        wavesurfer.stop();
      });
    </script>
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif