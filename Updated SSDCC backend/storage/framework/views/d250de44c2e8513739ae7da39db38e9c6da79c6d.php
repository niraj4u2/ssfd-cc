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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Account </a></li>
                            
                        </ol>
                    </div>
                    <h4 class="page-title">Master Accounts List</h4>
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
                            <th>SL.no</th>
                            <th>Name</th>
                            <th>Account Number	</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $i = 1
                                ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                             <td><?php echo e(@$i++); ?></td>
                            <td><?php echo e($Account->name); ?></td>
                            <td><?php echo e($Account->account_num); ?></td>
                            <td><?php echo e(($Account->card_status==1) ? 'Active' : (($Account->card_status==0) ? 'Permanent Disabled':'Temporary Disabled')); ?></td>
                            <td><?php echo e($Account->created_at); ?></td>
                            <td>

                                
                                 
                                 <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo e(url('/home/delete/')); ?>/<?php echo e(md5($Account->accounts_id)); ?>">Delete</a>
                               
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


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hocbeta/resources/views/account/index.blade.php ENDPATH**/ ?>