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
    <?php if(in_array('items',$avilable)): ?>
    <div id="right-panel" class="right-panel">
        <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Product Page</h1>
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
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                        <form action="<?php echo e(route('admin.edit_product_page')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                            
                                            <input type="hidden" name="item_type" value="<?php echo e($type_name->item_type_slug); ?>">
                                            <input type="hidden" name="type_id" value="<?php echo e($type_id); ?>">
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(Helper::translation(2952,$translate,'')); ?> <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value=""><?php echo e(Helper::translation(5931,$translate,'')); ?></option>
                                            <?php $__currentLoopData = $category['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                                                <?php $__currentLoopData = $category['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Heading(H1) Of Page<span class="require">*</span> </label>
                                               <input type="text" id="heading" name="heading" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->heading); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Description Of Hesding<span class="require">*</span></label>
                                                <textarea name="heading_desc" rows="3"  class="form-control" data-bvalidator="required"><?php echo e($edit['post']->heading_desc); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Sub Heading(H2) Of Page<span class="require">*</span> </label>
                                               <input type="text" id="sub_heading" name="sub_heading" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->sub_heading); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Description of Sub-Heading(H2)<span class="require">*</span></label>
                                                <textarea name="subheading_desc" rows="3"  class="form-control" data-bvalidator="required"><?php echo e($edit['post']->subheading_desc); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Paragraph Heading<span class="require">*</span> </label>
                                               <input type="text" id="para_heading" name="product_heading1" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->subheading_desc); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Paragraph Text<span class="require">*</span></label>
                                                <textarea name="product_para_text" rows="3"  class="form-control" data-bvalidator="required"><?php echo e($edit['post']->subheading_desc); ?></textarea>
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
                                                <label for="image1" class="control-label mb-1">Banner 1<span class="require">*</span> </label>
                                               <input type="file" id="banner_image1" name="banner_image1" class="form-control-file" <?php if($edit['post']->banner_image1 == ''): ?> required <?php endif; ?>>
                                                  <?php if($edit['post']->banner_image1 != ''): ?>
                                                <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->banner_image1); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->banner_image1); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image2" class="control-label mb-1">Banner 2<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="banner_image2" name="banner_image2"
                                               <?php if($edit['post']->banner_image2 == ''): ?> required <?php endif; ?>>
                                                  <?php if($edit['post']->banner_image2 != ''): ?>
                                                <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->banner_image2); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->banner_image2); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image1" class="control-label mb-1">Product 1<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="product_image1" name="product_image1"
                                               <?php if($edit['post']->product_image1 == ''): ?> required <?php endif; ?>>
                                                  <?php if($edit['post']->product_image1 != ''): ?>
                                                <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->product_image1); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->product_image1); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image2" class="control-label mb-1">Product 2<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="product_image2" name="product_image2"
                                               <?php if($edit['post']->product_image2 == ''): ?> required <?php endif; ?>>
                                                  <?php if($edit['post']->product_image2 != ''): ?>
                                                <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->product_image2); ?>" data-original="<?php echo e(url('/')); ?>/public/storage/product_page/<?php echo e($edit['post']->product_image2); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 1<span class="require">*</span> </label>
                                               <input type="text" id="faq1" name="faq1" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->faq1); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 1<span class="require">*</span></label>
                                                <textarea name="answer1" rows="3"  class="form-control" data-bvalidator="required" ><?php echo e($edit['post']->answer1); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 2<span class="require">*</span> </label>
                                               <input type="text" id="faq2" name="faq2" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->faq2); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 2<span class="require">*</span></label>
                                                <textarea name="answer2" rows="3"  class="form-control" data-bvalidator="required" ><?php echo e($edit['post']->answer2); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 3<span class="require">*</span> </label>
                                               <input type="text" id="faq3" name="faq3" class="form-control" data-bvalidator="required" value="<?php echo e($edit['post']->faq3); ?>"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 3<span class="require">*</span></label>
                                                <textarea name="answer3" rows="3"  class="form-control" data-bvalidator="required"><?php echo e($edit['post']->answer3); ?></textarea>
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
                             
                            <input type="hidden" name="id" value="<?php echo e($edit['post']->id); ?>">
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
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/edit_product_page.blade.php ENDPATH**/ ?>