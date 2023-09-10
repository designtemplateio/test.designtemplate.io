@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(2926,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
{!! NoCaptcha::renderJs() !!}
</head>
<body>
@include('header')
@include('user-box')
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          @include('user-menu')
          <!-- Content-->
          <section class="col-lg-8 pt-lg-4 pb-md-4">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
               @if($user['user']->user_banner == '')
                 @if(Auth::check() && $user['user']->username == Auth::user()->username)
                    Add Cover Image
                    <a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="{{ URL::to('/') }}/profile-settings"><i class="fa fa-plus"></i></a>
                @endif
              @endif
            <div class="profile-banner border-bottom pb-3" data-aos="fade-up" data-aos-delay="200">
            @if($user['user']->user_banner != '')
            <img class="lazy" width="762" height="313" src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_banner }}" data-original="{{ url('/') }}/public/storage/users/{{ $user['user']->user_banner }}" alt="{{ $user['user']->username }}">
            @else
            <img class="lazy" width="762" height="313" src="{{ url('/') }}/public/img/no-image.jpg" data-original="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $user['user']->username }}">
            @endif
            {{ $user['user']->about }}
            </div>
            
            
            @if($user['user']->user_type == 'vendor')
              <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom">{{ Helper::translation(2886,$translate,'') }}<span class="badge badge-secondary font-size-sm text-body align-middle ml-2">{{ count($itemData['item']) }}</span></h2>
              <div class="row pt-2 mx-n2 flash-sale" id="post-data">
                @include('user-data')
               </div>
               <div class="ajax-load text-center" style="display:none">
               <p><img class="lazy" width="24" height="24" src="{{ url('/') }}/resources/views/theme/img/loader.gif" data-original="{{ url('/') }}/resources/views/theme/img/loader.gif"> {{ Helper::translation('6232d802b030f',$translate,'Loading More Items') }}</p>
              </div>
           @endif
        </div>
        </section>
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