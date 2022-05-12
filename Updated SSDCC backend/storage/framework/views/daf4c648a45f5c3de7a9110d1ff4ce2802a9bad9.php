

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lead</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Detail</a></li>
                                <li class="breadcrumb-item active">Lead Details </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead Details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">Lead Details</h4>
                        <form class="form-horizontal" action="<?php echo e(route('lead.leadsave')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e(@$data['id']); ?>">
                            <!-- Alert message (start) -->
                            <?php if(Session::has('message')): ?>
                            <div class="alert <?php echo e(Session::get('alert-class')); ?>">
                                <?php echo e(Session::get('message')); ?>

                            </div>
                            <?php endif; ?>
                            <!-- Alert message (end) -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="name">Service <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" placeholder="Services Name" name="services_name" id="services_name">
                                        <?php $__currentLoopData = $data['servicesData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicesAll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($servicesAll->service_name == @$data['res']->service_name): ?>
                                        <option value="<?php echo e($servicesAll->id); ?>" selected><?php echo e($servicesAll->service_name); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($servicesAll->id); ?>"><?php echo e($servicesAll->service_name); ?></option>
                                        <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="Installer">Installer</label>
                                <div class="col-sm-10">
                                    <input type="text" id="installer" name="installer" class="form-control" placeholder="Installer" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="previous_schedule_date">Previous Schedule Date</label>
                                <div class="col-sm-10">
                                    <input type="text" id="" name="previous_schedule_date" name="previous_schedule_date" value="<?php echo e(@$data['res']->previous_schedule_date); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="service_amt">Service Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="service_amt" id="service_amt" value="<?php echo e(@$data['res']->service_amt); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="service_amt">Message</label>
                                <div class="col-sm-10">
                                   <button type="button" onclick="viewMessage('<?php echo e(@$data[id]); ?>')" class="btn btn-sm btn-primary">Click Here to View Lead Meaasage</button>

                                  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="completion_date">Completion Date</label>
                                <div class="col-sm-10">
                                    <input type="datetime" id="" name="completion_date" value="<?php echo e(@$data['res']->completion_date); ?>" class="form-control" id="completion_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="current_status">Current Status</label>
                                <div class="col-sm-10">
                                    <select type="text" name="current_status" class="form-control" id="current_status">
                                        <?php $__currentLoopData = $data['leadStatus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadAll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($leadAll->current_status == @$data['res']->current_status): ?>
                                        <option value="<?php echo e($leadAll->id); ?>" selected><?php echo e($leadAll->current_status); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($leadAll->id); ?>"><?php echo e($leadAll->current_status); ?></option>
                                        <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="created_at">Created At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="created_at" readonly class="form-control" id="created_at" value="<?php echo e(@$data['res']->created_at); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="updated_at">Updated At</label>
                                <div class="col-sm-10">
                                    <input readonly type="text" name="updated_at" class="form-control" id="updated_at" value="<?php echo e(@$data['res']->updated_at); ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="clearfix text-right mt-3">
                                        <input type="submit" name="submit" value='Submit' class='btn btn-sm btn-primary mdi mdi-send mr-1'>
                                    </div>
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </form>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title text-center">Lead Images</h4>
                                    <div class="form-group row" style="padding: 10px 0;"> 
                                        <?php if(!empty($data['leadImagesData'])): ?>

                                            <?php $__currentLoopData = $data['leadImagesData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadImages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-3">
                                                <img width="270px" class="zoomA" height="200px" style="padding-bottom:25px;" src="<?php echo e(asset("storage/app/public/lead/")); ?>/<?php echo e($leadImages->image); ?>" class="img img-responsive grid-img" onclick="window.open(this.src)">
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                             <div class="col-sm-3">
                                                 <p class="no-record">There are no image</p>
                                            </div>
                                            <?php endif; ?>
                                     
                                    </div> <!-- end card-box -->
                                </div> <!-- end col-->
                            </div>
                        </div>

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/agent/resources/views/lead/leaddetail.blade.php ENDPATH**/ ?>