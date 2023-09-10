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
    <?php if(in_array('etemplate',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation('614ef9b134edc',$translate,'Edit Email Template')); ?> - <?php echo e($edit['template']->et_heading); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/email-template')); ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> <?php echo e(Helper::translation(5175,$translate,'Back')); ?></a>
                        </ol>
                    </div>
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
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText"><?php echo e(Helper::translation('614ef9cc1ab3f',$translate,'Short Code')); ?></strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0 edit-template">
                                <tbody>
                                     <?php /* Conversation Message */ ?>
                                    <?php if($et_id == 1): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{conver_text}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2918,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{conversation_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(6303,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Comment */ ?>
                                    <?php if($et_id == 2): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2906,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2907,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{comm_text}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2909,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Contact Us */ ?>
                                    <?php if($et_id == 3): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{message_text}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2918,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Forget Password */ ?>
                                    <?php if($et_id == 4): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{forgot_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3015,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Update Notification */ ?>
                                    <?php if($et_id == 5): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Newsletter Signup */ ?>
                                    <?php if($et_id == 6): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{activate_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3005,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Rating & Reviews */ ?>
                                    <?php if($et_id == 7): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3163,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating_reason}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3155,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating_comment}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2909,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Refund Request Received */ ?>
                                    <?php if($et_id == 8): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{ref_refund_reason}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3146,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{ref_refund_comment}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2909,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* New Signup Email Verification */ ?>
                                    <?php if($et_id == 9): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{register_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3168,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3166,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Contact Support */ ?>
                                    <?php if($et_id == 10): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{support_subject}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3063,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{support_msg}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2918,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Refund Declined */ ?>
                                    <?php if($et_id == 11): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{total_price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Approval Cancelled */ ?>
                                    <?php if($et_id == 12): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{total_price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Refund Accepted */ ?>
                                    <?php if($et_id == 13): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{total_price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Rejected Notifications */ ?>
                                    <?php if($et_id == 14): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3089,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Rejected Notifications */ ?>
                                    <?php if($et_id == 15): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{item_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2908,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Newsletter Updates */ ?>
                                    <?php if($et_id == 16): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{news_heading}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3063,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{news_content}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5649,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Withdrawal Request Accepted */ ?>
                                    <?php if($et_id == 17): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{wd_amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3216,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* New Payment Approved For Vendor */ ?>
                                    <?php if($et_id == 18): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{vendor_amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($et_id == 19): ?>
                                    <?php /* New Deposit Details */ ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_type}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3175,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_token}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3174,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_date}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3172,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($et_id == 20): ?>
                                    <?php /* Subscription Upgrade */ ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{user_subscr_type}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(6141,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscr_duration}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(6144,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscr_price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2888,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{user_subscr_date}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3172,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($et_id == 21): ?>
                                    <?php /* Item Purchase Notifications */ ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{buyer_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2917,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{buyer_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(2915,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3224,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5193,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{order_id}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3173,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_type}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3175,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_date}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3101,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{payment_status}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5667,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                            <form action="<?php echo e(route('admin.edit-email-template')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-12">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                       <div class="form-group">
                                          <label for="site_logo" class="control-label mb-1"><?php echo e(Helper::translation(3063,$translate,'Subject')); ?> <span class="require">*</span></label>
                                                
                                            <input type="text" id="et_subject" name="et_subject" class="form-control"  value="<?php echo e($edit['template']->et_subject); ?>"  data-bvalidator="required" >
                                            
                                            </div>
                                            
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6" style="display:none;">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             <input type="hidden" name="et_status" value="1">
                             
                                          
                                        
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             <div class="col-md-12">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                                           
                                                
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(2918,$translate,'Message')); ?> <span class="require">*</span></label>
                                                <textarea name="et_content" id="summary-ckeditor" rows="6" class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['template']->et_content)); ?></textarea>
                                            </div> 
                                            
                                           <input type="hidden" name="et_id" value="<?php echo e($et_id); ?>">
                             
                             
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
        </div>
        
        
        <!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/edit-email-template.blade.php ENDPATH**/ ?>