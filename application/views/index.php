<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Welcome PRJ Store -Your Vision,Our Future</title>
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

            <!-- Slid Sec -->
            <section class="slid-sec">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row"> 

                            <!-- Main Slider  -->
                            <div class="col-md-12 no-padding"> 

                                <!-- Main Slider Start -->
                                <div class="tp-banner-container">
                                    <div class="tp-banner">
                                        <ul>
                                            <?php
                                            $slider = $this->md->my_select('tbl_banner', '*', array('status' => 1));
                                            foreach ($slider as $single) {
                                                ?>
                                                <!-- SLIDE  -->
                                                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
                                                    <!-- MAIN IMAGE --> 
                                                    <img src="<?php echo base_url() . $single->path; ?>"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat"> 

                                                    <!--LAYER NR. 1
                                                    <div class="tp-caption sfl tp-resizeme" 
                                                         data-x="left" data-hoffset="60" 
                                                         data-y="center" data-voffset="-110" 
                                                         data-speed="800" 
                                                         data-start="800" 
                                                         data-easing="Power3.easeInOut" 
                                                         data-splitin="chars" 
                                                         data-splitout="none" 
                                                         data-elementdelay="0.03" 
                                                         data-endelementdelay="0.4" 
                                                         data-endspeed="300"
                                                         style="z-index: 5; font-size:30px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">High Quality VR Glasses </div>-->

                                                    <!-- LAYER NR. 2 -->
                                                    <div class="tp-caption sfr tp-resizeme" 
                                                         data-x="left" data-hoffset="60" 
                                                         data-y="center" data-voffset="-60" 
                                                         data-speed="800" 
                                                         data-start="1000" 
                                                         data-easing="Power3.easeInOut" 
                                                         data-splitin="chars" 
                                                         data-splitout="none" 
                                                         data-elementdelay="0.03" 
                                                         data-endelementdelay="0.1" 
                                                         data-endspeed="300" 
                                                         style="z-index: 6; font-size:50px; color:#0088cc; font-weight:800; white-space: nowrap;"><?php echo $single->title; ?></div>

                                                    <!-- LAYER NR. 3 -->
                                                    <div class="tp-caption sfl tp-resizeme" 
                                                         data-x="left" data-hoffset="60" 
                                                         data-y="center" data-voffset="10" 
                                                         data-speed="800" 
                                                         data-start="1200" 
                                                         data-easing="Power3.easeInOut" 
                                                         data-splitin="none" 
                                                         data-splitout="none" 
                                                         data-elementdelay="0.1" 
                                                         data-endelementdelay="0.1" 
                                                         data-endspeed="300" 
                                                         style="z-index: 7;  font-size:24px; color:#888888; font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $single->subtitle; ?></div>

                                                    <!--LAYER NR. 1--> 
                                                    <!--<div class="tp-caption sfr tp-resizeme" 
                                                        data-x="left" data-hoffset="210" 
                                                        data-y="center" data-voffset="5" 
                                                        data-speed="800" 
                                                        data-start="1300" 
                                                        data-easing="Power3.easeInOut" 
                                                        data-splitin="chars" 
                                                        data-splitout="none" 
                                                        data-elementdelay="0.03" 
                                                        data-endelementdelay="0.4" 
                                                        data-endspeed="300"
                                                        style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">$49.99 </div>-->

                                                    <!--LAYER NR. 4--> 
                                                    <div class="tp-caption lfb tp-resizeme scroll" 
                                                         data-x="left" data-hoffset="60" 
                                                         data-y="center" data-voffset="80"
                                                         data-speed="800" 
                                                         data-start="1300"
                                                         data-easing="Power3.easeInOut" 
                                                         data-elementdelay="0.1" 
                                                         data-endelementdelay="0.1" 
                                                         data-endspeed="300" 
                                                         data-scrolloffset="0"
                                                         style="z-index: 8;"><a href="<?php echo base_url('collections') ?>" class="btn-round big">Shop Now</a> </div>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div id="content"> 

                <!-- Shipping Info -->
                <section class="shipping-info">
                    <div class="container">
                        <ul>

                            <!-- Free Shipping -->
                            <li>
                                <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
                                <div class="media-body">
                                    <h5>Shipping Charge</h5>
                                    <span>On order over <b>Rs.</b> 100 /-</span></div>
                            </li>
                            <!-- Money Return -->
                            <li>
                                <div class="media-left"> <i class="flaticon-arrows"></i> </div>
                                <div class="media-body">
                                    <h5>Money Return</h5>
                                    <span>30 Days money return</span></div>
                            </li>
                            <!-- Support 24/7 -->
                            <li>
                                <div class="media-left"> <i class="flaticon-operator"></i> </div>
                                <div class="media-body">
                                    <h5>Support 24/7</h5>
                                    <span>Hotline: (+91) 83477 16750</span></div>
                            </li>
                            <!-- Safe Payment -->
                            <li>
                                <div class="media-left"> <i class="flaticon-business"></i> </div>
                                <div class="media-body">
                                    <h5>Safe Payment</h5>
                                    <span>Protect online payment</span></div>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- tab Section -->
                <section class="featur-tabs padding-top-60 padding-bottom-60">
                    <div class="container"> 

                        <!-- heading -->
                        <div class="heading">
                            <h2>Newly Added Products</h2>
                            <hr>
                        </div> 

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-pills margin-bottom-40" role="tablist">
                            <?php
                            $c = 0;
                            $main = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
                            foreach ($main as $single) {
                                $c++;
                                ?>
                                <li role="presentation" <?php
                                if ($c == 1) {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="#<?php echo $single->category_id; ?>" aria-controls="<?php echo $single->name; ?>" role="tab" data-toggle="tab"><?php echo $single->name; ?></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content"> 
                            <?php
                            $cc = 0;
                            foreach ($main as $single) {
                                $cc++;
                                ?>
                                <!-- Featured -->
                                <div role="tabpanel" class="tab-pane <?php
                                if ($cc == 1) {
                                    echo "active in";
                                }
                                ?> fade" id="<?php echo $single->category_id; ?>"> 
                                    <!-- Items Slider -->
                                    <div class="<?php echo ($cc == 1) ? 'item-slide-4 with-nav' : 'item-col-4'; ?>">
                                        <?php
                                        $id = $single->category_id;
                                        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status`=1 AND `main_id` = $id ORDER BY `product_id` DESC LIMIT 0,10");
                                        foreach ($products as $data) {
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
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>

                <!-- Top Selling Week -->
                <section class="light-gry-bg padding-top-60 padding-bottom-30">
                    <div class="container"> 

                        <!-- heading -->
                        <div class="heading">
                            <h2>Top Selling on PRJ Store</h2>
                            <hr>
                        </div>

                        <!-- Items -->
                        <div class="item-col-4"> 
                            <?php
                            $products = $this->md->my_query("SELECT p.* , t.`product_id` AS tt , COUNT( t.`product_id` ) as cc FROM `tbl_transaction` AS t , `tbl_product` AS p WHERE p.`product_id` = t.`product_id` GROUP BY t.`product_id` ORDER BY cc DESC LIMIT 0,50");
                            foreach ($products as $data) {
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
                    </div>
                </section>

                <!-- Newslatter -->
                <section class="newslatter">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h3>Subscribe our Newsletter <span>Get <strong>Offers and Stocks</strong> Details</span></h3>
                            </div>
                            <div class="col-md-5">
                                <input type="email" id="email" placeholder="Your email address here...">
                                <button type="button" onclick="subscribe();">Subscribe</button>
                                <p style="color:#FFF; padding: 5px; margin-left: 15px" id="msg"></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End Content --> 

            <!-- Footer -->
            <?php
// require './footer.php';
            $this->load->view('footer');
            ?>


        </div>
        <!-- End Page Wrapper --> 

        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>

</html>