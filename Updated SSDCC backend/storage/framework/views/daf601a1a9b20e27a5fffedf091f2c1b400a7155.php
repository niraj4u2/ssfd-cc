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
                            <li class="breadcrumb-item active">Service price($)</li>
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
                        
                                
                     <table id="dataTable" class="table table-bordered dt-responsive nowrap">
 
                    <thead>
                        <tr>
                             <th>SL.no</th>
                            <th>User Name </th>

                            <th>Service Name </th>

                            <th>Service Type</th>
                            <th>City Name</th>
                            <th>Price</th>
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
                            <td><?php echo e($service->name); ?></td> 
                            <td><?php echo e($service->service_name); ?></td> 
                            <td><?php echo e($service->service_type); ?></td>
                            <td><?php echo e($service->city_name); ?></td>
                            <td><?php echo e($service->price); ?></td>
                            
                            <td><?php echo e($service->created_at); ?></td>
                            <td><?php echo e(($service->is_active==1 ? 'Active' : 'In-Active')); ?></td>
                            <td>

                              <!--   <a  class="btn btn-sm btn-primary" href="<?php echo e(url('/service/rate-edit/')); ?>/<?php echo e($service->id); ?>">Edit</a> -->
 
                                 <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo e(url('/service/delete/')); ?>/<?php echo e(md5($service->id)); ?>">Delete</a>
                               
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


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/service/pricelist.blade.php ENDPATH**/ ?>