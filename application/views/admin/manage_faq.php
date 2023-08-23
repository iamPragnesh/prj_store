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
                                    <h4 class="mb-sm-0 font-size-18">FAQ's</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Pages</li>
                                            <li class="breadcrumb-item active">FAQ's</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12">

                            <?php
                            if (isset($editfaqs)) {
                                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" name="faqs" method="post" class="myform" novalidate="">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="question" required="" class="form-control <?php
                                                if (form_error('question')) {
                                                    echo "error-border";
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value('question')) {
                                                           echo set_value('question');
                                                       } else {
                                                           echo $editfaqs[0]->question;
                                                       }
                                                       ?>"
                                                       id="floatingnameInput" placeholder="Enter Question">
                                                <label for="floatingnameInput">Question</label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error("question");
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="answer" type="text" required="" class="form-control <?php
                                                if (form_error('answer')) {
                                                    echo "error-border";
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value('answer')) {
                                                           echo set_value('answer');
                                                       } else {
                                                           echo $editfaqs[0]->answer;
                                                       }
                                                       ?>"
                                                       id="floatingnameInput" placeholder="Enter Answer">
                                                <label for="floatingnameInput">Answer</label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error("answer");
                                                    ?>
                                                </p>
                                            </div>                                            
                                            <div>
                                                <button type="submit" name="edit" value="yes" class="btn btn-primary w-md">Edit</button> &nbsp;
                                                <a href="<?php echo base_url(); ?>manage-faqs" class="btn btn-default w-md">Go Back</a>
                                                <div>
                                                    <br/>
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <b>Ok! </b><?php echo $success ?>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>Oops! </b><?php echo $error ?>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" name="faqs" method="post" class="myform" novalidate="">
                                            <div class="form-floating mb-3">
                                                <input name="question" type="text" required="" class="form-control <?php
                                                if (form_error('question')) {
                                                    echo "error-border";
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value('question')) {
                                                           echo set_value('question');
                                                       }
                                                       ?>"
                                                       id="floatingnameInput" placeholder="Enter Question">
                                                <label for="floatingnameInput">Question</label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error("question");
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="answer" type="text" required="" class="form-control <?php
                                                if (form_error('answer')) {
                                                    echo "error-border";
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value('answer')) {
                                                           echo set_value('answer');
                                                       }
                                                       ?>"
                                                       id="floatingnameInput" placeholder="Enter Answer">
                                                <label for="floatingnameInput">Answer</label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error("answer");
                                                    ?>
                                                </p>
                                            </div>                                            
                                            <div>
                                                <button type="submit" name="add" value="yes" class="btn btn-primary w-md">Add</button> &nbsp;
                                                <button type="reset" class="btn btn-danger w-md">Clear</button>
                                                <div>
                                                    <br/>
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <b>Ok! </b><?php echo $success ?>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>Oops! </b><?php echo $error ?>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
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
                            <div class="card col-12">
                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All FAQ's</h4>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                            <a onclick="delete_link('faqs/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Question-Answer</th>
                                                <th>Change</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($faqs as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c ?></td>
                                                    <td align="left"><b>Q.&nbsp;<?php echo $data->question; ?></b> <br/><?php echo $data->answer; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>manage-faq/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>" style="cursor: pointer">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                                        </a>  
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('faqs/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                        </div>     <!-- end cardaa --> 
                    </div>
                    <!-- End row -->
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