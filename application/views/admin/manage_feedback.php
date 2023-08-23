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
            // require './header.php';
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
                                    <h4 class="mb-sm-0 font-size-18">Feedback</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Pages</li>
                                            <li class="breadcrumb-item active">Feedback</li>

                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card col-12">

                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All Feedbacks</h4>
                                    </div>
                                    <div class="col-6">
                                       <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                <a onclick="delete_link('feedback/<?php echo base64_encode( base64_encode(0));?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                      </p>
                                   </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Massage</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0; 
                                            foreach ($feedback as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c; ?></td>
                                                     <td><?php echo $data->name; ?></td>
                                                   <td><?php echo $data->message; ?> </td>
                                                    <td>
                                                            <a onclick="delete_link('feedback/<?php echo base64_encode( base64_encode($data->feedback_id));?>')" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div>
                    <!-- end main content-->
                    <?php
                    //require_once './footer.php';
                    $this->load->view('admin/footer');
                    ?>
                </div>
                <!-- END layout-wrapper -->




                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>

                <!-- JAVASCRIPT -->
                <?php
                //require_once './footerscript.php';
                $this->load->view('admin/footerscript');
                ?>
            </div>
        </div>        
    </body>
</html>



