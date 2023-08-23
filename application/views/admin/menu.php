<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?php echo base_url(); ?>admin-home">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-apps">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>manage-contact">
                                <span data-key="t-calendar">Contact Us</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>manage-feedback">
                                <span data-key="t-chat">Feedback</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>manage-subscriber">
                                <span data-key="t-email">Email Subscriber</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-banner">
                                <span data-key="t-invoices">Banner</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-aboutus">
                                <span data-key="t-contacts">Abouts Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-privacy-policy">
                                <span data-key="t-contacts">Privacy Policy</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-return-policy">
                                <span data-key="t-contacts">Return Policy</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-terms">
                                <span data-key="t-contacts">Terms And Conditions</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-faq">
                                <span data-key="t-contacts">FAQ's</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='fas fa-users'></i>
                        <span data-key="t-authentication">Member</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>manage-member">
                                <span data-key="t-contacts">Member</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-seller">
                                <span data-key="t-contacts">Seller</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-map-marker-alt"></i>
                        <span data-key="t-pages">Location</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>manage-country">
                                <span data-key="t-contacts">Country</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-state">
                                <span data-key="t-contacts">State</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-city">
                                <span data-key="t-contacts">City</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-sitemap"></i>
                        <span data-key="t-pages">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>manage-main-category">
                                <span data-key="t-contacts">Main Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-sub-category">
                                <span data-key="t-contacts">Sub Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-peta-category">
                                <span data-key="t-contacts">Peta Category</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-pages">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>manage-view-product">
                                <span data-key="t-contacts">Manage Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-product-review">
                                <span data-key="t-contacts">Product Review</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-product-offers">
                                <span data-key="t-contacts">Product Offers</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>manage-promo-code">
                                <span data-key="t-contacts">Promocode</span>
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
                            <a href="<?php echo base_url('manage-pending-order'); ?>">
                                <span data-key="t-contacts">Pending Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manage-confirm-order'); ?>">
                                <span data-key="t-contacts">Confirm Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manage-cancel-order'); ?>">
                                <span data-key="t-contacts">Cancel Order</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="<?php echo base_url(); ?>manage-commission">
                        <i class="fas fa-rupee-sign"></i>
                        <span data-key="t-ui-elements">Commission</span>
                    </a>
                </li>
              
              
                <li>
                    <a href="<?php echo base_url(); ?>manage-setting">
                        <i class="fas fa-cog"></i>
                        <span data-key="t-charts">Setting</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin-logout') ?>">
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
