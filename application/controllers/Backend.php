<?php

class Backend extends CI_Controller {

    public function state() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);

        echo '<option value="">Select State</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }

    public function city() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);

        echo '<option value="">Select City</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }

    public function subcategory() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);

        echo '<option value="">Select Sub category</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }

    public function petacategory() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);

        echo '<option value="">Select Peta category</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }

    public function subscribe() {

        $wh['email'] = $this->input->post('email');

        $count = count($this->md->my_select('tbl_email_subscriber', '*', $wh));

        if ($count == 1) {
            echo 2;
        } else {
            echo $this->md->my_insert('tbl_email_subscriber', $wh);
        }
    }

    public function change_status() {
        $action = $this->input->post('action');
        $id = $this->input->post('id');

        if ($action == "banner") {
            $wh['banner_id'] = $id;
            $status = $this->md->my_select('tbl_banner', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_banner', $ins, $wh);
        } else if ($action == "promocode") {
            $wh['promocode_id'] = $id;
            $status = $this->md->my_select('tbl_promocode', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_promocode', $ins, $wh);
        } else if ($action == "member") {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_register', $ins, $wh);
        } else if ($action == "seller") {
            $wh['seller_id'] = $id;
            $status = $this->md->my_select('tbl_seller', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_seller', $ins, $wh);
        } else if ($action == "product") {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_product', $ins, $wh);
        } else if ($action == "review") {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review', 'status', $wh)[0]->status;

            if ($status == 1) {
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_review', $ins, $wh);
        }
    }
    
    public function order_status()
    {
        //update orderv status
        $data['status'] = $this->input->post('status');
        $wh['bill_id'] = $this->input->post('bill_id');
        $this->md->my_update('tbl_bill',$data,$wh);
        
        //send mail
        $bill = $this->md->my_select('tbl_bill','*',$wh)[0];
        $email = $this->md->my_select('tbl_register','*',array('register_id'=>$bill->register_id))[0]->email;
        
        if( $this->input->post('status') == 1 )
        {
            $subject = "Order Accept.";
            $msg = "order accept.";
        }
        else 
        {
            $subject = "Order Cancel.";
            $msg = "order cancel.";
        }
        $this->md->my_mailer($email,$subject,$msg);
        
        //refernce table
        $bill_data = $this->md->my_select('tbl_bill','*',array('status' => 0));
?>
 <thead align="center">
    <tr>
        <th>No.</th>
        <th>Order Detail</th>
        <th>Product Detail</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $c=0;

    foreach ($bill_data as $bdata) 
    {
        $c++;
        $name = $this->md->my_select('tbl_register','*',array('register_id'=>$bdata->register_id))[0]->name;
        $address = $this->md->my_select('tbl_shipment','*',array('shipment_id'=>$bdata->shipment_id))[0]->address;
    ?>
        <tr align="center" valign="">
            <td style="vertical-align: top;"><?php echo $c; ?></td>

            <td style="width: 45%;text-align: left;vertical-align: top; ">
                <p><b>Name :</b> <?php echo $name; ?></p>
                <p><b>Delivery Address :</b> <?php echo $address; ?></p>
                <p><b>Date :</b> <?php echo date('d-m-Y', strtotime($bdata->bill_date)); ?></p>
                <p><b>Order ID :</b> <?php echo $bdata->order_id; ?></p>
                <?php
                    if($bdata->pay_type == "cod" )
                    {
                ?>
                <p><b>Payment Mode :</b> Cash On Delivery</p>
                <?php
                    }
                    else 
                    {
                ?>
                <p><b>Payment Mode :</b> Online Payment</p>
                <p><b>Payment ID :</b> <?php echo $bdata->payment_id ?></p>
                <?php
                    }
                ?>
                <p><b>Amount : Rs. </b><?php echo $bdata->amount; ?>/-</p>
                <p><b>Shipping Charge : Rs.</b>100/-</p>
                <?php
                    $amt=0;
                    if( $bdata->promocode_id > 0)
                    {
                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bdata->promocode_id))[0];
                        $code = $promocode->code;        
                        $amt = $promocode->amount;        
                ?>
                <p><b>Promocode ( <?php echo $code; ?> ) :Rs. </b> <?php echo $amt; ?>/-</p>
                <?php 
                    }

                    $total = ( $bdata->amount + 100 ) - $amt;
                ?>
                <p><b>Total :Rs.</b> <?php echo $total; ?>/-</p>

            </td>

            <td style="width: 45%;text-align: left;vertical-align: top; ">
                <?php
                    $tran_data = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$bdata->bill_id));

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

            <td>
                <button onclick="order_status(<?php echo $bdata->bill_id; ?>,1);" class="btn btn-success">Accept</button><br/><br/>
                <button onclick="order_status(<?php echo $bdata->bill_id; ?>,2);" class="btn btn-danger">Cancel</button>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>            
<?php
    }

    public function change_images() {
        $this->session->set_userdata('image_id', $this->input->post('id'));
        $wh['image_id'] = $this->input->post('id');
        ?>
        <article class="slider-item animated fadeInDown on-nav">
            <div id="slider" class="flexslider">
                <ul class="slides">
                    <?php
                    $img = $this->md->my_select('tbl_product_image', '*', $wh)[0];
                    $path = $img->path;
                    $allpath = explode(",", $path);

                    foreach ($allpath as $single) {
                        ?>
                        <li>
                            <img src="<?php echo base_url($single); ?>" style="height:450px;object-fit: contain;width: 100%" alt="">
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div id="carousel" class="flexslider">
                <ul class="slides">
                    <?php
                    foreach ($allpath as $single) {
                        ?>
                        <li>
                            <img src="<?php echo base_url($single); ?>" style="height:150px;width: 150px;object-fit: contain;" alt="">
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </article>            
        <?php
    }

    public function wishlist() {
        $wh['product_id'] = $this->input->post('pid');
        $wh['register_id'] = $this->session->userdata('member');

        $wish = count($this->md->my_select('tbl_wishlist', '*', $wh));

        if ($wish == 0) {
            $this->md->my_insert('tbl_wishlist', $wh);
        } else {
            $this->md->my_delete('tbl_wishlist', $wh);
        }
    }

    public function add_cart()
    {
        $pid = $this->input->post('pid');

        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $pid;

        $product_data = $this->md->my_select('tbl_product', '*', array('product_id' => $pid))[0];

        if ($this->session->userdata('image_id')) {
            $ins['image_id'] = $this->session->userdata('image_id');
        } else {
            $image_data = $this->md->my_select('tbl_product_image', '*', array('product_id' => $pid))[0];

            $ins['image_id'] = $image_data->image_id;
        }

        $comission = $this->md->my_select('tbl_commssion', '*')[0]->rate;
        $price = $product_data->price;

        $mainprice = round($price + (($price * $comission) / 100));

        $ins['gross_price'] = $mainprice;

        if ($product_data->offer_id > 0) {
            $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $product_data->offer_id))[0]->rate;

            $discount = round(( $mainprice * $rate ) / 100);
            $net_price = $mainprice - $discount;

            $ins['discount'] = $discount;
            $ins['net_price'] = $net_price;
        } else {
            $ins['discount'] = 0;
            $ins['net_price'] = $mainprice;
        }

        $ins['qty'] = 1;
        $ins['total_price'] = $ins['net_price'];

        $result =  $this->md->my_insert('tbl_cart', $ins);
        
        echo $result;
        
        if( $result == 1 )
        {
            $this->session->unset_userdata('image_id');
        }
    }

    public function header_cart() {
        ?>
        <li class="dropdown"> 
            <?php
            if ($this->session->userdata('member')) {
                $items = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('member')));
                $item_count = 0;
                $total = 0;
                foreach ($items as $single) {
                    $item_count++;
                    $total = $total + $single->total_price;
                }
                ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="itm-cont"><?php echo $item_count; ?></span> <i class="flaticon-shopping-bag"></i>
                    <strong>My Cart</strong> <br>
                    <span><?php echo $item_count; ?> item(s) - Rs.<?php echo $total; ?></span></a>
                <ul class="dropdown-menu">
                    <?php
                    if ($item_count == 0) {
                        ?>
                        <li>
                            <h3>
                                <center>
                                    <br/>
                                    <i class="icon-bag"></i>
                                    <h5 style="color:#888888">Your Cart Is Empty.</h5>
                                    <br/>
                                </center>
                            </h3>
                        </li>
                        <?php
                    } else {
                        $c = 0;
                        foreach ($items as $single) {
                            $product = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                            $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $single->image_id))[0];
                            $allpath = explode(",", $image->path);

                            $c++;
                            if ($c > 2) {
                                break;
                            }
                            ?>
                            <li>
                                <div class="media-left"> 
                                    <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($product->product_id)); ?>" target="_new" class="thumb"> 
                                        <img src="<?php echo base_url() . $allpath[0]; ?>" class="img-responsive" alt="" > 
                                    </a> 
                                </div>
                                <div class="media-body">
                                    <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($product->product_id)); ?>" target="_new" class="tittle"><?php echo $product->name; ?></a> 
                                    <div class="price"><span>Rs.<?php echo $single->net_price; ?> /-</span></div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li class="btn-cart"> 
                        <a href="<?php echo base_url('view-cart'); ?>" class="btn-round">View Cart</a>
                    </li>
                </ul>    
                <?php
            } else {
                $items = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('member')));
                $item_count = 0;
                $total = 0;
                foreach ($items as $single) {
                    $item_count++;
                }
                ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="itm-cont"><?php echo $item_count; ?></span> 
                    <i class="flaticon-shopping-bag"></i>
                    <strong>My Cart</strong> <br>
                    <span>0 item - Rs. 0</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <h3>
                            <center>
                                <br/>
                                <i class="icon-bag"></i>
                                <h5 style="color:#888888">Login To View Cart.</h5>
                                <br/>
                            </center>
                        </h3>
                    </li>
                    <li class="btn-cart"> 
                        <a href="<?php echo base_url('login-register'); ?>" class="btn-round">Login</a>
                    </li>
                </ul>    
                <?php
            }
            ?>
        </li>            
        <?php
    }

    public function change_qty() {
        $wh['cart_id'] = $this->input->post('cart_id');
        $qty = $this->input->post('qty');

        $cartinfo = $this->md->my_select('tbl_cart', '*', $wh)[0];

        $net_price = $cartinfo->net_price;

        $total = $net_price * $qty;

        $up['total_price'] = $total;
        $up['qty'] = $qty;

        echo $this->md->my_update('tbl_cart', $up, $wh);
    }

    public function cartdata() {
        ?>
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

        <?php
    }
    
    public function remove_cart()
    {
        $wh['cart_id'] = $this->input->post('cart_id');
        
        echo $this->md->my_delete('tbl_cart',$wh);
    }
    
    public function cart_btn()
    {
        $wh['image_id'] = $this->input->post('id');
        $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
?>
<?php
    if( $img->qty > 0 )
    {
        if( $this->session->userdata('member'))
        {
            $ww['register_id'] = $this->session->userdata('member');
            $ww['image_id'] = $img->image_id;

            $cart_added = count( $this->md->my_select('tbl_cart','*',$ww));

            if( $cart_added == 1)
            {
                ?>
                <a class="btn-round" style="cursor:pointer;background: #000;">
                    <i class="icon-basket-loaded margin-right-5"></i> Already Added Cart
                </a> 
                <?php
            }
            else
            {
                ?>
                <a onclick="add_cart_detail(<?php echo $img->product_id; ?>)" class="btn-round" style="cursor:pointer;">
                    <i class="icon-basket-loaded margin-right-5"></i> Add to Cart
                </a> 
                <?php    
            }
        }
        else
        {
?>
<a href="<?php echo base_url('login-register'); ?>" class="btn-round" style="cursor:pointer;">
    <i class="icon-basket-loaded margin-right-5"></i> Add to Cart
</a> 
<?php            
        }
    }
?>           
<?php
    }
    
    public function stock_status()
    {
       $wh['image_id'] = $this->input->post('id');
       $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
       
       if( $img->qty > 0 )
        {
    ?>
    <p>Availability: <span class="in-stock">In stock</span></p>
        <?php
         }
         else 
         {
        ?>
    <p>Availability: <span class="in-stock" style="color:red;">Out Of stock</span></p>
        <?php
         }
    }
    
    public function select_address()
    {
        $id = $this->input->post('id');
        $this->session->set_userdata('shipment_id',$id);
        
        $whh['register_id'] = $this->session->userdata('member');
        $shipment = $this->md->my_select('tbl_shipment','*',$whh);

        foreach( $shipment as $data )
        {
    ?>
    <div class="col-md-4">
        <div style="min-height: 250px;margin:10px 0px;border:1px solid #ddd;padding: 2px 10px;text-align: center;">
            <h6 style="min-height: 30px;margin-top: 30px;margin-bottom: 10px;"><?php echo $data->name; ?></h6>
            <p  style="color:#000;">(<?php echo $data->address_type; ?>)</p>
            <p style="text-transform: capitalize;min-height: 80px;"><?php echo $data->address ?></p>
            <?php
                if( $this->session->userdata('shipment_id') == $data->shipment_id )
                {
            ?>
            <a class="btn-round" style="background: #000;padding: 10px 30px; margin-bottom: 20px;font-size: 14px;cursor: pointer;">Delivered here</a>
            <?php
                }
                else 
                {
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
    <?php
    }
    
    public function apply_code()
    {
        $wh['code'] = $this->input->post('code');
        $wh['min_bill_price <='] = ( $this->session->userdata('bill_amount') + 100 );
        $wh['status'] = 1;
        
        $data = $this->md->my_select('tbl_promocode','*',$wh);
        $valid_code = count($data);
        
        if( $valid_code == 1 )
        {
            $this->session->set_userdata('promocode_id',$data[0]->promocode_id);
            echo 1;
        }
        else 
        {
            echo 0;
        }
    }
    
    public function order_summary()
    {
?>
<div style="border:1px solid #ddd;padding: 20px 10px">
    <h5 style="text-align: center">Order Summary</h5>
    <hr/>
    <?php
        $wh['register_id'] = $this->session->userdata('member');
        $cartdata = $this->md->my_select('tbl_cart','*',$wh);
        
        $total = 0;
        
        foreach($cartdata as $data )
        {
            $name = $this->md->my_select('tbl_product','*',array('product_id' => $data->product_id))[0];
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
            <p><?php echo substr($name->name,0,30); ?>....</p>
            <p>Qty: <?php echo $data->qty; ?></p>
            <p class="price"><b>Rs.</b><?php echo number_format($data->total_price);  ?>/-</p>
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
                    if( $this->session->userdata('promocode_id'))
                    {
                     $wh3['promocode_id'] = $this->session->userdata('promocode_id');
                     $code = $this->md->my_select('tbl_promocode','*',$wh3)[0];

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
        </div>
    </div>

</div>    
<?php    
    }
    
    public function add_review()
    {
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $this->input->post('pid');
        $ins['rating'] = $this->input->post('rate');
        $ins['msg'] = $this->input->post('msg');
        $ins['date'] = date('Y-m-d h:i:s');
        $ins['status'] = 0;
        
        echo $this->md->my_insert('tbl_review',$ins);
    }
    
    public function product_data()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
?>
<div class="item-col-3"> 
    <?php
    if ( $action  == 'main-collection' ) 
    {
        $id = base64_decode(base64_decode($id));
        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `main_id` = $id AND `status` = 1 ORDER BY `product_id` DESC");
    }
    else if ($action == 'sub-collection')
    {
        $id = base64_decode(base64_decode($id));
        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `sub_id` = $id AND `status` = 1 ORDER BY `product_id` DESC");
    } 
    else if ($action == 'peta-collection')
    {
        $id = base64_decode(base64_decode($id));
        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `peta_id` = $id AND `status` = 1 ORDER BY `product_id` DESC");
    } 
    else if ($action == 'todays-offer')
    {
        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `offer_id` > 0 AND `status` = 1 ORDER BY `product_id` DESC");
    } 
    else 
    {
        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 ORDER BY `product_id` DESC");
    }

    foreach ($products as $data) {
        //image details
        $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
        $paths = explode(",", $image_detail->path);
        $single_path = $paths[0];
        ?>
        <!-- Product -->
        <div class="product">
            <article>
                <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($data->product_id)); ?>">
                    <img class="img-responsive" style="height:250px;object-fit: scale-down;" src="<?php echo base_url() . $single_path; ?>" alt="<?php echo $data->name; ?>" > 
                </a>
                <?php
                if ($image_detail->qty == 0) {
                    ?>
                    <span class="sale-tag">Out of Stock</span> 
                    <?php
                } else {
                    ?>
                    <span class="sale-tag" style="background: green !important">In Stock</span> 
                    <?php
                }
                ?>
                <!-- Content --> 
                <?php
                $cname = $this->md->my_select('tbl_category', '*', array('category_id' => $data->main_id))[0]->name;
                ?>
                <span class="tag"><?php echo $cname; ?></span>
                <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($data->product_id)); ?>" style="white-space: nowrap; width: 100%;overflow: hidden;text-overflow: ellipsis;" class="tittle"><?php echo $data->name; ?></a> 

                <!-- Reviews -->
                <p class="rev">
                    <?php
                    $total_rating = 0;
                    $total_person = 0;
                    $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $data->product_id, 'status=>1'));
                    foreach ($rate as $ss) {
                        $total_rating += $ss->rating;
                        $total_person++;
                    }
                    if ($total_person > 0) {
                        $avg_rate = ceil($total_rating / $total_person);
                    } else {
                        $avg_rate = 0;
                    }

                    $fill_star = $avg_rate;
                    $blank_star = 5 - $fill_star;

                    //fill star loop
                    for ($i = 1; $i <= $fill_star; $i++) {
                        ?>
                        <i class="fa fa-star"></i>
                        <?php
                    }
                    //blank start loop
                    for ($i = 1; $i <= $blank_star; $i++) {
                        ?>
                        <i class="fa fa-star-o"></i>
                        <?php
                    }
                    ?>
                    <span class="margin-left-10"><?php echo $total_person; ?> Review(s)</span>
                </p>

                <?php
                $comission = $this->md->my_select('tbl_commssion', '*')[0]->rate;
                $price = $data->price;

                $mainprice = $price + (($price * $comission) / 100);
                if ($data->offer_id > 0) {

                    $old_price = round($mainprice);

                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;

                    $new_price = round($old_price - (( $old_price * $rate ) / 100));
                    ?>
                    <div class="price">Rs.<?php echo $new_price; ?> /-<span>Rs.<?php echo round($mainprice); ?> /-</span></div>
                    <?php
                } else {
                    ?>
                    <div class="price">Rs.<?php echo round($mainprice); ?> /-</div>    
                    <?php
                }
                if ($image_detail->qty > 0) {
                    if ($this->session->userdata('member')) {
                        $whh['product_id'] = $data->product_id;
                        $whh['register_id'] = $this->session->userdata('member');

                        $cart_added = count($this->md->my_select('tbl_cart', '*', $whh));

                        if ($cart_added == 0) {
                            ?>
                            <a onclick="add_cart(<?php echo $data->product_id; ?>);" id="cart_btn<?php echo $data->product_id; ?>" class="cart-btn">
                                <i class="icon-basket"></i>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="cart-btn">
                                <i class="icon-basket-loaded"></i>
                            </a>
                            <?php
                        }
                    } else {
                        ?>
                        <a href="<?php echo base_url('login-register'); ?>" class="cart-btn">
                            <i class="icon-basket"></i>
                        </a>

                        <?php
                    }
                }
                if ($this->session->userdata('member')) {
                    $where['product_id'] = $data->product_id;
                    $where['register_id'] = $this->session->userdata('member');

                    $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                    ?>
                    <a onclick="add_wish(<?php echo $data->product_id; ?>)" id="wish_btn<?php echo $data->product_id; ?>" class="cart-btn">
                        <?php
                        if ($wish_added == 1) {
                            ?>
                            <i class="fa fa-heart"  style="color:#0088cc;"></i>
                            <?php
                        } else {
                            ?>
                            <i class="fa fa-heart-o"></i>
                            <?php
                        }
                        ?>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo base_url(); ?>login-register" class="cart-btn">
                        <i class="fa fa-heart-o"></i>
                    </a>
                    <?php
                }
                ?>
            </article>
        </div>
        <?php
    }
    ?>
</div>    
<?php
    }
}
