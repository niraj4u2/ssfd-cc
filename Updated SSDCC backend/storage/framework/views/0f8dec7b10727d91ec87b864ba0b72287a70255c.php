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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?></a></li>
                                           
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?> Mail Template</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                     
										<form class="form-horizontal" id="cityForm" action="<?php echo e(route('mail.save')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                          <input type="hidden" name="id" value="<?php echo e(@$data['id']); ?>">
                                         <!-- Alert message (start) -->
                                          <?php if(Session::has('message')): ?>
                                          <div class="alert <?php echo e(Session::get('alert-class')); ?>">
                                             <?php echo e(Session::get('message')); ?>

                                          </div>
                                          <?php endif; ?>   


                                          <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="subject" class="col-form-label">Subject<span class="text-danger">*</span></label>
                                                          <input type="text" class="form-control" name="subject" id="subject"  value="<?php echo e(@$data['res']->subject); ?>">
                                                            <?php if($errors->has('subject')): ?>
                                                                <span class="text-danger"><?php echo e($errors->first('subject')); ?></span>
                                                            <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="sent_to" class="col-form-label">Sent Email(Reciver Email )<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="sent_to" id="sent_to"  value="<?php echo e(@$data['res']->sent_to); ?>">
                                                        <?php if($errors->has('sent_to')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('sent_to')); ?></span>
                                                        <?php endif; ?>

                                                        
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="from_name" class="col-form-label">From Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="from_name" id="from_name"  value="<?php echo e(@$data['res']->from_name); ?>">
                                                        <?php if($errors->has('from_name')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('from_name')); ?></span>
                                                        <?php endif; ?>
                                                        
                                                        
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="from_email" class="col-form-label">From Email<span class="text-danger">*</span></label>
                                                       
                                                         <input type="text" class="form-control" name="from_email" id="from_email"  value="<?php echo e(@$data['res']->from_email); ?>">
                                                        <?php if($errors->has('from_email')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('from_email')); ?></span>
                                                        <?php endif; ?>
                                                        
                                                    </div>

                                                     <div class="form-group col-md-6">
                                                        <label for="reply_to" class="col-form-label">Reply From Email<span class="text-danger">*</span></label>
                                                       
                                                          <input type="text" class="form-control" name="reply_from" id="reply_from"  value="<?php echo e(@$data['res']->reply_from); ?>">
                                                            <?php if($errors->has('reply_from')): ?>
                                                                <span class="text-danger"><?php echo e($errors->first('reply_from')); ?></span>
                                                            <?php endif; ?>
                                                        
                                                    </div>
                                                    <?php if(!empty(@$data['res']->id)): ?>
                                                     <div class="form-group col-md-6">
                                                        <label for="is_active" class="col-form-label">Status<span class="text-danger">*</span></label>
                                                       
                                                            <select name="is_active" placeholder="" class="form-control">
                                                                <option value="1" 
                                                                    <?php echo e(old('is_active',@$data['res']->is_active)==1 ? 'selected' : ''); ?>

                                                              >Active</option>
                                                               <option value="0" 
                                                                    <?php echo e(old('is_active',@$data['res']->is_active)==0 ? 'selected' : ''); ?>

                                                              >In-Active</option> 

                                                          
                                                            </select>
                                                    </div>
                                                    <?php endif; ?>

                                                </div> 


                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="message" class="col-form-label">Mail Content <span class="text-danger">*</span></label>
                                                        <textarea class="ckeditor form-control" cols="80" name="message" id="message" rows="10"><?php echo e(@$data['res']->message); ?></textarea>
         
                                                        <?php if($errors->has('message')): ?>
                                                            <span class="text-danger"><?php echo e($errors->first('message')); ?></span>
                                                        <?php endif; ?>
                                                        
                                                </div>    

 
                                         
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"  > </label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>  
                                        
                                    </form>
        
                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
        
        
                       
                     
         
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

				 <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <script>  CKEDITOR.replace( 'message' );alert('c');<script>
 
                
            </div>

<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/mail/add.blade.php ENDPATH**/ ?>