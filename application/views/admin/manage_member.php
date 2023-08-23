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
                                            <h4 class="mb-sm-0 font-size-18">Member</h4>
                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                                    <li class="breadcrumb-item active">Member</li>
                                                    <li class="breadcrumb-item active">Member</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="card col-12">

                                        <div class="card-header row col-12">
                                            <div class="col-6">
                                                <h4 class="card-title" style="padding-top: 10px">View All Member</h4>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal1" style="cursor: pointer" >
                                                    <button type="submit" class="btn btn-danger w-md">Delete All Records</button>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                                <thead align="center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Profile</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                       
                                                        <th>Status</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                             $c = 0;
                                                        foreach ($member as $data) {
                                                        $c++;
                                                        ?>
                                                        <tr align="center" valign="">
                                                            <td><?php echo $c; ?></td>

                                                            <td>
                                                                <?php
                                                                if(strlen($data->profile_pic)>0)
                                                                {
                                                                ?>
                                                                 <a style="cursor: pointer" target="_new" href="<?php echo base_url().$data->profile_pic; ?>">
                                                                    <img src="<?php echo base_url().$data->profile_pic; ?>" alt="Workplace" usemap="#workmap" width="50px" height="50px"data-bs-toggle="tooltip"  data-bs-placement="bottom" title="<?php echo $data->name; ?>">
                                                                </a>
                                                                <?php    
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <a style="cursor: pointer" target="_new">
                                                                    <img src="<?php echo base_url(); ?>admin_assets/images/user.jpg" alt="Workplace" usemap="#workmap" width="50px" height="50px"data-bs-toggle="tooltip"  data-bs-placement="bottom" title="profile">
                                                                </a>
                                                                <?php
                                                                }
                                                                ?>
                                                                </td>
                                                               
                                                            <td><?php echo $data->name; ?></td>
                                                            <td><a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></td>
                                                            <td><?php echo $data->mobile; ?></td>
                                                            <td>        
                                                                <?php
                                                                if($data -> status == 1)
                                                                {
                                                                ?>
                                                                       <i class="fa fa-toggle-on"  onclick="change_status('member',<?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>"  style="cursor:pointer;color:#5156be;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"></i>
                                                                 <?php
                                                                 } 
                                                                 else
                                                                 {
                                                                ?>
                                                                     <i class="fa fa-toggle-off"  onclick="change_status('member',<?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>"  style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dective"></i>

                                                                 <?php 
                                                                 }   
                                                                 ?>
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