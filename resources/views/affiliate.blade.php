@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Affiliate Program - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($addition_settings->subscription_mode == 0)
<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Affiliate Program</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">Affiliate Program</h1>
        </div>
      </div>
    </div>
@else
    <div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Affiliate Program</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">Affiliate Program</h1>
        </div>
      </div>
    </div>
<div class="container-fluid mb-5 pb-3">
      <div class="bg-light rounded-lg shadow-lg overflow-hidden">
      <div class="row">
		<div class="col-lg-6 col-md-12 col-xm-12 border-right">
			<div class="card overflow-hidden border-0">
				<div class="card-body pt-7 pb-6">
					<h3 class="card-title fs-20 text-center">Affiliate Program</h3>
					<p class="fs-12 text-center pl-6 pr-6 mb-6">Invite your friends, and when they register, you can get a commission of their first purchase.</p>
					<div class="row text-center justify-content-md-center">
						<div class="col-md-3 col-sm-12 referral-box special-shadow">
						<div class="panel panel-default">
                             <div class="panel-heading">
                                @if(Auth::user()->referral_count >= 1) 
                                <div class="bg-secondary h-100 rounded-lg p-2 text-center">							
						      	   <i class="fa fa-users p-2 pb-4" style="color:#3F57EF;"></i>
                                   <h3 class="font-size-base mb-2 panel-title" data-toggle="collapse" data-target="#collapseOne">See My Referrals</h3>
                                </div>
                                @else
                                <div class="bg-secondary h-100 rounded-lg p-2 text-center">	
                                   <i class="fa fa-share p-2 pb-4" style="color:#3F57EF;"></i>
                                   <h3 class="font-size-base mb-2 panel-title">Send Link & Earn Money</h3>
                                </div>
                                @endif
                             </div>
                           </div>
						</div>
						<div class="col-md-3 col-sm-12 referral-box special-shadow">
							<div class="bg-secondary h-100 rounded-lg p-2 text-center">						
						      	   <i class="fa fa-credit-card p-2 pb-4" style="color:#3F57EF;"></i>
                                  <a class="fs-12 font-weight-bold" href="https://designtemplate.io/withdrawal"> <h3 class="font-size-base mb-2 panel-title" >My Payouts</h3></a>
                            </div>
						</div>
						<div class="col-md-3 col-sm-12 referral-box special-shadow">
							<div class="bg-secondary h-100 rounded-lg p-2 text-center">							
						      	   <i class="fa fa-money p-2 pb-4" style="color:#3F57EF;"></i>
                                  <a class="fs-12 font-weight-bold" href="https://designtemplate.io/withdrawal"> <h3 class="font-size-base mb-2 panel-title" >My Gateways</h3></a>
                            </div>
						</div>
					</div>

					<div class="row mt-7 ml-4 mr-4">						
						<div class="col-md-12 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark">{{ __('My Referral URL') }}</h6>							
								<div class="form-group referral-social-icons">									 							    
									<div class="form-group d-flex">
                                       <input type="text" value="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" id="myInput" class="form-control" readonly="readonly"><a href="javascript:void(0)" class="btn btn-primary btn-sm pt-2 ml-2" onclick="myFunction()" id="actions-copy" data-link="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" data-tippy-content="Copy Referral Link"><i class="fa fa-link"></i></a>
                                     </div>
								</div> 
							</div>
						</div>
					</div>

					<div class="row mt-2 px-3">						
						<div class="col-md-6 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark">{{ __('My Earned Commissions') }}</h6>							
								<p class="font-size-sm">{{ $allsettings->site_currency_symbol }}{{ Auth::user()->referral_amount }}</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark">{{ __('Referral Commission Rate') }}</h6>							
								<p class="font-size-sm">{{ $allsettings->site_referral_commission }}%</p>
							</div>
						</div>
					</div>

					<div class="row mt-2 px-3">
					    <div class="col-md-6 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark">{{ Helper::translation('61e6773edfa2f',$translate,'Total Referrals') }}</h6>							
								<p class="font-size-sm">{{ Auth::user()->referral_count }}</p>
							</div>
						</div>						
						<div class="col-md-6 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark">{{ __('Referral Policy') }}</h6>							
								<p class="font-size-sm">{{ __('First Successful Subscription Plan Registration') }}</p>
							</div>
						</div>
					</div>

					<div class="row mt-2 p-2 m-2">						
						<div class="col-md-12 col-sm-12">							
							<div class="input-box">		
								<h6 class="font-size-sm text-dark mb-3">{{ __('Referral Guidelines') }}</h6>
								<p class="font-size-sm">
								 <ol class="font-size-sm">
								    <li class="py-2"> Share your referral link with your friends to register</li>
								    <li class="py-2"> For their subscription, you will receive a commissions</li>
                                    <li class="py-2"> You receive your commissions in your account.</li>
                                    <li class="py-2"> Send us Withdraw Resquest.</li>
                                    <li class="py-2"> Then You will get your earning.</li>
								</ol>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-body pt-7 pb-6">
					<h3 class="card-title fs-20 text-center">{{ __('How it Works') }}</h3>
					<div class="row pt-2">
                <div class="col-md-4 col-sm-12 px-2 mb-2">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <i class="fa fa-share p-2 pb-4" style="color:#3F57EF;"></i>
                    <h3 class="font-size-sm text-dark">Send Invitation</h3>
                    <p class="font-size-sm text-muted mb-2">Send your referral link to your friends and tell them how cool is DesignTemplate!</p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-2">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <i class="fa fa-user-plus p-2 pb-4" style="color:#3F57EF;"></i>
                    <h3 class="font-size-sm text-dark">Registration</h3>
                    <p class="font-size-sm text-muted mb-2">Let them register using your referral link.</p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-2">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <i class="fa fa-money p-2 pb-4" style="color:#3F57EF;"></i>
                    <h3 class="font-size-sm text-dark">Get Commissions</h3>
                    <p class="font-size-sm text-muted mb-2">Earn commission for their first registration.</p>
                  </div>
                </div>
                </div>
				
				
					<div class="row mt-6 ml-3 mr-6">
						<h6 class="font-size-sm text-dark">{{ __('Share the referral link') }}</h6>
						<p class="font-size-sm mb-2">{{ __('You can also share your referral link by copying and sending it or sharing it on your social media profiles') }}.</p> 
						<div class="col-md-8 col-sm-12">							
							<div class="input-box">									
								<div class="form-group">							    
									<input type="text" value="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" id="myInput" class="form-control" readonly="readonly">
								</div> 
							</div>
						</div>
						<div class="col-md-4 col-sm-12 referral-social-icons text-right pt-4">
                          <div class="widget mt-4 text-md-nowrap text-center text-md-right">
                            <i class="dwg-share-alt font-size-lg align-middle text-muted mr-2"></i>
                            <a class="social-btn sb-outline sb-facebook sb-sm ml-2 share-button" data-share-url="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" data-share-network="facebook" data-share-text="Open the link To get More Design Templates" data-share-title="{{ Auth::user()->name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="" href="javascript:void(0)"><i class="dwg-facebook"></i></a>
                <a class="social-btn sb-outline sb-twitter sb-sm ml-2 share-button"  data-share-network="twitter" data-share-url="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" data-share-text="Open the link To get More Design Templates" data-share-title="{{ Auth::user()->name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="" href="javascript:void(0)"><i class="dwg-twitter"></i></a>
                <a class="social-btn sb-outline sb-pinterest sb-sm ml-2 share-button"  data-share-network="pinterest" data-share-url="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" data-share-text="Open the link To get More Design Templates" data-share-title="{{ Auth::user()->name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="" href="javascript:void(0)"><i class="dwg-pinterest"></i></a>
                <a class="social-btn sb-outline sb-linkedin sb-sm ml-2 share-button"  data-share-network="linkedin" data-share-url="{{ URL::to('/') }}/?ref={{ Auth::user()->id }}" data-share-text="Open the link To get More Design Templates" data-share-title="{{ Auth::user()->name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="" href="javascript:void(0)"><i class="dwg-linkedin"></i></a>
                           </div>
                        </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if(Auth::user()->referral_count >= 1)
	<div class="overflow-hidden bg-light rounded-lg shadow-lg text-center justify-content-center">
        <div class="row mx-n2 text-center">
            <div class="col-md-12">
	            <div class="panel panel-default">
                     <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email Id</th>
                                    </tr>
                                </thead>
                                <tbody id="listShow">
                                    @foreach($referral_by['user'] as $users)
                                    @if($users->referral_by == Auth::user()->id)
                                    <tr>
                                        <td>{{ $users->name}}</td>
                                        <td class="author">{{ $users->username }}</td>
                                        <td class="type"> {{ $users->email }} </td>
                                    </tr>
                                    @endif
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
                 </div>
               </div>
            </div>
        @else
        @endif
            
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




