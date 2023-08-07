<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('seller/head');
    ?>

    <body>
    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            //require './header.php';
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View All Product Review</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>seller-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                            <li class="breadcrumb-item active">Product Review</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="card col-12">

                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All Product Review</h4>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product</th>
                                                <th>User</th>
                                                <th>Preview</th>
                                                <th>Rate</th>
                                                <th>status</th>
                                                <th>Remove</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                ?>
                                                <tr align="center" valign="">
                                                    <td>1</td>

                                                    <td>
                                                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Iphone" style="cursor: pointer" target="_new" href="<?php echo base_url(); ?>seller_assets/images/i12.jpg">
                                                            <img src="<?php echo base_url(); ?>seller_assets/images/i12.jpg" alt="Workplace" usemap="#workmap" width="100" height="40">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <img class="rounded-circle header-profile-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="PRJ" style="cursor: pointer" src="<?php echo base_url(); ?>seller_assets/images/users/avatar-1.jpg"
                                                             alt="Header Avatar">


                                                    </td>
                                                    <td>A powerful product review should clearly point out who the product is for.
                                                        Another reason why people read product reviews is even simpler. Users want to make sure the product is the best of its kind. 
                                                        Take marketing tools — people want to make sure they're straightforward, user-friendly and generally easy to handle.
                                                    </td>

                                                    <td>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </td>
                                                    <td>
                                                        <a style="cursor: pointer" >
                                                            <i class="fas fa-toggle-on" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Acitive"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                            <i class="far fa-trash-alt text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end cardaa -->
                        </div>


                    </div>
                    <!-- end main content-->
                    <?php
                    //require_once './footer.php';
                    $this->load->view('seller/footer');
                    ?>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php
                //require_once './footerscript.php';
                $this->load->view('seller/footerscript');
                ?>

                <!--ckeditor--> 
                <script href="<?php echo base_url(); ?>seller_assets"assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

                <!--init js--> 
                <script href="<?php echo base_url(); ?>seller_assets"assets/js/pages/form-editor.init.js"></script>

                <script href="<?php echo base_url(); ?>seller_assets"assets/js/app.js"></script>
                </body>


                </html>