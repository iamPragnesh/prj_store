<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Login | PRJ Store</title>
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
                    <div class="col-md-6"> 
                        <!-- Login Your Account -->
                        <h5>Login        <p style="padding-top: 10px;">if you have an account with us please log in and enjoy shopping...</p> </h5>
                        <form method="post" action="" name="rlogin" novalidate="" class="myform">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Email</label>
                                    <input type="text" required="" value="<?php 
                                        if( $this->input->cookie('member_email'))
                                        {
                                            echo $this->input->cookie('member_email');
                                        }
                                    ?>" class="form-control  <?php
                                    if (form_error('lemail')) {
                                        echo "error-border";
                                    }
                                    ?>"name="lemail" placeholder="Enter Email Name"style="width: 100%;position: relative;">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('lemail');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input type="password" value="<?php 
                                        if( $this->input->cookie('member_password'))
                                        {
                                            echo $this->input->cookie('member_password');
                                        }
                                    ?>" required="" class="form-control  <?php
                                        if (form_error('lps')) {
                                            echo "error-border";
                                        }
                                        ?>" id="abcd" name="lps" placeholder="*******"style="width: 100%;position: relative;" required="" />
                                        <i class="fa fa-eye-slash" id="eyes" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 36px;left: 535px;" onclick="shows();"></i>
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('lps');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-6">
                                    <div class="checkbox checkbox-primary">
                                        <input id="cate1" class="styled" type="checkbox" <?php 
                                        if( $this->input->cookie('member_password'))
                                        {
                                            echo "checked";
                                        }
                                    ?> name="svp" value="yes">
                                        <label for="cate1"> Remember Me </label>
                                    </div>
                                </li>
                                <li class="col-sm-6">
                                <li class="col-sm-6"> <a href="<?php echo base_url() ?>forgetr-password" class="forget"><p>Forgot your password?</p></a> </li>
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
                   
                     <!-- Don’t have an Account? Register now -->
                    <div class="col-md-6">
                        <h5>Register now <p style="padding-top: 10px;s"> fill the following form and become our member and purches your favorite product</p></h5>

                        <!-- FORM -->
                        <form method="post" action="" name="register" novalidate="" class="myform">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Username </label>
                                    <input type="text" class="form-control <?php
                                    if (form_error('name')) {
                                        echo "error-border";
                                    }
                                    ?>" name="name" placeholder="Enter User Name" required="" style="width: 100%;position: relative;" value="<?php
                                           if (!isset($success) && set_value('name')) {
                                               echo set_value('name');
                                           }
                                           ?>">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('name');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-sm-12">
                                    <label>Email </label>
                                    <input type="text" class="form-control <?php
                                    if (form_error('email')) {
                                        echo "error-border";
                                    }
                                    ?>" " name="email" placeholder="Enter Email" required="" style="width: 100%;position: relative;" value="<?php
                                           if (!isset($success) && set_value('email')) {
                                               echo set_value('email');
                                           }
                                           ?>">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('email');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>Mobile No
                                        <input type="text" class="form-control <?php
                                        if (form_error('mobile')) {
                                            echo "error-border";
                                        }
                                        ?>" name="mobile" placeholder="Enter Mobile No" pattern="^[0-9]{10}$" style="width: 100%;position: relative;" value="<?php
                                               if (!isset($success) && set_value('mobile')) {
                                                   echo set_value('mobile');
                                               }
                                               ?>" />
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('mobile');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input type="password" class="form-control <?php
                                        if (form_error('ps')) {
                                            echo "error-border";
                                        }
                                        ?>" id="abc" name="ps" required="" placeholder="********"style="width: 100%;position: relative;"
                                               value="<?php
                                               if (!isset($success) && set_value('ps')) {
                                                   echo set_value('ps');
                                               }
                                               ?>">
                                        <i class="fa fa-eye-slash" id="eye" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 36px;left: 535px;" onclick="show();"></i>

                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('ps');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-12">
                                    <label>Confirm Password
                                        <input type="password" class="form-control <?php
                                        if (form_error('cps')) {
                                            echo "error-border";
                                        }
                                        ?>" " id="tva" name="cps" required="" placeholder="********"style="width: 100%;position: relative;">
                                        <i class="fa fa-eye-slash" id="eyef" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 36px;left: 535px;" onclick="showf();"></i>

                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('cps');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-6">
                                    <div class="checkbox checkbox-primary">
                                        <input class="styled" type="checkbox" checked="flase" disabled="" checked="">
                                        <label for="cate1">i Accept All <a href="<?php echo base_url('terms-and-condition') ?>">terms and condition</a> and <a href="<?php echo base_url('privacy-policy') ?>">privacy policy</a></label>
                                    </div>
                                </li>
                                
                                <li class="col-sm-12 text-left">
                                    <button type="submit" name="register" value="yes" class="btn-round">Register</button>
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
        </section>    </div>
    <!-- End Content --> 

    <!-- Footer -->


    <!-- Rights -->


    <!-- End Footer --> 
    <?php
// require './footer.php';
    $this->load->view('footer');
    ?>

    <!-- GO TO TOP  --> 
    <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
    <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 
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
<!-- JavaScripts --> 
</script>
<?php
//require './headerscript.php';
$this->load->view('footerscript');
?>
</body>

<!-- Mirrored from event-theme.com/themes/html/smarttech/LoginForm.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Dec 2018 16:45:11 GMT -->
</html>