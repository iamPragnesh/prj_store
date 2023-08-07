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
                                    <h4 class="mb-sm-0 font-size-18">About Us</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Pages</li>
                                            <li class="breadcrumb-item active">About Us</li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <?php
                            if (isset($editabout)) {
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title" style="padding-top: 10px">Write About Us</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" name="about" novalidate="" class="myform">
                                            <div id="ckeditor-classic">
                                                <textarea required="" name="about" id="editor1" rows="5" cols="70">
                                                    <?php
                                                    if (!isset($success) && set_value('about')) {
                                                        echo set_value('about');
                                                    } else {
                                                        echo $editabout[0]->data;
                                                    }
                                                    ?>
                                                                              
                                                </textarea>
                                            </div></br></br>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="edit" value="yes">Edit</button>
                                            &nbsp;
                                            <a type="reset" class="btn waves-effect waves-light" href="<?php echo base_url(); ?>manage-aboutus">Go Back</a>
                                            <br/><br/>
                                            <div class="pt-2">
                                                <?php
                                                if (isset($success)) {
                                                    ?>                              
                                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> - About Us Insert Successfully.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - About Us Already exists.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <?php
                            } else {
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title" style="padding-top: 10px">Write About Us</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" novalidate="" name="about">
                                            <div id="ckeditor-classic">
                                                <textarea required="" name="about" id="editor1" rows="5" cols="70"> 
                                                        <?php
                                                        if (isset($error1) && set_value('about')) {
                                                            echo set_value('about');
                                                        }
                                                        ?>
                                                </textarea>
                                            </div></br></br>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="add" value="yes">Add</button>
                                            <br/><br/>
                                            <div class="pt-2">
                                                <?php
                                                if (isset($success)) {
                                                    ?>                              
                                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> - About Us Insert Successfully.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - Please Insert About Us.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error1)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - About Us Already exists.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <!-- Start row -->
                        <div class="row">
                            <div class=" card col-12">
                                <div class="">
                                    <div class="card-header row col-12">
                                        <div class="col-6">
                                            <h4 class="card-title" style="padding-top: 10px">View All About Us</h4>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                <a onclick="delete_link('about/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Description</th>
                                                    <th>Change</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($about as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr align="center" valign="">
                                                        <td><?php echo $c ?></td>
                                                        <td><?php echo $data->data ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() ?>manage-aboutus/<?php echo base64_encode(base64_encode($data->about_id)); ?>" style="cursor: pointer">
                                                                <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="bottom"title="Edit"></i>
                                                            </a>  
                                                        </td>
                                                        <td>
                                                            <a onclick="delete_link('about/<?php echo base64_encode(base64_encode($data->about_id)); ?>');" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                                <!-- end cardaa -->
                            </div> 
                        </div>
                        <!-- End row -->
                    </div>
                </div>
                <!-- end main content-->
                <?php
//require_once './footer.php';
                $this->load->view('admin/footer');
                ?>
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

    <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>

    <script>
                                                                CKEDITOR.replace('editor1');
    </script>

</html>