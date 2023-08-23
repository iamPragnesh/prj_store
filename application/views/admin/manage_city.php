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
                                    <h4 class="mb-sm-0 font-size-18">City</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Location</li>
                                            <li class="breadcrumb-item active">City</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (isset($editcity)) {
                            ?>
                        <div class="row col-12">
                            <div class="card">
                                <div class="card-header row col-12">
                                    <div class="col-12">
                                        <h4 class="card-title" style="padding-top: 10px">Edit New City</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" name="city" novalidate="" class="myform">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-4">
                                                    <label>Enter Country</label>
                                                    <select required=""   name="country" class="form-select <?php
                                                    if (form_error('country')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" onchange="set_combo('state', this.value);">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        foreach ($country as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->location_id; ?>"<?php
                                                            if (!isset($success) && set_select('country', $data->location_id)) {
                                                                echo set_select('country', $data->location_id);
                                                            } else {
                                                                if ($data->location_id == $editstate[0]->parent_id) {

                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>
                                                                <?php echo $data->name; ?></option>
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
                                            <div class="col-4">
                                                <div class="mb-4">
                                                    <label>Select State</label>
                                                    <select requried="" name="state"  class="form-select <?php
                                                    if (form_error('state')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" id="state">
                                                        <option value="" >Select State</option>
                                                        <?php
                                                        if ($this->input->post('country')) {
                                                            $wh['parent_id'] = $this->input->post('country');
                                                            $records = $this->md->my_select('tbl_location', '*', $wh);
                                                            foreach ($records as $data) {
                                                                ?> 
                                                                <option value="<?php echo $data->location_id; ?>"<?php
                                                                if (!isset($success) && set_select('state', $data->location_id)) {
                                                                    echo set_select('state', $data->location_id);
                                                                }
                                                                ?>>
                                                                    <?php echo $data->name; ?></option>
                                                                <?php
                                                            }
                                                        } else {
                                                            $wh['parent_id'] = $editstate[0]->parent_id;
                                                            $records = $this->md->my_select('tbl_location', '*', $wh);
                                                            foreach ($records as $data) {
                                                                ?> 
                                                                <option value="<?php echo $data->location_id; ?>"<?php
                                                                if (!isset($success) && set_select('state', $data->location_id)) {
                                                                    echo set_select('state', $data->location_id);
                                                                } else {
                                                                    if ($data->location_id == $editcity[0]->parent_id) {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?>>
                                                                    <?php echo $data->name; ?></option>
                                                                <?php
                                                            }
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
                                            <div class="col-4">
                                                <label>Enter City</label>
                                                <div class="mb-4 form-floating">
                                                    <input type="text" required="" pattern="^[a-zA-Z ]+$" name="city" class="form-control <?php
                                                    if (form_error('city')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" id="floatingInput" placeholder="name@example.com"
                                                           value="<?php
                                                           if (!isset($success) && set_value('city')) {
                                                               echo set_value('city');
                                                           } else {
                                                               echo $editcity[0]->name;
                                                           }
                                                           ?>">
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('city');
                                                        ?>
                                                    </p>
                                                    <label for="floatingInput">Enter City</label>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary" name="edit" value="Yes">Edit</button>&nbsp;&nbsp;
                                        <a type="reset"  href="<?php echo base_url(); ?>manage-city" name="clear">Go Back</a>
                                        <br/><br/>
                                        <br/><br/>
                                        <?php
                                        if (isset($success)) {
                                            ?>                              
                                            <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $this->input->post('CIty'); ?> - Insert Successfully.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        if (isset($error)) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - City Already exists.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <?php
                        } else {
                            ?>
                            <div class="row col-12">
                                <div class="card">
                                    <div class="card-header row">
                                        <div class="col-12">
                                            <h4 class="card-title" style="padding-top: 10px">Add New City</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" name="city" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-4">
                                                        <label>Enter Country</label>
                                                        <select required=""   name="country" class="form-select <?php
                                                        if (form_error('country')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('state', this.value);">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>"<?php
                                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                                    echo set_select('country', $data->location_id);
                                                                }
                                                                ?>>
                                                                    <?php echo $data->name; ?></option>
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
                                                <div class="col-4">
                                                    <div class="mb-4">
                                                        <label>Select State</label>
                                                        <select requried="" name="state"  class="form-select <?php
                                                        if (form_error('state')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="state">
                                                            <option value="" >Select State</option>
                                                            <?php
                                                            if ($this->input->post('country')) {
                                                                $wh['parent_id'] = $this->input->post('country');
                                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?> 
                                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                                        echo set_select('state', $data->location_id);
                                                                    }
                                                                    ?>>
                                                                        <?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
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
                                                <div class="col-4">
                                                    <label>Enter City</label>
                                                    <div class="mb-4 form-floating">
                                                        <input type="text" required="" pattern="^[a-zA-Z ]+$" name="city" class="form-control <?php
                                                        if (form_error('city')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="floatingInput" placeholder="name@example.com"
                                                               value="<?php
                                                               if (!isset($success) && set_value('city')) {
                                                                   echo set_value('city');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('city');
                                                            ?>
                                                        </p>
                                                        <label for="floatingInput">Enter City</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="add" value="yes"  class="btn btn-primary waves-effect waves-light">Add</button>
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
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row col-12">
                            <div class="card">
                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px" >View All City</h4>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                            <a onclick="delete_link('city/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
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
                                                <th>City</th>
                                                <th>Change</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $c = 0;
                                            foreach ($city as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $data->country; ?></td>
                                                    <td><?php echo $data->state; ?></td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>manage-city/<?php echo base64_encode(base64_encode($data->location_id)); ?>"  style="cursor: pointer">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="bottom"title="Edit"></i>
                                                        </a>  
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('city/<?php echo base64_encode(base64_encode($data->location_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                    <!-- end main content-->


                    <?php
//require_once './footer.php';
                    $this->load->view('admin/footer');
                    ?>
                </div>

            </div>
        </div>

    </body>
    <!-- JAVASCRIPT -->
    <?php
//require_once './footerscript.php';
    $this->load->view('admin/footerscript');
    ?>
    <script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>
</html>