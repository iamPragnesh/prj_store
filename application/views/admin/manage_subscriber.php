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
                                    <h4 class="mb-sm-0 font-size-18">Email Subscriber</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Pages</li>
                                            <li class="breadcrumb-item active">Email subscriber</li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="" name="subscribe" novalidate="" class="myform">
                            <div class="row col-12">
                                <div class="card col-6">
                                    <div class="card-header row col-12">
                                        <div class="col-6">
                                            <h4 class="card-title" style="padding-top: 10px">View All Email Subscribers</h4>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                <a onclick="delete_link('subscriber/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                            <thead align="center">
                                                <tr>
                                                    <th><input type="checkbox" class="form-check-input" id="select-all"></th>
                                                    <th>Email</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($subscriber as $data) {
                                                    ?>
                                                    <tr align="center" valign="">
                                                        <td><input type="checkbox" name="to[]" value="<?php echo $data->email; ?>" class="form-check-input" id="select-all"></td>
                                                        <td>
                                                            <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a>
                                                        </td>
                                                        <td>
                                                            <a onclick="delete_link('subscriber/<?php echo base64_encode(base64_encode($data->subscriber_id)); ?>');" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" style="padding-top: 10px">Send Email</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-4 form-floating">
                                                <input type="text" name="subject" required="" value="<?php
                                                if (!isset($success) && set_value('subject')) {
                                                    echo set_value('subject');
                                                }
                                                ?>" class="form-control <?php
                                                       if (form_error('subject')) {
                                                           echo "error-border";
                                                       }
                                                       ?>" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Subject</label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('subject');
                                                    ?>
                                                </p>
                                            </div>   
                                            <div id="ckeditor-classic">

                                                <textarea id="editor1" name="message" rows="5" class="<?php
                                                if (form_error('message')) {
                                                    echo "error-border";
                                                }
                                                ?>" cols="70"><?php
                                                              if (!isset($success) && set_value('message')) {
                                                                  echo set_value('message');
                                                              }
                                                              ?></textarea>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('message');
                                                    ?>
                                                </p>

                                            </div></br>
                                            <button type="submit" value="yes" name="send" class="btn btn-primary w-md">Send Email</button>
                                            <br/>
                                            <div class="pt-2">
                                                <?php
                                                if (isset($success)) {
                                                    ?>                              
                                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $success; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> <?php echo $error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div> 

                        </form>
                    </div>
                    <!-- end main content-->
                    <?php
//require_once './footer.php';
                    $this->load->view('admin/footer');
                    ?>
                </div>
                <!-- END layout-wrapper -->
            </div>
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