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
    <?php if(in_array('blog',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(5037,$translate,'')); ?></h1>
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
                           <form action="<?php echo e(route('admin.add-post')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(Helper::translation(5025,$translate,'')); ?> <span class="require">*</span></label>
                                                <input id="post_title" name="post_title" type="text" class="form-control" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="cat_id" class="control-label mb-1"><?php echo e(Helper::translation(3084,$translate,'')); ?> <span class="require">*</span></label>
                                                
                                                <select name="blog_cat_id" class="form-control" required>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $catData['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->blog_cat_id); ?>"><?php echo e($category->blog_category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(2940,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="post_short_desc" rows="6"  class="form-control" required></textarea>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(2941,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="post_desc" id="summary-ckeditor" rows="6"  class="form-control"></textarea>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1"><?php echo e(Helper::translation(5040,$translate,'')); ?><span class="require">*</span></label>
                                                
                                            <input type="file" id="post_image" name="post_image" class="form-control-file" required>
                                            
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(2974,$translate,'')); ?></label>
                                                
                                            <textarea name="post_tags" rows="6"  class="form-control"></textarea>
                                            <small>(<?php echo e(Helper::translation(5043,$translate,'')); ?> <strong><?php echo e(Helper::translation(2968,$translate,'')); ?>:</strong> <?php echo e(Helper::translation(5046,$translate,'')); ?>)</small>
                                            </div>
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(Helper::translation(2873,$translate,'')); ?> <span class="require">*</span></label>
                                                <select name="post_status" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1"><?php echo e(Helper::translation(2874,$translate,'')); ?></option>
                                                <option value="0"><?php echo e(Helper::translation(2875,$translate,'')); ?></option>
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
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(Helper::translation(6384,$translate,'')); ?>? <span class="require">*</span></label>
                                                <select name="post_allow_seo" id="post_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(Helper::translation(2970,$translate,'')); ?></option>
                                                <option value="0"><?php echo e(Helper::translation(2971,$translate,'')); ?></option>
                                                </select>
                                             </div>
                                            
                                          <div id="ifseo">
                                     <div class="form-group">
                                           <label for="site_keywords" class="control-label mb-1"><?php echo e(Helper::translation(6387,$translate,'')); ?> (<?php echo e(Helper::translation(6390,$translate,'')); ?>) <span class="require">*</span></label>
                                            <textarea name="post_seo_keyword" id="post_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                                       </div> 
                                       <div class="form-group">
                                           <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(6393,$translate,'')); ?> (<?php echo e(Helper::translation(6390,$translate,'')); ?>) <span class="require">*</span></label>
                                              <textarea name="post_seo_desc" id="post_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                                            </div>
                                          </div>
                                            
                                           
                             
                             
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
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/add-post.blade.php ENDPATH**/ ?>