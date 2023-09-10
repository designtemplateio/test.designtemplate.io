<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation('61b32a5049abd',$translate,'Deposit')); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0"><?php echo e(Helper::translation('61b32a5049abd',$translate,'Deposit')); ?></h1>
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
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i><?php echo e(Helper::translation(4878,$translate,'')); ?></a></div>
            <!-- Actual menu-->
            <?php if(Auth::user()->id != 1): ?>
            <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </aside>
          <!-- Content-->
          <section class="<?php if(Auth::user()->id == 1): ?> col-lg-12 pl-4 <?php else: ?> col-lg-8 <?php endif; ?> pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <form action="<?php echo e(route('deposit')); ?>" class="setting_form" id="checkout_form" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="order_firstname" value="<?php echo e(Auth::user()->name); ?>"> 
        <input type="hidden" name="order_email" value="<?php echo e(Auth::user()->email); ?>">
        <input type="hidden" name="website_url" value="<?php echo e(url('/')); ?>">
        <input type="hidden" name="token" class="token">
        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">
        <div class="dashboard_contents dashboard_statement_area newcontent">
            <div id="boxradio">
                 <section>
                   <div class="container">
                            <div class="row">
                            <?php $q = 1; ?>  
                            <?php $__currentLoopData = $deposit['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $priceval = $deposit->deposit_price + $deposit->deposit_bonus; ?>
                            <div class="col-lg-3 col-md-3">
                              <input type="radio" id="control_<?php echo e($deposit->dep_id); ?>" name="amount" value="<?php echo e(base64_encode($priceval)); ?>" <?php if($q==1): ?> checked <?php endif; ?>>
                              <label for="control_<?php echo e($deposit->dep_id); ?>">
                                <h2><?php echo e($deposit->deposit_price); ?> <?php echo e($allsettings->site_currency); ?></h2>
                                <p><?php if($deposit->deposit_bonus != 0): ?> <?php echo e('+'.$deposit->deposit_bonus); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e(Helper::translation('61b32a701a39d',$translate,'Bonus')); ?> <?php else: ?> <?php echo e(Helper::translation('61b32a78256e8',$translate,'No Bonus')); ?><?php endif; ?></p>
                              </label>
                            </div>
                            <?php $q++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                        </div>
                      </section>
                 </div>
            <!-- end /.container -->
        </div>
        <div class="dashboard_statement_area">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-12">
                         <div class="information_module payment_options">
                                <div class="toggle_title">
                                    <h4><?php echo e(Helper::translation(2902,$translate,'')); ?></h4>
                                </div>
                <div class="accordion mb-2" id="payment-method" role="tablist">
                <?php $no = 1; ?>
                <?php $__currentLoopData = $get_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                if($payment == '2checkout')
                {
                $payment = 'twocheckout';
                }
                else
                {
                $payment = $payment;
                }
                ?>
                <?php if($payment != 'wallet' && $payment != 'localbank'): ?>
                <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a href="#<?php echo e($payment); ?>" id="<?php echo e($payment); ?>" data-toggle="collapse"><?php echo e(Helper::translation(4899,$translate,'')); ?> <?php if($payment == 'twocheckout'): ?> <?php echo e(Helper::translation(4902,$translate,'')); ?> <?php else: ?> <?php echo e($payment); ?> <?php endif; ?><span class="accordion-indicator"><i data-feather="chevron-up"></i></span></a></h3>
                  </div>
                  <div class="collapse <?php if($no == 1): ?> show <?php endif; ?>" id="<?php echo e($payment); ?>" data-parent="#payment-method" role="tabpanel">
                  <?php if($payment == 'paypal'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" <?php if($no == 1): ?> checked <?php endif; ?> data-bvalidator="required"> <?php echo e(Helper::translation(5937,$translate,'')); ?></span> - <?php echo e(Helper::translation(4905,$translate,'')); ?></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation(4908,$translate,'')); ?></button>
                    </div>
                    <?php endif; ?>
                  <?php if($payment == 'stripe'): ?>
                    <div class="card-body font-size-sm custom-radio custom-control">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio"  value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation(5940,$translate,'')); ?></span> - <?php echo e(Helper::translation(2903,$translate,'')); ?></p>
                      <div class="stripebox mb-3" id="ifYes" style="display:none;">
                        <label for="card-element"><?php echo e(Helper::translation(2903,$translate,'')); ?></label>
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation(4911,$translate,'')); ?></button>
                    </div> 
                    <?php endif; ?>
                    <?php if($payment == 'twocheckout'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation(4902,$translate,'')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation(4917,$translate,'')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'paystack'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation(5946,$translate,'')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation(4920,$translate,'')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'razorpay'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b3bef1479',$translate,'Razorpay')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e663ece3b09',$translate,'Checkout with Razorpay')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'payhere'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b3cd8ac27',$translate,'Payhere')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e663f988601',$translate,'Checkout with Payhere')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'payumoney'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b3da527e2',$translate,'Payumoney')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e66402e3368',$translate,'Checkout with Payumoney')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'iyzico'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b3e6aeffc',$translate,'Iyzico')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e6640b08583',$translate,'Checkout with Iyzico')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'flutterwave'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b3f11e0a6',$translate,'Flutterwave')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e6641460cc4',$translate,'Checkout with Flutterwave')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'coingate'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b402f32fd',$translate,'Coingate')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e6641e704b8',$translate,'Checkout with Coingate')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'ipay'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b4103dfd2',$translate,'iPay')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('61e66427b4b8a',$translate,'Checkout with iPay')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'payfast'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6218b59ab7951',$translate,'PayFast')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('6218b5e25058d',$translate,'Checkout with PayFast')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'coinpayments'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('6239aeec916f7',$translate,'CoinPayments')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('623c029fc0a46',$translate,'Checkout with CoinPayments')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'sslcommerz'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('62e4d9e62756c',$translate,'SSLCommerz')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('62e4d9fad8b8f',$translate,'Checkout with SSLCommerz')); ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if($payment == 'instamojo'): ?>
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-<?php echo e($payment); ?>" name="payment_method" type="radio" class="custom_radio" value="<?php echo e($payment); ?>" data-bvalidator="required"> <?php echo e(Helper::translation('62e7ac5690b85',$translate,'Instamojo')); ?></span></p>
                      <button class="btn btn-primary" type="submit"><?php echo e(Helper::translation('62e7ac932f34f',$translate,'Checkout with Instamojo')); ?></button>
                    </div>
                    <?php endif; ?>
                   </div>
                </div>
                <?php endif; ?>
                <?php $no++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              </div>
            </div>
           </div>
        </div>
        </div>
       </form>
        </div>
          </section>
        </div>
      </div>
    </div><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/my-deposit.blade.php ENDPATH**/ ?>