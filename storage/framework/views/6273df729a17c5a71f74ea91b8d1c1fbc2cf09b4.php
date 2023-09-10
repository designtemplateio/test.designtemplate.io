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
                        <h1><?php echo e(Helper::translation(5616,$translate,'')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-vendor')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> <?php echo e(Helper::translation(5055,$translate,'')); ?></a>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(Helper::translation(5616,$translate,'')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(2920,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(2917,$translate,'')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 0): ?>
                                            <th><?php echo e(Helper::translation(2915,$translate,'')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(Helper::translation(5061,$translate,'')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <th><?php echo e(Helper::translation(6156,$translate,'')); ?></th>
                                            <?php /*?><th>{{ Helper::translation(6219,$translate,'') }}<br/><small>({{ Helper::translation(6222,$translate,'') }})</small></th>
                                            <th>{{ Helper::translation(5670,$translate,'') }}?<br/><small>({{ Helper::translation(6222,$translate,'') }})</small></th><?php */?>
                                            <th><?php echo e(Helper::translation('628628dc9d5b3',$translate,'Account Verification')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(Helper::translation(5199,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(4827,$translate,'')); ?></th>
                                            <th>Payment Amount</th>
                                            <th><?php echo e(Helper::translation(3106,$translate,'')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <th><?php echo e(Helper::translation(6138,$translate,'')); ?></th> 
                                            <th><?php echo e(Helper::translation(5667,$translate,'')); ?></th>
                                            <?php endif; ?>
                                            <?php if($additional->conversation_mode == 1): ?>
                                            <th><?php echo e(Helper::translation(6306,$translate,'')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(Helper::translation(2922,$translate,'')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no = 1; ?>
                                    <?php $__currentLoopData = $userData['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($user->username); ?><br><?php if($user->become_author == 1): ?><span class="badge badge-success">Become Author</span><?php endif; ?></td>
                                            <?php if($addition_settings->subscription_mode == 0): ?>
                                            <td><?php echo e($user->email); ?></td>
                                            <?php endif; ?>
                                            <td><?php if($user->user_photo != ''): ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>"  alt="<?php echo e($user->name); ?>" /><?php else: ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($user->name); ?>" />  <?php endif; ?></td>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <td><?php echo e($user->user_subscr_type); ?> <?php if($user->user_subscr_date < date('Y-m-d')): ?><span class="badge badge-danger"><?php echo e(Helper::translation(6225,$translate,'')); ?></span><?php endif; ?></td>
                                            <?php /*?><td>@if($user->user_purchase_token != '') {{ $user->user_purchase_token }} @else <span>---</span> @endif</td>
                                            <td>@if($user->user_purchase_token != '') <a href="{{ URL::to('/admin/customer') }}/{{ $user->user_token }}/{{ $user->user_subscr_id }}" class="btn btn-success btn-sm" onClick="return confirm('{{ Helper::translation(6228,$translate,'') }}?');"><i class="fa fa-money"></i>&nbsp; {{ Helper::translation(5475,$translate,'') }}</a> @else <span>---</span> @endif</td><?php */?>
                                            <td><?php if($user->user_document_verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                            <?php endif; ?>
                                            <td><?php if($user->verified == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5202,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5205,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><?php if($user->exclusive_author == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5883,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5886,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><?php echo e($user->user_subscr_price); ?> <?php echo e($allsettings->site_currency_symbol); ?></td>
                                            <td><?php echo e($user->earnings); ?> <?php echo e($allsettings->site_currency); ?></td>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <td><a href="subscription-payment-details/<?php echo e($user->user_token); ?>" class="btn btn-info btn-sm"><i class="fa fa-id-card"></i> <?php echo e(Helper::translation(3177,$translate,'')); ?></a></td>
                                            <td><?php if($user->user_subscr_payment_status == 'completed'): ?> <span class="badge badge-success"><?php echo e(Helper::translation(5673,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(5676,$translate,'')); ?></span> <?php endif; ?></td>
                                            <?php endif; ?>
                                            <?php if($additional->conversation_mode == 1): ?>
                                            <td><a href="conversation/<?php echo e($user->username); ?>" class="btn btn-primary btn-sm"><i class="fa fa-comments-o"></i> <?php echo e(Helper::translation(6306,$translate,'')); ?></a></td>
                                            <?php endif; ?>
                                            <td><a href="edit-vendor/<?php echo e($user->user_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(2923,$translate,'')); ?></a>
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate,'')); ?></a>
                                            <?php else: ?> 
                                            <a href="vendor/<?php echo e($user->user_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(5064,$translate,'')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate,'')); ?></a><?php endif; ?>
                                            </td>
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
<?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/admin/vendor.blade.php ENDPATH**/ ?>