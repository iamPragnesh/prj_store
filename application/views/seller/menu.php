<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?php echo base_url(); ?>seller-home">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url(); ?>seller-profile">
                        <i class="fa fa-user"></i>
                        <span data-key="t-dashboard">Profile</span>
                    </a>
                </li>
                <?php
                $record = $this->md->my_select('tbl_seller','*',array("seller_id"=>$this->session->userdata('seller')))[0]->status;
                
                if($record == 1)
                {
                    ?>
                    <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-pages">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>seller-new-product">
                                <span data-key="t-contacts">Add New Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>seller-view-product">
                                <span data-key="t-contacts">View All Product</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='fas fa-users'></i>
                        <span data-key="t-authentication">Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url('seller-pending-order'); ?>">
                                <span data-key="t-contacts">Pending Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('seller-confirm-order'); ?>">
                                <span data-key="t-contacts">Confirm Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('seller-cancel-order'); ?>">
                                <span data-key="t-contacts">Cancel Order</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                }
                ?>
                
                <li>
                    <a href="<?php echo base_url(); ?>seller-setting">
                        <i class="fas fa-cog"></i>
                        <span data-key="t-charts">Setting</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('seller-logout') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span data-key="t-icons">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
