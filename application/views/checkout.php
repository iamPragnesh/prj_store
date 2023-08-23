<?php
//$this->session->unset_userdata('promocode_id');
//$this->session->unset_userdata('bill_amount');
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Checkout - PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">


    </head>
    <body>

        <!-- Page Wrapper -->
        <div id="wrap" class="layout-1"> 
            <?php
            $this->load->view('link');
            ?>
            <?php
            // require './header.php';
            $this->load->view('header');
            ?>
            <!-- Ship Process -->
            <div class="ship-process padding-top-30 padding-bottom-30">
                <div class="container">
                    <!-- Conatct -->
                    <div class="contact">
                        <div class="contact-form">
                            <div class="card">
                                <ul class="row">
                                    <!-- Step 1 -->
                                    <a href="<?php echo base_url('view-cart'); ?>">
                                        <li class="col-sm-4">
                                            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                                            <div class="media-body"> <span>Step 1</span>
                                                <h6>Shopping Cart</h6>
                                            </div>
                                        </li>
                                    </a>

                                    <!-- Step 2 -->
                                    <li class="col-sm-4  current">
                                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                                        <div class="media-body"> <span>Step 2</span>
                                            <h6>Checkout</h6>
                                        </div>
                                    </li>

                                    <!-- Step 3 -->
                                    <li class="col-sm-4">
                                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                                        <div class="media-body"> <span>Step 3</span>
                                            <h6>Delivery Successfully</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-content">
                    <!-- Wrapper -->
                    <div class="wrapper wrapper-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" style="margin:50px 0px;">
                                    <form method="post" action="" name="checkout">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div style="border:1px solid#ddd; padding: 30px">
                                                    <h5 style="margin-bottom: 20px;">A. Select Delivery Location</h5>
                                                    <div class="row" id="shipment_area" style="margin-left: 10px;">
                                                        <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $shipment = $this->md->my_select('tbl_shipment', '*', $whh);

                                                        foreach ($shipment as $data) {
                                                            ?>
                                                            <div class="col-md-4">
                                                                <div style="min-height: 250px;margin:10px 0px;border:1px solid #ddd;padding: 2px 10px;text-align: center;">
                                                                    <h6 style="min-height: 30px;margin-top: 30px;margin-bottom: 10px;"><?php echo $data->name; ?></h6>
                                                                    <p  style="color:#000;">(<?php echo $data->address_type; ?>)</p>
                                                                    <p style="text-transform: capitalize;min-height: 80px;"><?php echo $data->address ?></p>
                                                                    <?php
                                                                    if ($this->session->userdata('shipment_id') == $data->shipment_id) {
                                                                        ?>
                                                                        <a class="btn-round" style="background: #000;padding: 10px 30px; margin-bottom: 20px;font-size: 14px;cursor: pointer;">Delivered here</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a onclick="select_address(<?php echo $data->shipment_id; ?>);" class="btn-round" style="padding: 10px 30px; margin-bottom: 20px;font-size: 14px;cursor: pointer;">Click To Select</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="col-md-4">
                                                            <a href="<?php echo base_url('member-address'); ?>" target="_new">
                                                                <div style="border:1px solid #ddd;padding: 40px 10px;text-align: center;margin:10px 0px;">
                                                                    <i class="fa fa-plus" style="color: #ddd;font-size: 30px;"></i>
                                                                    <h4 style="color: #ddd;font-size: 20px; ">Add New Address</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr style="margin: 25px;"/>
                                                    <h5>B.Select Payment Mode</h5>
                                                    <div class="row" style="margin-left: 10px;">
                                                        <div class="col-md-3">
                                                            <label style="font-size: 15px;font-weight: bold;cursor: pointer;">
                                                                <input type="radio" name="paytype" value="cod" <?php
                                                                if ($this->session->userdata('paytype') && $this->session->userdata('paytype') == "cod") {
                                                                    echo "checked";
                                                                }
                                                                ?> />&nbsp;Cash On Delivery
                                                            </label>  
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label style="font-size: 15px;font-weight: bold;cursor: pointer;">
                                                                <input type="radio" name="paytype" value="online" <?php
                                                                if ($this->session->userdata('paytype') && $this->session->userdata('paytype') == "online") {
                                                                    echo "checked";
                                                                }
                                                                ?> />&nbsp;Online Payment
                                                            </label>  
                                                        </div>
                                                    </div>
                                                    <hr style="margin: 25px;">
                                                    <h5>C.Promocode ( optional )</h5>
                                                    <div class="row"  style="margin-left: 10px;">
                                                        <div class="col-md-4">
                                                            <div class="coupen">
                                                                <input type="text" id="code" placeholder="Enter code here" style="padding: 5px;">
                                                            </div>
                                                            <a onclick="apply_code();" class="btn-round" style="cursor: pointer;padding: 7px 30px; margin-top: 15px;font-size: 13px;">Apply</a>
                                                            <p style="padding: 10px 0px;" id="codemsg">
                                                            </p>
                                                            <span style="color:#0088cc;padding-left: 10px;" id="codemsg">
                                                            </span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div style="height: 200px;overflow-y: auto;overflow-x: hidden;">
                                                                <div class="row">
                                                                    <br/>
                                                                    <?php
                                                                    $ftotal = $this->session->userdata('bill_amount') + 100;

                                                                    $wh2['min_bill_price <='] = $ftotal;
                                                                    $wh2['status'] = 1;

                                                                    $promocode = $this->md->my_select('tbl_promocode', '*', $wh2);

                                                                    foreach ($promocode as $data) {
                                                                        ?>
                                                                        <div class="col-md-8">
                                                                            <p><b>Rs.</b> <?php echo $data->amount; ?> off on minimum purchase of <b>Rs.</b><?php echo $data->min_bill_price; ?> bill amount.</p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <span style="border:1px solid blue;padding: 10px;border-radius: 3px;font-size: 12px;font-weight: bold;margin-top: 5px;"><?php echo $data->code; ?></span>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="order_summary">
                                                <div style="border:1px solid #ddd;padding: 20px 10px">
                                                    <h5 style="text-align: center">Order Summary</h5>
                                                    <hr/>
                                                    <?php
                                                    $wh['register_id'] = $this->session->userdata('member');
                                                    $cartdata = $this->md->my_select('tbl_cart', '*', $wh);

                                                    $total = 0;
                                                    foreach ($cartdata as $data) {
                                                        $name = $this->md->my_select('tbl_product', '*', array('product_id' => $data->product_id))[0];
                                                        $price = $data->total_price;

                                                        //image details
                                                        $image_detail = $this->md->my_select('tbl_product_image', '*', array('image_id' => $data->image_id))[0];
                                                        $paths = explode(",", $image_detail->path);
                                                        $single_path = $paths[0];

                                                        $total += $data->total_price;
                                                        ?>
                                                        <br/>
                                                        <div class="row" style="padding: 0px 20px;">
                                                            <div class="col-md-3">
                                                                <img class="img-responsive" style="height:100px;object-fit: scale-down;" src="<?php echo base_url() . $single_path; ?>">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <p><?php echo substr($name->name, 0, 30); ?>....</p>
                                                                <p>Qty: <?php echo $data->qty; ?></p>
                                                                <p class="price"><b>Rs.</b><?php echo number_format($data->total_price); ?>/-</p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <hr style="margin: 15px;">
                                                    <div class="row" style="padding: 0px 20px;">
                                                        <div class="col-md-12">
                                                            <table style="width:115%;">
                                                                <tr>
                                                                    <td style="font-size: 15px;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;Total</td>
                                                                    <td><b>Rs.</b> <?php echo number_format($total); ?>/-</td>
                                                                </tr>
                                                                <?php
                                                                $gtotal = $total + 100;
                                                                ?>
                                                                <tr>
                                                                    <td style="font-size: 15px;font-weight: bold;">+ Shipping Charge</td>
                                                                    <td><b>Rs.</b> 100/-</td>
                                                                </tr>
                                                                <?php
                                                                if ($this->session->userdata('promocode_id')) {
                                                                    $wh3['promocode_id'] = $this->session->userdata('promocode_id');
                                                                    $code = $this->md->my_select('tbl_promocode', '*', $wh3)[0];

                                                                    $gtotal = $gtotal - $code->amount;
                                                                    ?>
                                                                    <tr>
                                                                        <td style="font-size: 15px;font-weight: bold;">- Promocode( <?php echo $code->code; ?> )</td>
                                                                        <td><b>Rs.</b> <?php echo $code->amount; ?>/-</td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding: 0px 20px;">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn-round" name="pay" value="yes" style="padding: 10px 65px;margin-top: 26px;">You  Pay :<b>Rs.</b> <?php echo number_format($gtotal); ?></button>
                                                            <br/><br/>
                                                            <?php  
                                                                if( isset($ship_err))
                                                                {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow" role="alert">
                                                                <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - <?php echo $ship_err; ?>.
                                                            </div>
                                                            <?php
                                                                }
                                                                if ( isset($pay_err))
                                                                {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow" role="alert">
                                                                <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> - <?php echo $pay_err; ?>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
//require './headerscript.php';
                $this->load->view('footer');
                ?>
            </div>
            <?php
//require './headerscript.php';
            $this->load->view('footerscript');
            ?>
    </body>

</html>