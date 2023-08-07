<!-- Top bar -->
<div class="top-bar">
    <div class="container">
        <p> 
            <a style="cursor: pointer" href="tel:8140335033">Mobile:(+91) 8347716750</a> |
            <a style="cursor: pointer" href="mailto:prjstore727@gmail.com">Email: prjstore727@gmail.com</a> 
        </p>
        <div class="right-sec padding-top-3">
            <ul>
                <?php
                if (strlen($this->session->userdata('member'))) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>member-home">My Account </a></li>
                    <li><a href="<?php echo base_url(); ?>member-logout">Logout </a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="<?php echo base_url(); ?>login-register">Login | Register </a></li>
                    <?php
                }
                ?>
                <li style="border: none;"><a href="<?php echo base_url(); ?>seller-registration-1">Become A Partner On PRJ Store</a></li>
                <li style="border: none;">
                    <div id="google_translate_element"></div>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- Header -->
<header>
    <div class="container">
        <div class="logo" > <a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/images/prj7.jpg" alt="" width="180px"></a> </div>
        <form id="filter_form" method="post">
            <div class="search-cate" >
                <select class="selectpicker">
                    <option> All Categories</option>
                    <?php
                    $main = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
                    foreach ($main as $maindata) 
                    {
                    ?>
                    <option> <?php echo $maindata->name; ?></option>
                    <?php
                    }
                    ?>
                </select>


                <input type="search" placeholder="Search entire store here..." id="transcript" >
                <button class="submit" type="button">
                    <i onclick="startDictation()" class="fa fa-microphone"></i>
                </button>

            </div>
        </form>

        <!-- Cart Part -->
        <ul id="headercart_data" class="nav navbar-right cart-pop">
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
        </ul>
    </div>

    <!-- Nav -->
    <nav class="navbar ownmenu">
        <div class="container"> 

            <!-- Navbar Header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
            </div>
            <!-- NAV -->
            <div class="collapse navbar-collapse" id="nav-open-btn">
                <ul class="nav">
                    <li> 
                        <a href="<?php echo base_url(); ?>home">Home</a>
                    </li>
                    <?php
                    $main = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
                    foreach ($main as $maindata) {
                        ?>
                        <!-- Main Menu Nav -->
                        <li class="dropdown megamenu">
                            <a href="<?php echo base_url(); ?>collections/main-collection/<?php echo base64_encode(base64_encode($maindata->category_id)); ?>" class="dropdown-toggle"><?php echo $maindata->name; ?></a>
                            <div class="dropdown-menu animated-2s fadeInUpHalf">
                                <div class="mega-inside">
                                    <div class="row">
                                        <?php
                                        $wh['parent_id'] = $maindata->category_id;
                                        $sub = $this->md->my_select('tbl_category', '*', $wh);
                                        foreach ($sub as $subdata) {
                                            ?>
                                            <div class="col-sm-3">
                                                <a href="<?php echo base_url(); ?>collections/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>">
                                                    <h6><?php echo $subdata->name; ?></h6>
                                                </a>
                                                <ul>
                                                    <?php
                                                    $c = 0;
                                                    $whe['parent_id'] = $subdata->category_id;
                                                    $peta = $this->md->my_select('tbl_category', '*', $whe);

                                                    foreach ($peta as $petadata) {
                                                        $c++;
                                                        if ($c > 5) {
                                                            break;
                                                        }
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>collections/peta-collection/<?php echo base64_encode(base64_encode($petadata->category_id)); ?>"><?php echo $petadata->name; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li><a href="<?php echo base_url(); ?>collections/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>">View All <?php echo $subdata->name . " " . $maindata->name; ?></a></li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    <li> <a href="<?php echo base_url(); ?>collections/todays-offer"> Today's Offer</a></li>
                    <li> <a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                </ul>
            </div>

        </div>
    </nav>
</header>