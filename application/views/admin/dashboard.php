<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('admin/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            // require './header.php';
            $this->load->view('admin/header');
            ?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('admin/menu');
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
                                                            <?php 
                                                                $contact = count( $this->md->my_select('tbl_contact_us','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $contact; ?>">0</span>
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
                                                            <?php 
                                                                $feedback = count( $this->md->my_select('tbl_feedback','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $feedback;  ?>">0</span>
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
                                                            <?php 
                                                                $email = count( $this->md->my_select('tbl_email_subscriber','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $email; ?>">0</span>
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
                                                            <?php 
                                                                $banner = count( $this->md->my_select('tbl_banner','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $banner; ?>">0</span>
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


                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">About Us</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $about = count( $this->md->my_select('tbl_about','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $about; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-aboutus" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Privacy Policy</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $privacy = count( $this->md->my_select('tbl_privacy_policy','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $privacy; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-privacy-policy" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Return Policy</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $return = count( $this->md->my_select('tbl_return_policy','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $return; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-return-policy" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-1 text-dark">Terms And Condition</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $terms = count( $this->md->my_select('tbl_terms_condition','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $terms; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-terms" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                </div><!-- end row-->

                                <div class="row">

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">FAQ's</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $faqs = count( $this->md->my_select('tbl_faqs','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $faqs; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-faq" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                </div><!-- end row-->
                            </div>
                        </div>


                        <div class="row">
                            <div class="card">
                                <div class="card-header row">
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Member</h2>
                                </div>

                                <div class="row pt-4 ">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Member</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $member = count( $this->md->my_select('tbl_register','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $member; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-member" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-1 d-block text-dark">Seller</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $seller = count( $this->md->my_select('tbl_seller','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $seller; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-seller" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!-- end row-->
                            </div>
                        </div>


                        <div class="row">
                            <div class="card">
                                <div class="card-header row">
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Locations</h2>
                                </div>

                                <div class="row pt-4 ">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Country</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $country = count( $this->md->my_select('tbl_location','*',array('label'=>"country")));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $country; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-country" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">State</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $state = count( $this->md->my_select('tbl_location','*',array('label'=>"state")));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $state; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-state" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">City</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $city = count( $this->md->my_select('tbl_location','*',array('label'=>"city")));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $city; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-city" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!-- end row-->
                            </div>
                        </div>


                        <div class="row">
                            <div class="card">
                                <div class="card-header row">
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Category</h2>
                                </div>

                                <div class="row pt-4 ">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Main Category</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $main = count( $this->md->my_select('tbl_category','*',array('label'=>"main")));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $main; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-main-category" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark"> Sub Category</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $sub = count( $this->md->my_select('tbl_category','*',array('label'=>"sub")));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $sub; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-sub-category" class="font-size-15">View More</a>
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
                                                        <?php 
                                                            $peta= count( $this->md->my_select('tbl_category','*',array('label'=>"peta")));
                                                        ?>
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Peta Category</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="<?php echo $peta ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-peta-category" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    
                                    
                                </div><!-- end row-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header row">
                                    <h2 class="card-title" style="padding-top: 10px; font-size: 20px">Product</h2>
                                </div>

                                <div class="row pt-4 ">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Add New Product</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $product = count( $this->md->my_select('tbl_product','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $product; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-new-product" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">View All Product</span>
                                                        <h4 class="mb-3">
                                                            <span class="counter-value" data-target="<?php echo $product; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-view-product" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Product Review</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $review = count( $this->md->my_select('tbl_review','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $review; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-product-review" class="font-size-15">View More</a>
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
                                                        <span class="text-size-14 mb-3 lh-2 d-block text-dark">Product Offer</span>
                                                        <h4 class="mb-3">
                                                            <?php 
                                                                $offer = count( $this->md->my_select('tbl_offer','*'));
                                                            ?>
                                                            <span class="counter-value" data-target="<?php echo $offer; ?>">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="text-nowrap">
                                                    <a href="<?php echo base_url(); ?>manage-product-offers" class="font-size-15">View More</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    
                                    
                                </div><!-- end row-->
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

            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <?php
        // require_once './footerscript.php';
        $this->load->view('admin/footerscript');
        ?>
    </body>


</html>

