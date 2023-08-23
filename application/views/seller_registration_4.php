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
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h5>Welcome, <?php echo $this->session->userdata('name'); ?></h5>
                        <!-- FORM -->
                        <form method="post" action="" name="register" novalidate="" class="myform" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="input-field col-6">
                                    <div class="col-md-6" >
                                        <div class="col-lg-12 mb-30" >
                                            <div class="ibox bg-boxshadow ibox-home" >
                                                <div class="profile--thumbnail text-center " >
                                                    <img src="<?php echo base_url('assets/images/avatar.jpg'); ?>" id="output" style="width:150px; margin-top:30px; height:150px; margin-left: 80%;"/>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="file-field input-field">
                                                    <input type="file" class="form-control" onchange="loadFile(event)" name="photo" id="imgbtn" style=" margin-top: 40px;margin-left: 50px;width: 182%;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-6">
                                <center><button class="btn-round" style=" margin-left:50px; margin-top: 40px;width: 80%; border: 1px solid white; "><i class="fa fa-angle-left"></i> &nbsp; <a href="<?php echo base_url(); ?>seller-registration-3"style="color: white;"> Previous</a></button></center>
                            </div>
                            <div class="col-sm-6">
                                <center><button type="submit" name="next" value="yes" class="btn-round" style=" width: 80%; margin-top: 40px;border: 1px solid white; margin-right: 70px;"> Go to Seller panel  &nbsp; <i class="fa fa-angle-right"></i></button></center>
                            </div>
                            <?php    
                                if (isset($error)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> <?php echo "$error"; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                }
                                ?>
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
        <!-- End Content --> 

        <!-- Footer -->


        <!-- Rights -->


        <!-- End Footer --> 
        <?php
// require './footer.php';
        $this->load->view('footer');
        ?>

        <script>
            var loadFile = function (event)
            {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function ()
                {
                    URL.revokeObjectURL(output.src)
                }
            };
        </script>

        <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>

</html>