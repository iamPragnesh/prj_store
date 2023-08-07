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
                                    <h4 class="mb-sm-0 font-size-18">Country</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Locations</li>
                                            <li class="breadcrumb-item active">Country</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <?php
                                if (isset($editcountry)) {
                                    ?>
                                    <div class="card">
                                        <form method="post" action="" name="country" novalidate="" class="myform">
                                            <div class="card-header">
                                                <div class="col-4">
                                                    <h4 class="card-title" style="padding-top: 10px">Edit Country</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-4 form-floating">
                                                    <input type="text" name="country" required="" pattern="^[a-zA-Z ]+$" value="<?php
                                                    if (!isset($success) && set_value('country')) {
                                                        echo set_value('country');
                                                    } else {
                                                        echo $editcountry[0]->name;
                                                    }
                                                    ?>" class="form-control <?php
                                                           if (form_error('country')) {
                                                               echo "error-border";
                                                           }
                                                           ?>" id="floatingInput" placeholder="name@example.com" >
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('country');
                                                        ?>
                                                    </p>
                                                    <label for="floatingInput">Enter Country</label>
                                                </div>  

                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="edit" value="yes">Edit</button>
                                                &nbsp;
                                                <a type="reset" class="btn waves-effect waves-light" href="<?php echo base_url(); ?>manage-country">Go Back</a>
                                                <br/><br/>
                                                <div class="pt-2">
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>                              
                                                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                            <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $this->input->post('country'); ?> - Insert Successfully.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                            <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - Country Already exists.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="card">
                                        <form method="post" action="" name="country" novalidate="" class="myform">
                                            <div class="card-header">
                                                <div class="col-4">
                                                    <h4 class="card-title" style="padding-top: 10px">Add New Country</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-4 form-floating">
                                                    <input type="text" name="country" value="<?php
                                                    if (!isset($success) && set_value('country')) {
                                                        echo set_value('country');
                                                    }
                                                    ?>" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php
                                                           if (form_error('country')) {
                                                               echo "error-border";
                                                           }
                                                           ?>" id="floatingInput" placeholder="name@example.com" value="<?php
                                                           if (!isset($success) && set_value('country')) {
                                                               echo set_value('county');
                                                           }
                                                           ?>">
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('country');
                                                        ?>
                                                    </p>
                                                    <label for="floatingInput">Enter Country</label>
                                                </div>  

                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="add" value="yes">Add</button>
                                                &nbsp;
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button>
                                                <br/><br/>
                                                <div class="pt-2">
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>                              
                                                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                            <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $this->input->post('country'); ?> - Insert Successfully.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                            <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - Country Already exists.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="col-6 card">

                                <div class="card-header row">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View Country</h4>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                            <a onclick="delete_link('country/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Country</th>
                                                <th>Change</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($allrecords as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c ?></td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() ?>manage-country/<?php echo base64_encode(base64_encode($data->location_id)); ?>" style="cursor: pointer">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                                        </a>  
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('country/<?php echo base64_encode(base64_encode($data->location_id)); ?>');" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                            <i class="fas fa-trash-alt text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"></i>
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
    </div>
</body>


</html>