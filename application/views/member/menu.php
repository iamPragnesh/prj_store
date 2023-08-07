<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <a href="#!" class="text-reset notification-item">
                    <div class="">
                        <div class=" text-center me-3">

                            <?php
                            $wh['register_id'] = $this->session->userdata('member');
                            $detail = $this->md->my_select('tbl_register', '*', $wh)[0];

                            if (strlen($detail->profile_pic) > 0) {
                                ?>
                                <img src="<?php echo base_url() . $detail->profile_pic; ?>" style=" border-radius: 150px;"  alt="<?php echo $detail->name; ?>" width="150px" height="150px" id="output" class="img-circle">
                                <?php
                            } else {
                                ?>
                                <img src="<?php echo base_url(); ?>member_assets/images/us.jpg" style=" border-radius: 100px 100px 100px 100px;"  alt="<?php echo $detail->name; ?>" width="150px" height="150px" id="output" class="img-circle">
                                <?php
                            }
                            ?>
                            <h4 align="center" style="padding-top: 30px;"><?php echo $detail->name; ?></h4>
                            <p style="font-size: 11px; ">Last Login :<b><?php echo date('d-m-y h:i:s', strtotime($detail->last_login)); ?></b></p>

                        </div>
                    </div>
                </a>

                <ul class="sub-menu" aria-expanded="false">
                    <li class="<?php
                    if ($this->session->userdata('mpage') == "dashboard") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url(); ?>member-home">
                            <i class="fas fa-home"></i>
                            <span data-key="t-calendar">Dashboard</span>
                        </a>
                    </li>

                    <li class="<?php
                    if ($this->session->userdata('mpage') == "profile") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url(); ?>member-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span data-key="t-chat">My Profile</span>
                        </a>
                    </li
                    >
                    <li class="<?php
                    if ($this->session->userdata('mpage') == "address") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url(); ?>member-address">
                            <i class="fas fa-address-card"></i>
                            <span data-key="t-email">My Address</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>member-review">
                            <i class="fas fa-comments"></i>
                            <span data-key="t-invoices">My Review</span>
                        </a>

                    </li>
                    <li class="<?php
                    if ($this->session->userdata('mpage') == "wishlist") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url(); ?>member-wishlist">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <span data-key="t-invoices">My Wishlist</span>
                        </a>

                    </li>
                    <li class="<?php
                    if ($this->session->userdata('mpage') == "order") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url('member-order'); ?>">
                            <i class="fas fa-box"></i>
                            <span data-key="t-invoices">My Order</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($this->session->userdata('mpage') == "password") {
                        echo "active-menu";
                    }
                    ?>">
                        <a href="<?php echo base_url(); ?>member-password">
                            <i class="fas fa-cog"></i>
                            <span data-key="t-invoices">Setting</span>
                        </a>

                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>member-logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span data-key="t-invoices">Logout</span>
                        </a>

                    </li>

                </ul>

        </div>
    </div>
    <!-- Sidebar -->
</div>