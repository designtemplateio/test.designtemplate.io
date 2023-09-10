@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} -  Users By {{ Helper::translation(2865,$translate,'') }} </title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($addition_settings->subscription_mode == 0)

@else
	<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Users By {{ Helper::translation(2919,$translate,'') }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">Users By {{ Helper::translation(2919,$translate,'') }}</h1>
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
              <h2 class="h3 pt-2 pb-4 mb-0 text-center text-sm-left border-bottom">Users By {{ Helper::translation(2919,$translate,'') }}</h2>
              <!-- Product-->
                <div class="row">
                 <div class="col-lg-12 col-md-12 text-right mb-3 mt-3">
                 <a href="{{ URL::to('/add-coupon') }}" class="btn btn-success btn-sm">{{ Helper::translation(2865,$translate,'') }}</a>
                 </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                        <tr>
                                            <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                            <th> Users Name</th>
                                            <th>Payment Amount</th>
                                            <th>Discount Amount</th>
                                            <!--<th>{{ Helper::translation(2867,$translate,'') }}</th>-->
                                            <!--<th>{{ Helper::translation(2873,$translate,'') }}</th>-->
                                            <!--<th>{{ Helper::translation(2922,$translate,'') }}</th>-->
                                        </tr>
                                    </thead>
                                    
                                <tbody id="listShow">
                                   @php $no = 1; @endphp
                                    @foreach($couponData['view'] as $user_coupon)
                                      @if($user_coupon->user_coupon_code == $couponcode && $user_coupon->user_subscr_payment_status == 'completed')
                                         <tr>
                                         <td>{{ $no }}</td> 
                                         <td>{{ $user_coupon->name }}</td>
                                         <td>{{ $allsettings->site_currency_symbol }}{{ $user_coupon->user_subscr_price }}</td>
                                         <td>{{ $allsettings->site_currency_symbol }}{{ $user_coupon->user_subscr_discount_value }}</td>
                                         </tr>
                                      @endif
                                   @php $no++; @endphp
                                    @endforeach
                                </tbody>
                                    
                            </table>
                            <div class="pagination-area">
                           <div class="turn-page" id="itempager"></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        </div>
      </div>
    </div>
 
@endif
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif
           