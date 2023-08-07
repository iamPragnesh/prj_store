<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('seller/head');
    ?>

    <body>
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

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View All Pending Order</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>seller-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Order</li>
                                            <li class="breadcrumb-item active">cancel Order</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card col-12">

                                <div class="card-header row col-12">
                                    <div class="col-6">
                                        <h4 class="card-title" style="padding-top: 10px">View All cancel Order</h4>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Order Detail</th>
                                                <th>Product Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c=0;
                                            
                                            foreach ($bill_data as $bdata) 
                                            {
                                                $c++;
                                                
                                                $data = $this->md->my_select('tbl_bill','*',array('bill_id' => $bdata))[0];
                                                
                                                $name = $this->md->my_select('tbl_register','*',array('register_id'=>$data->register_id))[0]->name;
                                                $address = $this->md->my_select('tbl_shipment','*',array('shipment_id'=>$data->shipment_id))[0]->address;
                                            ?>
                                                <tr align="center" valign="">
                                                    <td style="vertical-align: top;"><?php echo $c; ?></td>

                                                    <td style="width: 45%;text-align: left;vertical-align: top; ">
                                                        <p><b>Name :</b> <?php echo $name; ?></p>
                                                        <p><b>Delivery Address :</b> <?php echo $address; ?></p>
                                                        <p><b>Date :</b> <?php echo date('d-m-Y', strtotime($data->bill_date)); ?></p>
                                                        <p><b>Order ID :</b> <?php echo $data->order_id; ?></p>
                                                        <?php
                                                            if($data->pay_type == "cod" )
                                                            {
                                                        ?>
                                                        <p><b>Payment Mode :</b> Cash On Delivery</p>
                                                        <?php
                                                            }
                                                            else 
                                                            {
                                                        ?>
                                                        <p><b>Payment Mode :</b> Online Payment</p>
                                                        <p><b>Payment ID :</b> <?php echo $data->payment_id ?></p>
                                                        <?php
                                                            }
                                                        ?>
                                                        <p><b>Amount : Rs. </b><?php echo $data->amount; ?>/-</p>
                                                        <p><b>Shipping Charge : Rs.</b>100/-</p>
                                                        <?php
                                                            $amt=0;
                                                            if( $data->promocode_id > 0)
                                                            {
                                                                $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$data->promocode_id))[0];
                                                                $code = $promocode->code;        
                                                                $amt = $promocode->amount;        
                                                        ?>
                                                        <p><b>Promocode ( <?php echo $code; ?> ) :Rs. </b> <?php echo $amt; ?>/-</p>
                                                        <?php 
                                                            }
                                                            
                                                            $total = ( $data->amount + 100 ) - $amt;
                                                        ?>
                                                        <p><b>Total :Rs.</b> <?php echo $total; ?>/-</p>
                                                        
                                                    </td>
                                                    
                                                    <td style="width: 45%;text-align: left;vertical-align: top; ">
                                                        <?php
                                                            $tran_data = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                                            
                                                            foreach( $tran_data as $tdata )
                                                            {
                                                                $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                                $imageinfo = $this->md->my_select('tbl_product_image','*',array('image_id'=>$tdata->image_id))[0];
                                                                
                                                                $allpath = explode(",", $imageinfo->path);
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>" target="_new">
                                                                <img src="<?php echo base_url().$allpath[0]; ?>" alt="<?php echo $productinfo->name; ?>" style="width: 100%;">
                                                                </a>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <p><a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>" target="_new"><?php echo substr($productinfo->name,0,50); ?>..</a></p>
                                                                <p><b>Gross Price :Rs.</b> <?php echo $tdata->gross_price; ?>/-</p>
                                                                <p><b>Discount :Rs.</b> <?php echo $tdata->discount; ?>/-</p>
                                                                <p><b>Net Price :Rs.</b> <?php echo $tdata->net_price; ?>/-</p>
                                                                <p><b>Qty :</b> <?php echo $tdata->qty; ?> </p>
                                                                <p><b>Total :Rs.</b> <?php echo $tdata->total_price; ?>/- </p>
                                                            </div>
                                                        </div>
                                                        <hr/>
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

                <!-- JAVASCRIPT -->
                <?php
                //require_once './footerscript.php';
                $this->load->view('seller/footerscript');
                ?>

            </div>    
    </body>


</html>