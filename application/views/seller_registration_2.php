<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Sell Product On PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">


    </head>

    <head>
        <?php
        $this->load->view('link');
        ?>
        <?php
        // require './header.php';
        $this->load->view('header');
        ?>
        <!-- Fonts Online -->
    </head>
    <body>

        <!-- Page Wrapper -->


        <!-- Blog -->
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <!-- Don’t have an Account? Register now -->
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <h5>Welcome, <?php echo $this->session->userdata('name'); ?></h5>
                        <!-- FORM -->
                        <form method="post" action="" name="register" novalidate="" class="myform">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Country
                                        <select class="form-control <?php
                                        if (form_error('country')) {
                                            echo "error-border";
                                        }
                                        ?>" onchange="set_combo('state', this.value);" name="country">
                                            <option value="">Select Country</option>  
                                            <?php
                                            foreach ($country as $data) {
                                                ?>
                                                <option value="<?php echo $data->location_id; ?>"<?php
                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                    echo set_select('country', $data->location_id);
                                                } else {
                                                    if ($this->session->userdata('country') == $data->location_id) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $data->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('country');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>State
                                        <select class="form-control <?php
                                        if (form_error('state')) {
                                            echo "error-border";
                                        }
                                        ?>" name="state" onchange="set_combo('city', this.value);" id="state">
                                            <option value="">Select State</option>
                                            <?php
                                            if ($this->input->post('country')) {
                                                $wh['parent_id'] = $this->input->post('country');
                                                $record = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($record as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                        echo set_select('state', $data->location_id);
                                                    }
                                                    ?>><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                    } else if ($this->session->userdata('country')) {
                                                        $wh['parent_id'] = $this->session->userdata('country');
                                                        $record = $this->md->my_select('tbl_location', '*', $wh);
                                                        foreach ($record as $data) {
                                                            ?>
                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                        echo set_select('state', $data->location_id);
                                                    } else {
                                                        if ($this->session->userdata('state') == $data->location_id) {
                                                            echo "selected";
                                                        }
                                                    }
                                                    ?>><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('state');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>City
                                        <select class="form-control <?php
                                        if (form_error('city')) {
                                            echo "error-border";
                                        }
                                        ?>" name="city" id="city">
                                            <option value="">Select City</option>
                                            <?php
                                            if ($this->input->post('state')) {
                                                $wh['parent_id'] = $this->input->post('state');
                                                $record = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($record as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                    if (!isset($success) && set_select('city', $data->location_id)) {
                                                        echo set_select('city', $data->location_id);
                                                    }
                                                    ?>><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                    } else if ($this->session->userdata('state')) {
                                                        $wh['parent_id'] = $this->session->userdata('state');
                                                        $record = $this->md->my_select('tbl_location', '*', $wh);
                                                        foreach ($record as $data) {
                                                            ?>
                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                    if (!isset($success) && set_select('city', $data->location_id)) {
                                                        echo set_select('city', $data->location_id);
                                                    } else {
                                                        if ($this->session->userdata('city') == $data->location_id) {
                                                            echo "selected";
                                                        }
                                                    }
                                                    ?>><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </p>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Pickup Address
                                        <textarea class="<?php
                                        if (form_error('address')) {
                                            echo "error-border";
                                        }
                                        ?>" rows="4" cols="75" name="address" style="resize: none"><?php
                                                  if (!isset($success) && set_value('address')) {
                                                      echo set_value('address');
                                                  } else {
                                                      echo $this->session->userdata('address');
                                                  }
                                                  ?></textarea>
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('address');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-sm-12">
                                    <label>PIN code
                                        <input type="text" class="form-control <?php
                                        if (form_error('pincode')) {
                                            echo "error-border";
                                        }
                                        ?>" name="pincode" value="<?php
                                               if (!isset($success) && set_value('pincode')) {
                                                   echo set_value('pincode');
                                               } else {
                                                   echo $this->session->userdata('pincode');
                                               }
                                               ?>" placeholder="Enter PIN code" required="" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('pincode');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-md-6 text-center">
                                    <a href="<?php echo base_url(); ?>seller-registration-1" class="btn-round" style=" width: 80%; margin-top: 40px;border: 1px solid white; margin-right: 70px;"> < Previous </a>
                                </li>
                                <li class="col-md-6 text-center">
                                    <button type="submit"  name="add" value="yes" class="btn-round" style=" width: 80%; margin-top: 40px;border: 1px solid white; margin-right: 70px;"> Next > </button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients img -->


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
                        <p id="msg"></p>
                    </div>
                </div>
            </div>
        </section>    


        <?php
// require './footer.php';
        $this->load->view('footer');
        ?>

        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>
</html>

