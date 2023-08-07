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
                    <div class="col-md-3"> 
                        
                    </div>

                    <!-- Don’t have an Account? Register now -->
                    <div class="col-md-6">
                        <h5>Register now</h5>
                        <!-- FORM -->
                        <form method="post" action="" name="register" novalidate="" class="myform" >
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control <?php
                                    if (form_error('name')) {
                                        echo "error-border";
                                    }
                                    ?>" name="name" placeholder="Enter Company Name" value="<?php
                                           if (!isset($success) && set_value('name')) {
                                               echo set_value('name');
                                           } else {
                                               echo $this->session->userdata('name');
                                           }
                                           ?>" required="" style="width: 100%;position: relative;">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('name');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-sm-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control <?php
                                    if (form_error('email')) {
                                        echo "error-border";
                                    }
                                    ?>" name="email" placeholder="Enter Email" value="<?php
                                           if (!isset($success) && set_value('email')) {
                                               echo set_value('email');
                                           } else {
                                               echo $this->session->userdata('email');
                                           }
                                           ?>" required="" style="width: 100%;position: relative;">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('email');
                                        ?>
                                    </p>

                                </li>
                                <li class="col-sm-6">
                                    <label>Password
                                        <input type="password" class="form-control <?php
                                        if (form_error('ps')) {
                                            echo "error-border";
                                        }
                                        ?>" id="abc" name="ps" required="" value="<?php
                                           if (!isset($success) && set_value('ps')) {
                                               echo set_value('ps');
                                           } else {
                                               echo $this->session->userdata('ps');
                                           }
                                           ?>" placeholder="********"style="width: 100%;position: relative;">
                                        <i class="fa fa-eye-slash" id="eye" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 38px;left: 255px;" onclick="show();"></i>

                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('ps');
                                        ?>
                                    </p>

                                </li>
                                <li class="col-sm-6">
                                    <label>Confim Password
                                        <input type="password" class="form-control <?php
                                        if (form_error('cps')) {
                                            echo "error-border";
                                        }
                                        ?>" id="tva" name="cps" required="" placeholder="********"style="width: 100%;position: relative;">
                                      <i class="fa fa-eye-slash" id="eyef" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 38px;left: 255px;" onclick="showf();"></i>
                                 </label>    
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('cps');
                                        ?>
                                    </p>

                                </li>

                                <li class="col-sm-12">
                                    <label>Mobile No
                                        <input type="text" class="form-control <?php
                                        if (form_error('mobile')) {
                                            echo "error-border";
                                        }
                                        ?>" name="mobile" placeholder="Enter Mobile No" value="<?php
                                           if (!isset($success) && set_value('mobile')) {
                                               echo set_value('mobile');
                                           } else {
                                               echo $this->session->userdata('mobile');
                                           }
                                           ?>" required="" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('mobile');
                                        ?>
                                    </p>

                                </li>

                                <li class="col-sm-6">
                                    <label>PAN No
                                        <input type="text" class="form-control <?php
                                        if (form_error('panno')) {
                                            echo "error-border";
                                        }
                                        ?>" name="panno" placeholder="Enter PAN No" value="<?php
                                           if (!isset($success) && set_value('panno')) {
                                               echo set_value('panno');
                                           } else {
                                               echo $this->session->userdata('pan');
                                           }
                                           ?>" required="" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('panno');
                                        ?>
                                    </p>

                                </li>
                                
                                <li class="col-sm-6">
                                    <label>GST No
                                        <input type="text" class="form-control <?php
                                        if (form_error('gstno')) {
                                            echo "error-border";
                                        }
                                        ?>" name="gstno" placeholder="Enter GST No" value="<?php
                                           if (!isset($success) && set_value('gstno')) {
                                               echo set_value('gstno');
                                           } else {
                                               echo $this->session->userdata('gst');
                                           }
                                           ?>" required="" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('gstno');
                                        ?>
                                    </p>
                                </li> 
                                
                                <li class="col-md-12 text-center">
                                    <button class="btn-round" name="add" value="yes" style=" width: 80%; margin-top: 30px;border: 1px solid white; " >  Register</button>
                                </li>
                                
                                <li class="col-md-12 text-center" style="padding-top:15px;">
                                    <p>Do you already have account? Click here to <a href="<?php echo base_url(); ?>seller-login" style="color:blue;">Sign in</a></p>
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
        </section> <!-- End Content --> 

        <?php
// require './footer.php';
        $this->load->view('footer');
        ?>
<script>
    function show()
    {
        var abc = document.getElementById('abc');
        if (abc.type == "password")
        {
            abc.type = "text";
            $('#eye').removeClass('fa fa-eye-slash');
            $('#eye').addClass('fa fa-eye');
        } else
        {
            abc.type = "password";
            $('#eye').removeClass('fa fa-eye');
            $('#eye').addClass('fa fa-eye-slash');

        }
    }
    function showf()
    {
        var xyz = document.getElementById('tva');
        if (xyz.type == "password")
        {
            xyz.type = "text";
            $('#eyef').removeClass('fa fa-eye-slash');
            $('#eyef').addClass('fa fa-eye');
        } else
        {
            xyz.type = "password";
            $('#eyef').removeClass('fa fa-eye');
            $('#eyef').addClass('fa fa-eye-slash');
        }
    }

</script>


        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>
</html>