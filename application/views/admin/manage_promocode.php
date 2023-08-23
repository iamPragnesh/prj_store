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
                                        <h4 class="mb-sm-0 font-size-18">Promocode</h4>
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Product</li>
                                                <li class="breadcrumb-item active">Promocode</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header row col-12">
                                    <div class="col-12">
                                        <h4 class="card-title" style="padding-top: 10px">Add Promocode</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" name="promocode" novalidate="" class="myform">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-4">
                                                    <label>Code Name</label>
                                                    <div class="mb-4 form-floating">
                                                        <input type="text" required="" pattern="^[a-zA-Z0-9@#.*& ]+$" name="name"  class="form-control  <?php
                                                        if (form_error('promocode')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="floatingInput" placeholder="name@example.com"
                                                               value="<?php
                                                               if (!isset($success) && set_value('name')) {
                                                                   echo set_value('name');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('name');
                                                            ?>
                                                        </p>
                                                        <label for="floatingInput">Enter Code Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-4">
                                                    <label>Amount</label>
                                                    <div class="mb-4 form-floating">
                                                        <input type="text" required="" pattern="^[0-9]+$" name="amount" class="form-control <?php
                                                        if (form_error('promocode')) {
                                                            echo "error-border";
                                                        }
                                                        ?> " id="floatingInput" placeholder="name@example.com"
                                                               value="<?php
                                                               if (!isset($success) && set_value('amount')) {
                                                                   echo set_value('amount');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('amount');
                                                            ?>
                                                        </p>
                                                        <label for="floatingInput">Enter Amount</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-4">
                                                    <label>Min.Bill Price</label>
                                                    <div class="mb-4 form-floating">
                                                        <input type="text" required="" pattern="^[0-9]+$" name="price" class="form-control<?php
                                                        if (form_error('promocode')) {
                                                            echo "error-border";
                                                        }
                                                        ?> " id="floatingInput" placeholder="name@example.com"
                                                               value="<?php
                                                               if (!isset($success) && set_value('price')) {
                                                                   echo set_value('price');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('price');
                                                            ?>
                                                        </p>
                                                        <label for="floatingInput">Enter Min.Bill Price</label>
                                                    </div>
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
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <b>Ok! </b><?php echo $success ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <br/><br/>
                                    </form>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="card">
                                    <div class="card-header row col-12">
                                        <div class="col-6">
                                            <h4 class="card-title" style="padding-top: 10px" >View All Promocode</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Promcode</th>
                                                    <th>Amount</th>
                                                    <th>Min.Bill Price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                                $c = 0;
                                                foreach ($promocode as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr align="center" valign="">
                                                        <td><?php echo $c ?></td>
                                                        <td><?php echo $data->code; ?></td>
                                                        <td><?php echo $data->amount; ?></td>
                                                        <td><?php echo $data->min_bill_price; ?></td>
                                                        <td>
                                                             <?php
                                                                if ($data->status == 1) {
                                                                    ?>
                                                                    <i class="fa fa-toggle-on"  onclick="change_status('promocode',<?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>"  style="cursor:pointer;color:#5156be;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"></i>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <i class="fa fa-toggle-off"  onclick="change_status('promocode',<?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>"  style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive"></i>

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

