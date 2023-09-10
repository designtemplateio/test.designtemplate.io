<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(2862,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(2931,$translate,'')); ?></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e($type_name->item_type_name); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(Helper::translation(2931,$translate,'')); ?> <span class="dwg-arrow-right"></span> <?php echo e($type_name->item_type_name); ?></h1>
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
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <!-- Product-->
            <div class="row">
             <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div> <b><?php echo e(Helper::translation(2986,$translate,'')); ?></b><br/><?php echo e(Helper::translation(2987,$translate,'')); ?> <?php echo e(Helper::translation(2988,$translate,'')); ?>

              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div><b><?php echo e(Helper::translation(2983,$translate,'')); ?> :</b> jpeg, jpg, png, webp<br/><b><?php echo e(Helper::translation(2985,$translate,'')); ?> :</b> zip, mp3, mp4<?php /*?>@if(Auth::user()->user_subscr_space_level == 'limited') <br/><b>Available Storage Space : </b> {{ Auth::user()->user_subscr_space }} {{ Auth::user()->user_subscr_space_type }} @endif | <?php */?>
                <?php if($addition_settings->subscription_mode == 1): ?>
                <?php /*?>@if(Auth::user()->user_subscr_space_level == 'limited')<br/><span class="red-color"><b>{{ Helper::translation(6171,$translate,'') }} : </b>{{ Helper::formatSizeUnits(Helper::available_space(Auth::user()->id)) }}</span>@endif<?php */?>
                <?php endif; ?>
              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <h4 class="mt-4"><?php echo e(Helper::translation(2942,$translate,'')); ?> <?php if($demo_mode == 'on'): ?><span class="require">- This is Demo version. So Maximum 1MB Allowed</span><?php endif; ?></h4>
              </div>
             <div class="col-sm-12 mb-1">
             <div class="form-group">
               <form action="<?php echo e(route('fileupload')); ?>" class='dropzone' method="post" enctype="multipart/form-data">
               <input type="hidden" name="item_token" value="">
               </form>
             </div>
             </div>
             </div>
             <form action="<?php echo e(route('upload-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div id="display_message"></div>
              <div class="row" id="hide_message"> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2943,$translate,'')); ?> <span class="require">*</span> (<?php echo e(Helper::translation(2946,$translate,'')); ?> : 80x80px)</label>
                  <div class="custom_upload">
                  <select id="item_thumbnail1" name="item_thumbnail1" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <?php $__currentLoopData = $getdata1['first']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                 </div>
                </div>
              </div> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2945,$translate,'')); ?> <span class="require">*</span> (<?php echo e(Helper::translation(2946,$translate,'')); ?> : 700x447px)</label>
                  <div class="custom_upload">
                     <select name="item_preview1" id="item_preview1" class="form-control" data-bvalidator="required">
                     <option value=""></option>
                     <?php $__currentLoopData = $getdata2['second']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                 </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation('61e66cc55b136',$translate,'Upload Main File Type')); ?> <span class="require">*</span></label>
                  <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="file">File</option>
                  <option value="link">Link/URL</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="main_file">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2947,$translate,'')); ?> <span class="require">*</span> (<?php echo e(Helper::translation(2948,$translate,'')); ?> <?php if($addition_settings->subscription_mode == 1): ?> <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>| Max Size : <?php echo e(Auth::user()->user_subscr_space); ?> <?php echo e(Auth::user()->user_subscr_space_type); ?> <?php endif; ?> <?php endif; ?>)</label>
                      <select name="item_file1" id="item_file1" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <?php $__currentLoopData = $getdata3['third']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                </div>
              </div>
              <div class="col-sm-6" id="main_link">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation('61e66dc96d321',$translate,'Main File Link/URL')); ?> <span class="require">*</span></label>
                  <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url">
                </div>
              </div>
              <?php if($additional->show_screenshots == 1): ?>
              <div class="col-sm-6">
                <div class="form-group upload_wrapper">
                  <label for="account-fn"><?php echo e(Helper::translation(2950,$translate,'')); ?> (<?php echo e(Helper::translation(2946,$translate,'')); ?> : 750x430px)</label>
                    <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                    <?php $__currentLoopData = $getdata4['four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_video == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation('6188f9c6594e4',$translate,'Preview Type (optional)')); ?></label>
                  <select name="video_preview_type1" id="video_preview_type1" <?php if($errors->has('video_file')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?>>
                   <option value=""></option>
                   <option value="youtube"><?php echo e(Helper::translation(5925,$translate,'')); ?></option>
                   <option value="mp4"><?php echo e(Helper::translation(5928,$translate,'')); ?></option>
                   <option value="mp3"><?php echo e(Helper::translation('6188fb1c98b9a',$translate,'MP3')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="youtube">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2967,$translate,'')); ?> <span class="require">*</span></label>
                  <input type="text" id="video_url1" name="video_url1" class="form-control" data-bvalidator="required">
                  <small>(<?php echo e(Helper::translation(2968,$translate,'')); ?> : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                </div>
              </div>
              <div class="col-sm-6" id="mp4">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(5910,$translate,'')); ?> <span class="require">*</span> (<?php echo e(Helper::translation(5913,$translate,'')); ?> <?php if($addition_settings->subscription_mode == 1): ?> <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>| Max Size : <?php echo e(Auth::user()->user_subscr_space); ?> <?php echo e(Auth::user()->user_subscr_space_type); ?> <?php endif; ?> <?php endif; ?>)</label>
                    <select id="video_file1" name="video_file1" class="form-control" data-bvalidator="required">
                    <option value=""></option>
                    <?php $__currentLoopData = $getdata5['five']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-6" id="mp3">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation('6188fbba9e728',$translate,'Upload MP3')); ?> <span class="require">*</span></label>
                    <select id="audio_file1" name="audio_file1" class="form-control" data-bvalidator="required">
                    <option value=""></option>
                    <?php $__currentLoopData = $getdata6['six']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <?php endif; ?>
              </div>
              <div class="row"> 
              <div class="col-sm-12 mt-4 mb-1">
              <h4><?php echo e(Helper::translation(2936,$translate,'')); ?></h4>
              </div>
              <input type="hidden" name="item_type" value="<?php echo e($type_name->item_type_slug); ?>">
              <input type="hidden" name="type_id" value="<?php echo e($type_id); ?>"> 
              <div class="col-sm-12">
                <div class="form-group">
                    <label for="preview_video" class="control-label mb-1">Preview Video<span class="require">* Upload Short Preview video</span></label>
                    <input type="file" id="preview_video" name="preview_video" class="form-control-file">
                </div>
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2938,$translate,'')); ?> <span class="require">*</span> (<?php echo e(Helper::translation(2939,$translate,'')); ?>)</label>
                  <input type="text" id="item_name" name="item_name" <?php if($errors->has('item_name')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?> data-bvalidator="required,maxlen[100]">
                  <?php if($errors->has('item_name')): ?>
                  <span class="help-block">
                     <span class="red"><?php echo e($errors->first('item_name')); ?></span>
                  </span>
                 <?php endif; ?>
                </div>
                
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2940,$translate,'')); ?></label>
                  <textarea name="item_shortdesc" rows="6"  class="form-control"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2941,$translate,'')); ?> <span class="require">*</span></label>
                  <textarea name="item_desc" id="summary-ckeditor" rows="6"  <?php if($errors->has('item_desc')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?> data-bvalidator="required"></textarea>
                  <?php if($errors->has('item_desc')): ?>
                  <span class="help-block">
                     <span class="red"><?php echo e($errors->first('item_desc')); ?></span>
                  </span>
                 <?php endif; ?>
                </div>
              </div>
              
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(Helper::translation(2951,$translate,'')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(Helper::translation(2952,$translate,'')); ?> <span class="require">*</span></label>
                  <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                  <option value=""><?php echo e(Helper::translation(5931,$translate,'')); ?></option>
                  <?php $__currentLoopData = $re_categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                  <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <?php $__currentLoopData = $attribute['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                  <?php $field_value=explode(',',$attribute_field->attr_field_value); ?>
                  <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                  <div class="select-wrap select-wrap2">
                  <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>
                  <?php endif; ?>
                  <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                  <div class="select-wrap select-wrap2">
                  <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <span class="lnr lnr-chevron-down"></span>
                  </div>
                  <?php endif; ?>
                  <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                  <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php if($additional->show_moneyback == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6240,$translate,'')); ?>? <span class="require">*</span></label>
                  <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="back_money">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6243,$translate,'')); ?>?</label>
                  <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]">
                  <small>(days)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="seller_money_back" value="0" />
              <?php endif; ?>
              <?php if($additional->show_refund_term == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6237,$translate,'')); ?></label>
                  <textarea name="seller_refund_term"  rows="6"  class="form-control"></textarea>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="seller_refund_term" value="" />
              <?php endif; ?>
              <?php if($additional->show_demo_url == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2966,$translate,'')); ?></label>
                  <input type="text" id="demo_url" name="demo_url" class="form-control" data-bvalidator="url">
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_flash_sale == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2972,$translate,'')); ?></label>
                  <select name="item_flash_request" id="item_flash_request" class="form-control">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                  <small>(<?php echo e(Helper::translation(2973,$translate,'')); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="item_flash_request" value="0" />
              <?php endif; ?>
              <?php if($additional->show_tags == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2974,$translate,'')); ?></label>
                  <textarea name="item_tags" id="item_tags" rows="6" class="form-control"></textarea>
                  <small>(<?php echo e(Helper::translation(2975,$translate,'')); ?>)</small>
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_feature_update == 1 || $additional->show_item_support == 1 || $additional->show_free_download == 1): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(Helper::translation(2976,$translate,'')); ?></h4>
              </div>
              <?php endif; ?>
              <?php if($additional->show_free_download == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2969,$translate,'')); ?> <span class="require">*</span></label>
                  <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                  <small>(<?php echo e(Helper::translation("62ea50f8741c1",$translate,"if 'Yes' means all user will allowed free download this product")); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="free_download" value="0" />
              <?php endif; ?>
              <?php if($additional->show_feature_update == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2977,$translate,'')); ?> <span class="require">*</span></label>
                  <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="future_update" value="0" />
              <?php endif; ?>
              <?php if($additional->show_item_support == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(2978,$translate,'')); ?> <span class="require">*</span></label>
                  <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                  <small>(<?php echo e(Helper::translation('61e66efb5c81a',$translate,'If item support "YES" selected Regular license price must be entered')); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="item_support" value="0" />
              <?php endif; ?>
              <?php if($addition_settings->subscription_mode == 1): ?>
              <div class="col-sm-6" id="subscription_box">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation('62ea38a0b2564',$translate,'Subscription Item')); ?>? <span class="require">*</span></label>
                  <select name="subscription_item" id="subscription_item" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                  <small>(<?php echo e(Helper::translation("62ea3b96bf363",$translate,"if 'Yes' means subscription user will allowed free download this product")); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="subscription_item" value="0" />
              <?php endif; ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(Helper::translation('61e66f5c17d78',$translate,'Seo')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6384,$translate,'')); ?>? <span class="require">*</span></label>
                  <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                  <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="ifseo1">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6387,$translate,'')); ?> (<?php echo e(Helper::translation(6390,$translate,'')); ?>) <span class="require">*</span></label>
                  <textarea name="item_seo_keyword" id="page_seo_keyword" rows="6" class="form-control" data-bvalidator="required"></textarea>
                </div>
              </div>
              <div class="col-sm-6" id="ifseo2">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(Helper::translation(6393,$translate,'')); ?> (<?php echo e(Helper::translation(6390,$translate,'')); ?>) <span class="require">*</span></label>
                  <textarea name="item_seo_desc" id="page_seo_desc" rows="6" class="form-control" data-bvalidator="required"></textarea>
                </div>
              </div>
              <div class="col-sm-12 mt-4 mb-1" id="pricebox">
              <h4 class="mt-4"><?php echo e(Helper::translation(2888,$translate,'')); ?></h4>
              </div>
              <div class="col-sm-6 mb-1" id="pricebox_left">
                    <label class="font-weight-medium" for="unp-standard-price"><?php echo e(Helper::translation(3072,$translate,'')); ?> (<?php echo e($additional->regular_license); ?> <?php echo e(Helper::translation(3055,$translate,'')); ?>) <span class="require">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency); ?></span></div>
                      <input type="text" id="regular_price" name="regular_price" class="form-control" data-bvalidator="digit,min[1],required">
                    </div>
              </div>
              <?php if($additional->show_extended_license == 1): ?>
              <div class="col-sm-6 mb-1" id="pricebox_right">
                    <label class="font-weight-medium" for="unp-standard-price"><?php echo e(Helper::translation(3073,$translate,'')); ?> (<?php echo e($additional->extended_license); ?> <?php echo e(Helper::translation(3055,$translate,'')); ?>)</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency); ?></span></div>
                      <input type="text" id="extended_price" name="extended_price" class="form-control" data-bvalidator="digit,min[1]">
                    </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="extended_price" value="0">
              <?php endif; ?>
              
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
              <div class="col-12 pt-3 mt-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                <?php if($allsettings->item_approval == 0): ?>
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i><?php echo e(Helper::translation(2981,$translate,'')); ?></button>
                <?php else: ?>
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i><?php echo e(Helper::translation(2876,$translate,'')); ?></button>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </form>  
            </div>
          </section>
        </div>
      </div>
    </div><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/upload-my-item.blade.php ENDPATH**/ ?>