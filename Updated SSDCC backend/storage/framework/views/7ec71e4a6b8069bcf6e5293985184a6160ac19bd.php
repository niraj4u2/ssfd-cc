<?php $__env->startSection('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<style>
.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 30px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box.colored {
    background: #3acf87
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}</style>
 
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
                                    <div class="card-box">
                    
                                            <div class="container">
                        <div class="row">
                            <div class="four col-md-3">
                                <div class="counter-box colored"> <i class="fa fa-user"></i> <span class="counter"><?php echo e($count[0]+$count[2]+$count[1]); ?></span>
                                    <p>Total Registered</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter"><?php echo e($count[1]); ?></span>
                                    <p>Active</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter"><?php echo e($count[2]); ?></span>
                                    <p>Temporary Block</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter"><?php echo e($count[0]); ?></span>
                                    <p>Permanently Block</p>
                                </div>
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
                    <form method="post" id="deleteForm" action="<?php echo e(action('Dashboard@deleteall')); ?>">
                        <?php echo csrf_field(); ?>
                     <table class="dt-responsive nowrap" style ="margin-top:24px;margin-bottom: 24px;">  <tr>
                         <td><input type="checkbox" id="singleCheckbox" ></td>
                          <td class="text-danger">Select All</td>
                          <td><input type="submit" name="deleteAll" class="buttonval" value="Delete" class="bg-danger text-light"></td>
                          <td><input type="submit" name="unblockAll" class="buttonval" value="Unblock" class="bg-danger text-light"></td>
                          <td><input type="submit" name="blockAll" class="buttonval" value="Block" class="bg-danger text-light"></td>
                           
                        </tr>
                    </table>           
                     <table id="table_id" class="display" class="table table-bordered dt-responsive nowrap">

                     
                            
                    <thead>
                        <th> </th>
                            <th>Serial Number</th>
                            <th>Name</th>
                            <th>Account Number	</th>
                            <th>Status</th>
                            <th> Profile Image</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  <tbody class="checkbox-group">
                        <?php
                                $i = 1
                                ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <input type="checkbox"   name="checkedId[]" value="<?php echo e($Account->accounts_id); ?>"></td>
                             <td><?php echo e(@$i++); ?></td>
                            <td><?php echo e($Account->name); ?></td>
                            <td><?php echo e($Account->account_num); ?></td>
                            <td><?php echo e(($Account->card_status==1) ? 'Active' : (($Account->card_status==0) ? 'Permanently Blocked':'Temporary Disabled')); ?></td>
                            <td>
                                <?php if(!empty($Account->profile_img)): ?> 
                                <img width="50px" hight="50px" src="<?php echo e(asset('storage/app/public/userimg/')); ?>/<?php echo e($Account->profile_img); ?>" alt="tag">
                                 
                            <?php endif; ?>
</td>       
                            <td><?php echo e($Account->created_at); ?></td>
                            <td>

                                
                                 
                                 <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo e(url('/home/delete/')); ?>/<?php echo e(md5($Account->accounts_id)); ?>">Delete</a>
                               
                           </td>
                       </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tbody>
               </table>
               </form>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->

</div> <!-- content -->
 
<!-- Footer Start -->
  <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
<!-- end Footer -->
<script> 
 
jQuery(document).ready(function(){
     
    jQuery('.counter').each(function () {
    jQuery(this).prop('Counter',0).animate({
    Counter: jQuery(this).text()
    }, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
    jQuery(this).text(Math.ceil(now));
    }
    });
    });
    
    
    $('#table_id').DataTable( {
        "pagingType": "full_numbers"
    } );

   checkUncheck();

   jQuery("#deleteForm").on("submit", function(event){
     
    confirmDeleteData(event);

});

});



function checkUncheck(){
    const boxsingleCheck = '#singleCheckbox';
    const checkboxGroup = ".checkbox-group input[type='checkbox']";
    
    
    if(jQuery(document).find(boxsingleCheck).length!==0 || jQuery(document).find(checkboxGroup).length!==0){
    jQuery(singleCheckbox).on('click',function(){
        if(this.checked){
            jQuery(checkboxGroup).each(function(){
                this.checked = true;
            });
        }else{
             jQuery(checkboxGroup).each(function(){
                this.checked = false;
            });
        }
    });
    
    jQuery(checkboxGroup).on('click',function(){
        if(jQuery(checkboxGroup+':checked').length == jQuery(checkboxGroup).length){
            jQuery(boxsingleCheck).prop('checked',true);
        }else{
            jQuery(boxsingleCheck).prop('checked',false);
        }
    });
}
}
function confirmDeleteData(event){
   
    if(jQuery(".checkbox-group input[type='checkbox']:checked").length > 0){
        var conformation = confirm("Are you sure ?");
        if(conformation==false){
            event.preventDefault();
        }
    }else{
        alert('Check at least 1 record.');
        return false;
    }
}

</script>
</div>
<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x73belfhully/public_html/ssskinnovations.com/hoc/resources/views/account/index.blade.php ENDPATH**/ ?>