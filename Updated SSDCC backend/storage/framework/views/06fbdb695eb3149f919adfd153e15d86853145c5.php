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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'add'); ?> User</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?> User</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                     
        
                                    <form class="form-horizontal" action="<?php echo e(route('user.save')); ?>"  method="post" enctype="multipart/form-data"> 
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e(@$data['id']); ?>">
                                         <!-- Alert message (start) -->
                                              <?php if(Session::has('message')): ?>
                                              <div class="alert <?php echo e(Session::get('alert-class')); ?>">
                                                 <?php echo e(Session::get('message')); ?>

                                              </div>
                                              <?php endif; ?>
                                              <!-- Alert message (end) -->    
                                        


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name" class="col-form-label">Name<span class="text-danger">*</span></label>
                                                         <input type="text" class="form-control" required placeholder="Name" name="name" id="name"  value="<?php echo e(old('name',@$data['res']->name)); ?>">
                                                        <?php if($errors->has('name')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email" class="col-form-label">Email<span class="text-danger">*</span></label>
                                                        <input type="email" id="email" name="email" required class="form-control" placeholder="Email"  <?php echo e((!empty(@$data['res']->id)) ?'readonly' : ''); ?> value="<?php echo e(old('email',@$data['res']->email)); ?>">
                                                        <?php if($errors->has('email')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile" class="col-form-label">Mobile No<span class="text-danger">*</span></label>
                                                         
                                                         <input type="text" class="form-control" required  placeholder="Mobile No" id="mobile" value="<?php echo e(old('mobile',@$data['res']->mobile)); ?>" name="mobile" value="">
                                                        <?php if($errors->has('mobile')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                                                        <?php endif; ?>
                                                    </div>

                                                         <div class="form-group col-md-6">
                                                            <label  class="col-form-label" for="user_type">User Type<span class="text-danger">*</span> </label>
                                                                <select  class="form-control" name="user_type"  name="user_type" placeholder="" class="form-control" <?php echo e((!empty(@$data['res']->id)) ?'disabled' : ''); ?> >
                                                                

                                                                 <?php $__currentLoopData = Config::get('global.user_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype => $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                     <option value="<?php echo e($usertype); ?>" 
                                                                        <?php echo e(old('user_type',@$data['res']->user_type)==$usertype ? 'selected' : ''); ?>  ><?php echo e($username); ?></option>
                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                

                                                            </select>
                                                             <?php if($errors->has('user_type')): ?>
                                                                <span class="text-danger"><?php echo e($errors->first('user_type')); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                 

                                                     
                                                </div>

 
                                           
                                        <?php if(!empty(@$data['res']->id)): ?>
                                            <div class="form-group row">
                                                
                                            <div class="col-sm-12">

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="changepassword" class="custom-control-input" id="changepassword">
                                                    <label class="custom-control-label" for="changepassword">Change Password</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <div class="form-row changepasswordblock"   <?php if(!empty(@$data['res']->id)): ?> style="display: none;" <?php endif; ?> >
                                            <div class="form-group col-md-6">
                                                <label for="password" class="col-form-label">Password<span class="text-danger">*</span></label>
                                                   <?php if(!empty(@$data['res']->id)): ?>
                                                     <input type="password" name="password"  class="form-control" id="password" value="">
                                               <?php else: ?>
                                                  <input type="password" name="password" required class="form-control" id="password" value="">

                                               <?php endif; ?>  
                                                 <?php if($errors->has('password')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="confirm_password" class="col-form-label">Confirm Password<span class="text-danger">*</span></label>
                                               <?php if(!empty(@$data['res']->id)): ?>
                                                     <input type="password" name="confirm_password"  class="form-control" id="confirm_password" value="">
                                               <?php else: ?>
                                                  <input type="password" name="confirm_password" required class="form-control" id="confirm_password" value="">

                                               <?php endif; ?>  
                                                <?php if($errors->has('confirm_password')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="address" class="col-form-label">Address<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address" id="address" rows="5"><?php echo e(old('address',@$data['res']->address)); ?></textarea>

                                                     <?php if($errors->has('address')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                                    <?php endif; ?>
                                            </div>

                                            <div class="form-group col-md-6">
                                                
                                                 <?php if(!empty(@$data['res']->id)): ?>

                                                    <label for="confirm_password" class="col-form-label">Status<span class="text-danger">*</span></label>
                                                       <select name="is_active" placeholder="" class="form-control">
                                                        <option value="1" 
                                                            <?php echo e(old('is_active',@$data['res']->is_active)==1 ? 'selected' : ''); ?>

                                                      >Active</option>
                                                       <option value="0" 
                                                            <?php echo e(old('is_active',@$data['res']->is_active)==0 ? 'selected' : ''); ?>

                                                      >In-Active</option> 

                                                  
                                                    </select>
                                                <?php endif; ?>
                                            </div>
                                        </div>   

  

                                        <?php if(!empty(@$data['res']->profile_img)): ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="address">profile Image</label>
                                            <div class="col-sm-10">
                                                 <img width="100px"  height ="100px" src="<?php echo e(asset("storage/app/public/userimg/")); ?>/<?php echo e((@$data['res']->profile_img!='' ? @$data['res']->profile_img : '')); ?>" class="img img-responsive grid-img">

                                            </div>
                                        </div>

                                        <?php endif; ?>

                                           <div class="row">
											<div class="col-12">
												<div class="card-box">
													<h4 class="header-title">Profile Image</h4>
													<p class="sub-header">
														 
													</p>
						
													<form action="/" method="post" class="dropzone" id="profile_name">
														<div class="fallback">
															<input name="profile_img"  type="file" multiple />
														</div>
						
														<div class="dz-message needsclick">
															<i class="h1 text-muted dripicons-cloud-upload"></i>
															<h3>Drop files here or click to upload.</h3>
															<span class="text-muted font-13"></span>
														</div>
													</form>
													<div class="clearfix text-right mt-3">

                                                       <?php if(!empty(@$data['res']->id)): ?>
                                                         <input type="submit" name="submit" value='Update' class='mdi mdi-send mr-1' >
                                                       <?php else: ?>
                                                         <input type="submit" name="submit" value='Submit' class='mdi mdi-send mr-1' >
                                                       <?php endif; ?>     
                                                    



														 
													</div>
												</div> <!-- end card-box -->
											</div> <!-- end col-->
										</div>
										<!-- end row -->  
									  
         
                                        
                                    </form>
        
                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
        
        
                       
                     
         
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
				 <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
            <script>
                
              $("#changepassword").change(function() {

                    if(this.checked) {                                   
                        $('.changepasswordblock').show();                        
                    }else{
                         
                        $('.changepasswordblock').hide();
                    }
                });

                var checkstatus = '<?php echo e(old('changepassword')); ?>';
                 
                if(checkstatus){
                   $('#changepassword').prop('checked', true); 
                   $('.changepasswordblock').show();

                }

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/user/add.blade.php ENDPATH**/ ?>