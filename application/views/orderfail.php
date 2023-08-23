<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Order Failed - PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">
       
        <style>
            i{
                animation-iteration-count:infinite;
             }
        </style>
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
                                    <li class="col-sm-4">
                                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                                        <div class="media-body"> <span>Step 2</span>
                                            <h6>Check Out</h6>
                                        </div>
                                    </li>

                                    <!-- Step 3 -->
                                    <li class="col-sm-4 current">
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

                <!-- Oder-success -->
                <section>
                    <div class="container"> 
                        <!-- Payout Method -->
                        <div class="order-success">
                            <i class="fa fa-times-circle animate__animated animate__flash" style="color:red;border-color: red;"></i>
                            <h6 style="color:red;">Oops! Your order has been Failed.</h6>
                            <?php
                                if(isset($merchant_order_id))
                                {
                            ?>
                            <h5>Order ID :<?php echo $merchant_order_id; ?></h5>
                            <?php
                                }
                                if(isset($razorpay_payment_id))
                                {
                            ?>
                            <h5>Payment ID :<?php echo $merchant_order_id; ?></h5>
                            <?php
                                }
                            ?>
                            <p>Click on the following button and retry for payment. if payment is deduct from your bank then don't worry it will refound within 7 working days and contact our administration department.</p>
                            <a href="<?php echo base_url('checkout'); ?>" class="btn-round">Retry Payment</a> 
                        </div>
                    </div>
                </section>
                
                <?php
                $this->load->view('footer');
                ?>
            </div>
           
            <?php
            $this->load->view('footerscript');
            ?>
    </body>

</html>