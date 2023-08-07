<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('seller/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            // require './header.php';
            $this->load->view('seller/header');
            ?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('seller/menu');
            ?>
            <!-- Left Sidebar End -->



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
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Pages</h2>
                                </div>

                                <div class="row pt-4 ">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="mb-3 lh-1 d-block text-dark font-size-15">Contact Us</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="57">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-contact" class="font-size-14">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Feedback</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="57">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-feedback" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Email Subscriber</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="57">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-subscriber" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Banner</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="57">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-banner" class="font-size-15">View More</a>
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
                    $this->load->view('seller/footer');
                    ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <?php
        // require_once './footerscript.php';
        $this->load->view('seller/footerscript');
        ?>
    </body>


</html>

