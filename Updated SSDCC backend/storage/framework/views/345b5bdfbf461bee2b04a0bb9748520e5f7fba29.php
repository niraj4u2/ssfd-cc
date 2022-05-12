 <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                             

                            <li>
                                <a href="<?php echo e(URL::to('/')); ?>">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-users"></i>
                                    <span> Users </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="<?php echo e(url('/user/add')); ?>">Add User </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user/admin')); ?>">Admin</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo e(url('/user/realtor')); ?>">Realtor</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user/signage')); ?>">Sign Installer</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user/home-inspector')); ?>">Home Inspectors</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user/photographer')); ?>">Photographers</a>
                                    </li>
                                </ul>
                            </li>
                
                            


                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-list"></i>
                                    <span> Services </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                  
                                    <li>
                                        <a href="<?php echo e(url('/service')); ?>">Service List </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo e(url('/service/servicelist')); ?>">User Service Price List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/service/rate-add')); ?>">Add Service Price</a>
                                    </li>
                                   
                                </ul>
                            </li>

                            <li>
                                 <a href="<?php echo e(url('/city')); ?>">
                                    <i class=" dripicons-location"></i>
                                    <span> City </span>
                                
                                </a>
                              
                            </li>    

                            <li>
                                <a href="<?php echo e(url('/mail')); ?>">
                                    <i class="dripicons-mail"></i>
                                    <span>Mail Template </span>
                                     
                                </a>
                                  
                            </li>    
                           

                           <li>
                                <a href="javascript: void(0);">
                                   <i class="dripicons-briefcase"></i>
                                    <span> Lead </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                 
                                <ul class="nav-second-level" aria-expanded="false">
                                    
                                     

                                    <li>
                                        <a href="<?php echo e(url('/lead?user_type=signage')); ?>">
                                             
                                             <?php echo e(Config::get('global.user_type')['signage']); ?> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/lead?user_type=home-inspector')); ?>">
                                            <?php echo e(Config::get('global.user_type')['home-inspector']); ?> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/lead?user_type=photographer')); ?>">
                                            <?php echo e(Config::get('global.user_type')['photographer']); ?>  
                                        </a>
                                    </li>
                                    
                                     
                                </ul>
                            </li> 
                                    
                            
                            
                             <li>
                                <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item notify-item">
                                    <i class="dripicons-power"></i>
                                    <span>Logout</span>
                                </a>
                                
                            </li>   


                               
                                    
                            

                        </ul>

                  <?php /**PATH /var/www/html/agent/resources/views/includes/sidebar_admin.blade.php ENDPATH**/ ?>