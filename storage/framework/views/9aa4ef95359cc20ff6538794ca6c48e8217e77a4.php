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
    <?php if(Auth::user()->id == 1): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Author</h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">-->
            <!--    <div class="page-header float-right">-->
            <!--        <div class="page-title">-->
            <!--            <ol class="breadcrumb text-right">-->
            <!--                <a href="<?php echo e(url('/admin/add-vendor')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Subscriber</a>-->
            <!--            </ol>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
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
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="panel-heading">
                                    <strong class="card-title">Author</strong>
                                    <?php if(count($requestData['data']) != 0): ?> 
                                       <strong class="card-title float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#collapseOne">Requests to Become Author <span class="badge badge-light"> <?php echo e($requestCount); ?> </span> </strong>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="card-body">
                                            <table id="" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(Helper::translation(2920,$translate,'')); ?></th>
                                                        <th><?php echo e(Helper::translation(5061,$translate,'')); ?></th>
                                                        <th><?php echo e(Helper::translation(2917,$translate,'')); ?></th>
                                                        <th><?php echo e(Helper::translation(2915,$translate,'')); ?></th>
                                                        <th><?php echo e(Helper::translation('628628dc9d5b3',$translate,'Account Verification')); ?></th>
                                                        <th><?php echo e(Helper::translation(5199,$translate,'')); ?></th>
                                                        <th><?php echo e(Helper::translation(4827,$translate,'')); ?></th>
                                                        <th>Request to become Author</th> 
                                                        <!--<th><?php echo e(Helper::translation(5667,$translate,'')); ?></th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $__currentLoopData = $requestData['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($no); ?></td>
                                                            <td><?php if($user->user_photo != ''): ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>"  alt="<?php echo e($user->name); ?>" /><?php else: ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($user->name); ?>" />  <?php endif; ?></td>
                                                            <td><?php echo e($user->username); ?></td>
                                                            <td><?php echo e($user->email); ?></td>
                                                            <td><?php if($user->user_document_verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                                            <td><?php if($user->verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                                            <td><?php if($user->exclusive_author == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5883,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5886,$translate,'')); ?></span> <?php endif; ?></td>
                                                            <td><a href="<?php echo e(URL::to('/admin/author')); ?>/<?php echo e($user->user_token); ?>/<?php echo e($user->become_author); ?>" class="btn btn-success btn-sm" onClick="return confirm('Are you sure to approve request to become Author?');"><i class="fa fa-user"></i>&nbsp; Approve Request</a></td>
                                                        </tr>
                                                    <?php $no++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                            </div>
                            
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(2920,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(5061,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(2917,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(2915,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation('628628dc9d5b3',$translate,'Account Verification')); ?></th>
                                            <th><?php echo e(Helper::translation(5199,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(4827,$translate,'')); ?></th>
                                            <th>Request to become Author</th> 
                                            <!--<th><?php echo e(Helper::translation(5667,$translate,'')); ?></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no = 1; ?>
                                    <?php $__currentLoopData = $authorData['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php if($user->user_photo != ''): ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>"  alt="<?php echo e($user->name); ?>" /><?php else: ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($user->name); ?>" />  <?php endif; ?></td>
                                            <td><?php echo e($user->username); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php if($user->user_document_verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><?php if($user->verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><?php if($user->exclusive_author == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5883,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5886,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><a href="<?php echo e(URL::to('/admin/author')); ?>/<?php echo e($user->user_token); ?>/<?php echo e($user->become_author); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to remove as Author?');"><i class="fa fa-user"></i>&nbsp; Remove As Author</a></td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
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
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/author.blade.php ENDPATH**/ ?>