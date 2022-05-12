 <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation  

                            
                            </li>

                            <li>
                                <a href="<?php echo e(url('/')); ?>">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>         
                
                            


                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-briefcase"></i>
                                    <span> Services </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                  
                                    
                                     <li>
                                        <a href="<?php echo e(url('/service/servicelist')); ?>">User Service Price List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/service/rate-add')); ?>">add Service Price</a>
                                    </li>
                                     
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-meter"></i>
                                    <span> Orders </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                  
                                    
                                    <li>
                                   
                                    <a href="<?php echo e(url('/lead?user_type=signage')); ?>">
                                            <i class="dripicons-meter"></i>
                                            <span> My Leads </span>
                                    </a>
                                <li>
                                </ul>
                            </li>


                             
                             
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item notify-item">
                                    <i class="dripicons-power"></i>
                                    <span>Logout</span>
                                </a>
                                
                            </li>         
                          

                        </ul>

                  <?php /**PATH /var/www/html/agent/resources/views/includes/sidebar_signage.blade.php ENDPATH**/ ?>