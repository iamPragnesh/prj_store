<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('admin/head');
    ?>

    <body>

        <div id="layout-wrapper">

            <?php
            //require './header.php';
            $this->load->view('admin/header');
            ?>


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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Setting</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Setting</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="col-4">
                                            <h4 class="card-title" style="padding-top: 10px">Change Profile</h4>
                                        </div>
                                    </div>
                                    <form class="myform" method="post" action="" name="photo" novalidate="" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <center>
                                                <?php
                                                $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];
                                                ?>

                                                <img class="rounded-circle" id="preview" src="<?php echo base_url() . $data->profile_pic; ?>" style="width:250px" alt="Header Avatar">
                                                <div  style="padding: 10px;">
                                                    <img style="display: none" id="preview" class="rounded-circle" class="img-thumbnail"  width="200px" />
                                                </div>
                                                <br/>
                                                <div class="custom-file">
                                                    <input accept="image/*" type="file" id="setPhoto" name="photo" class="custom-file-input-new">
                                                </div>
                                            </center>
                                            <br/><br/>
                                            <div class="card">
                                                <button type="submit" name="change_photo" value="yes" class="btn btn-primary waves-effect waves-light">Change Profile</button>                              
                                            </div>

                                            <br/>
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
                                            <br/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-6 card">
                                <form action="" method="post" name="city" novalidate="" class="myform">
                                    <div class="card-header row ">
                                        <div class="col-6">
                                            <h4 class="card-title" style="padding-top: 10px">Change Password</h4>
                                        </div>
                                    </div>

                                    <div class="mb-3 pt-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label">Old Password</label>
                                            </div>
                                        </div>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control <?php if (form_error('ops')) echo "error_border"; ?>" value="<?php
                                            if (!isset($success) && set_value('ops')) {
                                                echo set_value('ops');
                                            }
                                            ?>" name="ops" placeholder="Enter Old password" id="currentPass" aria-describedby="emailHelp">
                                            <button class="btn btn-light shadow-none ms-0" type="button"><i class="mdi mdi-eye-outline" id="c-show" style="cursor: pointer;"></i></button>

                                        </div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('ops');
                                            ?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label">New Password</label>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control <?php if (form_error('nps')) echo "error_border"; ?>" value="<?php
                                            if (!isset($success) && set_value('nps')) {
                                                echo set_value('nps');
                                            }
                                            ?>" name="nps" placeholder="Enter New password" id="newPass" aria-describedby="emailHelp">
                                            <button class="btn btn-light shadow-none ms-0" type="button"><i class="mdi mdi-eye-outline" id="n-show" style="cursor: pointer;"></i></button>                            
                                        </div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('nps');
                                            ?>
                                        </p>

                                        <div class="mb-3 pt-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Confirm Password</label>
                                                </div>
                                            </div>

                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control <?php if (form_error('cps')) echo "error_border"; ?>" name="cps" placeholder="Enter Confirm password" id="confirmPass" aria-describedby="emailHelp">
                                                <button class="btn btn-light shadow-none ms-0" type="button"><i class="mdi mdi-eye-outline" id="con-show" style="cursor: pointer;"></i></button>

                                            </div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('cps');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <br/><br/><br/><br/>
                                    <div class="card">
                                        <button type="submit" name="add" value="yes" class="btn btn-primary waves-effect waves-light">Change Password</button>
                                    </div>
                                    <br/><br/> 
                                    <?php
                                    if (isset($success)) {
                                        ?>                              
                                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-check-all label-icon"></i><strong>Ok!</strong> <?php echo "$success"; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($error)) {
                                        ?>
                                        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> <?php echo "$error"; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                //require_once './footer.php';
                $this->load->view('admin/footer');
                ?>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php
        //require_once './footerscript.php';
        $this->load->view('admin/footerscript');
        ?>

    </body>


</html>