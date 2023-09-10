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
                        <h1><?php echo e(Helper::translation(5283,$translate,'')); ?></h1>
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
                           <form action="<?php echo e(route('admin.general-settings')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5286,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_title" name="site_title" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_title); ?>" required>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(5289,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="site_desc" id="site_desc" rows="6" placeholder="site description" class="form-control noscroll_textarea" maxlength="160" required><?php echo e($setting['setting']->site_desc); ?></textarea>
                                            </div>
                                                
                                               <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1"><?php echo e(Helper::translation(5292,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="site_keywords" id="site_keywords" rows="6" placeholder="separate keywords with commas" class="form-control noscroll_textarea" maxlength="160" required><?php echo e($setting['setting']->site_keywords); ?></textarea>
                                            </div>  
                                                
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5295,$translate,'')); ?>? <span class="require">*</span></label>
                                                <select name="item_approval" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->item_approval == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->item_approval == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                                <small>(<?php echo e(Helper::translation(5298,$translate,'')); ?>) </small>
                                                
                                            </div> 
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('61dd2e2588231',$translate,'URL Rewriting')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_url_rewrite" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_url_rewrite == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_url_rewrite == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                              <small>(<?php echo e(Helper::translation('61dd3024981c6',$translate,'if "ON" search engine friendly')); ?>) </small>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('6208d9b617ccc',$translate,'Invoice (PDF) Multi-language')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_invoice" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_invoice == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_invoice == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                              <small>(<?php echo e(Helper::translation('6208dbf6e5511',$translate,'if "OFF" keep english language')); ?>) </small>
                                            </div>
                                                                                        
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5301,$translate,'')); ?></label>
                                                <input id="office_email" name="office_email" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->office_email); ?>" required>
                                            </div>
                                                
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5304,$translate,'')); ?></label>
                                                <input id="office_phone" name="office_phone" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->office_phone); ?>" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(5307,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="office_address" id="office_address" rows="6" class="form-control noscroll_textarea" required><?php echo e($setting['setting']->office_address); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('61dd0addc4b20',$translate,'site email address display on contact page')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_email_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_email_display == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_email_display == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                            </div>   
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('61dd0afde3368',$translate,'site phone number display on contact page')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_phone_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_phone_display == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_phone_display == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('61dd0b1c91326',$translate,'site address display on contact page')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_address_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_address_display == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_address_display == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1"><?php echo e(Helper::translation(5310,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_newsletter" name="site_newsletter" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_newsletter); ?>" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5313,$translate,'')); ?></label>
                                                <input id="google_analytics" name="google_analytics" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->google_analytics); ?>">
                                                <span>Example : UA-XXXXX-Y</span>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5316,$translate,'')); ?>?</label>
                                                <select name="multi_language" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->multi_language == "1"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->multi_language == "0"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                                
                                                
                                            </div> 
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation(5319,$translate,'')); ?>?<span class="require">*</span></label><br/>                                         <select name="email_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->email_verification == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($setting['setting']->email_verification == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                                        </select>
                                                        <small>(<?php echo e(Helper::translation(5322,$translate,'')); ?>)</small>
                                            </div>
                                            
                                           <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation(5331,$translate,'')); ?>?<span class="require">*</span></label><br/>                                         <select name="payment_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->payment_verification == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($setting['setting']->payment_verification == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                                        </select>
                                                        <small>(<?php echo e(Helper::translation(5334,$translate,'')); ?>)</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(Helper::translation(5337,$translate,'')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="cookie_popup" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($setting['setting']->cookie_popup == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->cookie_popup == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                              </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(5340,$translate,'')); ?> <span class="require">*</span></label>
                                                
                                            <textarea name="cookie_popup_text" id="cookie_popup_text" rows="4" class="form-control noscroll_textarea" required><?php echo e($setting['setting']->cookie_popup_text); ?></textarea>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5343,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="cookie_popup_button" name="cookie_popup_button" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->cookie_popup_button); ?>" required>
                                            </div>
                                            
                                            
                                            
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(Helper::translation(6249,$translate,'')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="regular_license" class="form-control" required>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($duration); ?>" <?php if($additional->regular_license == $duration): ?> selected <?php endif; ?>><?php echo e($duration); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                              </div>
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(6381,$translate,'')); ?> (Tawk.to)<span class="require">*</span></label>
                                                
                                            <input type="text" name="site_tawk_chat" id="site_tawk_chat" class="form-control noscroll_textarea" value="<?php echo e($additional->site_tawk_chat); ?>" required /><small><strong>Example:</strong> <?php echo e($additional->site_tawk_chat); ?></small>
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
                                                <label for="banner_heading" class="control-label mb-1"><?php echo e(Helper::translation(5346,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_banner_heading" name="site_banner_heading" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_banner_heading); ?>" required>
                                            </div>  
                                            
                              <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1"><?php echo e(Helper::translation(5349,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_banner_subheading" name="site_banner_subheading" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_banner_subheading); ?>" required>
                                            </div>              
                             
                             
                             <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1"><?php echo e(Helper::translation(5352,$translate,'')); ?> (<?php echo e(Helper::translation(5355,$translate,'')); ?> 24 x 24)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_favicon" name="site_favicon" class="form-control-file" <?php if($setting['setting']->site_favicon == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_favicon != ''): ?>
                                                <img class="lazy" width="24" height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_favicon); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1"><?php echo e(Helper::translation('61dd092fc939a',$translate,'Header')); ?> <?php echo e(Helper::translation(5358,$translate,'')); ?> (<?php echo e(Helper::translation(2946,$translate,'')); ?> 180 x 50)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_logo" name="site_logo" class="form-control-file" <?php if($setting['setting']->site_logo == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_logo != ''): ?>
                                                <img class="lazy" width="84" height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_logo); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1"><?php echo e(Helper::translation('61dd093be05a1',$translate,'Footer Logo')); ?> (<?php echo e(Helper::translation(2946,$translate,'')); ?> 150 x 43)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_footer_logo" name="site_footer_logo" class="form-control-file" <?php if($additional->site_footer_logo == ''): ?> required <?php endif; ?>>
                                            <?php if($additional->site_footer_logo != ''): ?>
                                                <img class="lazy" width="84" height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($additional->site_footer_logo); ?>"  />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1"><?php echo e(Helper::translation(5361,$translate,'')); ?> (<?php echo e(Helper::translation(2946,$translate,'')); ?> 1920 x 300)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_banner" name="site_banner" class="form-control-file" <?php if($setting['setting']->site_banner == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_banner != ''): ?>
                                                <img class="lazy" width="131" height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_banner); ?>"  />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5364,$translate,'')); ?>?<span class="require">*</span></label>
                                                <select name="watermark_option" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->watermark_option == "1"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->watermark_option == "0"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                                
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1"><?php echo e(Helper::translation(5367,$translate,'')); ?></label>
                                                
                                            <input type="file" id="site_watermark" name="site_watermark" class="form-control-file">
                                            <?php if($setting['setting']->site_watermark != ''): ?>
                                                <img class="lazy" width="150" height="150" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_watermark); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(Helper::translation(5370,$translate,'')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="site_loader_display" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->site_loader_display == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                <option value="0" <?php if($setting['setting']->site_loader_display == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                                </select>
                                                
                                             </div>
                                            
                                            <div class="form-group">
                                                <label for="site_loader_image" class="control-label mb-1"><?php echo e(Helper::translation(5373,$translate,'')); ?> (200 X 200)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_loader_image" name="site_loader_image" class="form-control-file" <?php if($setting['setting']->site_loader_image == ''): ?> data-bvalidator="required,extension[gif]" data-bvalidator-msg="<?php echo e(Helper::translation(5376,$translate,'')); ?>" <?php else: ?> data-bvalidator="extension[gif]" data-bvalidator-msg="<?php echo e(Helper::translation(5376,$translate,'')); ?>" <?php endif; ?>>
                                            <?php if($setting['setting']->site_loader_image != ''): ?>
                                                <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_loader_image); ?>"  />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5379,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="site_flash_end_date" name="site_flash_end_date" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_flash_end_date); ?>" required>
                                            </div> 
                                            
                                            
                                            <?php /*?><div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation(5382,$translate,'') }} <span class="require">*</span></label>
                                                <input id="site_free_end_date" name="site_free_end_date" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_free_end_date }}" required>
                                            </div> <?php */?>
                                            
                                            <input type="hidden" name="site_free_end_date" value="<?php echo e($setting['setting']->site_free_end_date); ?>">
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation(5385,$translate,'')); ?>?<span class="require">*</span></label><br/>                            
                                                    <select name="maintenance_mode" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->maintenance_mode == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($setting['setting']->maintenance_mode == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5388,$translate,'')); ?></label>
                                                <input id="m_mode_title" name="m_mode_title" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->m_mode_title); ?>" <?php if($setting['setting']->maintenance_mode == 1): ?> required <?php endif; ?>>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(5391,$translate,'')); ?></label>
                                                <input id="m_mode_content" name="m_mode_content" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->m_mode_content); ?>" <?php if($setting['setting']->maintenance_mode == 1): ?> required <?php endif; ?>>
                                            </div>
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation(5394,$translate,'')); ?>?<span class="require">*</span></label><br/>            
                                                <select name="home_blog_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->home_blog_display == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($setting['setting']->home_blog_display == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                                </select>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(Helper::translation(5397,$translate,'')); ?><span class="require">*</span></label><br/>
                                                <select name="item_support_link" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $page['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($page->page_slug); ?>" <?php if($setting['setting']->item_support_link == $page->page_slug): ?> selected <?php endif; ?>><?php echo e($page->page_title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <small>(<?php echo e(Helper::translation(5400,$translate,'')); ?>)</small>
                                             </div>
                                               
                                              <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1"><?php echo e(Helper::translation('61dd095d9f808',$translate,'Google Recaptcha')); ?>?<span class="require">*</span></label><br/>
                                              <select name="site_google_recaptcha" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($additional->site_google_recaptcha == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5325,$translate,'')); ?></option>
                                                        <option value="0" <?php if($additional->site_google_recaptcha == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(5328,$translate,'')); ?></option>
                                              </select>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(Helper::translation(6252,$translate,'')); ?><span class="require">*</span></label><br/>
                                                <select name="extended_license" class="form-control" required>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($duration); ?>" <?php if($additional->extended_license == $duration): ?> selected <?php endif; ?>><?php echo e($duration); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                              </div>
                                              
                                              
                                              <?php /*?><div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Free item support price<span class="require">*</span></label><br/>
                                              <select name="site_free_items_price" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($additional->site_free_items_price == 1) selected @endif>{{ Helper::translation(5325,$translate,'') }}</option>
                                                        <option value="0" @if($additional->site_free_items_price == 0) selected @endif>{{ Helper::translation(5328,$translate,'') }}</option>
                                              </select>
                                            </div><?php */?> 
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation('631ed7471a39d',$translate,'Disable View Source Code')); ?><span class="require">*</span></label>
                                                <select name="disable_view_source" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($additional->disable_view_source == "1"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0" <?php if($additional->disable_view_source == "0"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="site_free_items_price" value="1">
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation('6368fe45a5766',$translate,'Custom Js Code')); ?></label>
                                                <textarea name="site_custom_js" id="site_custom_js" rows="6" class="form-control noscroll_textarea"><?php echo e($additional->site_custom_js); ?></textarea></div><small><?php echo e(Helper::translation('6368fe52a946f',$translate,'Example JS Code')); ?>: <code><br/>$("body").css("background-color","blue");</code></small>
                                                <input type="hidden" name="save_banner" value="<?php echo e($setting['setting']->site_banner); ?>">
                                                <input type="hidden" name="save_logo" value="<?php echo e($setting['setting']->site_logo); ?>">
                                                <input type="hidden" name="save_favicon" value="<?php echo e($setting['setting']->site_favicon); ?>">
                                                <input type="hidden" name="save_watermark" value="<?php echo e($setting['setting']->site_watermark); ?>">
                                                <input type="hidden" name="save_loader_image" value="<?php echo e($setting['setting']->site_loader_image); ?>">
                                                <input type="hidden" name="sid" value="1">
                                                <input type="hidden" name="save_footer_logo" value="<?php echo e($additional->site_footer_logo); ?>">
                                                
                                                
                             
                             
                                </div>
                            </div>
                        </div>
                    </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> <?php echo e(Helper::translation(2876,$translate,'')); ?></button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> <?php echo e(Helper::translation(4962,$translate,'')); ?> </button>
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


</body>

</html>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/general-settings.blade.php ENDPATH**/ ?>