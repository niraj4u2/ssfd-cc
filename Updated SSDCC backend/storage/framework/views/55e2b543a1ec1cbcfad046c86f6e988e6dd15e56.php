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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Mail </a></li>
                            <li class="breadcrumb-item active">Master Mail Template</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Master Mail Template List</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                          <!-- Alert message (start) -->
                              <?php if(Session::has('message')): ?>
                              <div class="alert <?php echo e(Session::get('alert-class')); ?>">
                                 <?php echo e(Session::get('message')); ?>

                              </div>
                              <?php endif; ?>
                              <!-- Alert message (end) -->    
                    
                       <table id="dataTable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            
                            <th>Sent To</th>
                            <th>From Name</th>
                             
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($mail->subject); ?></td>
                            <td><?php echo e($mail->sent_to); ?></td>
                            <td><?php echo e($mail->from_name); ?></td>
                            <td><a  class="btn btn-sm btn-primary" href="<?php echo e(url('/mail/edit/')); ?>/<?php echo e($mail->id); ?>">Edit</a></td>
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


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/mail/index.blade.php ENDPATH**/ ?>