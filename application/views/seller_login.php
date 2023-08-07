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
                    <div class="col-md-6"> 
                        <!-- Login Your Account -->
                        <h5>Login<p style="padding-top: 10px;">if you have an account with us please log in and enjoy shopping...</p> </h5>


                        <!-- FORM -->
                        <form method="post" action="" name="seller" novalidate="" class="myform">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Email</label>
                                    <input type="text" required="" class="form-control <?php
                                    if (form_error('email')) {
                                        echo "error-border";
                                    }
                                    ?>"name="email" placeholder="Enter Email Name"style="width: 100%;position: relative;"
                                           value="<?php 
                                        if( $this->input->cookie('seller_email'))
                                        {
                                            echo $this->input->cookie('seller_email');
                                        }
                                    ?>">
                                     <p class="err-msg">
                                        <?php
                                        echo form_error('email');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input type="password"  required="" class="form-control <?php
                                        if (form_error('ps')) {
                                            echo "error-border";
                                        }
                                        ?>" id="abcd" name="ps" value="<?php 
                                        if( $this->input->cookie('seller_password'))
                                        {
                                            echo $this->input->cookie('seller_password');
                                        }
                                    ?>" placeholder="*******"style="width: 100%;position: relative;" required="" />
                                        <i class="fa fa-eye-slash" id="eyes" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 36px;left: 535px"  onclick="shows();"></i>
                                         <p class="err-msg">
                                        <?php
                                        echo form_error('ps');
                                        ?>
                                    </p>
                                    </label>

                                </li>
                                <li class="col-sm-6">
                                    <div class="checkbox checkbox-primary">
                                        <input id="cate1" class="styled" type="checkbox" <?php 
                                        if( $this->input->cookie('seller_password'))
                                        {
                                            echo "checked";
                                        }
                                    ?> name="svp" value="yes">
                                        <label for="cate1"> Remember Me </label>
                                    </div>
                                </li>
                                <li class="col-sm-6">
                                <li class="col-sm-6"> <a href="forget-password" class="forget"><p>Forgot your password?</p></a> </li>
                                <li class="col-sm-12 text-left">
                                    <button type="submit" class="btn-round" name="login" value="yes">Login</button><br/><br/>
                                   <?php
                                    if (isset($error)) {
                                        ?> 
                                        <div class="alert alert-danger alert-dismissible d-flex align-items-center mb-0" role="alert">
                                            <i class="ti ti-checks alert-icon me-2"></i>
                                            <div>
                                                <strong>Oops!</strong> <?php echo $error ?>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                    }
                                    if ($this->uri->segment(2) == 1) {
                                        ?>
                                        <div class="alert alert-success alert-dismissible d-flex align-items-center mb-0" role="alert">
                                            <i class="ti ti-checks alert-icon me-2"></i>
                                            <div>
                                                <strong>Ok!</strong> Please Check Your Email.
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </li>
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
             function shows()
            {
                var abcd = document.getElementById('abcd');
                if (abcd.type == "password")
                {
                    abcd.type = "text";
                    $('#eyes').removeClass('fa fa-eye-slash');
                    $('#eyes').addClass('fa fa-eye');
                } else
                {
                    abcd.type = "password";
                    $('#eyes').removeClass('fa fa-eye');
                    $('#eyes').addClass('fa fa-eye-slash');
                }
            }
     </script>


        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>

    <!-- Mirrored from event-theme.com/themes/html/smarttech/LoginForm.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Dec 2018 16:45:11 GMT -->
</html>