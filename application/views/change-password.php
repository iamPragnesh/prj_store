<!DOCTYPE html>
<html lang="en">
    <?php
    $this->load->view('admin/head');
    ?>
    <title>Admin - Change Profile</title>
    <body>
        <div id="main-wrapper">
            <?php
            $this->load->view('admin/header');
            ?>
            <?php
            $this->load->view('admin/menu');
            ?>
            <div class="content-body">
                <div class="container-fluid">
                    <div class="header-left" style="padding-bottom: 10px;">
                        <div class="dashboard_bar">
                            Change profile
                        </div>
                    </div>
                    <div class="page-titles">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Profile</a></li>
                        </ol>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" style="font-size: 22px">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form class="myform" method="post" action="" name="admin password" novalidate="">
                                            <div class="form-group">
                                                <label class="mb-1">Current Password</label>
                                                <div class="input-group transparent-append">
                                                    <input type="password" required="" class="form-control <?php if (form_error('oldps')) echo "err-border"; ?>" id="currentPass" name="oldps" value="<?php
                                                    if (!isset($success) && set_value('oldps')) {
                                                        echo set_value('oldps');
                                                    }
                                                    ?>">
                                                    <div class="input-group-append show-pass">
                                                        <span class="input-group-text"> <i class="fa fa-eye" id="c-show" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('oldps');
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">New Password</label>
                                                <div class="input-group transparent-append">
                                                    <input type="password" required="" class="form-control <?php if (form_error('newps')) echo "err-border"; ?>" id="newPass" name="newps" value="<?php
                                                    if (!isset($success) && set_value('newps')) {
                                                        echo set_value('newps');
                                                    }
                                                    ?>">
                                                    <div class="input-group-append show-pass">
                                                        <span class="input-group-text"> <i class="fa fa-eye" id="n-show" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('newps');
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Confirm New Password</label>
                                                <div class="input-group transparent-append">
                                                    <input type="password" required="" class="form-control <?php if (form_error('conps')) echo "err-border"; ?>" id="confirmPass" name="conps" value="<?php
                                                    if (!isset($success) && set_value('conps')) {
                                                        echo set_value('conps');
                                                    }
                                                    ?>">
                                                    <div class="input-group-append show-pass">
                                                        <span class="input-group-text"> <i class="fa fa-eye" id="con-show" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('conps');
                                                    ?>
                                                </p>
                                            </div>
                                            <button name="change_password" value="yes" class="btn btn-primary" style="border-radius: 5px">Change Password</button>
                                            <br>
                                            <br>
                                            <?php
                                            if (isset($error)) {
                                                ?>
                                                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                    </button>
                                                    <div class="media">
                                                        <div class="alert-left-icon-big">
                                                            <span><i class="mdi mdi-alert"></i></span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mt-1 mb-2">failed!</h5>
                                                            <p class="mb-0"><?php echo $error; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            if (isset($success)) {
                                                ?>
                                                <div class="alert alert-success left-icon-big alert-dismissible fade show">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                    </button>
                                                    <div class="media">
                                                        <div class="alert-left-icon-big">
                                                            <span><i class="mdi mdi-check-circle-outline"></i></span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mt-1 mb-2">Success!</h5>
                                                            <p class="mb-0"><?php echo $success; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" style="font-size: 22px">Change Profile Photo</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" name="admin_profile" enctype="multipart/form-data">
                                        <div class="longimg text-center">
                                            <?php
                                            $record = $this->md->my_select('tbl_admin', '*', array('admin_id' => $this->session->userdata('admin')));
                                            if($record[0]->profile_pic){
                                            ?>    
                                            <img id="setphoto" class="rounded-circle header-profile-user" height="250px" style="padding-top: 10px" src="<?php echo base_url() . $record[0]->profile_pic; ?>" alt="Header Avatar">
                                            <?php  
                                            }
                                            else{
                                            ?>
                                            <img id="setphoto" class="rounded-circle header-profile-user" height="250px" style="padding-top: 10px" src="<?php echo base_url(); ?>admin_assets/images/blank.png" alt="Header Avatar">
                                            <?php  
                                            }
                                            ?>
                                        </div>
                                        <br><br>
                                        <div>
                                            <label class="form-label">Change Profile</label>
                                            <div class="custom-file">
                                                <input accept="image/*" name="photo" type="file" id="choosePhoto"  class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div style="padding: 10px;">
                                            <img style="display: none" id="preview" class="img-thumbnail" width="100px">
                                        </div>
                                        <div>
                                            <button type="submit" name="change_photo" value="yes" id="changeimg" class="btn btn-primary w-md">Change Profile</button>
                                        </div>
                                        <br>
                                        <br>
                                        <?php
                                        if (isset($profile_error)) {
                                            ?>
                                            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                </button>
                                                <div class="media">
                                                    <div class="alert-left-icon-big">
                                                        <span><i class="mdi mdi-alert"></i></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mt-1 mb-2">failed!</h5>
                                                        <p class="mb-0"><?php echo $profile_error; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if (isset($profile_success)) {
                                            ?>
                                            <div class="alert alert-success left-icon-big alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                </button>
                                                <div class="media">
                                                    <div class="alert-left-icon-big">
                                                        <span><i class="mdi mdi-check-circle-outline"></i></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mt-1 mb-2">Success!</h5>
                                                        <p class="mb-0"><?php echo $profile_success; ?></p>
                                                    </div>
                                                </div>
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
                    $this->load->view('admin/footer');
                    ?>
                    <?php
                    $this->load->view('admin/footerscript');
                    ?>
                    </body>
                    </html>