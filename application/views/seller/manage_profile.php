<!doctype html>
<html lang="en">

    <head>

        <?php
        //require './header.php';
        $this->load->view('seller/head');
        ?>
    </head>
    <body>
        <div id="layout-wrapper">

            <?php
            //require './header.php';
            $this->load->view('seller/header');
            ?>
            <?php
            //require './header.php';
            $this->load->view('seller/menu');
            ?>
            <div id="layout-wrapper">
                <div class="main-content">

                    <div class="page-content">
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">My Profile</h4>


                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm order-2 order-sm-1">
                                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xl me-3">
                                                                
                                                                <img src="<?php echo base_url().$record->profile_pic; ?>" alt="" class="img-fluid img-fluid d-block">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-16 mb-1" style="margin-top:30px"><?php echo $record->company_name; ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto order-1 order-sm-2">
                                                    <div class="d-flex align-items-start justify-content-end gap-2">
                                                        <div>
                                                            <a href="<?php echo base_url(); ?>seller-change-profile" class="btn btn-soft-primary"> Change Profile</a>
                                                        </div>
                                                        <div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Basic Datalis</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#contact" role="tab">Contact Datalis</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#loaction" role="tab">Loaction Datalis</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#bank" role="tab">Bank Datalis</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>





                                    <div class="tab-content">
                                        <div class="tab-pane active" id="overview" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Basic Detalis</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <div class="pb-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Company Name :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-0"><?php echo $record->company_name; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Join Date :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo date('d-m-Y', strtotime($record->join_date)); ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">PAN Number :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->pan_no; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">GST Number :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->gst_no; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->


                                            <!-- end card -->
                                        </div>
                                        <!-- end tab pane -->



                                        <div class="tab-pane" id="contact" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Contact</h5>
                                                </div>
                                                   <div class="card-body">
                                                    <div>
                                                        <div class="pb-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Email :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-0"><?php echo $record->email; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Mobile Number :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->mobile; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="loaction" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Loaction</h5>
                                                </div>
                                                   <div class="card-body">
                                                    <div>
                                                        <div class="pb-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Country :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-0"><?php echo $city->country; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">State :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $city->state; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                          <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">City :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $city->city; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Address :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->address; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">PIN Code :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->pincode; ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="bank" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Bank</h5>
                                                </div>
                                                   <div class="card-body">
                                                    <div>
                                                        <div class="pb-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Bank Name :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->bank_name; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Breach name :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->branch_name; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">IFSC Code :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->ifsc_code; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Account No:</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->ac_no; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-3">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Account Beneficial Name:</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p><?php echo $record->bank_banificial_name; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- end tab pane -->

                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end col -->


                                <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->


                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>document.write(new Date().getFullYear())</script> © Minia.
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end d-none d-sm-block">
                                        Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->


            <!-- Right Sidebar -->
            <div class="right-bar">
                <div data-simplebar class="h-100">
                    <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                        <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                            <i class="mdi mdi-close noti-icon"></i>
                        </a>
                    </div>

                    <!-- Settings -->
                    <hr class="m-0" />

                    <div class="p-4">
                        <h6 class="mb-3">Layout</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout"
                                   id="layout-vertical" value="vertical">
                            <label class="form-check-label" for="layout-vertical">Vertical</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout"
                                   id="layout-horizontal" value="horizontal">
                            <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-mode"
                                   id="layout-mode-light" value="light">
                            <label class="form-check-label" for="layout-mode-light">Light</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-mode"
                                   id="layout-mode-dark" value="dark">
                            <label class="form-check-label" for="layout-mode-dark">Dark</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-width"
                                   id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                            <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-width"
                                   id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                            <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-position"
                                   id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                            <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-position"
                                   id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                            <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topbar-color"
                                   id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topbar-color"
                                   id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-size"
                                   id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                            <label class="form-check-label" for="sidebar-size-default">Default</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-size"
                                   id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                            <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-size"
                                   id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                            <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-color"
                                   id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                            <label class="form-check-label" for="sidebar-color-light">Light</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-color"
                                   id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                            <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar-color"
                                   id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                            <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-direction"
                                   id="layout-direction-ltr" value="ltr">
                            <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout-direction"
                                   id="layout-direction-rtl" value="rtl">
                            <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                        </div>

                    </div>

                </div> <!-- end slimscroll-menu-->
            </div>
            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>
                 <?php
            //require './header.php';
            $this->load->view('seller/footer');
            ?>
            <?php
            //require './header.php';
            $this->load->view('seller/footerscript');
            ?>
    </body>


</html>