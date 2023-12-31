<html>
    <?php
    //require './head.php';
    $this->load->view('member/mhead');
    ?>
        
    <style>
        #a:hover{
            box-shadow: 0 0 15px #dfdfdf;
        }
    </style>

    <body>

        <div id="layout-wrapper">
            <?php
            //require './header.php';
            $this->load->view('member/mheader');
            ?>


            <?php
            //require_once './menu.php';
            $this->load->view('member/menu');
            ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Dashboard</li>

                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="card">
                                <div class="card-header row">
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Dashboard</h2>
                                </div>

                                <div class="row pt-4 ">

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-600">
                                            <!-- card body -->
                                            <div class="card-body" id="a">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <?php
                                                        $wh['register_id'] = $this->session->userdata('member');
                                         
                                                        $address = count($this->md->my_select('tbl_shipment','*',$wh));
                                                        ?>
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">My Address</span>
                                                        <h4 class="mb-3">

                                                            <span class="counter-value" data-target="<?php echo $address; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>member-address" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-600">
                                            <!-- card body -->
                                            <div class="card-body" id="a">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <?php
                                                        $wh['register_id'] = $this->session->userdata('member');
                                         
                                                        $review = count($this->md->my_select('tbl_review','*',$wh));
                                                        ?>
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">My Review</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="<?php echo $review; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>member-review" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-600">
                                            <!-- card body -->
                                            <div class="card-body" id="a">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <?php
                                                        $wh['register_id'] = $this->session->userdata('member');
                                         
                                                        $wishlist = count($this->md->my_select('tbl_wishlist','*',$wh));
                                                        ?>
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">My Wishlist</span>
                                                        <h4 class="mb-3">
                                                             <span class="counter-value" data-target="<?php echo $wishlist; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>member-wishlist" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-600">
                                            <!-- card body -->
                                            <div class="card-body" id="a">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <?php
                                                        $id = $this->session->userdata('member');
                                        
                                                        $myorder = count($this->md->my_query("SELECT * FROM `tbl_bill` WHERE `register_id` = $id ORDER BY `bill_id` DESC"));
                                                        ?>
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">My Order</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="<?php echo $myorder; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>member-order" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                </div><!-- end col -->
                            </div>
                        </div>
                    </div><!-- end row -->

                    <?php
                    //require_once './footer.php';
                    $this->load->view('admin/footer');
                    ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php
            $this->load->view('member/mfooter');
            ?>
            <!-- JAVASCRIPT -->
            <div class="custom-file" style="padding: 50px;" ></div>
            <?php
            $this->load->view('member/mfooterscript');
            ?>
        </div>
    </body>
</html>