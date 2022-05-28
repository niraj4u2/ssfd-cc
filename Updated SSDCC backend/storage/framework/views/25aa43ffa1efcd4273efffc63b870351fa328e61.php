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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">  Account </a></li>
                            
                        </ol>
                    </div>
                     
                </div>
            </div>
        </div>     
        <!-- end page title -->


                            <div class="row">
                                <div class="col-12">
                                    
<div class="card">
    <div class="card-header">
        Change Password 
    </div>

    <div class="card-body">
        <!-- Alert message (start) -->
                          <?php if(Session::has('message')): ?>
                          <div class="alert <?php echo e(Session::get('alert-class')); ?>">
                             <?php echo e(Session::get('message')); ?>

                          </div>
                          <?php endif; ?>
        <form action="<?php echo e(route("user.changepassword")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
			<input type="hidden" name="id" value="<?php echo e(@$user['id']); ?>">

            
            <div class="form-row">
				 

			<div class="form-row changepasswordblock">
			    
			    	<div class="form-group col-md-6">
					<label for="password" class="col-form-label">Old Password<span class="text-danger">*</span></label>
						<div class="input-group">
						 
								 <input type="password" name="oldpassword"  class="form-control" id="oldpassword" value="">
							  
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
							</div>
							
						</div>
						<?php if($errors->has('oldpassword')): ?>
							<span class="text-danger"><?php echo e($errors->first('oldpassword')); ?></span>
						<?php endif; ?>
				</div>
				
				<div class="form-group col-md-6">
					<label for="password" class="col-form-label">Password<span class="text-danger">*</span></label>
						<div class="input-group">
						 
								 <input type="password" name="password"  class="form-control" id="password" value="">
							  
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
							</div>
							
						</div>
						<?php if($errors->has('password')): ?>
							<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
						<?php endif; ?>
				</div>
				<div class="form-group col-md-6">
					<label for="password" class="col-form-label">Confirm Password<span class="text-danger">*</span></label>
						<div class="input-group">
						 
							  <input type="password" name="confirm_password"  class="form-control" id="confirm_password" value="">
     
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-eye" id="ctogglePassword" style="cursor: pointer;"></i></span>
							</div>
							
						</div>
						<?php if($errors->has('confirm_password')): ?>
							<span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span>
						<?php endif; ?>
				</div>
			</div>  
									  
           <div class="form-group col-md-6">
                <input class="btn btn-danger" type="submit" value="Update">
            </div>
        </form>


    </div>
</div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->

</div> <!-- content -->
 
<!-- Footer Start -->
  <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
<!-- end Footer -->







 
 

<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x73belfhully/public_html/ssskinnovations.com/hoc/resources/views/user/changepassword.blade.php ENDPATH**/ ?>