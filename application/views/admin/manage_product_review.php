<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('admin/head');
    ?>



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
                                <h4 class="mb-sm-0 font-size-18">View All Product Review</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Product</li>
                                        <li class="breadcrumb-item active">Product Review</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="card col-12">

                            <div class="card-header row col-12">
                                <div class="col-6">
                                    <h4 class="card-title" style="padding-top: 10px">View All Product Review</h4>
                                </div>
                                <div class="col-6">
                                    <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                        <a onclick="delete_link('review/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Product</th>
                                            <th>User</th>
                                            <th>Preview</th>
                                            <th>Rate</th>
                                            <th>status</th>
                                            <th>Remove</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c=0;

                                        foreach ($review as $data)
                                        {
                                            $c++;
                                            $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                            $imageinfo = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                            $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                            
                                            $allpath = explode(",", $imageinfo->path);
                                            ?>
                                            <tr align="center" valign="">
                                                <td><?php echo $c; ?></td>

                                                <td>
                                                    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $productinfo->name; ?>" style="cursor: pointer" target="_new" href="<?php echo base_url().$allpath[0]; ?>">
                                                        <img src="<?php echo base_url().$allpath[0]; ?>" alt="Workplace" usemap="#workmap" width="100" height="40">
                                                    </a>
                                                </td>
                                                <td>
                                                    <img class="rounded-circle header-profile-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $user->name; ?>" style="cursor: pointer" src="<?php echo base_url().$user->profile_pic; ?>" alt="Header Avatar">
                                                </td>
                                                <td><?php echo $data->msg; ?></td>
                                                <td>
                                                <?php
                                                    $rate = $data->rating;
                                                    $blank = 5 - $rate;
                                                    
                                                    for( $i=1 ; $i<=$rate ; $i++ )
                                                    {
                                                ?>
                                                <i class="fas fa-star"></i>
                                                <?php 
                                                    }
                                                    //blank star
                                                   for($i=1;$i<=$blank;$i++)
                                                   {
                                                ?>
                                                    <i class="fas fa-star-of-david"></i>
                                                <?php
                                                   }
                                                ?>    
                                                </td>
                                                <td>
                                                    <?php
                                                       if ($data->status == 1)
                                                       {
                                                           ?>
                                                           <i class="fa fa-toggle-on"  onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>"  style="cursor:pointer;color:#5156be;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"></i>
                                                           <?php
                                                       }
                                                       else
                                                       {
                                                           ?>
                                                           <i class="fa fa-toggle-off"  onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>"  style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive"></i>

                                                           <?php
                                                       }
                                                     ?>
                                               </td>
                                                <td>
                                                        <a onclick="delete_link('review/<?php echo base64_encode(base64_encode($data->review_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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
                        <!-- end cardaa -->
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


            </html>