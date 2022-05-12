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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service </a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?></a></li>
                                            <li class="breadcrumb-item active"> Service Price </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?> Service Price</h4>
                                </div> 
                            </div>
                        </div>     
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                     
        
                                    <form class="form-horizontal" action="<?php echo e(route('service.ratesave')); ?>"  method="post" enctype="multipart/form-data"> 
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
                                                <label for="city_id" class="col-form-label">City Name<span class="text-danger">*</span></label>
                                                    <select name="city_id"  name="city_id" placeholder="" class="form-control"  >                                            

                                                     <?php $__currentLoopData = @$citylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city_id => $city_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e(@$city_id); ?>"

                                                            <?php echo e(old('city_id',@$data['res']->city_id)==$city_id ? 'selected' : ''); ?>

                                                          ><?php echo e($city_name); ?></option>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     

                                                </select>
                                                 <?php if($errors->has('city_id')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('city_id')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6" id="user_type_list" <?php if(auth()->user()->user_type !='home-inspector'): ?> style="display:none" <?php endif; ?> >
                                                <label for="service_type" class="col-form-label">Service Type<span class="text-danger">*</span></label>
                                                
                                                  <div class="custom-control custom-radio">
                                                    <input type="radio" id="Refer" value="refer"  name="service_type" class="custom-control-input">
                                                    <label class="custom-control-label" for="Refer">Refer an home Inspection</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="Order" value="order" checked="true" name="service_type" class="custom-control-input">
                                                    <label class="custom-control-label" for="Order">Order an home Inspection</label>
                                                </div>
                                                 <?php if($errors->has('service_type')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('service_type')); ?></span>
                                                <?php endif; ?>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="user_id" class="col-form-label">User List <span class="text-danger">*</span></label>
                                                    
                                                     <select name="user_id"  name="user_id"    id="user_id" placeholder="" class="form-control" >
                                                    <?php if(auth()->user()->user_type =='admin'): ?>  
                                                        <option value="">Please select User</option>    
                                                     <?php endif; ?>   
                                                     <?php $__currentLoopData = @$userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_id => $user_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($user_id); ?>" <?php echo (@$data['res']->user_id==$user_id ? 'selected' : ''); ?>  ><?php echo e(ucfirst($user_name)); ?></option>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                                                    </select>
                                                     <?php if($errors->has('user_id')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('user_id')); ?></span>
                                                    <?php endif; ?> 
                                            </div>

                                             <div class="form-group col-md-6">
                                                <label for="service_id" class="col-form-label">Service List <span class="text-danger">*</span></label>
                                                    
                                                     <select name="service_id"  id="service_id" name="service_id" placeholder="" class="form-control"   >
                                                        <option value="">Please select service</option>    
                                                    </select>
                                                     <?php if($errors->has('service_id')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('service_id')); ?></span>
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6" <?php if(old('service_id')!='other'): ?> style="display:none" <?php endif; ?> id="other_service">
                                                <label   class="col-form-label" for="other">Other Service Name<span class="text-danger">*</span></label>
                                                    
                                                     <input type="text" id="other" name="other" value="<?php echo e(old('other')); ?>"    class="form-control" placeholder="Other service name">
                                                    <?php if($errors->has('other')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('other')); ?></span>
                                                    <?php endif; ?>
                                            </div>
                                             <div class="form-group col-md-6"  >
                                                <label   class="col-form-label" for="price">Price ($)<span class="text-danger">*</span></label>
                                                    
                                                      <input type="text" id="price"  value="<?php echo e(old('price')); ?>"  name="price" required class="form-control" placeholder="Price">
                                                <?php if($errors->has('price')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                             <?php if(!empty(@$data['res']->id)): ?>
                                                <div class="form-group col-md-6"  >
                                                      <label   class="col-form-label" for="is_active">Status<span class="text-danger">*</span></label>
                                                    
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
                                         <div class="row">
                                            <div class="col-12">
                                                 
                                                    
                                                    <div class="clearfix text-right mt-3">

                                                       <?php if(!empty(@$data['res']->id)): ?>
                                                         <input type="submit" class ="btn btn-primary" name="submit" value='Update' class='mdi mdi-send mr-1' >
                                                       <?php else: ?>
                                                         <input type="submit" class ="btn btn-primary"  name="submit" value='Submit' class='mdi mdi-send mr-1' >
                                                       <?php endif; ?>     
                                                    



                                                       
                                                </div>  
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->  
										 
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
            <script type="text/javascript">
                  /* Load positions into postion <selec> */

                   // change for select type  
                  var service_type =jQuery('input[name=service_type]:checked').val();
                  jQuery( "#user_id , input[name=service_type]" ).change(function() 
                  {

                     jQuery('#other_service').hide();                     
                     var strng =$( "#user_id option:selected" ).text();
                     incStr = strng.search("Home-inspector", 10); 
                     if(incStr ===0){
                       jQuery('#user_type_list').show(); 
                     }else{
                        service_type='order'; //set for if not home-inspector 
                        jQuery('#user_type_list').hide(); 
                     }
                      
                     // get listing for service type
                     var user_id = $('#user_id').val(); 
                    listserviceType(user_id,service_type);
                  });  
                  jQuery( "#service_id" ).change(function() 
                  {
                     
                    if($(this).val()=='other'){
                        jQuery('#other_service').show();
                    }else{
                         jQuery('#other_service').hide();
                    }
                  });
                // ajax hits for 

                <?php if(auth()->user()->user_type !='home-inspector'  ): ?>
                 listserviceType($('#user_id').val(),service_type);

                <?php endif; ?>
                

                function listserviceType(user_id,service_type){
                      jQuery.getJSON("<?php echo e(route('ajaxservice.list')); ?>?user_id="+ user_id+ "&service_type="+ service_type , function(jsonData){
                        select = '<select name="position" class="form-control input-sm " required id="position" >';
                          jQuery.each(jsonData, function(i,data)
                          {
                            select +='<option value="'+data.service_id+'" <?php if(old("service_id")=="data.service_id"): ?> selected <?php endif; ?> >'+data.service_name+'</option>';
                           });
                            
                            select += '<option value="other" <?php if(old("service_id")=="other"): ?> selected <?php endif; ?> >Other</option></select>';
                            jQuery("#service_id").html(select);


                    });
                }

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/service/addprice.blade.php ENDPATH**/ ?>