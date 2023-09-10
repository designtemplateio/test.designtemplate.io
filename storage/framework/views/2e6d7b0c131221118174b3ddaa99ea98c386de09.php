<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Suggestion Request - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
.container-table100 {
    width: 100%;
    min-height: 100vh;
    background: #c4d3f6;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    padding: 33px 30px
}

.wrap-table100 {
    width: 960px;
    border-radius: 10px;
    overflow: hidden
}

.table {
    width: 100%;
    display: table;
    margin: 0
}

@media  screen and (max-width:768px) {
    .table {
        display: block
    }
}

.row1 {
    border-radius: 10px;
border: 1px solid #EBE8FF;
background: #FFF;
    display: table-row;
}

.row1.header {
    border-radius: 20px 20px 0px 0px;
background: linear-gradient(91deg, rgba(232, 46, 124, 0.20) 0.2%, rgba(120, 104, 211, 0.20) 46.74%, rgba(2, 176, 189, 0.20) 85.66%);

}

@media  screen and (max-width:768px) {
    .row1 {
        display: block
    }
    .row1.header {
        padding: 0;
        height: 0
    }
    .row1.header .cell {
        color: #4D4D4D;
        display: none
    }
    .row1 .cell:before {
        font-size: 12px;
        color: gray;
        line-height: 1.2;
        text-transform: uppercase;
        font-weight: unset!important;
        margin-bottom: 13px;
        content: attr(data-title);
        min-width: 98px;
        display: block
    }
}

.cell {
    display: table-cell
}

@media  screen and (max-width:768px) {
    .cell {
        display: block
    }
}

.row1 .cell {
    font-size: 14px;
    color: #4D4D4D;
    line-height: 1.2;
    font-weight: unset!important;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 10px;
    padding-right: 10px;
    border-bottom: 1px solid #f2f2f2
}

.row1.header .cell {
    font-size: 18px;
    color: #4D4D4D;
    line-height: 1.2;
    font-weight: unset!important;
    padding-top: 19px;
    padding-bottom: 19px
}

.row1 .cell:nth-child(1) {
    padding-left: 40px;
    width: 100px;
   
}

.row1 .cell:nth-child(2) {
    width: 160px
}

.row .cell:nth-child(3) {
    width: 180px;
    max-width: 240px;
}

.row1 .cell:nth-child(4) {
    width: 160px
}
.row1 .cell:nth-child(5) {
    width: 240px;
    max-width: 240px;
    white-space: nowrap; /* Prevent text from wrapping */
    overflow: hidden; /* Hide overflow */
    text-overflow: ellipsis;
}
.row1 .cell:nth-child(6) {
    width: 160px
}
.row1 .cell:nth-child(7) {
    width: 90px
}


.table,
.row1 {
    margin: 10px 0px;
    width: 100%!important
}

.row1:hover {
    background-color: #ececff;
    cursor: pointer
}

@media(max-width:768px) {
    .row1 {
        border-bottom: 1px solid #f2f2f2;
        padding-bottom: 18px;
        padding-top: 30px;
        padding-right: 15px;
        margin: 0
    }
    .row1 .cell {
        border: none;
        padding-left: 30px;
        padding-top: 16px;
        padding-bottom: 16px
    }
    .row1 .cell:nth-child(1) {
        padding-left: 30px
    }
    .row1 .cell {
        font-size: 18px;
        color: #555;
        line-height: 1.2;
        font-weight: unset!important
    }
    .table,
    .row1,
    .cell {
        width: 100%!important
    }
}</style>
</head>
<body style="background:#F7F8FD;"> 
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--Section 1-->
<section class="container-fluid product-banner py-5" style="background-image: url(http://designtemplate.io/public/img/request.webp);background-size: cover;">
  <div class="container logo-container text-center">
    <h2 class="heading_unlimited text-white">Bring Your Vision to Life: Request a Custom Design</h2>
    <?php if(!Auth::guest()): ?>
    <div class="text-center pt-4">
        <a href="#" id="mySizeChart" data-toggle="modal" data-target="#largeModal"><button class="get_licence px-5">Submit Request</button></a>
      </div>
    <?php else: ?>
      <div class="text-center pt-4">
        <a href="javascript:void(0)" id="mySizeChart" data-toggle="modal" data-target="#exampleModal"><button class="get_licence px-5">Submit Request</button></a>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="container section-container px-5 py-2 mr-5">
    <div class="d-flex justify-content-end align-item-center">
        <button class="btn dropdown-toggle m-0 py-1 px-4 my-2 justify-content-right" style="background:none;border-color:gray;color:#000000;" type="button" data-toggle="dropdown">Filters<span class="caret"></span></button>
            <ul class="dropdown-menu" >
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(route('suggestion')); ?>/all">All</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(route('suggestion')); ?>/active">Active</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-item toggle" href="<?php echo e(route('suggestion')); ?>/completed">Completed</a>
                </li>
            </ul>
    </div>
</section>

<div class="container-table mx-5">
<div class="wrap-table">
<div class="table mx-3">
<div class="row1 header">
<div class="cell">Sr.No</div>
<div class="cell">Name</div>
<div class="cell">Template Name</div>
<div class="cell">Item Type</div>
<div class="cell">Description</div>
<div class="cell">Submitted on</div>
<div class="cell">Status</div>
</div>
       
<?php $no = 1; ?>
<?php $__currentLoopData = $commentData['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row1">
<div class="cell" data-title="SR No"><?php echo e($no); ?></div>
<div class="cell" data-title="Name"><?php echo e($post->name); ?></div>
<div class="cell" data-title="Tempalte Name"><b><?php echo e($post->templates); ?></b></div>
<div class="cell" data-title="Item Type"><?php echo e($post->item_type); ?></div>
<div class="cell" data-title="Descriprtion"><?php echo e($post->description); ?></div>
<div class="cell" data-title="Date"><?php echo e(date('d M Y', strtotime($post->sug_date))); ?></div>
<div class="cell" data-title="Status"><?php if($post->status == 0): ?> <span class="badge badge-danger">Active</span> <?php else: ?> <span class="badge badge-success">Complete</span> <?php endif; ?></div>
</div>
<?php $no++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
</div>
</div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/suggestions.blade.php ENDPATH**/ ?>