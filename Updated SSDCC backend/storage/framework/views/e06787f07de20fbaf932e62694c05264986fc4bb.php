 <div class="modal-header">
    <h5 class="modal-title"><?php echo e((!empty(@$data['res']->id)) ?'Edit' : 'Add'); ?> Service</h5>
    <button type="button" class="close" data-dismiss="modal">×</button>
 </div>

 <div class="modal-body pt-4">
    <div id="formErrors"></div>
    <form class="form" id="serviceForm" action="javascript:void(0)" method="post">
        <input type="hidden" name="id" value="<?php echo e(@$data['id']); ?>">
        

        <div class="form-group">
            <label>
                <span class="label-text">Service Name</span>
                <input type="text" name="service_name" placeholder="Service Name" value="<?php echo e(old('service_name',@$data['res']->service_name )); ?>" class="form-control">
            </label>
            <span id="service_name_error"></span>
        </div>

        <?php if(auth()->user()->user_type =='admin'): ?>
            <div class="form-group">
            <label>
                <span class="label-text">User Type</span>
                <select name="user_type" id="user_type" placeholder="" class="form-control" <?php echo e((!empty(@$data['res']->id)) ?'disabled' : ''); ?> >
                     <?php $__currentLoopData = Config::get('global.user_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype => $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <?php 
                     if($usertype =='realtor' || $usertype =='admin' ) continue ;

                     ?>
                     <option value="<?php echo e($usertype); ?>" 
                        <?php echo e(old('user_type',@$data['res']->user_type)==$usertype ? 'selected' : ''); ?>  ><?php echo e($username); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

              </select>

                 

            </label>
            <span id="user_type_error"></span>
        </div>

        <?php else: ?>
            <input type="hidden" name="user_type" value="<?php echo e(auth()->user()->user_type); ?>">
        <?php endif; ?>

        <?php if(auth()->user()->user_type =='admin' || auth()->user()->user_type =='home-inspector' || @$data['res']->user_type=='home-inspector'): ?>
            <div class="form-group" id="servicetype" <?php if(auth()->user()->user_type !='home-inspector'  ): ?> style="display: none;" <?php endif; ?>>
            <label>
                <span class="label-text">Service Type</span>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="Refer" value="refer"  <?php if(@$data['res']->service_type =='refer'  ): ?> checked="true" <?php endif; ?> name="service_type" class="custom-control-input">
                        <label class="custom-control-label" for="Refer">Refer an home Inspection</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="Order" value="order" <?php if(@$data['res']->service_type =='order'  ): ?> checked="true" <?php endif; ?>  name="service_type" class="custom-control-input">
                        <label class="custom-control-label" for="Order">Order an home Inspection</label>
                    </div>

                 

            </label>
            <span id="service_type_error"></span>
        </div>

        <?php else: ?>
                <input type="hidden" name="service_type" value="order">
        <?php endif; ?> 

        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>
                <span class="label-text">Status</span>
                   <select name="is_active" placeholder="" class="form-control">
                    <option value="1" 
                        <?php echo e(old('is_active',@$data['res']->is_active)==1 ? 'selected' : ''); ?>

                  >Active</option>
                   <option value="0" 
                        <?php echo e(old('is_active',@$data['res']->is_active)==0 ? 'selected' : ''); ?>

                  >In-Active</option>  

              </select>
            </label>
            <span id="status_error"></span>
        </div>




        <button type="submit" class="btn btn-sm btn-rounded btn-success">Submit</button>
        <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
    </form>
 </div>
<script type="text/javascript">
    var usertype = '<?php echo e(@$data['res']->user_type); ?>';
    if(usertype=='home-inspector'){
      $('#servicetype').show();
    }

    jQuery( "#user_type" ).change(function() 
      {
         
        if($(this).val()=='home-inspector'){
          $('#servicetype').show();
        }else{
            $('#servicetype').hide();
        }
      });

</script><?php /**PATH /var/www/html/agent/resources/views/service/add.blade.php ENDPATH**/ ?>