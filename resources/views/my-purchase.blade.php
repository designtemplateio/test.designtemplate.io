<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(3024,$translate,'') }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ Helper::translation(3024,$translate,'') }}</h1>
        </div>
      </div>
</div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <aside class="col-lg-4">
            <!-- Account menu toggler (hidden on screens larger 992px)-->
            <div class="d-block d-lg-none p-4">
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i>{{ Helper::translation(4878,$translate,'') }}</a></div>
            <!-- Actual menu-->
            @if(Auth::user()->id != 1)
            @include('dashboard-menu')
            @endif
          </aside>
          <!-- Content-->
          
        
<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
  <div class="pt-2 px-4 pl-lg-0 pr-xl-5"> 
    <ul class="nav nav-tabs">
      <li class="active px-5"><a data-toggle="tab" href="#free"><p class="card-text p-2">Free Files</p></a></li>
      <li class="px-5"><a data-toggle="tab" href="#subscr"><p class="card-text px-2 p-2">Subscription</p></a></li>
      <li class="px-5"><a data-toggle="tab" href="#paid"><p class="card-text px-2 p-2">Purchased</p></a></li>
    </ul>

    <div class="tab-content">
        @if(count($free_items) != 0)
        <section class="tab-pane fade in active" id="free">
            <h3>Free Files</h3>
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <div class="align-items-center py-4 border-bottom prod-item">
                @foreach($free_items as $item)
                <div class="row d-flex mb-2">
                  <div class="col-lg-8 d-flex px-4">
                    <h3 class="h6 product-title mb-2 pt-3"><a href="{{ url('/item') }}/{{ $item->item_slug }}">{{ $item->item_name }}</a></h3>
                  </div>
                  @if($item->created_at == date('Y-m-d'))
                  <div class="col-lg-4 d-flex">
                      <a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ url('/') }}/today/download/{{ base64_encode($item->item_token) }}"><i class="material-symbols-outlined">download</i></a>
                  </div>
                  @else
                  <div class="col-lg-4 d-flex">
                     <h3 class="h6 product-title mb-2 pt-3">{{ $item->created_at }}</h3>
                  </div>
                  @endif
                </div>
                @endforeach
              </div>
        </section>
        @else
        <section class="tab-pane fade in active" id="free">
            <h3>Free Files</h3>
             <div class="pt-5 px-4 pl-lg-0 pr-xl-5" align="center">
                  No Downloads Yet? Check our collection of 20,000 assets
                    <br>
                  <a href="{{ URL::to('/templates') }}"><button class="get_licence m-2 mt-5 px-5"> Explore </button></a>
             </div>
        </section>
        @endif
    
       @if(count($subscription_items) != 0)
          <section class="tab-pane fade" id="subscr">
            <h3>Subscription Files</h3>
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              @foreach($subscription_items as $item)
                <div class="row d-flex mb-2">
                  <div class="col-lg-8 d-flex px-4">
                    <h3 class="h6 product-title mb-2 pt-3"><a href="{{ url('/item') }}/{{ $item->item_slug }}">{{ $item->item_name }}</a></h3>
                  </div>
                 @if($item->created_at == date('Y-m-d'))
                  <div class="col-lg-4 d-flex">
                      <a class="btn btn-light btn-icon btn-shadow font-size-base" href="{{ url('/') }}/today/download/{{ base64_encode($item->item_token) }}"><i class="material-symbols-outlined">download</i></a>
                  </div>
                  @else
                  <div class="col-lg-4 d-flex">
                     <h3 class="h6 product-title mb-2 pt-3">{{ $item->created_at }}</h3>
                  </div>
                  @endif
                </div>
              @endforeach
            </div>
          </section>
        @else
          <section class="tab-pane fade" id="subscr">
              <h3>Subscription Files</h3>
            <div class="pt-5 px-4 pl-lg-0 pr-xl-5" align="center">
               No Downloads Yet? Check our collection of 20,000 assets
               <br>
               <a href="{{ URL::to('/templates') }}"><button class="get_licence m-2 mt-5 px-5"> Explore </button></a>
            </div>
          </section>
        @endif
        
       @if(count($orderData['item']) != 0)
          <section class="tab-pane fade" id="paid">
            <h3>Purchased</h3>
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <div class="row mx-n2 pt-2">
                @if(Auth::user()->user_type == 'customer')
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted">{{ Helper::translation(3169,$translate,'') }}</h3>
                    <p class="h2 mb-2">{{ $allsettings->site_currency_symbol }}{{ $purchase_sale }}</p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted">{{ Helper::translation(3171,$translate,'') }}</h3>
                    <p class="h2 mb-2">{{ $allsettings->site_currency_symbol }}{{ $drawal_amount }}</p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted">{{ Helper::translation(5721,$translate,'') }}</h3>
                    <p class="h2 mb-2">{{ $allsettings->site_currency_symbol }}{{ Auth::user()->referral_amount }}</p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted">{{ Helper::translation('61e6773edfa2f',$translate,'Total Referrals') }}</h3>
                    <p class="h2 mb-2">{{ Auth::user()->referral_count }}</p>
                  </div>
                </div>
                @endif
              </div>
              @foreach($orderData['item'] as $item)
              <div class="row media d-block d-sm-flex align-items-center py-4 border-bottom prod-item">
                  <div class="col-lg-4 px-2">
                  <h3 class="h6 product-title mb-2 pt-3"><a href="{{ url('/item') }}/{{ $item->item_slug }}">{{ $item->item_name }}</a></h3>
                  </div>
                  <div class="col-lg-4 px-2">
                   @if($item->approval_status != 'payment released to customer')
                   @if($item->approval_status == 'payment released to vendor')
                    @if($item->rating != 0)
                    <a class="d-block text-muted text-center my-2" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_{{ $item->ord_id }}">
                      <div class="star-rating">
                      @if($item->rating == 1)
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      @endif
                      @if($item->rating == 2)
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      @endif
                      @if($item->rating == 3)
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      @endif
                      @if($item->rating == 4)
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      @endif
                      @if($item->rating == 5)
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      @endif
                      </div>
                      <div class="font-size-xs">{{ Helper::translation(6060,$translate,'') }}</div>
                      </a>
                      @else
                      <a class="d-block text-muted text-center my-2" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_{{ $item->ord_id }}">
                      <div class="star-rating">
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      </div>
                      <div class="font-size-xs">{{ Helper::translation(6060,$translate,'') }}</div>
                      </a>
                      @endif
                      @endif
                      @endif
                  </div>
                  @if($item->approval_status != 'payment released to customer')
                  <div class="col-lg-4 d-flex">
                  <a href="{{ url('/purchases') }}/{{ $item->item_token }}" class="btn btn-success btn-sm mr-3 my-3"><i class="dwg-download mr-1"></i>{{ Helper::translation(3144,$translate,'') }}</a>
                  <a href="{{ url('/invoice') }}/{{ $item->item_token }}/{{ $item->ord_id }}" class="btn btn-primary btn-sm mr-3 my-3"><i class="dwg-download mr-1"></i>{{ Helper::translation(6063,$translate,'') }}</a><br/>
                  </div>
                  @endif
                </div>
                <div class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto">
                <!--<div class="font-size-sm mb-1"><strong>{{ Helper::translation(3173,$translate,'') }}:</strong> {{ $item->purchase_token }}</div>-->
                <?php /*?><div class="font-size-sm mb-1"><strong>{{ Helper::translation(6051,$translate,'') }}:</strong> {{ $item->purchase_token }}</div><?php */?>
                <!--<div class="font-size-sm mb-1"><strong>{{ Helper::translation(3102,$translate,'') }}</strong> {{ date("d F Y", strtotime($item->start_date)) }}</div>-->
                <!--<div class="font-size-sm mb-1"><strong>{{ Helper::translation(3103,$translate,'') }}</strong> {{ date("d F Y", strtotime($item->end_date)) }}</div>-->
                <!--<div class="font-size-sm mb-1"><strong>{{ Helper::translation(3105,$translate,'') }}</strong> {{ $item->license }}</div>-->
                @php
                $moneyback_days = '+'.$item->seller_money_back_days.' days';
                $getdate = strtotime($item->start_date. $moneyback_days);
                $today_date = date('Y-m-d');
                $todays=strtotime($today_date);
                @endphp
                @if($addition_settings->refund_mode == 1)
                  @if($item->approval_status != 'payment released to customer')
                  @if($item->seller_money_back == 1)
                  @if($todays <= $getdate)
                  <div class="font-size-sm mb-1"><strong>{{ Helper::translation(3143,$translate,'') }}</strong> <a href="javascript:void(0);" data-toggle="modal" data-target="#refund_{{ $item->ord_id }}"> {{ Helper::translation(6066,$translate,'') }}</a></div>
                  @endif
                  @endif
                  @endif
                @endif  
                  <?php /*?><a href="{{ url('/conversation-to-vendor') }}/{{ $item->username }}/{{ $encrypter->encrypt($item->ord_id) }}" class="btn btn-info btn-sm"><i class="dwg-chat mr-1"></i> {{ Helper::translation(6315,$translate,'') }} ({{ $countdata->has($item->ord_id) ? count($countdata[$item->ord_id]) : 0 }})</a><?php */?>
                </div>
              </div>
              <div class="modal fade" id="myModal_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ Helper::translation(3153,$translate,'') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{ route('purchases') }}" method="post" id="profile_form" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <div class="modal-body">
                    <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                    <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                    <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                    <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                    <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                    <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{ Helper::translation(3154,$translate,'') }}</label>
            <select name="rating" class="form-control" required>
                                        <option value="1" @if($item->rating == 1) selected @endif>1</option>
                                        <option value="2" @if($item->rating == 2) selected @endif>2</option>
                                        <option value="3" @if($item->rating == 3) selected @endif>3</option>
                                        <option value="4" @if($item->rating == 4) selected @endif>4</option>
                                        <option value="5" @if($item->rating == 5) selected @endif>5</option>
                                    </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">{{ Helper::translation(3155,$translate,'') }}</label>
           <select name="rating_reason" class="form-control" required>
                                            <option value="design" @if($item->rating_reason == 'design') selected @endif>{{ Helper::translation(3156,$translate,'') }}</option>
                                            <option value="customization" @if($item->rating_reason == 'customization') selected @endif>{{ Helper::translation(3157,$translate,'') }}</option>
                                            <option value="support" @if($item->rating_reason == 'support') selected @endif>{{ Helper::translation(3055,$translate,'') }}</option>
                                            <option value="performance" @if($item->rating_reason == 'performance') selected @endif>{{ Helper::translation(3158,$translate,'') }}</option>
                                            <option value="documentation" @if($item->rating_reason == 'documentation') selected @endif>{{ Helper::translation(3159,$translate,'') }}</option>
                                        </select>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">{{ Helper::translation(3054,$translate,'') }}</label>
          <textarea name="rating_comment" id="rating_comment" class="form-control" required>{{ $item->rating_comment }}</textarea>
                            <p>{{ Helper::translation(3160,$translate,'') }}</p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ Helper::translation(4926,$translate,'') }}</button>
        <button type="submit" class="btn btn-primary btn-sm">{{ Helper::translation(3161,$translate,'') }}</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="refund_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ Helper::translation(3143,$translate,'') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('refund') }}" method="post" id="profile_form" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                    <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                    <input type="hidden" name="purchased_token" value="{{ $item->purchase_token }}">
                    <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                    <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                    <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                    <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{ Helper::translation(3146,$translate,'') }}</label>
            <select name="refund_reason" class="form-control" required>
                             <option value="{{ Helper::translation(3147,$translate,'') }}">{{ Helper::translation(3147,$translate,'') }}</option>
                                            <option value="{{ Helper::translation(3148,$translate,'') }}">{{ Helper::translation(3148,$translate,'') }}</option>
                                            <option value="{{ Helper::translation(3149,$translate,'') }}">{{ Helper::translation(3149,$translate,'') }}</option>
                                            <option value="{{ Helper::translation(3150,$translate,'') }}">{{ Helper::translation(3150,$translate,'') }}</option>
                                            <option value="{{ Helper::translation(3151,$translate,'') }}">{{ Helper::translation(3151,$translate,'') }}</option>
                                        </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">{{ Helper::translation(3054,$translate,'') }}</label>
            <textarea name="refund_comment" id="refund_comment" class="form-control" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ Helper::translation(4926,$translate,'') }}</button>
        <button type="submit" class="btn btn-primary btn-sm">{{ Helper::translation(3152,$translate,'') }}</button>
      </div>
      </form>
    </div>
  </div>
 </div>
     @endforeach
      <!-- Product-->
       
       <div class="pagination-area">
        <div class="turn-page" id="itempager"></div>
         </div>
         </div>
          </section>
        @else
          <section class="tab-pane fade" id="paid">
               <h3>Purchased</h3>
            <div class="pt-4 px-4 pl-lg-0 pr-xl-5" align="center">
               No Downloads Yet? Check our collection of 20,000 assets
               <br>
               <a href="{{ URL::to('/templates') }}"><button class="get_licence m-2 mt-5 px-5"> Explore </button></a>
            </div>
          </section>
        @endif
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
<style>
    
    .nav-tabs>li.active>a p, .nav-tabs>li.active>a:focus p , .nav-tabs>li.active>a:hover
    {
         color: blue;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
.fade.in {
     opacity: 1; 
}
</style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>