<?php
if ($this->uri->segment(2) == 'main-collection' || $this->uri->segment(2) == 'sub-collection' || $this->uri->segment(2) == 'peta-collection') 
{
    $id = base64_decode(base64_decode($this->uri->segment(3)));
    $title = $this->md->my_select('tbl_category', '*', array('category_id' => $id))[0]->name;
} 
else if ($this->uri->segment(2) == 'todays-offer') 
{
    $title = "Today's Offer";
} 
else if ($this->uri->segment(2) == 'search') 
{
    $val = str_replace("-", " ", $this->uri->segment(3));
    $title = 'Search result for "'.$val.'"';
} 
else 
{
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
                            <form id="filter-data">
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
                                                $i=0;
                                                $color = $this->md->my_query("SELECT DISTINCT `color` FROM `tbl_product_image`");
                                                foreach($color as $name)
                                                {
                                                    $i++;
                                            ?>
                                            <li>
                                                <input id="colr<?php echo $i; ?>" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="color[]" value="<?php echo $name->color; ?>" />
                                                <label for="colr<?php echo $i; ?>" style="text-transform: capitalize;"><?php echo $name->color; ?></label>
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
                                                <input id="colr101" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="price[]" value="0" />
                                                <label for="colr101" style="text-transform: capitalize;">Less then 10000</label>
                                            </li>
                                            <li>
                                                <input id="colr102" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="10000" />
                                                <label for="colr102" style="text-transform: capitalize;">10000 - 20000</label>
                                            </li>
                                            <li>
                                                <input id="colr103" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="20000" />
                                                <label for="colr103" style="text-transform: capitalize;">20000 - 30000</label>
                                            </li> 
                                            <li>
                                                <input id="colr104" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="30000" />
                                                <label for="colr104" style="text-transform: capitalize;">30000 - 40000</label>
                                            </li> 
                                            <li>
                                                <input id="colr105" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="40000" />
                                                <label for="colr105" style="text-transform: capitalize;">40000 - 50000</label>
                                            </li> 
                                            <li>
                                                <input id="colr106" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="50000" />
                                                <label for="colr106" style="text-transform: capitalize;">50000 - 60000</label>
                                            </li> 
                                            <li>
                                                <input id="colr107" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="price[]" value="60000" />
                                                <label for="colr107" style="text-transform: capitalize;">60000 - 70000</label>
                                            </li> 
                                            <li>
                                                <input id="colr108" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="price[]" value="70000" />
                                                <label for="colr108" style="text-transform: capitalize;">70000 - 80000</label>
                                            </li> 
                                            <li>
                                                <input id="colr109" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="80000" />
                                                <label for="colr109" style="text-transform: capitalize;">80000 - 90000</label>
                                            </li> 
                                            <li>
                                                <input id="colr110" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox"  name="price[]" value="90000" />
                                                <label for="colr110" style="text-transform: capitalize;">90000 - 100000</label>
                                            </li> 
                                            <li>
                                                <input id="colr111"  onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="price[]" value="100000" />
                                                <label for="colr111" style="text-transform: capitalize;">More Then 100000</label>
                                            </li> 
                                        </ul>
                                    </div>

                                    <!--Offer-->
                                    <br/>
                                    <h6>Offer</h6>
                                    <div class="checkbox checkbox-primary" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <li>
                                                <input id="colr115" onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="offer[]" value="1" />
                                                <label for="colr115" style="text-transform: capitalize;">In Offer</label>
                                            </li>
                                            <li>
                                                <input id="colr116"  onchange="product_data( '<?php echo $this->uri->segment(2); ?>' , '<?php echo $this->uri->segment(3); ?>' , '12' );" class="styled" type="checkbox" name="offer[]" value="0" />
                                                <label for="colr116" style="text-transform: capitalize;">Not In Offer</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Products -->
                        <div class="col-md-9"> 

                            <!-- Short List -->
                            <div class="short-lst">
                                <h2><?php echo $title; ?></h2>
                                <ul>
                                    <li>
                                        <select onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>',this.value)" class="selectpicker">
                                            <option value="12" selected="">Show 12 Products</option>
                                            <option value="18" >Show 18 Products</option>
                                            <option value="24" >Show 24 Products</option>
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
