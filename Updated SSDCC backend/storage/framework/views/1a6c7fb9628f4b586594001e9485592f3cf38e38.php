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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service price list </a></li>
                            <li class="breadcrumb-item active">Service price</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Service price List</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                     <div class="row">
                            <div class="col-12">
                                
                                <div class="add_city-div">
                                   <button type="button" onclick="addService()" class="btn btn-sm btn-primary">Add Service</button>
                               </div>
                            </div>
                         </div>   
                        
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
                            <th>Service Name </th>                             
                                                    
                            <th>User Type Type</th>
                            <th>Create Date </th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                             $i = 1
                         ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            
                            <td><?php echo e(@$i++); ?></td>
                            <td><?php echo e($service->service_name); ?></td> 
                            <!-- <td><?php echo e(ucfirst($service->service_type)); ?></td>  -->
                            <td><?php echo e(Config::get('global.user_type')[$service->user_type]); ?></td>
                            <td><?php echo e($service->created_at); ?></td>
                            
                            <td><?php echo e(($service->is_active==1 ? 'Active' : 'In-Active')); ?></td>
                            <td>

                                <button type="button" onclick="addService('<?php echo e($service->id); ?>')" class="btn btn-sm btn-primary">Edit Service</button>
 
                                 <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo e(url('/service/service-delete/')); ?>/<?php echo e(md5($service->id)); ?>">Delete</a>
                               
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


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/service/index.blade.php ENDPATH**/ ?>