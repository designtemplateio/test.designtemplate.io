<style>
       .whatsapp_logo
       {
          position: fixed;
          bottom:18px;
          right:30px;
          z-index: 1;
       } 
</style>
@if ($message = Session::get('success'))
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-success" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="dwg-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(5970,$translate,'') }}</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">{{ $message }}</div>
      </div>
    </div>
@endif 
@if ($message = Session::get('error'))
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(5973,$translate,'') }}</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body text-danger">{{ $message }}</div>
      </div>
    </div>
@endif
@if (!$errors->isEmpty())
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(5973,$translate,'') }}</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @foreach ($errors->all() as $error)
        <div class="toast-body text-danger">
        {{ $error }}
        </div>
        @endforeach
      </div>
    </div>
@endif
<footer class="bg-dark pt-5 footer">
      <div class="container-fluid pt-2 pb-3" style="width:85%;">
        <div class="row">
          <div class="col-md-4 text-center text-md-left mb-4">
            <div class="text-nowrap mb-3">
            <a class="d-inline-block align-middle mt-n2 mr-2" href="{{ URL::to('/') }}">
            @if($additional->site_footer_logo != '')
            <img class="d-block lazy" width="150" height="43"  src="{{ url('/') }}/public/storage/settings/{{ $additional->site_footer_logo }}"  alt="{{ $allsettings->site_title }}"/>
            @endif
            </a>
            </div>
            <h6 class="pr-3 mr-3"><span class="text-primary">By </span>
           <a href="https://doographics.com"> <span class="font-weight-normal text-white" style="font-size:16px;">Doographics</span></a></h6>
            <!--<h6 class="pr-3 mr-3"><span class="text-primary">{{ $member_count }} </span><span class="font-weight-normal text-white">{{ Helper::translation(3002,$translate,'') }}</span></h6>-->
            <!--<h6 class="pr-3 mr-3"><span class="text-primary">{{ $total_sale }} </span><span class="font-weight-normal text-white">{{ Helper::translation(2930,$translate,'') }}</span></h6><h6 class="mr-3"><span class="text-primary">{{ $total_files }} </span><span class="font-weight-normal text-white">{{ Helper::translation(3003,$translate,'') }}</span></h6> -->
              <!--<div class="d-none d-md-block ml-3 text-nowrap">-->
          @if($addition_settings->verify_mode == 1)
          <a class="dropdown-item m-0 p-0 mb-n3" style="color:#d9d9d9;" href="{{ URL::to('/verify') }}"><i class="dwg-check mt-n1 mr-1 pr-1" style="color:#4734CB;"></i>{{ Helper::translation('614d4f7745243',$translate,'Verify Purchase') }}</a><br>
          @endif
          @if($allsettings->site_selling_display == 1)
          @if(Auth::guest())
          <!--<a class="topbar-link ml-1 pl-1 border-left border-light d-none d-md-inline-block" style="color:#d9d9d9;font-size: 8px;" href="{{ URL::to('/start-selling') }}"><i class="dwg-cart mt-n1"></i>{{ Helper::translation(3018,$translate,'') }}</a>-->
          @else
          @if(Auth::user()->user_type == 'vendor')
          <a class="topbar-link ml-1 pl-1 border-left border-light d-none d-md-inline-block" href="{{ URL::to('/manage-item') }}" style="color:#d9d9d9;"><i class="dwg-cart mt-n1"></i>{{ Helper::translation(3018,$translate,'') }}</a><br>
          @endif
          @endif
          @endif
          <!--<a tabindex="0" role="button" data-html="true" data-toggle="popover" data-placement="bottom"  data-trigger="focus"  data-content="<div class='text-center'><p>For commercial use and now Worry for licence</p><a class='popup_button btn btn-primary' href='{{ URL::to('/pricing') }}'>  Get Licence </a></div><br><div class='text-center'><p>This free item is available personal use. Enjoy Free File!!</p></div><br><div class='text-center'><input type='text><label>edededededed</label></div>">contact</a>-->
          <!--<a class="dropdown-item m-0 p-0 mb-2" style="color:#d9d9d9;"  href="{{ URL::to('/contact') }}"><i class="dwg-support mt-n1 mr-1 pr-1" style="color:#4734CB;"></i>{{ Helper::translation(2910,$translate,'') }}</a>-->
          <a class="dropdown-item m-0 p-0 mb-2" style="color:#d9d9d9;" href="https://wa.me/919146155999" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg> +91 9146155999</a>
          <a class="dropdown-item m-0 p-0 mb-2" style="color:#d9d9d9;"  href="{{ URL::to('/contact') }}"><i class="fa fa-envelope mt-n1 mr-1 pr-1" style="color:#4734CB;"></i>help@designtemplate.io</a>
          <!--@if($allsettings->site_blog_display == 1)-->
          <!--<a class="dropdown-item m-0 p-0" style="color:#d9d9d9;" href="{{ URL::to('/blog') }}"><i class="dwg-image mt-n1 mr-1 pr-1" style="color:#4734CB;"></i>{{ Helper::translation(2877,$translate,'') }}</a>-->
          <!--@endif-->
          <!--</div>-->
            <div class="widget mt-4 text-md-nowrap text-center text-md-left">
            @if($allsettings->facebook_url != '')
            <a class="social-btn sb-light sb-facebook mr-2 mb-2" href="{{ $allsettings->facebook_url }}" target="_blank"><i class="dwg-facebook"></i></a>
            @endif
            @if($allsettings->twitter_url != '')
            <a class="social-btn sb-light sb-twitter mr-2 mb-2" href="{{ $allsettings->twitter_url }}" target="_blank"><i class="dwg-twitter"></i></a>
            @endif
            @if($allsettings->pinterest_url != '')
            <a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="{{ $allsettings->pinterest_url }}" target="_blank"><i class="dwg-pinterest"></i></a>
            @endif
            @if($allsettings->gplus_url != '')
            <a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="{{ $allsettings->gplus_url }}" target="_blank"><i class="dwg-google"></i></a>
            @endif
            @if($allsettings->linkedin_url != '')
            <a class="social-btn sb-light sb-behance mr-2 mb-2" href="{{ $allsettings->linkedin_url }}" target="_blank"><i class="dwg-linkedin"></i></a>
            @endif
            @if($allsettings->instagram_url != '')
            <a class="social-btn sb-light sb-behance mr-2 mb-2" href="{{ $allsettings->instagram_url }}" target="_blank"><i class="dwg-instagram"></i></a>
            @endif
            </div>
          </div>
          <!-- Mobile dropdown menu -->
          <div class="col-12 d-md-none text-center mb-4 pb-2">
            <div class="btn-group dropdown d-block mx-auto mb-3">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">{{ Helper::translation(2879,$translate,'') }}</button>
              <ul class="dropdown-menu">
                @foreach($maincategory['view'] as $maincategory)
                <li><a class="dropdown-item" href="{{ URL::to('/templates/category/') }}/{{$maincategory->category_slug}}">{{ $maincategory->category_name }}</a></li> 
                @endforeach
              </ul>
            </div>
            <div class="btn-group dropdown d-block mx-auto">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">{{ Helper::translation(2999,$translate,'') }}</button>
              <ul class="dropdown-menu">
                @if($allsettings->site_blog_display == 1)
                <li><a class="dropdown-item" href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate,'') }}</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate,'') }}</a></li>
                @if($addition_settings->subscription_mode == 1)
                <li><a class="dropdown-item" href="{{ URL::to('/pricing') }}">{{ Helper::translation(6105,$translate,'') }}</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ URL::to('/templates') }}">Templates</a></li>
              </ul>
            </div>
          </div>
          <!-- Desktop menu -->
          <div class="col-md-2 d-none d-md-block text-center text-md-left mb-4">
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light">{{ Helper::translation(2879,$translate,'') }}</h3>
              <ul class="widget-list">
                @foreach($maincategory_two['view'] as $maincategory)
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/templates/category/') }}/{{$maincategory->category_slug}}">{{ $maincategory->category_name }}</a></li> 
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-md-2 d-none d-md-block text-center text-md-left mb-4">
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light">{{ Helper::translation(2999,$translate,'') }}</h3>
              <ul class="widget-list">
                @if($allsettings->site_blog_display == 1)
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate,'') }}</a></li>
                @endif
                <!--<li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate,'') }}</a></li>-->
                @if($addition_settings->subscription_mode == 1)
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/pricing') }}">{{ Helper::translation(6105,$translate,'') }}</a></li>
                @endif
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/templates') }}">Templates</a></li>
               </ul>
              </div>
          </div>
          @if($allsettings->site_newsletter_display == 1)
          <div class="col-md-4">
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">{{ Helper::translation(3005,$translate,'') }}</h3>
              <form class="validate" action="{{ route('newsletter') }}" method="post" name="mc-embedded-subscribe-form" id="footer_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group input-group-overlay flex-nowrap">
                  <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="dwg-mail"></i></span></div>
                  <input class="form-control prepended-form-control" style="background:#45494e;color:white" type="email" id="mce-EMAIL" value="" placeholder="{{ Helper::translation(3006,$translate,'') }}" data-bvalidator="required" name="news_email">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe">{{ Helper::translation(3007,$translate,'') }}</button>
                  </div>
                </div>
                <small class="form-text text-light opacity-50" id="mc-helper">{{ $allsettings->site_newsletter }}</small>
                <div class="subscribe-status"></div>
              </form>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="pt-4 bg-darker">
        <div class="container-fluid pt-2 pb-3" style="width:80%;">
          <div class="d-md-flex justify-content-between">
            <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">&copy; {{ date('Y') }}  {{ $allsettings->site_title }}</div>
            <div class="widget widget-links widget-light pb-4">
              <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              @foreach($footerpages['pages'] as $pages)
                <li class="widget-list-item ml-4"><a class="font-size-ms" style="color:#b5bef9;" href="{{ URL::to('/') }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a></li>
              @endforeach  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    @if($allsettings->cookie_popup == 1)
    <div class="alert text-center cookiealert" role="alert">
        {{ $allsettings->cookie_popup_text }}
        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            {{ $allsettings->cookie_popup_button }}
        </button>
    </div>
    @endif
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">{{ Helper::translation(5976,$translate,'') }}</span><i class="btn-scroll-top-icon dwg-arrow-up"></i></a>
    
    
    <div class="whatsapp_logo">
        <a href="https://wa.me/919146155999" target="_blank">
            <img src="https://designtemplate.io/public/img/Whatsapp_logo.webp" width="70" height="70" alt="whatsapp">
        </a>
    </div>
    
    



<!--<section id="fixed-form-container">-->
<!--	<div class="button">Click Me!</div>-->
<!--		<div class="body">-->
<!--		 <div class="container px-0" id="map">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-12 px-4 px-xl-5 py-5">-->
<!--          <form method="POST" action="{{ route('contact') }}" id="contact_form"  class="needs-validation mb-3" novalidate>-->
<!--          @csrf-->
<!--            <div class="row">-->
<!--              <div class="col-sm-6">-->
<!--                <div class="form-group">-->
<!--                  <label for="cf-name">{{ Helper::translation(2917,$translate,'') }} <span class="text-danger">*</span></label>-->
<!--                  <input class="form-control" type="text" id="from_name" name="from_name" data-bvalidator="required">-->
<!--                  <div class="invalid-feedback">{{ Helper::translation(5952,$translate,'') }}</div>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="col-sm-6">-->
<!--                <div class="form-group">-->
<!--                  <label for="cf-email">{{ Helper::translation(2915,$translate,'') }} <span class="text-danger">*</span></label>-->
<!--                  <input class="form-control" type="text" id="cf-email" name="from_email" data-bvalidator="email,required">-->
<!--                  <div class="invalid-feedback">{{ Helper::translation(5955,$translate,'') }}</div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--              <label for="cf-message">{{ Helper::translation(2918,$translate,'') }} <span class="text-danger">*</span></label>-->
<!--              <textarea class="form-control" id="cf-message" rows="6" name="message_text" data-bvalidator="required"></textarea>-->
<!--              <div class="invalid-feedback">{{ Helper::translation(5958,$translate,'') }}</div>-->
<!--            </div>-->
<!--            @if($additional->site_google_recaptcha == 1)-->
<!--            <div class="form-group">-->
<!--              <label for="cf-message">{{ Helper::translation(3244,$translate,'') }}<span class="text-danger">*</span></label>-->
<!--              {!! app('captcha')->display() !!}-->
<!--                @if ($errors->has('g-recaptcha-response'))-->
<!--                  <span class="help-block">-->
<!--                     <span class="red">{{ $errors->first('g-recaptcha-response') }}</span>-->
<!--                  </span>-->
<!--                 @endif-->
<!--            </div>-->
<!--            @endif-->
<!--            <button class="btn btn-primary" type="submit">{{ Helper::translation(2876,$translate,'') }}</button>-->
<!--          </form>-->
<!--        </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
<!--</section>-->
<style>
    

#fixed-form-container{
    position: fixed;
    bottom: 0px;
    left: 3%;
    width: 94%;
    text-align: center;
    margin: 0;

}

#fixed-form-container .button:before { 
   content: "+ ";
}

#fixed-form-container .expanded:before { 
    content: "- ";
}

#fixed-form-container .button { 
  font-size:1.1em; 
	cursor: pointer;
	margin-left: auto;
  margin-right: auto;
	border: 2px solid #e25454;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px 5px 0px 0px;
	padding: 5px 20px 5px 20px;
	background-color: #e25454;
	color: #fff;
	display: inline-block;
	text-align: center;
	text-decoration: none;
  -webkit-box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
  -moz-box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
  box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
}

#fixed-form-container .body{
    background-color: #fff; 
    border-radius: 5px;
    border: 2px solid #e25454;
    margin-bottom: 16px;
    padding: 10px; 
    -webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
    -moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
    box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
}

@media only screen and (min-width:768px){
    #fixed-form-container .button{
       margin: 0;

    }
    #fixed-form-container {
        left: 20px;
        width: 390px;
        text-align: left;
    }

    #fixed-form-container .body{
        padding: 30px;
        border-radius: 0px 5px 5px 5px;
    }
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $("#fixed-form-container .body").hide();
$("#fixed-form-container .button").click(function () {
        $(this).next("#fixed-form-container div").slideToggle(400);
        $(this).toggleClass("expanded");
    });
</script>