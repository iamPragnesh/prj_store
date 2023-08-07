<?php
if ($this->uri->segment(2) == 'main-collection' || $this->uri->segment(2) == 'sub-collection' || $this->uri->segment(2) == 'peta-collection') {
    $id = base64_decode(base64_decode($this->uri->segment(3)));
    $title = $this->md->my_select('tbl_category', '*', array('category_id' => $id))[0]->name;
} else if ($this->uri->segment(2) == 'todays-offer') {
    $title = "Today's Offer";
} else {
    $title = "All Products";
}
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title><?php echo $title; ?>- PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">


    </head>

    <body onload="product_data('<?php echo $this->uri->segment(2); ?>', '<?php echo $this->uri->segment(3); ?>', '12');">
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
            <section class="padding-top-40 padding-bottom-60">
                <div class="container">
                    <div class="row"> 

                        <!-- Shop Side Bar -->
                        <div class="col-md-3">
                            <div class="shop-side-bar"> 
                                <?php
                                    if( $this->uri->segment(2) == "")
                                    {
                                ?>
                                <!--Main Categories -->
                                <h6>Main Categories</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll">
                                    <ul>
                                        <?php
                                            $main = $this->md->my_select('tbl_category','*',array('label'=>'main'));
                                            foreach($main as $main_data)
                                            {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>collections/main-collection/<?php echo base64_encode(base64_encode($main_data->category_id)); ?>"><?php echo $main_data->name; ?></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                    }
                                    else if( $this->uri->segment(2) == "main-collection")
                                    {
                                        $where['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));
                                ?>
                                <!--Sub Categories -->
                                <h6>Sub Categories</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll">
                                    <ul>
                                        <?php
                                            $sub = $this->md->my_select('tbl_category','*',$where);
                                            foreach($sub as $sub_data)
                                            {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>collections/sub-collection/<?php echo base64_encode(base64_encode($sub_data->category_id)); ?>"><?php echo $sub_data->name; ?></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                    }
                                    else if( $this->uri->segment(2) == "sub-collection")
                                    {
                                        $wh['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));
                                ?>
                                <!--Peta Categories -->
                                <h6>Peta Categories</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll">
                                    <ul>
                                        <?php
                                            $peta = $this->md->my_select('tbl_category','*',$wh);
                                            
                                            foreach($peta as $peta_data)
                                            {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>collections/peta-collection/<?php echo base64_encode(base64_encode($peta_data->category_id)); ?>"><?php echo $peta_data->name; ?></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                    }
                                ?>

                                <!--Colors--> 
                                <h6>Colors</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll;">
                                    <ul>
                                        <?php
                                            $color = $this->md->my_query("SELECT DISTINCT `color` FROM `tbl_product_image`");
                                            foreach($color as $name)
                                            {
                                        ?>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;"><?php echo $name->color; ?></label>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                
                                <!--Price--> 
                                <h6>Price</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll;">
                                    <ul>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">Less then 10000</label>
                                        </li>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">10000 - 20000</label>
                                        </li>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">20000 - 30000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">30000 - 40000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">40000 - 50000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">50000 - 60000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">60000 - 70000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">70000 - 80000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">80000 - 90000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">90000 - 100000</label>
                                        </li> 
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">More Then 100000</label>
                                        </li> 
                                    </ul>
                                </div>
                                
                                <!--Offer-->
                                <br/>
                                <h6>Offer</h6>
                                <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll;">
                                    <ul>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">In Offer</label>
                                        </li>
                                        <li>
                                            <input id="colr1" class="styled" type="checkbox" />
                                            <label for="colr1" style="text-transform: capitalize;">Not In Offer</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="col-md-9"> 

                            <!-- Short List -->
                            <div class="short-lst">
                                <h2><?php echo $title; ?></h2>
                                <ul>
                                    <!-- Short List -->
                                    <li>
                                        <p>Showing 1–12 of 756 results</p>
                                    </li>
                                    <!-- Short  -->
                                    <li >
                                        <select class="selectpicker">
                                            <option>Show 12 </option>
                                            <option>Show 24 </option>
                                            <option>Show 32 </option>
                                        </select>
                                    </li>
                                    <!-- by Default -->
                                    <li>
                                        <select class="selectpicker">
                                            <option>Sort by Default </option>
                                            <option>Low to High </option>
                                            <option>High to Low </option>
                                        </select>
                                    </li>

                                    <!-- Grid Layer -->
                                    <li class="grid-layer"> <a href="#."><i class="fa fa-list margin-right-10"></i></a> <a href="#." class="active"><i class="fa fa-th"></i></a> </li>
                                    <li> 
                                        <!-- Columns -->
                                        <select class="selectpicker">
                                            <option>3 Columns </option>
                                            <option>4 Columns </option>
                                            <option>5 Columns</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>

                            <!-- Items -->
                            <div id="product-data">

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
            <!-- GO TO TOP End --> 
        </div>
        <!-- End Page Wrapper --> 


    </body>
    <?php
    // require './footer.php';
    $this->load->view('footer');
    ?>
    <?php
//require './headerscript.php';
    $this->load->view('footerscript');
    ?>
</html>
