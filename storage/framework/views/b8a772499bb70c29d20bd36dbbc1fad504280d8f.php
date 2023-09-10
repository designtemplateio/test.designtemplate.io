<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->
    <?php if(in_array('settings',$avilable)): ?>
    <div id="right-panel" class="right-panel">

       
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(5604,$translate,'')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.payment-settings')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                          <?php endif; ?>
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5706,$translate,'')); ?> (<?php echo e(Helper::translation(2871,$translate,'')); ?> %) <span class="require">*</span></label>
                                                <input id="site_exclusive_commission" name="site_exclusive_commission" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_exclusive_commission); ?>" required><small>(<?php echo e(Helper::translation(5709,$translate,'')); ?>)</small>
                                            </div>
                                            
                                           
                                          <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5712,$translate,'')); ?> (<?php echo e(Helper::translation(2871,$translate,'')); ?> %) <span class="require">*</span></label>
                                                <input id="site_non_exclusive_commission" name="site_non_exclusive_commission" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_non_exclusive_commission); ?>" required><small>(<?php echo e(Helper::translation(5709,$translate,'')); ?>)</small>
                                            </div> 
                                           
                                            
                                            
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5715,$translate,'')); ?> (<?php echo e($setting['setting']->site_currency); ?>)<span class="require">*</span></label>
                                                <input id="site_minimum_withdrawal" name="site_minimum_withdrawal" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_minimum_withdrawal); ?>" required>
                                            </div>    
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6411,$translate,'')); ?> <?php echo e(Helper::translation(2921,$translate,'')); ?><span class="require">*</span></label>
                                                <select name="per_sale_referral_commission_type" id="per_sale_referral_commission_type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="fixed" <?php if($additional['setting']->per_sale_referral_commission_type == 'fixed'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2872,$translate,'')); ?></option>
                                                <option value="percentage" <?php if($additional['setting']->per_sale_referral_commission_type == 'percentage'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2871,$translate,'')); ?></option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6411,$translate,'')); ?> <span id="nfixed" <?php if($additional['setting']->per_sale_referral_commission_type == 'fixed'): ?> class="inline-block" <?php else: ?>  class="display-none" <?php endif; ?>>(<?php echo e($setting['setting']->site_currency); ?>)</span><span id="npercentage" <?php if($additional['setting']->per_sale_referral_commission_type == 'percentage'): ?> class="inline-block" <?php else: ?>  class="display-none" <?php endif; ?>>(%)</span><span class="require">*</span></label>
                                                <input id="per_sale_referral_commission" name="per_sale_referral_commission" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->per_sale_referral_commission); ?>"  required>
                                            </div>
                                                
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2901,$translate,'')); ?> (<?php echo e(Helper::translation(5919,$translate,'')); ?>) <?php echo e(Helper::translation(2921,$translate,'')); ?><span class="require">*</span></label>
                                                <select name="site_extra_fee_type" id="site_extra_fee_type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="fixed" <?php if($additional['setting']->site_extra_fee_type == 'fixed'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2872,$translate,'')); ?></option>
                                                <option value="percentage" <?php if($additional['setting']->site_extra_fee_type == 'percentage'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2871,$translate,'')); ?></option>
                                                </select>
                                            </div>
                             
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2901,$translate,'')); ?> (<?php echo e(Helper::translation(5919,$translate,'')); ?>) <span id="iffixed" <?php if($additional['setting']->site_extra_fee_type == 'fixed'): ?> class="inline-block" <?php else: ?>  class="display-none" <?php endif; ?>>(<?php echo e($setting['setting']->site_currency); ?>)</span><span id="ifpercentage" <?php if($additional['setting']->site_extra_fee_type == 'percentage'): ?> class="inline-block" <?php else: ?>  class="display-none" <?php endif; ?>>(%)</span><span class="require">*</span></label>
                                                <input id="site_extra_fee" name="site_extra_fee" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_extra_fee); ?>" required><small>(<?php echo e(Helper::translation(5718,$translate,'')); ?>)</small>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6408,$translate,'')); ?> <?php echo e(Helper::translation(5721,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_referral_commission" name="site_referral_commission" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_referral_commission); ?>"  required>
                                            </div>
                                            
                                            
                                            
                              
                                                
                                                
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             
                             <div style="clear:both;"></div>
                             
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6396,$translate,'')); ?> </label><br/>
                                                <?php $__currentLoopData = $payment_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input id="payment_option" name="payment_option[]" type="checkbox" <?php if(in_array($payment,$get_payment)): ?> checked <?php endif; ?> class="noscroll_textarea" value="<?php echo e($payment); ?>"> <?php echo e($payment); ?> <br/>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </div>
                                            
                                      
                                        
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6399,$translate,'')); ?> </label><br/>
                                                <?php $__currentLoopData = $vendor_payment_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input id="vendor_payment_option" name="vendor_payment_option[]" type="checkbox" <?php if(in_array($payment,$get_vendor_payment)): ?> checked <?php endif; ?> class="noscroll_textarea" value="<?php echo e($payment); ?>"> <?php echo e($payment); ?> <br/>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </div>
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5730,$translate,'')); ?> </label><br/>
                                                <?php $__currentLoopData = $withdraw_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input id="withdraw_option" name="withdraw_option[]" type="checkbox" <?php if(in_array($withdraw,$get_withdraw)): ?> checked <?php endif; ?> class="noscroll_textarea" value="<?php echo e($withdraw); ?>"> <?php echo e($withdraw); ?><br/>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             
                             <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(5733,$translate,'')); ?></h4></div></div>
                             
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3214,$translate,'')); ?> </label><br/>
                                               <input id="paypal_email" name="paypal_email" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->paypal_email); ?>" required>
                                                
                                                
                                             </div>
                                            
                                      
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5736,$translate,'')); ?> </label><br/>
                                               
                                                <select name="paypal_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->paypal_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->paypal_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             
                             
                            <?php /*?><input type="hidden" name="two_checkout_mode" value="{{ $setting['setting']->two_checkout_mode }}">
                            <input type="hidden" name="two_checkout_account" value="{{ $setting['setting']->two_checkout_account }}">
                            <input type="hidden" name="two_checkout_publishable" value="{{ $setting['setting']->two_checkout_publishable }}">
                            <input type="hidden" name="two_checkout_private" value="{{ $setting['setting']->two_checkout_private }}"><?php */?>
                             <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(6339,$translate,'')); ?></h4>
                             
                             </div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6342,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               
                                                <select name="two_checkout_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="true" <?php if($setting['setting']->two_checkout_mode == 'true'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="false" <?php if($setting['setting']->two_checkout_mode == 'false'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6345,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <input id="two_checkout_account" name="two_checkout_account" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->two_checkout_account); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                             <br/>
                                             <p><?php echo e(Helper::translation(6402,$translate,'')); ?> : <code><?php echo e(url('/')); ?>/2checkout-success</code> <br/> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="blue-color"><?php echo e(Helper::translation(6405,$translate,'')); ?>?</a></p>
                                            
                                      
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            


                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6348,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <input id="two_checkout_publishable" name="two_checkout_publishable" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->two_checkout_publishable); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(6351,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <input id="two_checkout_private" name="two_checkout_private" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->two_checkout_private); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(5763,$translate,'')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5766,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <input id="paystack_public_key" name="paystack_public_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->paystack_public_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5769,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <input id="paystack_secret_key" name="paystack_secret_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->paystack_secret_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5772,$translate,'')); ?>  <span class="require">*</span></label><br/>
                                               <input id="paystack_merchant_email" name="paystack_merchant_email" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->paystack_merchant_email); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(5775,$translate,'')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:0px;"></div>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5778,$translate,'')); ?> <span class="require">*</span></label><br/>
                                               <textarea name="local_bank_details" class="form-control noscroll_textarea" data-bvalidator="required" rows="5" cols="20"><?php echo e($setting['setting']->local_bank_details); ?></textarea>
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:0px;"></div>
                                                
                                             </div>
                                             <div class="form-group">
                                               <strong><?php echo e(Helper::translation(2968,$translate,'')); ?>:<br/><br/>

                                                <?php echo e(Helper::translation(5781,$translate,'')); ?> : Test Bank<br/>
                                                <?php echo e(Helper::translation(5784,$translate,'')); ?> : Test Branch<br/>
                                                <?php echo e(Helper::translation(5787,$translate,'')); ?> : 00000<br/>
                                                <?php echo e(Helper::translation(5790,$translate,'')); ?> : 63632EF</strong>
                                              </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             <div class="col-md-12"><div class="card-body"><h4>Razorpay Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Razorpay Key Id <span class="require">*</span></label><br/>
                                               <input id="razorpay_key" name="razorpay_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->razorpay_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Razorpay Secret Key <span class="require">*</span></label><br/>
                                               <input id="razorpay_secret" name="razorpay_secret" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->razorpay_secret); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><div class="card-body"><h4>Payhere Settings</h4></div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payhere Mode </label><br/>
                                               
                                                <select name="payhere_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->payhere_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional['setting']->payhere_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payhere Merchant Id <span class="require">*</span></label><br/>
                                               <input id="payhere_merchant_id" name="payhere_merchant_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->payhere_merchant_id); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Payumoney Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Mode </label><br/>
                                               
                                                <select name="payumoney_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->payumoney_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional['setting']->payumoney_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Merchant Key <span class="require">*</span></label><br/>
                                               <input id="payu_merchant_key" name="payu_merchant_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->payu_merchant_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Salt Key <span class="require">*</span></label><br/>
                                               <input id="payu_salt_key" name="payu_salt_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->payu_salt_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Iyzico Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico Mode </label><br/>
                                               
                                                <select name="iyzico_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->iyzico_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional['setting']->iyzico_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico API Key <span class="require">*</span></label><br/>
                                               <input id="iyzico_api_key" name="iyzico_api_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->iyzico_api_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico Secret Key <span class="require">*</span></label><br/>
                                               <input id="iyzico_secret_key" name="iyzico_secret_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->iyzico_secret_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Flutterwave Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flutterwave Public Key <span class="require">*</span></label><br/>
                                               <input id="flutterwave_public_key" name="flutterwave_public_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->flutterwave_public_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flutterwave Secret Key <span class="require">*</span></label><br/>
                                               <input id="flutterwave_secret_key" name="flutterwave_secret_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->flutterwave_secret_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Coingate Settings</h4></div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Coingate Mode <span class="require">*</span></label><br/>
                                               
                                                <select name="coingate_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->coingate_mode == 1): ?> selected <?php endif; ?>>Live</option>
                                                <option value="0" <?php if($additional['setting']->coingate_mode == 0): ?> selected <?php endif; ?>>Demo</option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Coingate Auth Token <span class="require">*</span></label><br/>
                                               <input id="coingate_auth_token" name="coingate_auth_token" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->coingate_auth_token); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>iPay Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay Mode <span class="require">*</span></label><br/>
                                               
                                                <select name="ipay_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->ipay_mode == 1): ?> selected <?php endif; ?>>Live</option>
                                                <option value="0" <?php if($additional['setting']->ipay_mode == 0): ?> selected <?php endif; ?>>Demo</option>
                                                </select>
                                                
                                             </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay Vendor ID  <span class="require">*</span></label><br/>
                                               <input id="ipay_vendor_id" name="ipay_vendor_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->ipay_vendor_id); ?>" data-bvalidator="required">
                                                
                                                
                                             </div> 
                                             
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay API / Hash Key  <span class="require">*</span></label><br/>
                                               <input id="ipay_hash_key" name="ipay_hash_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->ipay_hash_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation('6218762e94c5f',$translate,'PayFast Settings')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('621876362e40d',$translate,'PayFast Merchant Id')); ?> <span class="require">*</span></label><br/>
                                               <input id="payfast_merchant_id" name="payfast_merchant_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->payfast_merchant_id); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('6218763d64d9d',$translate,'PayFast Merchant Key')); ?> <span class="require">*</span></label><br/>
                                               <input id="payfast_merchant_key" name="payfast_merchant_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->payfast_merchant_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('621876444d7c6',$translate,'PayFast Mode')); ?> <span class="require">*</span></label><br/>
                                               
                                                <select name="payfast_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->payfast_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional['setting']->payfast_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation('6239aeec916f7',$translate,'CoinPayments')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('6239af5f4c884',$translate,'CoinPayments Merchant ID')); ?> <span class="require">*</span></label><br/>
                                               <input id="coinpayments_merchant_id" name="coinpayments_merchant_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->coinpayments_merchant_id); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation('62e27d991cd94',$translate,'SSLCommerz Settings')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e27dc30af79',$translate,'SSLCommerz Store Id')); ?> <span class="require">*</span></label><br/>
                                               <input id="sslcommerz_store_id" name="sslcommerz_store_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->sslcommerz_store_id); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e27dda2123e',$translate,'SSLCommerz Store Password')); ?> <span class="require">*</span></label><br/>
                                               <input id="sslcommerz_store_password" name="sslcommerz_store_password" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->sslcommerz_store_password); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e27df07e1f9',$translate,'SSLCommerz Mode')); ?> <span class="require">*</span></label><br/>
                                               
                                                <select name="sslcommerz_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="FALSE" <?php if($additional['setting']->sslcommerz_mode == 'FALSE'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="TRUE" <?php if($additional['setting']->sslcommerz_mode == 'TRUE'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation('62e77d748ab7b',$translate,'Instamojo Settings')); ?></h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e77da89fefd',$translate,'Instamojo API Key')); ?> <span class="require">*</span></label><br/>
                                               <input id="instamojo_api_key" name="instamojo_api_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->instamojo_api_key); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e77db17d5dc',$translate,'Instamojo Auth Token')); ?> <span class="require">*</span></label><br/>
                                               <input id="instamojo_auth_token" name="instamojo_auth_token" type="text" class="form-control noscroll_textarea" value="<?php echo e($additional['setting']->instamojo_auth_token); ?>" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('62e77e033d3b4',$translate,'Instamojo Mode')); ?> <span class="require">*</span></label><br/>
                                               
                                                <select name="instamojo_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($additional['setting']->instamojo_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional['setting']->instamojo_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <?php /*?><div class="col-md-12"><div class="card-body"><h4>{{ Helper::translation('62726cefab2f3',$translate,'Mercadopago Settings') }}</h4></div></div>
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('62726d0033058',$translate,'Client Id') }} <span class="require">*</span></label><br/>
                                               <input id="mercadopago_client_id" name="mercadopago_client_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->mercadopago_client_id }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                            
                                          
                                          <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('62726d1591ac7',$translate,'Client Secret') }} <span class="require">*</span></label><br/>
                                               <input id="mercadopago_client_secret" name="mercadopago_client_secret" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->mercadopago_client_secret }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('62726d34bd4de',$translate,'Mercadopago Mode') }}<span class="require">*</span></label><br/>
                                               
                                                <select name="mercadopago_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->mercadopago_mode == 1) selected @endif>{{ Helper::translation(5739,$translate,'') }}</option>
                                                <option value="0" @if($additional['setting']->mercadopago_mode == 0) selected @endif>{{ Helper::translation(5742,$translate,'') }}</option>
                                                </select>
                                                
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <?php */?> 
                            
                            <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(5745,$translate,'')); ?></h4></div></div>
                             
                             
                              <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5748,$translate,'')); ?> </label><br/>
                                               
                                                <select name="stripe_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->stripe_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5739,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->stripe_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5742,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5751,$translate,'')); ?> </label><br/>
                                               <input id="test_publish_key" name="test_publish_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->test_publish_key); ?>" required>
                                                
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5754,$translate,'')); ?> </label><br/>
                                               <input id="live_publish_key" name="live_publish_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->live_publish_key); ?>" required>
                                                
                                                
                                             </div>
                                            
                                      
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:65px;"></div>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5757,$translate,'')); ?> </label><br/>
                                               <input id="test_secret_key" name="test_secret_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->test_secret_key); ?>" required>
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5760,$translate,'')); ?> </label><br/>
                                               <input id="live_secret_key" name="live_secret_key" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->live_secret_key); ?>" required>
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> <?php echo e(Helper::translation(2876,$translate,'')); ?>

                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> <?php echo e(Helper::translation(4962,$translate,'')); ?>

                                                        </button>
                                                    </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="myModal" class="modal fade 2checkout" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img class="lazy" width="1223" height="678" src="<?php echo e(url('/')); ?>/public/img/2checkout_info.png"  class="img-responsive">
        </div>
    </div>
  </div>
</div>

</body>

</html>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/payment-settings.blade.php ENDPATH**/ ?>