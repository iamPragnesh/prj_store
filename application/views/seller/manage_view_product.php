<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('seller/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            //require './header.php';
            $this->load->view('seller/header');
            ?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('seller/menu');
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
                                    <h4 class="mb-sm-0 font-size-18">View All Product</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>seller-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                            <li class="breadcrumb-item active">View All Product</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All Product</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Update Qty</th>
                                                <th>View Detail</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($products as $data) {
                                                $c++;
                                                $seller_name = $this->md->my_select('tbl_seller', '*', array('seller_id' => $data->seller_id))[0]->company_name;
                                                $allpath = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                $path = explode(",", $allpath->path);
                                                $single = $path[0];
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c; ?></td>
                                                    <td>
                                                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $data->name; ?>" style="cursor: pointer" target="_new" href="<?php echo base_url(), $single; ?>">
                                                            <img src="<?php echo base_url() . $single; ?>" alt="<?php echo $data->name; ?>" usemap="#workmap" width="120">
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td><b>Rs.</b><?php echo $data->price; ?>/-</td>  
                                                    <td>
                                                        <form method="post" action="" name="update-qty" novalidate="">
                                                            <input style="width: 50%" min="0" type="number" value="<?php echo $allpath->qty; ?>" name="qty" ><br/><br/>
                                                            <input type="hidden" value="<?php echo $data->product_id; ?>" name="product-id" > 
                                                            <button type="submit" name="update" value="yes" class="btn btn-primary" style="width: 60;" >Update</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($data->status == 1) {
                                                            ?>  
                                                            <a href="<?php echo base_url(); ?>" target="_new" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click to follow more detail" style="cursor: pointer" >
                                                                View Detail
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="You Still Not Verified By Our Administrative Department" style="cursor: pointer" >
                                                                View Detail
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($data->status == 1) {
                                                            ?>
                                                            <span class="alert alert-success alert-outline">Active</span>
                                                            <?php
                                                        } else if ($data->status == 0) {
                                                            ?>
                                                            <span class="alert alert-danger alert-outline">Pending</span>
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
                    $this->load->view('seller/footer');
                    ?>
                </div>
                <!-- END layout-wrapper -->
            </div>
            <!-- JAVASCRIPT -->
            <?php
            //require_once './footerscript.php';
            $this->load->view('seller/footerscript');
            ?>
        </div>
    </body>
</html>