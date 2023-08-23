<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('admin/head');
    ?>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            //require './header.php';
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">State</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Location</li>
                                            <li class="breadcrumb-item active">State</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12">
                            <?php
                            if (isset($editstate)) {
                                ?>
                                <div class="card">
                                    <div class="card-header row col-12">
                                        <div class="col-12">
                                            <h4 class="card-title" style="padding-top: 10px">Edit State</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" name="country" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <label>Select Country</label>
                                                        <select class="form-control <?php
                                                        if (form_error('country')) {
                                                            echo "error_border";
                                                        }
                                                        ?>" required="" name="country">
                                                            <option>Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>" <?php
                                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                                    echo set_select('country', $data->location_id);
                                                                }
                                                                if ($data->location_id == $editstate[0]->parent_id) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $data->name; ?></option>
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
                                                <div class="col-6">
                                                    <label>Enter State</label>

                                                    <div class="mb-4 form-floating">
                                                        <input type="text" name="state" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php
                                                        if (form_error('state')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="floatingInput" placeholder="name@example.com" value="<?php
                                                               if (!isset($success) && set_value('country')) {
                                                                   echo set_value('state');
                                                               } else {
                                                                   echo $editstate[0]->name;
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('state');
                                                            ?>
                                                        </p>

                                                        <label for="floatingInput">Enter State</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"  class="btn btn-primary" name="edit" value="Yes">Edit</button>&nbsp;&nbsp;
                                            <a type="reset"  href="<?php echo base_url(); ?>manage-state" name="clear">Go Back</a>

                                            <br/><br/>
                                            <?php
                                            if (isset($success)) {
                                                ?>                              
                                                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                    <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $this->input->post('state'); ?> - Insert Successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            }
                                            if (isset($error)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                    <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - State Already exists.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>

                                </div>
                                <?php
                            } else {
                                ?> 
                                <div class="card">
                                    <div class="card-header row col-12">
                                        <div class="col-12">
                                            <h4 class="card-title" style="padding-top: 10px">Add New State</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" name="country" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <label>Select Country</label>
                                                        <select class="form-select <?php
                                                        if (form_error('country')) {
                                                            echo "error-border";
                                                        }
                                                        ?> " required="" name="country">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id ?>" <?php
                                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                                    echo set_select('country', $data->location_id);
                                                                }
                                                                ?>><?php echo $data->name ?></option>
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
                                                <div class="col-6">
                                                    <label>Enter State</label>
                                                    <div class="mb-4 form-floating">
                                                        <input type="text" name="state" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php
                                                        if (form_error('state')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="floatingInput" placeholder="name@example.com" value="<?php
                                                               if (!isset($success) && set_value('state')) {
                                                                   echo set_value('state');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('state');
                                                            ?>
                                                        </p>
                                                        <label for="floatingInput">Enter State</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="add" value="yes" class="btn btn-primary waves-effect waves-light">Add</button>
                                            &nbsp;
                                            <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button>

                                            <br/><br/>
                                            <?php
                                            if (isset($success)) {
                                                ?>                              
                                                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                    <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $this->input->post('state'); ?> - Insert Successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            }
                                            if (isset($error)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                    <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - State Already exists.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="row col-12">
                            <div class="card">
                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px" >View All State</h4>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                            <a onclick="delete_link('state/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Country</th>
                                                <th>State</th>
                                                <th>Change</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($state as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c ?></td>
                                                    <td><?php echo $data->country; ?></td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>manage-state/<?php echo base64_encode(base64_encode($data->location_id)); ?>" style="cursor: pointer">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                                        </a>  
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('state/<?php echo base64_encode(base64_encode($data->location_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                        </div>

                    </div>
                </div>
                <!-- end main content-->
                <?php
//require_once './footer.php';
                $this->load->view('admin/footer');
                ?>
            </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php
//require_once './footerscript.php';
        $this->load->view('admin/footerscript');
        ?>

        <!--ckeditor--> 
        <script href="<?php echo base_url(); ?>admin_assets"assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

        <!--init js--> 
        <script href="<?php echo base_url(); ?>admin_assets"assets/js/pages/form-editor.init.js"></script>

        <script href="<?php echo base_url(); ?>admin_assets"assets/js/app.js"></script>
    </body>



</html>