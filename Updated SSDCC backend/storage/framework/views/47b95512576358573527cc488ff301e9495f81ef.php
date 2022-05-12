<?php $__env->startSection('content'); ?>
<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                            <li class="breadcrumb-item active"><?php echo e(Config::get('global.user_type.photographer')); ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo e(Config::get('global.user_type.photographer')); ?> List</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title"><?php echo e(Config::get('global.user_type.photographer')); ?> List</h4>
                    
                    
                    <table id="dataTable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr><th>SL.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                                $i = 1
                            ?>
                            <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(@$i++); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->mobile); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td> 
                                    <a  class="btn btn-sm btn-primary" href="<?php echo e(url('/user/edit/')); ?>/<?php echo e($user->id); ?>">Edit</a>
 
                                <?php if($user->id != 1): ?>
                                             <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo e(url('/user/delete/')); ?>/<?php echo e(md5($user->id)); ?>">Delete</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->

</div> <!-- content -->

<!-- Footer Start -->

                 <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end Footer -->

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/user/photographer.blade.php ENDPATH**/ ?>