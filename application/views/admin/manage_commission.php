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


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('admin/menu');
            ?>
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
                                        <h4 class="mb-sm-0 font-size-18">Commission</h4>
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Commission</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <form method="post" action="" name="commission" novalidate="" class="myform">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="col-4">
                                                    <h4 class="card-title" style="padding-top: 10px">Set Commission</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-4 form-floating">
                                                    <?php
                                                      foreach ($commission as $data) 
                                                      {
                                                    ?>
                                                    <input type="text" class="form-control <?php
                                                               if (form_error('commission')) {
                                                                   echo "error-border";
                                                               }?>"
                                                               maxlength="3" pattern="^0[1-9]|[1-9]\d$" required="" 
                                                               value="<?php echo $data->rate; ?>%" name='commission' id="floatingInput"  placeholder="name@example.com">
                                                        
                                                             <label for="floatingInput">Commission Rate<?php echo $data->rate; ?></label>
                                                    
                                                   <?php
                                                      }
                                                   ?>
                                                </div>  
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="edit" value="yes">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-6 card" style="display: flex;justify-content: center;align-items: center;">
                                      <?php
                                             foreach ($commission as $data) {
                                        ?>
                                            <p style="font-size: 40px;">Commission : <?php echo $data->rate; ?>%</p>
                                      <?php
                                             }
                                      ?>
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
                CKEDITOR.replace('editor1');
            </script>

    </body>


</html>