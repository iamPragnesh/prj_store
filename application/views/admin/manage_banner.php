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
                                    <h4 class="mb-sm-0 font-size-18">Banner</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Pages</li>
                                            <li class="breadcrumb-item active">Banner</li>
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
                                            <h4 class="card-title" style="padding-top: 10px">Add New Banner</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" name="banner" enctype="multipart/form-data" novalidate="" class="myform">
                                            <label>Enter title</label> 
                                            <div class="mb-4 form-floating">
                                                <input type="text" name="title" value="<?php
                                                if (!isset($success) && set_value('title')) {
                                                    echo set_value('title');
                                                }
                                                ?>" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php
                                                       if (form_error('title')) {
                                                           echo "error-border";
                                                       }
                                                       ?>" id="floatingInput" placeholder="name@example.com" value="<?php
                                                       if (!isset($success) && set_value('title')) {
                                                           echo set_value('title');
                                                       }
                                                       ?>">
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('title');
                                                    ?>
                                                </p>
                                                <label for="floatingInput">Enter title</label>
                                            </div> 
                                            <label>Enter Subtitle</label> 
                                            <div class="mb-4 form-floating">
                                                <input type="text" name="subtitle" value="<?php
                                                if (!isset($success) && set_value('subtitle')) {
                                                    echo set_value('subtitle');
                                                }
                                                ?>" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php
                                                       if (form_error('subtitle')) {
                                                           echo "error-border";
                                                       }
                                                       ?>" id="floatingInput" placeholder="name@example.com" value="<?php
                                                       if (!isset($success) && set_value('subtitle')) {
                                                           echo set_value('subtitle');
                                                       }
                                                       ?>">
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('subtitle');
                                                    ?>
                                                </p>
                                                <label for="floatingInput">Enter Subtitle</label>
                                            </div> 
                                            <label>Banner</label><br>
                                            <div class="mb-6 card">
                                                <div class="custom-file" style="padding: 50px;" >
                                                    <input accept="image/*" type="file" id="choosePhoto" name="banner" class="custom-file-input"
                                                           value="<?php
                                                           if (!isset($success) && set_value('banner')) {
                                                               echo set_value('banner');
                                                           }
                                                           ?>">
                                                </div>

                                                <div style="padding: 10px;">
                                                    <img id="preview" class="img-thumbnail" width="100px"/>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <button type="submit" name="add" value="yes" class="btn btn-primary waves-effect waves-light ">Upload</button>
                                                &nbsp;
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button><br/><br/>
                                                <?php
                                                if (isset($success)) {
                                                    ?>                              
                                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-check-all label-icon"></i>
                                                        <strong>Ok</strong> <?php echo $this->input->post('banner'); ?> - Insert Successfully.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> -  Already exists.
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
                            <div class="col-6 card">

                                <div class="card-header row">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All Banner</h4>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                            <a onclick="delete_link('banner/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Banner</th>
                                                <th>Status</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $c = 0;
                                            foreach ($banner as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $data->title; ?></td>
                                                    <td><?php echo $data->subtitle; ?></td>
                                                    <td><img src="<?php echo base_url() . $data->path; ?>" alt="alt" height="70px" /></td>

                                                    <td>
                                                        <?php
                                                        if ($data->status == 1) {
                                                            ?>
                                                            <i class="fa fa-toggle-on"  onclick="change_status('banner',<?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>"  style="cursor:pointer;color:#5156be;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"></i>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <i class="fa fa-toggle-off"  onclick="change_status('banner',<?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>"  style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dective"></i>

                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('banner/<?php echo base64_encode(base64_encode($data->banner_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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

        <!--ckeditor--> 
        <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>

        <script>
            $("#preview").hide();

            // change profile photo
            choosePhoto.onchange = evt => {
                const [file] = choosePhoto.files
                if (file) {
                    $("#preview").show();
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
        <script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>
    </body>


</html>