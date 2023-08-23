<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>View Cart - PRJ Store</title>
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
                    <ul class="row">

                        <!-- Step 1 -->
                        <a href="<?php echo base_url('view-cart'); ?>">
                            <li class="col-sm-4 current">
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
                        <li class="col-sm-4">
                            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                            <div class="media-body"> <span>Step 3</span>
                                <h6>Delivery Successfully</h6>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div id="cartdata">
                <?php
                $wh['register_id'] = $this->session->userdata('member');
                $cartdata = $this->md->my_select('tbl_cart', '*', $wh);

                if (count($cartdata) > 0) {
                    ?>
                    <!-- Shopping Cart -->
                    <section class="shopping-cart padding-bottom-60">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Items</th>
                                        <th class="text-center">Gross Price</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Net Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total Price </th>
                                        <th class="text-center">Remove </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $gtotal = 0;
                                    $c = 0;
                                    foreach ($cartdata as $single) {
                                        $c++;

                                        $product = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                                        $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $single->image_id))[0];
                                        $allpath = explode(",", $image->path);

                                        $gtotal = $gtotal + $single->total_price;
                                        ?>
                                        <!-- Item Cart -->
                                        <tr>
                                            <td><?php echo $c; ?></td>
                                            <td><div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($product->product_id)); ?>" target="_new">
                                                            <img class="img-responsive" src="<?php echo base_url() . $allpath[0]; ?>" alt="" >
                                                        </a> 
                                                    </div>
                                                    <div class="media-body">
                                                        <p><?php echo $product->name; ?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center padding-top-60"><b>Rs.</b><?php echo number_format($single->gross_price,2); ?></td>
                                            <td class="text-center padding-top-60"><b>Rs.</b><?php echo number_format($single->discount,2); ?></td>
                                            <td class="text-center padding-top-60"><b>Rs.</b><?php echo number_format($single->net_price,2); ?></td>

                                            <td class="text-center"><!-- Quinty -->
                                                <div class="quinty padding-top-20">
                                                    <?php
                                                    $qty = $image->qty;

                                                    if ($qty > 5) {
                                                        $max = 5;
                                                    } else {
                                                        $max = $qty;
                                                    }
                                                    ?>
                                                    <input type="number" min="1" onchange="change_qty(<?php echo $single->cart_id ?>, this.value)" max="<?php echo $max; ?>" value="<?php echo $single->qty; ?>">
                                                </div>
                                            </td>

                                            <td class="text-center padding-top-60"><b>Rs.</b><?php echo number_format($single->total_price,2); ?></td>

                                            <td class="text-center padding-top-60">
                                                <a onclick="remove_cart(<?php echo $single->cart_id; ?>)" class="remove" style="color: red; cursor: pointer;" title="Remove">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Promotion -->
                            <div class="promo">
                                <div class="coupen">

                                </div>

                                <!-- Grand total -->
                                <div class="g-totel">
                                    <h5>Grand total: <span>Rs. <?php echo number_format($gtotal, 2); ?></span>/-</h5>
                                    <?php
                                        $this->session->set_userdata('bill_amount',$gtotal);
                                    ?>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="pro-btn">
                                <a href="<?php echo base_url('collections') ?>" class="btn-round btn-light">Continue</a> 
                                <a href="<?php echo base_url('checkout'); ?>" class="btn-round">Checkout</a>
                            </div>
                        </div>
                    </section>
                    <?php
                } else {
                    $name = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0]->name;
                    ?> 
                    <!-- Shopping Cart -->
                    <section class="shopping-cart padding-bottom-60">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <br/>
                                    <i class="fa fa-cart-plus" style="font-size: 150px; color: #ddd;"></i>
                                    <h1 style="color: #ddd;">Hy, <?php echo $name; ?>,<br/> Your Shopping Cart is Empty.</h1>
                                    <br/>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="pro-btn">
                                <a href="#." class="btn-round">Go Payment Methods</a> 
                            </div>
                        </div>
                    </section>    
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
//require './headerscript.php';
        $this->load->view('footer');
        ?>

        <?php
        //require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>

</html>