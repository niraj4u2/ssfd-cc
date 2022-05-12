

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Lead </a></li>
                                <li class="breadcrumb-item active">Master Lead </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Master Lead </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">


                        <table id="dataTable" class="table table-bordered dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Services Name</th>
                                    <th>UserName</th>
                                    <th>Property Addr.</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$i++); ?></td>
                                    <td><?php echo e($leadResult->service_name); ?></td>
                                    <td><?php echo e($leadResult->username); ?></td>
                                    <td><?php echo e($leadResult->address); ?></td>
                                    <td> <?php echo e($leadResult->current_status); ?></td>
                                    <td> <?php echo e($leadResult->created_at); ?></td>
                                    <td> <a class="btn btn-sm btn-primary" href="<?php echo e(url('/lead/leaddetail/')); ?>/<?php echo e(md5($leadResult->leadId)); ?>">View</a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($data->links()); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/lead/leadlist.blade.php ENDPATH**/ ?>