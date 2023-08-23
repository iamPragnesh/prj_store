<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Checksuccess - PRJ Store</title>
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
                        <div class="order-success"> <i class="fa fa-check animate__animated animate__backInDown"></i>
                            <h6>Thank Your for order with us.</h6>
                            <p>Your order place successfully and order status is update shortly by our staff.</p>
                            <?php 
                                if( $paytype == "online")
                                {
                            ?>
                            <p><b>Payment Type</b>: Online Payment</p>
                            <p><b>Payment Id</b>: <?php echo $payment_id; ?></p>
                            <?php
                                }
                                else
                                {
                            ?>
                            <p>Payment Type: Cash On Delivery</p>
                            <?php
                                }
                            ?>
                            <p><b>Order Id</b>: <?php echo $order_id; ?></p>
                            <p><b>Estimated Delivery</b>: 3-4 Working Days</p>
                            <a href="<?php echo base_url('collection'); ?>" class="btn-round">Continue Shopping</a>
                            <br/>
                            <a href="<?php echo base_url('member-order'); ?>" class="btn-round">View Order</a>
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