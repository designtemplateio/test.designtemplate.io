<style>
.popup-heading{
    text-align: center;
    
font-weight: 500;
font-size: 25px;
color: #4D4D4D;
}
 .register
 {
     
font-weight: 300;
font-size: 15px;
color: #4D4D4D;
}
.profile-pic {
  width: 90%;
  height: 90%;
  background-color: #3f57ef;
  border-radius: 50%;
  text-align: center;
  font-size: 25px;
  color: #fff;
}

</style>
@php  $currentUrl = url()->current(); @endphp
{{ Session::put('loginUrl',$currentUrl);}}
<header class="bg-light box-shadow-sm navbar-sticky" style="width:100%;">
      <!-- Topbar-->
      @if($allsettings->site_header_top_bar == 1)
    
      @endif
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      
      <div class="navbar-sticky">
        <div class="navbar navbar-expand-lg py-0" style="background:#fff;height:-10%">
            <!--<div class="navbar navbar-expand-lg navbar-#d9d9d9 bg-light" style="background-image: linear-gradient(180deg,#FFFCF1,#F8F2FF);color:#d9d9d9;height:60%">-->
          <div class="container-fluid p-n5" style="width:100%;">
          @if($allsettings->site_logo != '')
          <a class="navbar-brand d-none d-sm-block order-lg-1 mr-0" href="{{ URL::to('/') }}">
             <img class="lazy" width="170" height="25" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" data-original="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"/> 
          </a>
          @endif
          @if($allsettings->site_logo != '')
          <a class="navbar-brand d-sm-none mr-0 order-lg-1" href="{{ URL::to('/') }}" style="min-width: 4.625rem;">
             <img class="lazy" width="95" height="35" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" data-original="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"/>
          </a>
          @endif
          <div>
          </div>
           <div class="navbar-toolbar d-flex align-items-center order-lg-3 gap-x-1">
            <!--<div class="input-group input-group-sm">-->
            <!--    <form action="{{ route('shop') }}" id="search_form2" method="post" enctype="multipart/form-data">-->
            <!--         {{ csrf_field() }}-->
            <!--        <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="{{ Helper::translation(3030,$translate,'') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 350px;">-->
            <!--    </form> -->
            <!--    <div class="input-group-prepend">-->
            <!--       <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-search"></i></span>-->
            <!--    </div>-->
            <!--</div>-->


               <button class="navbar-toggler px-0" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"><i class="fa fa-bars ham_menu pt-1" aria-hidden="true"></i></span></button>
               <a class="navbar-tool d-none d-lg-flex" href="#searchBox" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="searchBox"><span class="navbar-tool-tooltip">{{ Helper::translation(4857,$translate,'') }}</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon dwg-search" style="color:#454545;"></i></div></a>
               @if(Auth::user())
                  @if((Auth::user()->user_subscr_id != 0 && Auth::user()->user_subscr_id != "") && Auth::user()->user_subscr_payment_status == 'completed')
                    {{-- has subscriber id --}}
                    <button type="button" class="btn contactbuttons-first justify-item-center ml-2 m-0 d-none d-lg-block " style="background:#03a84e;">
                      <a class="navbar-tool p-0 px-n5 my-n1" href="{{ URL::to('/pricing') }}" style="color:#fff;font-weight:500;">Subscribed</a>
                    </button>
                  @else
                    <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0">
                      <a class="navbar-tool p-0 px-n5 my-n1" href="{{ URL::to('/pricing') }}" style="color:#fff;">Enjoy Unlimited Downloads</a>
                    </button>
                    <button type="button" class="btn contactbuttons-first d-lg-none p-1 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="{{ URL::to('/pricing') }}" style="color:#fff;">Subscribe</a>
                  </button>
                  @endif
                @else
                  {{-- not logged in --}}
                  <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="{{ URL::to('/') }}/free-items" style="color:#fff;">Get Free Template</a>
                  </button>
                  <button type="button" class="btn contactbuttons-first d-lg-none p-1 m-0">
                    <a class="navbar-tool p-0 px-n5 my-n1" href="{{ URL::to('/pricing') }}" style="color:#fff;">Subscribe</a>
                  </button>
                @endif
               
                @if(Auth::guest())
                    <button type="button" class="btn contactbuttons-first justify-item-center d-lg-none p-2 m-0" style="background:#FF4E6E;">
                      <a href="javascript:void(0)" class="navbar-tool p-0 px-n5 my-n1" style="color:#fff;" data-toggle="modal" data-target="#exampleModal">
                     <i class="dwg-user"></i></a>
                    </button>
                    <button type="button" class="btn contactbuttons-first justify-item-center d-none d-lg-block ml-2 m-0" style="background:#FF4E6E;">
                      <a href="javascript:void(0)" class="navbar-tool p-0 px-n5 my-n1" style="color:#fff;" data-toggle="modal" data-target="#exampleModal">
                      <span class="navbar-tool-tooltip">Account</span>Login</a>
                    </button>
                @endif
                @if (Auth::check())
                <div class="navbar-tool dropdown ml-2">
                <a class="navbar-tool-icon-box" style="color:#454545;font-size:20px;" data-toggle="dropdown" @if(Auth::user()->id == 1) href="{{ url('/admin') }}" target="_blank" @else href="{{ URL::to('/user') }}/{{ Auth::user()->username }}" @endif>
                @if(!empty(Auth::user()->user_photo))
                <img class="lazy" width="32" height="32" src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" data-original="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->name }}"/>
                @else
                @php $firstLetter = ucfirst(Auth::user()->name); @endphp
                <div class="profile-pic p-n2 m-1">{{ $firstLetter[0] }}</div>
                @endif
                </a>
                <a class="navbar-tool-text pl-0" style="color:#454545;" @if(Auth::user()->id == 1) href="{{ url('/admin') }}" target="_blank" @else href="{{ URL::to('/user') }}/{{ Auth::user()->username }}" @endif>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 4rem;">
                @if(Auth::user()->user_type == 'vendor')
                <a class="dropdown-item d-flex border-bottom align-items-center"><i class="dwg-user opacity-60 mr-2"></i>{{ Auth::user()->name }}<small class="pl-2">{{ $allsettings->site_currency_symbol }}{{ Auth::user()->earnings }}</small></a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}"><i class="dwg-home opacity-60 mr-2"></i>Portfolio</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/profile-settings') }}"><i class="dwg-settings opacity-60 mr-2"></i>Profile Settings</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/purchases') }}"><i class="dwg-basket opacity-60 mr-2"></i>{{ Helper::translation(2928,$translate,'') }}</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/favourites') }}"><i class="dwg-heart opacity-60 mr-2"></i>{{ Helper::translation(2929,$translate,'') }}</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/cart') }}"><i class="dwg-cart opacity-60 mr-2"></i>My Cart</a>
                <!--<a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/coupon') }}"><i class="dwg-gift opacity-60 mr-2"></i>{{ Helper::translation(2919,$translate,'') }}</a>-->
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/affiliates') }}/{{ Auth::user()->username }}"><i class="dwg-money-bag opacity-60 mr-2"></i>Affiliate Program</a>
                @if(Auth::user()->exclusive_author == 1)
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/sales') }}"><i class="dwg-cart opacity-60 mr-2"></i>{{ Helper::translation(2930,$translate,'') }}</a>
                @endif
                @if(Auth::user()->exclusive_author == 1)
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/manage-item') }}"><i class="dwg-briefcase opacity-60 mr-2"></i>{{ Helper::translation(2932,$translate,'') }}</a>
                @else
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/manage-item') }}"><i class="dwg-briefcase opacity-60 mr-2"></i>Become Author</a>
                @endif
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/deposit') }}"><i class="dwg-money-bag opacity-60 mr-2"></i>{{ Helper::translation('61b32a5049abd',$translate,'Deposit') }}</a>
                @if(Auth::user()->exclusive_author == 1)
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/withdrawal') }}"><i class="dwg-currency-exchange opacity-60 mr-2"></i>{{ Helper::translation(2933,$translate,'') }}</a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate,'') }}</a>
                @endif
                @if(Auth::user()->user_type == 'customer')
                <a class="dropdown-item d-flex border-bottom align-items-center"><i class="dwg-user opacity-60 mr-2"></i>{{ Auth::user()->name }}<br><small class="pl-2">{{ $allsettings->site_currency_symbol }}{{ Auth::user()->earnings }}</small></a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}"><i class="dwg-home opacity-60 mr-2"></i>Portfolio</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/profile-settings') }}"><i class="dwg-settings opacity-60 mr-2"></i>Profile Settings</a> 
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/purchases') }}"><i class="dwg-basket opacity-60 mr-2"></i>{{ Helper::translation(2928,$translate,'') }}</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/favourites') }}"><i class="dwg-heart opacity-60 mr-2"></i>{{ Helper::translation(2929,$translate,'') }}</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/cart') }}"><i class="dwg-cart opacity-60 mr-2"></i>My Cart</a>
                <!--<a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/coupon') }}"><i class="dwg-gift opacity-60 mr-2"></i>{{ Helper::translation(2919,$translate,'') }}</a>-->
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/affiliates') }}/{{ Auth::user()->username }}"><i class="dwg-money-bag opacity-60 mr-2"></i>Affiliate Program</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/manage-item') }}"><i class="dwg-briefcase opacity-60 mr-2"></i>Become Author</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/deposit') }}"><i class="dwg-money-bag opacity-60 mr-2"></i>{{ Helper::translation('61b32a5049abd',$translate,'Deposit') }}</a>
                <!--<a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/withdrawal') }}"><i class="dwg-currency-exchange opacity-60 mr-2"></i>{{ Helper::translation(2933,$translate,'') }}</a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate,'') }}</a>
                @endif
                @if(Auth::user()->user_type == 'admin')
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin') }}"><i class="dwg-settings opacity-60 mr-2"></i>{{ Helper::translation(3022,$translate,'') }}</a>
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate,'') }}</a>
                @endif
              </div>
              </div>
              @endif
              @if (Auth::check())
              @if(Auth::user()->user_type != 'admin')
              @if($additional->conversation_mode == 1)
              <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ URL::to('/messages') }}"><span class="navbar-tool-label">{{ $msgcount }}</span><i class="navbar-tool-icon dwg-chat"></i></a>
                <!-- Cart dropdown-->
                @if($msgcount != 0)
                <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                  <div class="widget widget-cart px-3 pt-2 pb-3">
                    <div data-simplebar data-simplebar-auto-hide="false">
                      @foreach($smsdata['display'] as $msg)
                      <div class="widget-cart-item pb-2 border-bottom">
                        <div class="media align-items-center">
                        <a class="d-block mr-2" href="{{ url('/messages') }}/type/{{ $msg->username }}">
                        @if($msg->user_photo!='')
                        <img class="lazy rounded-circle" width="40" height="40" src="{{ url('/') }}/public/storage/users/{{ $msg->user_photo }}" data-original="{{ url('/') }}/public/storage/users/{{ $msg->user_photo }}" alt="{{ $msg->username }}"/>
                        @else
                        <img  class="lazy rounded-circle" width="40" height="40" src="{{ url('/') }}/public/img/no-image.png" data-original="{{ url('/') }}/public/img/no-image.png" alt="{{ $msg->username }}"/>
                        @endif
                        </a>
                          <div class="media-body">
                            <h6 class="widget-product-title"><a href="{{ url('/messages') }}/type/{{ $msg->username }}">{{ $msg->username }}</a></h6>
                            <div class="widget-product-meta"><span class="mr-2">{{ Helper::timeAgo(strtotime($msg->conver_date)) }}</span></div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                     </div>
                    <a class="btn btn-primary btn-sm btn-block" href="{{ url('/messages') }}"><i class="dwg-chat mr-2 font-size-base align-middle"></i>{{ Helper::translation(6375,$translate,'') }}</a>
                  </div>
                </div>
                @endif
              </div>
              @endif
              @endif
              @endif
      <!--<div class="navbar-tool"><a class="navbar-tool-icon-box" href="{{ url('/cart') }}"><span class="navbar-tool-label">{{ $cartcount }}</span><i class="navbar-tool-icon dwg-cart"></i></a></div>-->
            </div>
            <div class="collapse navbar-collapse mr-0 px-1 order-lg-2 justify-content-left" id="navbarCollapse" style="background:none;">
                <div class="input-group-overlay d-lg-none my-3">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="{{ route('shop') }}" id="search_form1" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                 <input class="form-control prepended-form-control" type="text" name="product_item" placeholder="{{ Helper::translation(3030,$translate,'') }}">
                </form>
              </div>
              <!-- Primary menu-->
              <ul class="navbar-nav ml-0 pl-0">
                      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle headname" style="color:#454545;font-size:14px;" href="javascript:void(0)" target="_parent" onclick="window.open('{{ url('/templates') }}','_self');" data-toggle="dropdown">Templates</a>
                  <ul class="dropdown-menu">
                    @foreach($categories['menu'] as $menu)
                    @if($menu->cat_id==14 || $menu->cat_id==15)
                    <li class="nav-item dropdown border-bottom">
                    <a @if(count($menu->subcategory) != 0)  class="mobiledev dropdown-item dropdown-toggle" data-toggle="dropdown" @else class="mobiledev dropdown-item" @endif href="{{ URL::to('/templates/category/') }}/{{$menu->category_slug}}">{{ $menu->category_name }}</a>
                    <a @if(count($menu->subcategory) != 0)  class="desktopdev dropdown-item dropdown-toggle"  @else class="desktopdev dropdown-item" @endif href="{{ URL::to('/templates/category/') }}/{{$menu->category_slug}}">{{ $menu->category_name }}</a>
                      @if(count($menu->subcategory) != 0)
                      <ul class="dropdown-menu">
                        @foreach($menu->subcategory as $sub_category)
                        <li><a class="dropdown-item" href="{{ URL::to('/templates/subcategory/') }}/{{$sub_category->subcategory_slug}}">{{ $sub_category->subcategory_name }}</a></li>
                        @endforeach
                      </ul>
                      @endif
                    </li>
                    @endif
                   @endforeach 
                  </ul>
                </li>
                @if(count($allpages['pages']) != 0)
                <?php /* ?><li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">{{ Helper::translation(3029,$translate,'') }}</a>
                  <ul class="dropdown-menu">
                    @foreach($allpages['pages'] as $pages)
                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a></li>
                    @endforeach
                  </ul>
                </li><?php */ ?>
                @endif
                <!--<li class="nav-item dropdown"><a class="nav-link" style="color:#454545;" href="https://doographics.com">DooGraphics</a></li>-->
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="{{ URL::to('/templates/subcategory/') }}/illustrations">Illustrations</a></li>
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="{{ URL::to('/templates/subcategory/') }}/overlay-elements">Motion Graphics</a></li>
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="{{ URL::to('/') }}/free-items"><i class="fa fa-gift" aria-hidden="true" style="color:#69b3fe;"></i> Free Templates</a></li>
                @if(Auth::guest())
                @else
                @if($addition_settings->subscription_mode == 1)
                <li class="nav-item dropdown headname"><a class="nav-link" style="color:#454545;font-size:14px;" href="{{ url('/pricing') }}">{{ Helper::translation(6105,$translate,'') }}</a></li>
                @endif
                @endif
              </ul>
            </div>
          </div>
        </div>
         <!-- Search collapse-->
        <div class="search-box collapse" id="searchBox">
          <div class="card pt-2 pb-4 border-0 rounded-0">
            <div class="container">
              <div class="input-group-overlay">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="{{ route('shop') }}" id="search_form2" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="{{ Helper::translation(3030,$translate,'') }}">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
       <section class="container-fluid p-0 add-bg justify-content-center align-item-center" style="background-image: url('{{ url('/') }}/public/img/15_august.webp');">
     <div class="d-none d-lg-block">
     <div class="text-center d-flex justify-content-center">
    <a href="{{ URL::to('/pricing') }}" class="navbar-tool p-0 px-2 my-n1"> <p class="add-heading text-center px-3 py-1 mt-3" style="color:#000;">SPECIAL INDEPENDENCE DAY SALE!</p><p class="add-heading text-center px-3 py-1 mt-3" style="color:#06038D;"><b>50% OFF ON ALL PURCHASES!</b></p><button class="contactbuttons-first justify-item-center px-5 py-1" id="copyText" style="border: 0.5px solid #000;background: none;border-radius: 5px;color:#000;">INDIA50</button><p class="add-heading text-center m-0 px-2" style="color:#06038D;"> Coupon code </p></a>
     </div>
     </div>
     <div class="d-lg-none">
     <div class="text-center justify-content-center">
     <p class="add-heading text-center px-1 pt-3" style="color:#000;">SPECIAL INDEPENDENCE DAY SALE!</p><p class="add-heading text-center px-1" style="color:#06038D;"> <b>50% OFF ON ALL PURCHASES!</b></p>
     <!--<p class="add-heading text-center px-1 mt-1">      MONTHLY 5K+ NEW TEMPLATES</p>-->
     <a href="{{ URL::to('/pricing') }}" class="navbar-tool px-5 mx-5  justify-content-center">
         <button class="contactbuttons-first px-4 mx-4 mb-2" id="copyText" style="border: 0.5px solid #000;background: none;border-radius: 5px;color:#000;">INDIA50</button></a>
     </div>
     </div>
     </section>
    </header>
   <!--Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h3 class="popup-heading mb-0 py-2">Welcome back to DesignTemplate!</h3>
      </div>
      <div class="modal-body">
          <div class="Border-bottom">
         @if($allsettings->display_social_login == 1)
            <div class="py-1 px-3 border-bottom mb-3">
                <div class="row d-flex flex-wrap justify-content-between align-middle">
                    <div class="col-5 input-group-overlay form-group text-center mr-1 ml-3 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                      <a href="{{ url('/login/google') }}">
                         <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/google.webp" alt="name"/>
                      </a>
                    </div>
                    <div class="col-5 input-group-overlay form-group text-center mr-3 ml-1 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                       <a href="{{ url('/login/facebook') }}">
                          <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/facebook.webp" alt="name"/>
                       </a>
                    </div>
                </div>
            </div>
         @endif
         </div>
              <form action="{{ route('login') }}" method="POST" id="login_form" class="@if($allsettings->display_social_login == 0) py-3 @endif">
                @csrf
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="text" name="email" placeholder="{{ Helper::translation(3228,$translate,'') }}" data-bvalidator="required">
                </div>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-locked"></i></span></div>
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" name="password" placeholder="{{ Helper::translation(3113,$translate,'') }}" data-bvalidator="required">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end">
                       <a class="card-text" data-toggle="tab" href="#forgot">{{ Helper::translation(3009,$translate,'') }}?</a>
                </div>
                <div class="modal-footer justify-content-center" style="border:none;">  
                   <div class="text-center">
                       <button class="contactbuttons-first btn" style="color:#fff;" type="submit"><i class="dwg-sign-in mr-2 ml-n21"></i>Sign In</button>
                    </div>
                     @php  $currentUrl = url()->current(); @endphp
                <input type="hidden" name="currentUrl" value="{{ $currentUrl }}">
                </form>
                </div>
                <div class="text-center">
                  <span class="text15">{{ Helper::translation(4875,$translate,'') }}</span>
                  <a href="javascript:void(0)" class="nav-link-inline font-size-sm p-0 px-n5 my-n1" data-toggle="modal" data-target="#registerModal">Sign Up</a>
                  <!--<a data-toggle="tab" href="#register" class="nav-link-inline font-size-sm">Sign Up</a>-->
                </div>
      </div>
      <div class="tab-content px-5">
        <section class="tab-pane fade" id="forgot">
            <h3 class="popup-heading mb-0">{{ Helper::translation(3013,$translate,'') }}</h3>
            <div class="pt-2 px-4 text-center">
              <div class="align-items-center py-4 border-bottom prod-item">
                    <div class="card py-2 px-4 m-2">
                        <form method="POST" action="{{ route('forgot') }}"  id="login_form" class="card-body needs-validation">
                           @csrf 
                          <div class="form-group">
                            <label for="recover-email">{{ Helper::translation(3011,$translate,'') }}</label>
                            <input class="form-control" type="text" id="recover-email" name="email" data-bvalidator="email,required">
                            <div class="invalid-feedback">{{ Helper::translation(5955,$translate,'') }}</div>
                          </div>
                          <button class="btn btn-primary" type="submit">{{ Helper::translation(3012,$translate,'') }}</button>
                        </form>
                    </div>
              </div>
        </section>
        </div>
      
    </div>
  </div>
    </div>
  </div>
</div>
<!-- End Login modal-->


   <!--Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center d-inline">
        <h3 class="popup-heading mb-0 pt-3">It's fantastic to see you here!</h3>
        <p class="register text-center py-2">Let's embark on a journey of inspiration and design excellence together!</p>
      </div>
      <div class="modal-body">
            <div class="px-2">
            @if($allsettings->display_social_login == 1)
            <div class="py-1 px-3 border-bottom mb-3">
                <div class="row d-flex flex-wrap justify-content-between align-middle">
                    <div class="col-5 input-group-overlay form-group text-center mr-1 ml-3 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                      <a href="{{ url('/login/google') }}">
                         <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/google.webp" alt="Google"/>
                      </a>
                    </div>
                    <div class="col-5 input-group-overlay form-group text-center mr-3 ml-1 p-1 py-2" style="border: 1px solid #000000;
    border-radius: 5px;">
                       <a href="{{ url('/login/facebook') }}">
                          <img class="lazy" width="120" height="120" src="{{ url('/') }}/public/img/facebook.webp" alt="Facebook"/>
                       </a>
                    </div>
                </div>
            </div>
            @endif
              <div class="align-items-center py-2 prod-item">
                <div class="card p-3">
                    <form method="POST" action="{{ route('register') }}" id="login_form" class="needs-validation" novalidate>
                @csrf
                <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(3237,$translate,'') }} <span class="required">*</span></label>
                  <input id="name" type="text" class="form-control" name="name" placeholder="{{ Helper::translation(3238,$translate,'') }}" value="{{ old('name') }}" data-bvalidator="required" autocomplete="name" autofocus>    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-ln">{{ Helper::translation(3111,$translate,'') }} <span class="required">*</span></label>
                  <input id="username" type="text" name="username" class="form-control" placeholder="{{ Helper::translation(3239,$translate,'') }}" data-bvalidator="required">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-email">{{ Helper::translation(3240,$translate,'') }} <span class="required">*</span></label>
                  <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ Helper::translation(3241,$translate,'') }}"  autocomplete="email" data-bvalidator="email,required">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-pass">{{ Helper::translation(3113,$translate,'') }} <span class="required">*</span></label>
                  <div class="password-toggle">
                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ Helper::translation(3242,$translate,'') }}" autocomplete="new-password" data-bvalidator="required,minlen[6]">@error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                     @enderror
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-confirm-pass">{{ Helper::translation(3114,$translate,'') }} <span class="required">*</span></label>
                  <div class="password-toggle">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ Helper::translation(3243,$translate,'') }}" data-bvalidator="equal[password],required,minlen[6]" autocomplete="new-password">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only">{{ Helper::translation(4866,$translate,'') }}</span>
                    </label>
                  </div>
                </div>
              </div>
              @if($additional->site_google_recaptcha == 1)
              <!--<div class="col-sm-12">-->
              <!--<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">-->
              <!--  <label>{{ Helper::translation(3244,$translate,'') }} <span class="required">*</span></label>-->
              <!--  {!! app('captcha')->display() !!}-->
              <!--                  @if ($errors->has('g-recaptcha-response'))-->
              <!--                      <span class="help-block">-->
              <!--                   <strong class="red">{{ $errors->first('g-recaptcha-response') }}</strong>-->
              <!--              </span>-->
              <!--       @endif-->
              <!--</div>-->
              <!--</div>-->
              @endif
              <div class="col-12 text-center">
                <div class="align-items-center">
                  <button class="btn btn-primary mt-3" type="submit">Create account</button>
                </div>
                <div class="custom-checkbox d-block pt-3">
                   {{ Helper::translation(3245,$translate,'') }} <a href="{{ URL::to('/login') }}" class="nav-link-inline font-size-sm">Sign In</a>
                  </div>
              </div>
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
<!-- End Login modal-->
<!--For Telegram Logo-->
<div class="elfsight-app-9b495655-72d5-4e8d-91d0-2e80dc46b1a6"></div>