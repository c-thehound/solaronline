       <?php
        $active = isset($active) ? $active : 'home';
       ?>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('images/user.png'); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $user->user_firstname . ' ' . $user->user_lastname; ?>
                    </div>
                    <div class="email"><?php echo $user->user_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('user/profile/' . $user->user_id) ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Dashboard</li>
                    <li class="<?php echo $active === 'home' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url("/dashboard");?>">
                            <i class="material-icons">home</i>
                            <span>Overview</span>
                        </a>
                    </li>
                    <?php if($portal === 'stoves') : ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Builders</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'stoves/view_builders' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/view_builders");?>">
                                    <i class="material-icons">home</i>
                                    <span>View Stove Builders</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'stoves/add_builder' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/add_builder");?>">
                                    <i class="material-icons">home</i>
                                    <span>Add Stove Builder</span>
                                </a>
                            </li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Production Centres</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'stoves/view_centres' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/view_centres");?>">
                                    <i class="material-icons">home</i>
                                    <span>View Centres</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'stoves/add_centre' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/add_centre");?>">
                                    <i class="material-icons">home</i>
                                    <span>Add Centre</span>
                                </a>
                            </li>
                            <li class="<?php echo $active === '/stoves/producers/data_entry' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("stoves/producers/data_entry");?>">
                                    <i class="material-icons">home</i>
                                    <span>Data Entry</span>
                                </a>
                            </li>
                            <li class="<?php echo $active === '/stoves/producers/view_data' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("stoves/producers/view_data");?>">
                                    <i class="material-icons">home</i>
                                    <span>Production Centre Data</span>
                                </a>
                            </li>
                            <?php endif; ?>  
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Stoves</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'stoves/data_entry' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/data_entry");?>">
                                    <i class="material-icons">home</i>
                                    <span>Data Entry</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'stoves/view_data' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/stoves/view_data");?>">
                                    <i class="material-icons">home</i>
                                    <span>View Stove Data</span>
                                </a>
                            </li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($portal === 'solar') : ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>LME</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_lmes' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/lme");?>">
                                    <i class="material-icons">home</i>
                                    <span>View LMEs</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_lme' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_lme");?>">
                                    <i class="material-icons">home</i>
                                    <span>Add LME</span>
                                </a>
                            </li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Coordinator</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_coordinator' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/view_coordinator");?>">
                                    <i class="material-icons">text_fields</i>
                                    <span>View Coordinator</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_coordinator' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_coordinator");?>">
                                    <i class="material-icons">text_fields</i>
                                    <span>Add Coordinator</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Product</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_product' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/view_product");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View Products</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_product' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_product");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Add Product</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Sales</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_sales' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/sales");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View Sales</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_sales' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_sales");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Add Sales</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="<?php echo $active === 'product_distribution' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/product_distribution");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Product Distribution</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">receipt</i>
                            <span>Receipt Books</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'register_book' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/register_book");?>">
                                    <i class="material-icons">text_fields</i>
                                    <span>Register Book</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="<?php echo $active === 'view_books' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/view_books");?>">
                                    <i class="material-icons">text_fields</i>
                                    <span>View Books</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>County</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_county' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/view_county");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View Counties</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_county' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_county");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Add County</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Cluster</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_cluster' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/view_cluster");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View Clusters</span>
                                </a>
                            </li>
                            <?php if((int)$user->user_level !== 2) : ?>
                            <li class="<?php echo $active === 'add_cluster' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/add_cluster");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Add Cluster</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php if((int)$user->user_level === 1) : ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo $active === 'view_users' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/user/all");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View Users</span>
                                </a>
                            </li>
                            <li class="<?php echo $active === 'add_user' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/user/add");?>">
                                    <i class="material-icons">layers</i>
                                    <span>Add User</span>
                                </a>
                            </li>
                            <li class="<?php echo $active === 'user_logs' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url("/logs");?>">
                                    <i class="material-icons">layers</i>
                                    <span>View User Logs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">GIZ - EnDev</a>.
                </div>
                <div><a href="<?php echo base_url('Solar Online Documentation.pdf'); ?>"> USER MANUAL</a></div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->