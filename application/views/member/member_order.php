<html>
     <?php
    //require './head.php';
    $this->load->view('member/mhead');
    ?>

    <body>

        <div id="layout-wrapper">
            <?php
            //require './header.php';
            $this->load->view('member/mheader');
            ?>


            <?php
            //require_once './menu.php';
            $this->load->view('member/menu');
            ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row col-12">
                        <div class="card">
                            <div class="card-header row col-12">
                                <div class="col-6">
                                    <h4 class="card-title" style="padding-top: 10px" >View All My Order</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Order Date</th>
                                            <th>Order Details</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            <th>View More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 0;
                                        foreach ($bill_data as $bdata) {
                                            $c++;
                                            ?>
                                            <tr align="center" valign="">
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($bdata->bill_date)) ?></td>
                                                <td style="text-align: left;vertical-align: top;width: 50%">
                                                    <?php
                                                    $tran_data = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$bdata->bill_id));
                                                            
                                                    foreach ($tran_data as $tdata)
                                                    {
                                                        $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                        $imageinfo = $this->md->my_select('tbl_product_image','*',array('image_id'=>$tdata->image_id))[0];

                                                        $allpath = explode(",", $imageinfo->path);
                                                        
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>" target="_new">
                                                                    <img src="<?php echo base_url().$allpath[0]; ?>" alt="<?php echo $productinfo->name; ?>" style="width: 80px;">
                                                                </a> 
                                                            </div>
                                                            <div class="col-md-9">                                                   
                                                                <p>
                                                                    <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>" target="_new">
                                                                        <b><?php echo $productinfo->name; ?></b>
                                                                    </a>
                                                                </p>
                                                                <p><b>Price : Rs.</b> <?php echo $tdata->net_price; ?>/-</p>
                                                                <p><b>Qty :</b> <?php echo $tdata->qty; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                     if( $bdata->pay_type == "online")
                                                     {
                                                         echo "Online Payment";
                                                     }
                                                     else
                                                     {
                                                         echo "Cash On Delivery";
                                                     }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                     if( $bdata->status == 0)
                                                     {
                                                        echo '<span class="badge badge-soft-primary">Panding</span>';
                                                     }
                                                     else if ( $bdata->status == 1) 
                                                     {
                                                        echo '<span class="badge badge-soft-success">Accept</span>';   
                                                     }
                                                     else if ( $bdata->status == 2)
                                                     {
                                                        echo '<span class="badge badge-soft-danger">Cancel</span>'; 
                                                     }
                                                 
                                                    ?>
                                                </td>
                                                <td> 
                                                    <a href="<?php echo base_url(); ?>member-order-detail/<?php echo base64_encode(base64_encode($bdata->bill_id)); ?>" target="_new" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click View More Detail" style="cursor: pointer" >
                                                        View Detail
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
        </div>
        <?php
        $this->load->view('member/mfooter');
        ?>
        <!-- JAVASCRIPT -->
        <div class="custom-file" style="padding: 50px;" ></div>
        <?php
        $this->load->view('member/mfooterscript');
        ?>

    </body>
</html>