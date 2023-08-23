<?php
$sql = "SELECT m.name as main,s.name as sub,p.name as peta from tbl_category as m, tbl_category as s, tbl_category as p where m.category_id = s.parent_id and s.category_id = p.parent_id and p.category_id = " . $detail->peta_id;
$cate = $this->md->my_query($sql);
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <!-- Document Title -->
        <title> <?php echo $detail->name; ?> PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">
        <meta name="author" content="PRJ Store" />
        <meta name="title" content="<?php echo 'Product Name : ' . $detail->name . ", Product Code : " . $detail->code . ', Price : ' . $detail->price; ?>" />
        <meta name="keyword" content="<?php echo $detail->name . '  Main category : ' . $cate[0]->main . ", Sub Category : " . $cate[0]->sub . ', Peta Category : ' . $cate[0]->peta; ?>" />
        <meta name="description" content="<?php echo $detail->name . ", Product Code : " . $detail->code . ', Price : ' . $detail->price . '  Main category : ' . $cate[0]->main . ", Sub Category : " . $cate[0]->sub . ', Peta Category : ' . $cate[0]->peta; ?>" />
    
    <style>
        /* Rating Star Widgets Style */
        .rating-stars ul {
          list-style-type:none;
          padding:0;

          -moz-user-select:none;
          -webkit-user-select:none;
        }
        .rating-stars ul > li.star {
          display:inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
          font-size:2.5em; /* Change the size of the stars */
          color:#ccc; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
          color:#FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
          color:#FF912C;
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

            <!-- Slid Sec -->

            <div class="linking">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>collections">collections</a></li>
                        <li class="active"><?php echo $detail->name; ?></li>
                    </ol>
                </div>
            </div>

            <section class="padding-top-40 padding-bottom-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-detail">
                                <div class="product">
                                    <div class="row">
                                        <!-- Slider Thumb -->
                                        <div class="col-xs-5" id="color_preview">
                                            <article class="slider-item on-nav" style="border:1px solid #dfdfdf">
                                                <div id="slider" class="flexslider">
                                                    <ul class="slides">
                                                        <?php
                                                        $img = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0];
                                                        $path = $img->path;
                                                        $allpath = explode(",", $path);

                                                        foreach ($allpath as $single) {
                                                            ?>
                                                            <li>
                                                                <img src="<?php echo base_url($single); ?>" style="height:450px;object-fit: contain;width: 100%" alt="<?php echo $detail->name; ?>">
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div id="carousel" class="flexslider" style="margin: 30px 50px;">
                                                    <ul class="slides">
                                                        <?php
                                                        foreach ($allpath as $single) {
                                                            ?>
                                                            <li style="border:1px solid #dfdfdf;margin-right: 10px">
                                                                <img src="<?php echo base_url($single); ?>" style="height:auto;width: 150px;object-fit: contain;" alt="<?php echo $detail->name; ?>">
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>

                                        <!-- Item Content -->
                                        <div class="col-xs-7">
                                            <span class="tags"><?php ?></span>
                                            <h5><?php echo $detail->name; ?></h5>

                                            <!-- Reviews -->
                                            <p class="rev">
                                                <?php
                                                $total_rating = 0;
                                                $total_person = 0;
                                                $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $detail->product_id, 'status=>1'));
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
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p>Product Code: <?php echo $detail->code; ?></p>
                                                </div>
                                                <?php
                                                $comission = $this->md->my_select('tbl_commssion', '*')[0]->rate;
                                                $price = $detail->price;

                                                $mainprice = $price + (($price * $comission) / 100);
                                                if ($detail->offer_id > 0) {
                                                    $old_price = round($mainprice);

                                                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $detail->offer_id))[0]->rate;

                                                    $new_price = round($old_price - (( $old_price * $rate ) / 100));
                                                    ?>
                                                    <div class="col-sm-6 price">Rs.<?php echo $new_price; ?> /-<span>&nbsp;<strike class="price" style="color:#ddd;font-size:15px">Rs.<?php echo round($mainprice); ?> /-</strike></span></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-sm-6 price">Rs.<?php echo number_format(round($mainprice), 2); ?>/-</div>    
                                                    <?php
                                                }
                                                ?>
                                                <div class="col-sm-6" id="stock_status">
                                                    <?php
                                                    if ($img->qty > 0) {
                                                        ?>
                                                        <p>Availability: <span class="in-stock">In stock</span></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p>Availability: <span class="in-stock" style="color:red;">Out Of stock</span></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- List Details -->
                                            <ul class="description">
                                                <li>
                                                    <br/>
                                                    <?php echo $detail->description; ?>
                                                    <br/>
                                                </li>
                                            </ul>
                                            <!-- Colors -->
                                            <div class="row">
                                                <div class="col-xs-5">
                                                    <div class="clr">
                                                        <?php
                                                        $cc = 0;
                                                        $color = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id));
                                                        foreach ($color as $single) {
                                                            $cc++;
                                                            ?>
                                                            <span onclick="change_image('<?php echo $single->image_id; ?>');cart_btn(<?php echo $single->image_id; ?>)" style="background:<?php echo $single->color; ?>;<?php if ($cc == 1) echo "border: 3px solid #0088cc;"; ?>" title="<?php echo $single->color; ?>"></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Compare Wishlist -->
                                            <ul class="cmp-list">

                                                <li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>
                                                <li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>
                                            </ul>


                                            <div class="addthis_inline_share_toolbox_g768"></div>

                                            <br><br>

                                            <?php
                                            if ($this->session->userdata('member')) {
                                                $where['product_id'] = $detail->product_id;
                                                $where['register_id'] = $this->session->userdata('member');

                                                $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                                                ?>
                                                <a onclick="add_wishh(<?php echo $detail->product_id; ?>)" id="detail_wish" style="cursor:pointer;" class="btn-round">
                                                    <?php
                                                    if ($wish_added == 1) {
                                                        ?>
                                                        <i class="fa fa-heart margin-right-5"></i> Added in Wish List
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <i class="fa fa-heart-o margin-right-5"></i> Add to Wish List
                                                        <?php
                                                    }
                                                    ?>
                                                </a> 

                                                <?php
                                            } else {
                                                ?>
                                                <a href="<?php echo base_url('login-register'); ?>" class="btn-round"><i class="fa fa-heart-o margin-right-5"></i> Add to Wish List</a> 
                                                <?php
                                            }
                                            ?>
                                            <span id="cart_btn_area">
                                                <?php
                                                if ($img->qty > 0) {
                                                    if ($this->session->userdata('member')) {
                                                        $ww['register_id'] = $this->session->userdata('member');
                                                        $ww['image_id'] = $img->image_id;

                                                        $cart_added = count($this->md->my_select('tbl_cart', '*', $ww));

                                                        if ($cart_added == 1) {
                                                            ?>
                                                            <a class="btn-round" style="cursor:pointer;background: #000;">
                                                                <i class="icon-basket-loaded margin-right-5"></i> Already Added Cart
                                                            </a> 
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a onclick="add_cart_detail(<?php echo $detail->product_id; ?>)" class="btn-round" style="cursor:pointer;">
                                                                <i class="icon-basket-loaded margin-right-5"></i> Add to Cart
                                                            </a> 
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <a href="<?php echo base_url('login-register'); ?>" class="btn-round" style="cursor:pointer;">
                                                            <i class="icon-basket-loaded margin-right-5"></i> Add to Cart
                                                        </a> 
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </span>
                                            <br/><br/>
                                            <?php
                                            $currentURL = current_url(); //http://myhost/main
                                            $params = $_SERVER['QUERY_STRING']; //my_id=1,3
                                            $fullURL = $currentURL . '?' . $params;
                                            ?>
                                            <input type="hidden" name="qrvalue" value="<?php echo "Product - " . $detail->name . " \n\n Price : " . number_format(round($mainprice), 2) . " , \n\n  URL Link = " . $fullURL; ?>"/>
                                            <div id="qrcode"></div>
                                            <a id="get_img" style="display: none" download="">Download</a>
                                        </div>
                                    </div>
                                </div>


                                <!-- Details Tab Section-->
                                <div class="item-tabs-sec">
                                    <!-- Nav tabs -->
                                    <ul class="nav" role="tablist">
                                        <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#cus-rev"  role="tab" data-toggle="tab">Specification</a></li>
                                        <li role="presentation"><a href="#ship" role="tab" data-toggle="tab">Review</a></li>
                                        <?php
                                         if($this->session->userdata('member'))
                                         {
                                        ?>
                                        <li role="presentation"><a href="#add-review" role="tab" data-toggle="tab">Add Review</a></li>
                                        <?php
                                         }
                                        ?>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                            <!-- List Details -->
                                            <ul class="bullet-round-list">
                                                <li><?php echo $detail->description; ?></li>
                                            </ul>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="cus-rev">
                                            <div class="table-responsive" id="specification">
                                                <?php echo $detail->specification; ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="ship">
                                            <div class="row">
                                                <?php
                                                $review = $this->md->my_select('tbl_review', '*', array('product_id' => $detail->product_id, 'status' => 1));
                                                if (count($review) > 0)
                                                {
                                                    foreach ($review as $dd) 
                                                    {
                                                        $user_info = $this->md->my_select('tbl_register', '*', array('register_id' => $dd->register_id))[0];
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-3" style="padding-top:10px;">
                                                                <img class="rounded-circle" style="width:40%;text-align: left " src="<?php echo base_url() . $user_info->profile_pic; ?>" />
                                                            </div>
                                                            <div class="col-md-4" style="padding-top:10px;margin-left: -15%">
                                                                <p><b>Name </b>: <?php echo $user_info->name; ?></p>
                                                                <!-- Reviews -->
                                                                <p>
                                                                    <?php
                                                                    $fill_star = $dd->rating;
                                                                    $blank_star = 5 - $fill_star;

                                                                    for( $i=1 ; $i<=$fill_star ; $i++ )
                                                                    {
                                                                    ?>
                                                                    <i class="fa fa-star" style="color:gold"></i>
                                                                    <?php
                                                                        }

                                                                        for( $i=1 ; $i<=$blank_star ; $i++)
                                                                        {
                                                                    ?>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </p>
                                                                <p style="color:#ddddd"><b>Message</b>: <?php echo $dd->msg; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                else 
                                                {
                                                    echo "<h2 style='color:#ddd'>No Review Yet.</h2>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="add-review">
                                            <div id="productReviews">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <?php
                                                    $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member')))[0];
                                                    if(strlen( $user_info->profile_pic ) > 0)
                                                    {
                                                    ?>
                                                        <img src="<?php echo base_url().$user_info->profile_pic; ?>" class="circle" style="margin-left: 10%; width: 100%;">
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/download.png" class="circle" style="margin-left: 10%; width: 100%;">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-10">
                                                    <h5><?php echo $user_info->name; ?></h5>
                                                    <div class="rate">
                                                        <input type="hidden" id="rate-value"/>
                                                        <div class='rating-stars'>
                                                            <ul id='stars'>
                                                              <li class='star' title='Poor' data-value='1'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                              </li>
                                                              <li class='star' title='Fair' data-value='2'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                              </li>
                                                              <li class='star' title='Good' data-value='3'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                              </li>
                                                              <li class='star' title='Excellent' data-value='4'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                              </li>
                                                              <li class='star' title='WOW!!!' data-value='5'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                              </li>
                                                            </ul>
                                                        </div><br>
                                                    <div class="form-group">
                                                        <textarea id="review-msg" class="form-control" style="resize: none; height: 100px; padding: 10px"></textarea>
                                                    </div>
                                                    <div id="msg"></div>
                                                    <button class="btn btn-primary" onclick="add_review(<?php echo $detail->product_id ?>)" style="background-color: blue;">Add Review</button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Related Products -->
                            <section class="padding-top-30 padding-bottom-0">
                                <!-- heading -->
                                <div class="heading">
                                    <h2>Related Products</h2>
                                    <hr>
                                </div>
                                <!-- Items Slider -->
                                <!-- Product -->
                                <div class="item-slide-4 with-nav">
                                    <?php
                                    $whh['main_id'] = $detail->main_id;
                                    $whh['product_id !='] = $detail->product_id;
                                    $whh['status'] = 1;

                                    $releted = $this->md->my_select('tbl_product', '*', $whh);

                                    foreach ($releted as $data) {
                                        //image details
                                        $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                        $paths = explode(",", $image_detail->path);
                                        $single_path = $paths[0];
                                        ?>
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
                                                    <div class="price">RS.<?php echo $new_price; ?> /-<span>Rs.<?php echo round($mainprice); ?> /-</span></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="price">Rs.<?php echo round($mainprice); ?> /-</div>    
                                                    <?php
                                                }
                                                if ($image_detail->qty > 0) {
                                                    if ($this->session->userdata('member')) {
                                                        $wh['product_id'] = $data->product_id;
                                                        $wh['register_id'] = $this->session->userdata('member');

                                                        $cart_added = count($this->md->my_select('tbl_cart', '*', $wh));

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
                            </section>
                            <!-- Recent View Products -->
                            <?php
                            if ($this->session->userdata('member')) {
                                $where['product_id'] = $detail->product_id;
                                $where['register_id'] = $this->session->userdata('member');

                                $count = count($this->md->my_select('tbl_recent_view', '*', $where));

                                if ($count == 0) {
                                    $this->md->my_insert('tbl_recent_view', $where);
                                }
                                ?>
                                <section class="padding-top-30 padding-bottom-0">
                                    <!-- heading -->
                                    <div class="heading">
                                        <h2>Recent View Products</h2>
                                        <hr>
                                    </div>
                                    <!-- Items Slider -->
                                    <div class="item-slide-4 with-nav">
                                        <?php
                                        $recent = $this->md->my_query("SELECT * FROM `tbl_recent_view` WHERE `register_id` = '" . $this->session->userdata('member') . "' AND `product_id` != '" . $detail->product_id . "' ORDER BY `view_id` DESC");
                                        foreach ($recent as $single) {
                                            $data = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];

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
                                                        <div class="price">RS.<?php echo $new_price; ?> /-<span>Rs.<?php echo round($mainprice); ?> /-</span></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="price">Rs.<?php echo round($mainprice); ?> /-</div>    
                                                        <?php
                                                    }
                                                    if ($image_detail->qty > 0) {
                                                        if ($this->session->userdata('member')) {
                                                            $wh['product_id'] = $data->product_id;
                                                            $wh['register_id'] = $this->session->userdata('member');

                                                            $cart_added = count($this->md->my_select('tbl_cart', '*', $wh));

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
                                </section>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
            <!-- GO TO TOP End --> 
        </div>
        <!-- End Page Wrapper --> 
        <?php
// require './footer.php';
        $this->load->view('footer');
        ?>
        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>

        <script type="text/javascript">
            $("#specification").children("table").addClass("table");
        </script>
             <script>
                $(document).ready(function () {

                    /* 1. Visualizing things on Hover - See next part for action on click */
                    $('#stars li').on('mouseover', function () {
                        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                        // Now highlight all the stars that's not after the current hovered star
                        $(this).parent().children('li.star').each(function (e) {
                            if (e < onStar) {
                                $(this).addClass('hover');
                            } else {
                                $(this).removeClass('hover');
                            }
                        });

                    }).on('mouseout', function () {
                        $(this).parent().children('li.star').each(function (e) {
                            $(this).removeClass('hover');
                        });
                    });


                    /* 2. Action to perform on click */
                    $('#stars li').on('click', function () {
                        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                        var stars = $(this).parent().children('li.star');

                        for (i = 0; i < stars.length; i++) {
                            $(stars[i]).removeClass('selected');
                        }

                        for (i = 0; i < onStar; i++) {
                            $(stars[i]).addClass('selected');
                        }

                        // JUST RESPONSE (Not needed)
                        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

                        $("#rate-value").attr('value', ratingValue);

                    });


                });


                function responseMessage(msg) {
                    $('.success-box').fadeIn(200);
                    $('.success-box div.text-message').html("<span>" + msg + "</span>");
                }
            </script>


    </body>
    
</html>