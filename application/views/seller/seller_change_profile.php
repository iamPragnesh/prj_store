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
                            <form method="post" action="" name="changeprofile" novalidate="" class="myform" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm order-2 order-sm-1">
                                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                            <div class="flex-shrink-0">
                                                                <label for="imgbtn">
                                                                    <div class="avatar-xl me-3">
                                                                        <input type="file" class="form-control" onchange="loadFile(event)" name="photo" id="imgbtn" style="display: none;">
                                                                        <img src="<?php echo base_url() . $record->profile_pic; ?>"  title="Click Hear to change profile" style="cursor: pointer;" id="output" class="img-fluid img-fluid d-block">
                                                                    </div>
                                                                </label>
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
                                                                <button type="submit" name="add" value="yes" class="btn btn-soft-primary"> Save Change</button>
                                                            </div>
                                                            <div>
                                                                <a href="<?php echo base_url(); ?>seller-profile" class="btn btn-soft-primary"> Cancel</a>
                                                            </div>
                                                            <?php
                                                            if (isset($photo_success)) {
                                                                ?>                              
                                                                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                                    <i class="mdi mdi-check-all label-icon"></i><strong>Ok!</strong> <?php echo "$photo_success"; ?>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                <?php
                                                            }
                                                            if (isset($photo_error)) {
                                                                ?>
                                                                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                                    <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> <?php echo "$photo_error"; ?>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Basic Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#contact" role="tab">Contact Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#location" role="tab">Location Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#bank" role="tab">Bank Details</a>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('name')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="name" value="<?php echo $record->company_name ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('name');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input  class="form-control" type="date" name="jod" disabled="" value="<?php echo $record->join_date; ?>" >    
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('pno')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="pno" value="<?php echo $record->pan_no ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('pno');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('gno')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="gno" value="<?php echo $record->gst_no ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('gno');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('email')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="email" value="<?php echo $record->email ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('email');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('mobile')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="mobile" value="<?php echo $record->mobile ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('mobile');
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="location" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Location</h5>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted"> 
                                                                            <?php
                                                                            $city_id = $city->city;
                                                                            $state_id = $city->state;
                                                                            $country_id = $city->country;
                                                                            // city
                                                                            $cities = $this->md->my_select('tbl_location', '*', array('label' => 'city', 'parent_id' => $state_id));
                                                                            // state
                                                                            $state = $this->md->my_select('tbl_location', '*', array('label' => 'state', 'parent_id' => $country_id));
                                                                            // country
                                                                            $country = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
                                                                            ?>
                                                                            <select class="form-control <?php
                                                                            if (form_error('country')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" onchange="set_combo('state', this.value);" name="country">
                                                                                <option value="">Select Country</option>  
                                                                                <?php
                                                                                foreach ($country as $data) {
                                                                                    ?>
                                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                                    if (!isset($success) && set_select('country', $data->location_id)) {
                                                                                        echo set_select('country', $data->location_id);
                                                                                    } else {
                                                                                        if ($data->location_id == $city->country) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?> ><?php echo $data->name; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                            <p class="err-msg">
                                                                                <?php
                                                                                echo form_error('country');
                                                                                ?>
                                                                            </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <select class="form-control <?php
                                                                            if (form_error('state')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" onchange="set_combo('city', this.value);" id="state" name="state">
                                                                                <option value="">Select State</option>  
                                                                                <?php
                                                                                foreach ($state as $data) {
                                                                                    ?>
                                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                                    if (!isset($success) && set_select('state', $city->state)) {
                                                                                        echo set_select('state', $city->state);
                                                                                    } else {
                                                                                        if ($data->location_id == $city->state) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?> ><?php echo $data->name; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                            <p class="err-msg">
                                                                                <?php
                                                                                echo form_error('state');
                                                                                ?>
                                                                            </p>
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
                                                                    <div class="col-xl-5">
                                                                        <select class="form-control <?php
                                                                        if (form_error('city')) {
                                                                            echo "error-border";
                                                                        }
                                                                        ?>" id="city" name="city">
                                                                            <option value="">Select City</option>  
                                                                            <?php
                                                                            foreach ($cities as $data) {
                                                                                ?>
                                                                                <option value="<?php echo $data->location_id; ?>" 
                                                                                <?php
                                                                                if ($data->location_id == $record->location_id):
                                                                                    echo "selected";
                                                                                endif;
                                                                                ?> ><?php echo $data->name; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                        </select>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('city');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('address')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="address" value="<?php echo $record->address ?>">
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('pincode')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="pincode" value="<?php echo $record->pincode ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('pincode');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('bank_name')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="bank_name" value="<?php echo $record->bank_name; ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('bank_name');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('branch_name')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="branch_name" value="<?php echo $record->branch_name; ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('branch_name');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('ifsc')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="ifsc" value="<?php echo $record->ifsc_code; ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('ifsc');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('acno')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="acno" value="<?php echo $record->ac_no ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('acno');
                                                                            ?>
                                                                        </p>
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
                                                                    <div class="col-xl-5">
                                                                        <div class="text-muted">
                                                                            <input class="form-control <?php
                                                                            if (form_error('banificial_name')) {
                                                                                echo "error-border";
                                                                            }
                                                                            ?>" type="text" name="banificial_name" value="<?php echo $record->bank_banificial_name ?>">
                                                                        </div>
                                                                        <p class="err-msg">
                                                                            <?php
                                                                            echo form_error('banificial_name');
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end tab pane -->
                                            <div class="pt-2">
                                                <?php
                                                if (isset($error)) 
                                                {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - <?php echo $error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <!-- end col -->


                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>

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

            <script>
                var loadFile = function (event)
                {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function ()
                    {
                        URL.revokeObjectURL(output.src)
                    }
                };
            </script>

            <?php
//require './header.php';
            $this->load->view('seller/footerscript');
            ?>
    </body>
</html>

