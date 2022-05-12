<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Agent Lynk')); ?></title>

    <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jvectormap -->
        <link href="<?php echo e(asset('assets/libs/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet" />

        <!-- DataTables -->
        <link href="<?php echo e(asset('assets/libs/datatables/dataTables.bootstrap4.min.css')); ?> " rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/libs/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
        
        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" />
        
        <script src="https://ckeditor.com/docs/vendors/4.16.1/ckeditor/ckeditor.js"></script>
         <!-- 
        <script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
		Vendor js -->
        <!-- KNOB JS -->
        <script src="<?php echo e(asset('assets/libs/jquery-knob/jquery.knob.min.js')); ?>"></script>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>";
            const CSRF_TOKEN = '<?php echo e(csrf_token()); ?>';
        </script>

</head>
<body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                   <!--  <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/flags/us.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                            </a>

                         
                        </div>
                    </li> -->

        
                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-info noti-icon-badge">21</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i> </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>
                            </div>
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
 -->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">
                            <img src="<?php echo e(asset('')); ?>assets/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                              
                                    <?php echo e(Auth::user()->name); ?><i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome !
                                </h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-user"></i>
                                <span>My Account</span>
                            </a>

                            
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item notify-item">
                                <i class="dripicons-power"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>
<!-- 
                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li> -->

                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="<?php echo e(URL::to('/')); ?>" class="logo">
                            <span class="logo-lg">
                                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="50">
                            </span>
                            <span class="logo-sm">
                                <img src="<?php echo e(asset('assets/images/small-logo.png')); ?>" alt="" height="50">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                    <li class="app-search d-none d-md-block">
                        <form>
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="sr-only"></button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    
                    <!--- Sidemenu -->
         
                         <?php echo $__env->make('includes.sidebar_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                     


                  

                     </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <?php echo $__env->yieldContent('content'); ?>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- common modal -->
        <div id="commonModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content" id="commonModalBody" >

                </div>
            </div>
        </div>
        <!-- end common modal -->


        <!-- Vendor js -->
        <script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>

        <!-- KNOB JS -->
        <script src="<?php echo e(asset('assets/libs/jquery-knob/jquery.knob.min.js')); ?>"></script>
        <!-- Chart JS -->
        <script src="<?php echo e(asset('assets/libs/chart-js/Chart.bundle.min.js')); ?>"></script>

        <!-- Jvector map -->
        <script src="<?php echo e(asset('assets/libs/jqvmap/jquery.vmap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/jqvmap/jquery.vmap.usa.js')); ?>"></script>
        
        <!-- Datatable js -->
        <script src="<?php echo e(asset('assets/libs/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables/responsive.bootstrap4.min.js')); ?>"></script>
        
        <!-- Dashboard Init JS -->
        <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?>"></script>
        
        <!-- App js -->
        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </body>
</html>
</body>
</html>
<?php /**PATH /home/x73belfhully/public_html/ssskinnovations.com/hoc/resources/views/layouts/admin.blade.php ENDPATH**/ ?>