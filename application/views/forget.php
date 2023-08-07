<!doctype html>
<html class="no-js" lang="en">

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
                        <h5>Reset Your Password <p style="padding-top: 10px;">please Enter Your Register Email We Will help You To Recover Your Forget Password...</p> </h5>

                     <!-- FORM -->
                        <form method="post" action="" novalidate="" name="forget" class="myform" >
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Email
                                        <input type="email" name="email" required="" placeholder="Enter Your Email"
                                              value="<?php 
                                        if( $this->input->cookie('seller_email'))
                                        {
                                            echo $this->input->cookie('seller_email');
                                        }
                                    ?>"  class="form-control  <?php
                                    if (form_error('email')) {
                                        echo "error-border";
                                    }
                                    ?>">
                                    </label>
                                     <p class="err-msg">
                                            <?php echo form_error('email'); ?>
                                        </p>
                                </li>
                                <li class="col-sm-6">  </li>
                                <li class="col-sm-12 text-left">
                                    <button type="submit" name="send" value="yes" class="btn-round">Send Email</button>
                                </li>
                                <li class="col-sm-12 text-left">
                                    <a href="<?php echo base_url() ?>seller-login"><p align="right"> Back To Login </p></a>
                                </li>
                            </ul>
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
                            ?>
                        </form>
                    </div>

                    <!-- Don’t have an Account? Register now -->
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

<!-- JavaScripts --> 
</script>
<?php
//require './headerscript.php';
$this->load->view('footerscript');
?>
</body>

</html>